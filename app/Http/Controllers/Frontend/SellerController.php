<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Customer;
use App\Models\SellerWithdraw;
use App\Models\Shipping;
use App\Models\SellerWithdrawVentor;
use App\Models\OrderStatus;
use App\Models\ShippingCharge;
use App\Models\GeneralSetting;
use App\Models\SmsGateway;
use App\Models\Transaction;
use Carbon\Carbon;
use Session;
use Toastr;
use Hash;
use Auth;
use Cart;
use Image;
use DB;
use Str;
use Mail;
class SellerController extends Controller
{
    function __construct()
    {
        $this->middleware('seller', ['except' => ['register','store','verify','resendotp','account_verify','login','signin','logout','forgot_password','forgot_verify','forgot_reset','forgot_store']]);
    }

    public function invoice_order($invoice_id){
        $order = Order::where(['invoice_id'=>$invoice_id])->with('orderdetails','payment','shipping','customer')->firstOrFail();
        return view('frontEnd.seller.order.invoice',compact('order'));
    }
    
    public function process($invoice_id){
        $data = Order::where(['invoice_id'=>$invoice_id])->select('id','invoice_id','order_status')->with('orderdetails')->first();
        $shippingcharge = ShippingCharge::where('status',1)->get();
        return view('frontEnd.seller.order.process',compact('data','shippingcharge'));
    }
    public function order_process(Request $request){
       
        $link = OrderStatus::find($request->status)->slug;
        $order = Order::find($request->id);
        $courier = $order->order_status;
        $order->order_status = $request->status;
        $order->admin_note   = $request->admin_note;
        $order->save();
        
        $shipping_update = Shipping::where('order_id',$order->id)->first();
        $shippingfee  = ShippingCharge::find($request->area);
        if($shippingfee->name != $request->area){
           if($order->shipping_charge > $shippingfee->amount){
                $total = $order->amount + ($shippingfee->amount-$order->shipping_charge);
                $order->shipping_charge = $shippingfee->amount;
                $order->amount = $total;
                $order->save();
           }else{
              $total = $order->amount + ($shippingfee->amount-$order->shipping_charge);
                $order->shipping_charge = $shippingfee->amount;
                $order->amount = $total;
                $order->save();
           }
        }

        $shipping_update->name   = $request->name;
        $shipping_update->phone   = $request->phone;
        $shipping_update->address   = $request->address;
        $shipping_update->area   = $shippingfee->name;
        $shipping_update->save();

        if($request->status == 5 && $courier != 5){
            $consignmentData = [
            'invoice' => $order->invoice_id,
            'recipient_name' => $order->shipping?$order->shipping->name:'Quikaro',
            'recipient_phone' => $order->shipping?$order->shipping->phone:'01744612355',
            'recipient_address' => $order->shipping?$order->shipping->address:'Dinajpur',
            'cod_amount' => $order->amount
        ];
        $client = new Client();
        $response = $client->post('https://portal.steadfast.com.bd/api/v1/create_order', [
            'json' => $consignmentData,
            'headers' => [
                'Api-Key' => 'wozt47mfd9xlqyyvwp2mlmuxcid9ivai',
                'Secret-Key' => 'edloypeonukjwhmqsiz34pds',
                'Accept' => 'application/json',
            ],
        ]);
        
        $responseData = json_decode($response->getBody(), true);
        }
        if ($request->status == 6) {
            $orders_details = OrderDetails::select('id', 'order_id', 'product_id', 'affiliate_commision', 'affiliate_id')->where('order_id', $order->id)->get();

            foreach ($orders_details as $order_details) {
                $update_details = OrderDetails::where('id', $order_details->id)->first();
               
                $product = Product::select('id', 'stock','sold')->find($order_details->product_id);
                $product->stock -= $update_details->qty;
                $product->sold += $update_details->qty;
                $product->save();
                // return  $product;

                // Handle affiliate commissions if applicable
                if ($order_details->affiliate_id && $order_details->affiliate_commision > 0) {
                    $affiliatar = Customer::where('refferal_code', $order_details->affiliate_id)->first();
                    if ($affiliatar) {
                        $affiliatar->amount += $order_details->affiliate_commision;
                        $affiliatar->save();
                    }
                }
            }

            if ($order->seller_id) {
                $seller_update = Seller::select('id', 'balance')->find($order->seller_id);
                // return $seller_update;
                if ($seller_update) {
                    $add_balance = ($order->amount) - ($order->seller_commission + $order->shipping_charge + ($order->commission ? $order->commission : 0));

                    $seller_update->balance += $add_balance;
                    // return $seller_update;
                    $seller_update->save();

                    $transaction_data = Transaction::create([
                        'user_id'     => $seller_update->id,
                        'user_type'   => 'seller',
                        'amount'      => $add_balance,
                        'balance'     => $seller_update->balance,
                        'amount_type' => 'credit', 
                        'note'        => 'order earning',
                        'status'      => 'complete',
                    ]);
                }
            }
        }
        
        Toastr::success('Success','Order status change successfully');
        return redirect('seller/orders/?slug='.$link);
    }
    public function order_print(Request $request){
        $orders = Order::whereIn('id', $request->input('order_ids'))->with('orderdetails','payment','shipping','customer')->get();
        $view = view('frontEnd.seller.order.print', ['orders' => $orders])->render();
        return response()->json(['status' => 'success', 'view' => $view]);
    }


     public function order_create(){
        $products = Product::select('id','name','new_price','product_code')->where(['status'=>1])->get();
        $cartinfo  = Cart::instance('pos_shopping')->content();
        $shippingcharge = ShippingCharge::where('status',1)->get();
        return view('frontEnd.seller.order.create',compact('products','cartinfo','shippingcharge'));
    }
    
    public function order_store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'area'=>'required',
        ]);

        if(Cart::instance('pos_shopping')->count() <= 0) {
            Toastr::error('Your shopping empty', 'Failed!');
            return redirect()->back();
        }

        $subtotal = Cart::instance('pos_shopping')->subtotal();
        $subtotal = str_replace(',','',$subtotal);
        $subtotal = str_replace('.00', '',$subtotal);
        $discount = Session::get('pos_discount')+Session::get('product_discount');
        $shippingfee  = ShippingCharge::find($request->area);
        
        $exits_customer = Customer::where('phone',$request->phone)->select('phone','id')->first();
        if($exits_customer){
            $customer_id = $exits_customer->id;
        }else{
            $password = rand(111111,999999);
            $store              = new Customer();
            $store->name        = $request->name;
            $store->slug        = $request->name;
            $store->phone       = $request->phone;
            $store->password    = bcrypt($password);
            $store->verify      = 1;
            $store->status      = 'active';
            $store->save();
            $customer_id = $store->id;
        }
 
         // order data save
        $order                   = new Order();
        $order->invoice_id       = rand(11111,99999);
        $order->amount           = ($subtotal + $shippingfee->amount) - $discount;
        $order->discount         = $discount ? $discount : 0;
        $order->shipping_charge  = $shippingfee->amount;
        $order->customer_id      =  $customer_id;
        $order->order_status     = 1;
        $order->note             = $request->note;
        $order->save();

        // shipping data save
        $shipping              =   new Shipping();
        $shipping->order_id    =   $order->id;
        $shipping->customer_id =   $customer_id;
        $shipping->name        =   $request->name;
        $shipping->phone       =   $request->phone;
        $shipping->address     =   $request->address;
        $shipping->area        =   $shippingfee->name;
        $shipping->save();

        // payment data save
        $payment                 = new Payment();
        $payment->order_id       = $order->id;
        $payment->customer_id    = $customer_id;
        $payment->payment_method = 'Cash On Delivery';
        $payment->amount         = $order->amount;
        $payment->payment_status = 'pending';
        $payment->save();

       // order details data save
        foreach(Cart::instance('pos_shopping')->content() as $cart){
            $order_details                   =   new OrderDetails();
            $order_details->order_id         =   $order->id;
            $order_details->product_id       =   $cart->id;
            $order_details->product_name     =   $cart->name;
            $order_details->purchase_price   =   $cart->options->purchase_price;
            $order_details->product_discount =   $cart->options->product_discount;
            $order_details->sale_price       =   $cart->price;
            $order_details->qty              =   $cart->qty;
            $order_details->save();
        }
        Cart::instance('pos_shopping')->destroy();
        Session::forget('pos_shipping');
        Session::forget('pos_discount');
        Session::forget('product_discount');
        Toastr::success('Thanks, Your order place successfully', 'Success!');
        return redirect('frontEnd/seller/order/pending');
    }
    public function cart_add(Request $request){
        $product = Product::select('id','name','stock','new_price','old_price','purchase_price','slug')->where(['id' => $request->id])->first();
        $qty = 1;
        $cartinfo = Cart::instance('pos_shopping')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->new_price,
            'options' => [
                'slug' => $product->slug,
                'image' => $product->image->image,
                'old_price' => $product->old_price,
                'purchase_price' => $product->purchase_price,
                'product_discount' => 0,
            ],
        ]);
        return response()->json(compact('cartinfo'));
    }
    public function cart_content(){
        $cartinfo = Cart::instance('pos_shopping')->content();
        return view('frontEnd.seller.order.cart_content',compact('cartinfo'));
    }
    public function cart_details(){
        $cartinfo = Cart::instance('pos_shopping')->content();
        $discount = 0;
        foreach($cartinfo as $cart){
            $discount += $cart->options->product_discount*$cart->qty;
        }
        Session::put('product_discount',$discount);
        return view('frontEnd.seller.order.cart_details',compact('cartinfo'));
    }
    public function cart_increment(Request $request){
        $qty = $request->qty + 1;
        $cartinfo = Cart::instance('pos_shopping')->update($request->id, $qty);
        return response()->json($cartinfo);
    }
    public function cart_decrement(Request $request){
        $qty = $request->qty - 1;
        $cartinfo = Cart::instance('pos_shopping')->update($request->id, $qty);
        return response()->json($cartinfo);
    }
    public function cart_remove(Request $request){
        $remove = Cart::instance('pos_shopping')->remove($request->id);
        $cartinfo = Cart::instance('pos_shopping')->content();
        return response()->json($cartinfo);
    }
    public function product_discount(Request $request){
        $discount = $request->discount;
        $cart = Cart::instance('pos_shopping')->content()->where('rowId', $request->id)->first();
        $cartinfo = Cart::instance('pos_shopping')->update($request->id, [
            'options' => [
                'slug' => $cart->options->slug,
                'image' => $cart->options->image,
                'old_price' => $cart->options->old_price,
                'purchase_price' => $cart->options->purchase_price,
                'product_discount' => $request->discount,
            ],
        ]);
        return response()->json($cartinfo);
    }
    public function cart_shipping(Request $request){
        $shipping = ShippingCharge::where(['id' => $request->id])->first();
        Session::put('pos_shipping', $shipping->amount);
        return response()->json($shipping);
    }
    public function cart_clear(Request $request){
        $cartinfo = Cart::instance('pos_shopping')->destroy();
        Session::forget('pos_shipping');
        Session::forget('pos_discount');
        Session::forget('product_discount');
        return redirect()->back();
    }
    public function order_edit($invoice_id){
        $products = Product::select('id','name','new_price','product_code')->where(['status'=>1])->get();
        $shippingcharge = ShippingCharge::where('status',1)->get();
        $order = Order::where('invoice_id',$invoice_id)->first();
        $cartinfo  = Cart::instance('pos_shopping')->destroy();
        $shippinginfo  = Shipping::where('order_id',$order->id)->first();
        Session::put('product_discount',$order->discount);
        Session::put('pos_shipping',$order->shipping_charge);
        $orderdetails = OrderDetails::where('order_id',$order->id)->get();
        foreach($orderdetails as $ordetails){
        $cartinfo = Cart::instance('pos_shopping')->add([
            'id' => $ordetails->product_id,
            'name' => $ordetails->product_name,
            'qty' => $ordetails->qty,
            'price' => $ordetails->sale_price,
            'options' => [
                'image' => $ordetails->image->image,
                'purchase_price' => $ordetails->purchase_price,
                'product_discount' => $ordetails->product_discount,
                'details_id' => $ordetails->id,
            ],
        ]);
        }
        $cartinfo  = Cart::instance('pos_shopping')->content();
        return view('frontEnd.seller.order.edit',compact('products','cartinfo','shippingcharge','shippinginfo','order'));
    }
    public function order_update(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'area'=>'required',
        ]);

        if(Cart::instance('pos_shopping')->count() <= 0) {
            Toastr::error('Your shopping empty', 'Failed!');
            return redirect()->back();
        }

        $subtotal = Cart::instance('pos_shopping')->subtotal();
        $subtotal = str_replace(',','',$subtotal);
        $subtotal = str_replace('.00', '',$subtotal);
        $discount = Session::get('pos_discount')+Session::get('product_discount');
        $shippingfee  = ShippingCharge::find($request->area);

        $exits_customer = Customer::where('phone',$request->phone)->select('phone','id')->first();
        if($exits_customer){
            $customer_id = $exits_customer->id;
        }else{
            $password = rand(111111,999999);
            $store              = new Customer();
            $store->name        = $request->name;
            $store->slug        = $request->name;
            $store->phone       = $request->phone;
            $store->password    = bcrypt($password);
            $store->verify      = 1;
            $store->status      = 'active';
            $store->save();
            $customer_id = $store->id;
        }
 
         // order data save
        $order                   =  Order::where('id',$request->order_id)->first();
        $order->invoice_id       = rand(11111,99999);
        $order->amount           = ($subtotal + $shippingfee->amount) - $discount;
        $order->discount         = $discount ? $discount : 0;
        $order->shipping_charge  = $shippingfee->amount;
        $order->customer_id      =  $customer_id;
        $order->order_status     = 1;
        $order->note             = $request->note;
        $order->save();


        // shipping data save
        $shipping              =   Shipping::where('order_id',$request->order_id)->first();
        $shipping->order_id    =   $order->id;
        $shipping->customer_id =   $customer_id;
        $shipping->name        =   $request->name;
        $shipping->phone       =   $request->phone;
        $shipping->address     =   $request->address;
        $shipping->area        =   $shippingfee->name;
        $shipping->save();

        // payment data save
        $payment                 = Payment::where('order_id',$request->order_id)->first();
        $payment->order_id       = $order->id;
        $payment->customer_id    = $customer_id;
        $payment->payment_method = 'Cash On Delivery';
        $payment->amount         = $order->amount;
        $payment->payment_status = 'pending';
        $payment->save();

       // order details data save
        foreach(Cart::instance('pos_shopping')->content() as $cart){
            $exits = OrderDetails::where('id',$cart->options->details_id)->first();
            if($exits){
                $order_details                   =   OrderDetails::find($exits->id);
                $order_details->product_discount =   $cart->options->product_discount;
                $order_details->sale_price       =   $cart->price;
                $order_details->qty              =   $cart->qty;
                $order_details->save();
            }else{
                $order_details                   =   new OrderDetails();
                $order_details->order_id         =   $order->id;
                $order_details->product_id       =   $cart->id;
                $order_details->product_name     =   $cart->name;
                $order_details->purchase_price   =   $cart->options->purchase_price;
                $order_details->product_discount =   $cart->options->product_discount;
                $order_details->sale_price       =   $cart->price;
                $order_details->qty              =   $cart->qty;
                $order_details->save();
            }
            
        }
        Cart::instance('pos_shopping')->destroy();
        Session::forget('pos_shipping');
        Session::forget('pos_discount');
        Session::forget('product_discount');
        Toastr::success('Thanks, Your order place successfully', 'Success!');
        return redirect('seller/orders/?slug=pending');
    }



    public function silip_print(Request $request){
        $product = Product::where('status',1)->select('id','product_qr')->get();
        return view('frontEnd.seller.order.silip_print', compact('product'));
    }


    //main controller route
    public function login(){
        return view('frontEnd.seller.login');
    }
        public function signin(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'phone'    => 'required',
            'password' => 'required|min:6'
        ]);
    
        // Check if input is an email or phone number
        $auth_check = Seller::where(function ($query) use ($request) {
            $query->where('phone', $request->phone)
                  ->orWhere('email', $request->phone);
        })->first();
    
        // return $auth_check;
        if ($auth_check) {
            if ($auth_check->status != 'active') {
                Toastr::error('Your account is inactive now, please wait', 'Error!');
                return redirect()->back();
            }
    
            // Prepare credentials
            $credentials = [];
            if (filter_var($request->phone, FILTER_VALIDATE_EMAIL)) {
                $credentials['email'] = $request->phone;
            } else {
                $credentials['phone'] = $request->phone;
            }
            $credentials['password'] = $request->password;
    
            // Attempt login
            if (Auth::guard('seller')->attempt($credentials)) {
                Auth::guard('seller')->loginUsingId(Auth::guard('seller')->user()->id);
                Toastr::success('You are logged in successfully', 'Success!');
                return redirect()->route('seller.account');
            }
    
            Toastr::error('Oops! Your phone or password is incorrect', 'Error!');
            return redirect()->back();
        } else {
            Toastr::error('Sorry! You have no account', 'Error!');
            return redirect()->back();
        }
    }

    
    public function register(){
        return view('frontEnd.seller.register');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'    => 'required',
            'phone'    => 'required|unique:sellers',
            'email'    => 'required|unique:sellers',
            'password' => 'required|min:6|same:confirm-password'
        ]);
        $last_id = Seller::orderBy('id', 'desc')->first();
        $last_id = $last_id?$last_id->id+1:1;
        $store              = new Seller();
        $store->name        = $request->name;
        $store->slug        = preg_replace('/\s+/', '-', strtolower($request->name));
        $store->phone       = $request->phone;
        $store->email       = $request->email;
        $store->password    = bcrypt($request->password);
        $store->verify      = rand(1111,9999);
        $store->status      = 'pending';
        $store->save();
        
        // $site_setting = GeneralSetting::where('status', 1)->first();
        // $sms_gateway = SmsGateway::where(['status' => 1, 'forget_pass' => 1])->first();
        // if ($sms_gateway) {
        //     $url = "$sms_gateway->url";
        //     $data = [
        //         "api_key" => "$sms_gateway->api_key",
        //         "number" => $request->phone,
        //         "type" => 'text',
        //         "senderid" => "$sms_gateway->serderid",
        //         "message" => "Dear $request->name!\r\nYour verify OTP is $store->verify \r\nThank you for using $site_setting->name"
        //     ];
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //     $response = curl_exec($ch);
        //     curl_close($ch);
        // }

        // if( $store->email){
        //      $data = [
        //         'email' => $store->email,
        //         'otp' => $store->verify,
        //         'customerId' => $store->id,
        //     ];
        //     // return $data;
        //     $send = Mail::send('emails.forgot_password', $data, function ($textmsg) use ($data) {
        //         $textmsg->to($data['email']);
        //         $textmsg->subject('Your email verify code');
        //     });
        // }

        Session::put('seller_verify',$store->phone);
        Toastr::success('Your account register successfully');
        return redirect()->route('seller.verify');
    }
    public function verify(){
        return view('frontEnd.seller.verify');
    }
    public function resendotp(Request $request){
        $seller = Seller::where('phone',session::get('seller_verify'))->first();
        $seller->verify = rand(1111,9999);
        $seller->save();
        
        $site_setting = GeneralSetting::where('status', 1)->first();
        $sms_gateway = SmsGateway::where(['status' => 1])->first();
        if ($sms_gateway) {
            $url = "$sms_gateway->url";
            $data = [
                "api_key" => "$sms_gateway->api_key",
                "number" => $seller->phone,
                "type" => 'text',
                "senderid" => "$sms_gateway->serderid",
                "message" => "Dear $seller->name!\r\nYour forgot password verify OTP is  $seller->verify \r\nThank you for using $site_setting->name"
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
        }

        if($seller->email){
             $data = [
                'email' => $seller->email,
                'otp' => $seller->verify,
                'customerId' => $seller->id,
            ];
            $send = Mail::send('emails.forgot_password', $data, function ($textmsg) use ($data) {
                $textmsg->to($data['email']);
                $textmsg->subject('Your forgot email verify code');
            });
         }
        
        Toastr::success('Success','Resend code send successfully');
        return redirect()->back();
    }

    public function account_verify(Request $request){
        $this->validate($request,[
            'otp' => 'required',
        ]);
        $seller = Seller::where('phone',session::get('seller_verify'))->first();
        return  $seller;
        if($seller->verify != $request->otp){
            Toastr::error('Success','Your OTP not match');
            return redirect()->back();
        }

        $seller->verify = 1;
        $seller->save();

        Session::forget('seller_verify');
        Auth::guard('seller')->loginUsingId($seller->id);
        return redirect()->route('seller.account');
    }

    public function forgot_password(){
        return view('frontEnd.seller.forgot_password');
    }
    public function forgot_verify(Request $request){
        $seller = Seller::where('phone',$request->phone)->first();
        if(!$seller){
            Toastr::error('Your phone number not found');
            return back();
        }
        $seller->verify = rand(1111,9999);
        $seller->save();
        
        $site_setting = GeneralSetting::where('status', 1)->first();
        $sms_gateway = SmsGateway::where(['status' => 1, 'forget_pass' => 1])->first();
        if ($sms_gateway) {
            $url = "$sms_gateway->url";
            $data = [
                "api_key" => "$sms_gateway->api_key",
                "number" => $seller->phone,
                "type" => 'text',
                "senderid" => "$sms_gateway->serderid",
                "message" => "Dear $seller->name!\r\nYour forgot password verify OTP is $seller->verify \r\nThank you for using $site_setting->name"
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
        }

         if($seller->email){
             $data = [
                'email' => $seller->email,
                'otp' => $seller->verify,
                'customerId' => $seller->id,
            ];
            $send = Mail::send('emails.forgot_password', $data, function ($textmsg) use ($data) {
                $textmsg->to($data['email']);
                $textmsg->subject('Your forgot email verify code');
            });
         }
        
        session::put('seller_verify',$request->phone);
        Toastr::success('Your account register successfully');
        return redirect()->route('seller.forgot.reset');
    }
    public function forgot_reset(){
        if(!Session::get('seller_verify')){
          Toastr::error('Something wrong please try again');
          return redirect()->route('seller.forgot.password'); 
        };
        return view('frontEnd.seller.forgot_reset');
    }
    public function forgot_store(Request $request){

        $seller = Seller::where('phone',session::get('seller_verify'))->first();

        if($seller->verify != $request->otp){
            Toastr::error('Opps','Your OTP not match');
            return redirect()->back();
        }

        $seller->verify = 1;
        $seller->password = bcrypt($request->password);
        $seller->save();
        
        

        if($seller->status = 'pending'){
            Toastr::error('Opps','Your account inactive no');
            return redirect()->back();
        }
        if(Auth::guard('seller')->attempt(['phone' => $seller->phone, 'password' => $request->password])) {
            Session::forget('seller_verify');
            Toastr::success('You are login successfully', 'success!');
                return redirect()->intended('seller/account');
        }
    }
   
    public function account(){
        // return 'ok';
        $customer = Seller::with('seller_area')->find(Auth::guard('seller')->user()->id);
        $total_order = Order::where('seller_id',Auth::guard('seller')->user()->id)->count();
        $today_order = Order::where('seller_id',Auth::guard('seller')->user()->id)->where('created_at', '>=', Carbon::today())->count();

        $pending = Order::where('seller_id',Auth::guard('seller')->user()->id)->where('order_status',1)->count();
        $courier = Order::where('seller_id',Auth::guard('seller')->user()->id)->where('order_status',5)->count();
        $complete = Order::where('seller_id',Auth::guard('seller')->user()->id)->where('order_status',6)->count();
        $cancel = Order::where('seller_id',Auth::guard('seller')->user()->id)->where('order_status',7)->count();

        $total_product = Product::where('seller_id',Auth::guard('seller')->user()->id)->count();
        $total_customer = Customer::count();
        $latest_order = Order::where('seller_id',Auth::guard('seller')->user()->id)->latest()->limit(5)->with('customer','product','product.image')->get();
        $latest_customer = Customer::latest()->limit(5)->get();
        $today_delivery = Order::where('seller_id',Auth::guard('seller')->user()->id)->where(['order_status'=>'5'])->where('created_at', '>=', Carbon::today())->count();

        $total_delivery = Order::where('seller_id',Auth::guard('seller')->user()->id)->where(['order_status'=>'5'])->count();
        $last_week = Order::where('seller_id',Auth::guard('seller')->user()->id)->where(['order_status'=>'5'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $last_month = Order::where('seller_id',Auth::guard('seller')->user()->id)->where(['order_status'=>'5'])->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $monthly_sale = Order::where('seller_id',Auth::guard('seller')->user()->id)->select(DB::raw('DATE(created_at) as date','created_at'))->selectRaw("SUM(amount) as amount")->where(['order_status'=>'5'])->groupBy('date')->limit(30)->get();


        $delivery_amount = Order::where(['order_status' => '6', 'seller_id' => $customer->id])->sum('amount');
        $total_earning = Order::where(['order_status' => '6', 'seller_id' => $customer->id])
                      ->sum('seller_commission');

        $dates = [];
        $startDate = Carbon::now()->subDays(29);
        for ($i = 0; $i < 30; $i++) {
            $dates[] = $startDate->copy()->addDays($i)->format('Y-m-d');
        }
        $payments = Order::where('seller_id',Auth::guard('seller')->user()->id)->selectRaw('DATE(created_at) as date, SUM(amount) as total_amount')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->pluck('total_amount', 'date');
        $totals = [];
        foreach ($dates as $date) {
            $totals[] = isset($payments[$date]) ? $payments[$date] : 0;
        }
        $dates_json = json_encode($dates);
        $totals_json = json_encode($totals);
        

        return view('frontEnd.seller.pages.account',compact('dates_json','totals_json','pending','courier','cancel','complete','total_order','today_order','total_product','total_customer','latest_order','latest_customer','today_delivery','total_delivery','last_week','last_month','monthly_sale','customer','delivery_amount','total_earning'));
    }
    public function logout(Request $request){
        Auth::guard('seller')->logout();
        Toastr::success('You are logout successfully', 'success!');
        return redirect()->route('seller.login');
    }
   public function orders(Request $request)
    {
        $order_status = OrderStatus::where('slug', $request->slug)->withCount('orders')->first();
        if ($request->slug == 'all') {
            $orders = Order::where('seller_id', Auth::guard('seller')->user()->id)->with('details')->orderBy('created_at', 'DESC')->get();
        }else{
        $orders = Order::where('order_status', $order_status->id)->where('seller_id', Auth::guard('seller')->user()->id)->orderBy('created_at', 'DESC')->with('details')->get();
        }
        
        // return $orders;
        return view('frontEnd.seller.pages.orders', compact('orders'));
    }

    public function withdraws()
    {
        $withdraws = SellerWithdrawVentor::where('seller_id',Auth::guard('seller')->user()->id)->with('withdraw_details')->get();
        // return $withdraws;
        return view('frontEnd.seller.pages.withdraws',compact('withdraws'));
    }
    public function invoice(Request $request)
    {
        $order = Order::where(['invoice_id'=>$request->invoice_id,'customer_id'=>Auth::guard('seller')->user()->id])->with('orderdetails','payment','shipping','customer')->firstOrFail();
        return view('frontEnd.seller.invoice',compact('order'));
    }
    public function profile(Request $request)
    {
        $seller = Seller::where(['id'=>Auth::guard('seller')->user()->id])->with('seller_area')->firstOrFail();
        return view('frontEnd.seller.pages.profile',compact('seller'));
    }
    public function profile_edit(Request $request)
    {
        $profile_edit = Seller::where(['id'=>Auth::guard('seller')->user()->id])->firstOrFail();
        $districts = District::distinct()->select('district')->get();
        $areas = District::where(['district'=>$profile_edit->district])->select('area_name','id')->get();
        return view('frontEnd.seller.pages.profile_edit',compact('profile_edit','districts','areas'));
    }
    public function profile_update(Request $request)
    {
        $update_data = Seller::where(['id'=>Auth::guard('seller')->user()->id])->firstOrFail();

        $image = $request->file('image');
        if($image){
            // image with intervention 
            $name =  time().'-'.$image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
            $name = strtolower(Str::slug($name));
            $uploadpath = 'public/uploads/seller/';
            $imageUrl = $uploadpath.$name; 
            $img=Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 120;
            $height = 120;
            $img->resize($width, $height);
            $img->save($imageUrl);
            $imageUrl = $imageUrl;
        }else{
            $imageUrl = $update_data->image;
        }

        $image1 = $request->file('image_front');
        if($image1){
            // image with intervention 
            $name1 =  time().'-'.$image1->getClientOriginalName();
            $name1 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name1);
            $name1 = strtolower(Str::slug($name1));
            $uploadpath1 = 'public/uploads/seller/';
            $imageUrl1 = $uploadpath1.$name1; 
            $img1=Image::make($image1->getRealPath());
            $img1->encode('webp', 90);
            $width1 = 120;
            $height1 = 120;
            $img1->resize($width1, $height1);
            $img1->save($imageUrl1);
            $imageUrl1 = $imageUrl1;
        }else{
            $imageUrl1 = $update_data->image_front;
        }

        $image2 = $request->file('image_back');
        if($image2){
            // image with intervention 
            $name2 =  time().'-'.$image2->getClientOriginalName();
            $name2 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name2);
            $name2 = strtolower(Str::slug($name2));
            $uploadpath2 = 'public/uploads/seller/';
            $imageUrl2 = $uploadpath2.$name2; 
            $img2=Image::make($image2->getRealPath());
            $img2->encode('webp', 90);
            $width2 = 120;
            $height2 = 120;
            $img2->resize($width2, $height2);
            $img2->save($imageUrl2);
            $imageUrl2 = $imageUrl2;
        }else{
            $imageUrl2 = $update_data->image_back;
        }

        $update_data->name        =   $request->name;
        $update_data->phone       =   $request->phone;
        $update_data->email       =   $request->email;
        $update_data->address     =   $request->address;
        $update_data->district    =   $request->district;
        $update_data->area        =   $request->area;
        $update_data->image       =   $imageUrl;
        $update_data->save();

        Toastr::success('Your profile update successfully', 'Success!');
       return redirect()->route('seller.profile');
    }
    public function change_pass(){
        return view('frontEnd.seller.pages.change_password');
    }
    public function password_update(Request $request)
    {
        $this->validate($request, [
            'old_password'=>'required',
            'new_password'=>'required',
            'confirm_password' => 'required_with:new_password|same:new_password|'
        ]);

        $customer = Seller::find(Auth::guard('seller')->user()->id);
        $hashPass = $customer->password;

        if (Hash::check($request->old_password, $hashPass)) {

            $customer->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            Toastr::success('Success', 'Password changed successfully!');
            return redirect()->route('seller.account');
        }else{
            Toastr::error('Failed', 'Old password not match!');
            return redirect()->back();
        }
    }

    public function sellerwithdraw_request(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'receive' => 'required',
            'method' => 'required',
            'note' => 'required',
        ]);
        $pending_amount = SellerWithdrawVentor::where(['status' => 'pending', 'seller_id' => Auth::guard('seller')->user()->id])->sum('amount');
        // return $pending_amount;
        $balance_check = (Auth::guard('seller')->user()->balance - ($request->amount + $pending_amount));
        //return $balance_check;
        if (!Hash::check($request->password, Auth::guard('seller')->user()->password)) {
            Toastr::error('Your password is wrong', 'Failed');
            return redirect()->back();
        }
        if (Auth::guard('seller')->user()->balance < ($request->amount + $pending_amount)) {
            Toastr::error('Withdraw balance unsificient', 'Low Balance');
            return redirect()->back();
        }

        // Check if the user's balance is less than 200
        if ($balance_check < 300) {
            Toastr::error('Your balance must be at least 300 to make a withdrawal request.', 'Low Balance');
            return redirect()->back();
        }

        $withdraw = new SellerWithdrawVentor();
        $withdraw->seller_id = Auth::guard('seller')->user()->id;
        $withdraw->amount  = $request->amount;
        $withdraw->receive = $request->receive;
        $withdraw->method  = $request->method;
        $withdraw->note    = $request->note;
        $withdraw->request_date = Carbon::now();
        $withdraw->status = 'pending';
        //return $withdraw;
        $withdraw->save();

        Toastr::success('Withdraw request send successfully', 'success');
        return redirect()->back();
    }
}
