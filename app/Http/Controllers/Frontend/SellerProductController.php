<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\ProductVariable;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\PurchaseDetails;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Review;
use App\Models\Quition;
use Toastr;
use Auth;
use File;
use Str;
use Image;
use DB;
class SellerProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::where('seller_id',Auth::guard('seller')->user()->id)->orderBy('id','DESC')->with('image','category')->get();
        return view('frontEnd.seller.pages.product_manage',compact('data'));
    }
    
    public function create()
    {
        $categories = Category::where('status',1)->select('id','name','status')->get();
        $brands = Brand::where('status','1')->select('id','name','status')->get();

        $colors = Color::where('status','1')->get();
        $sizes = Size::where('status','1')->get();

        return view('frontEnd.seller.pages.product_add',compact('categories','brands','colors','sizes'));
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'new_price' => 'required',
            'purchase_price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        $last_id = Product::orderBy('id', 'desc')->select('id')->first();
        $last_id = $last_id?$last_id->id+1:1;
        $input = $request->except(['image','files','proSize','proColor']);

        $input['slug'] = strtolower(preg_replace('/[\/\s]+/', '-', $request->name.'-'.$last_id));
        $input['pro_video'] = $request->pro_video??'';
        $input['status'] = 0;
        $input['topsale'] = $request->topsale?1:0;
        $input['approval'] = 0;
        $input['feature_product'] = $request->feature_product?1:0;
        $input['seller_id'] = Auth::guard('seller')->user()->id;
        $input['product_code'] = 'P' . str_pad($last_id, 4, '0', STR_PAD_LEFT);

        if ($request->pdf) {
            $image = $request->pdf;
            $name =  time().'-'.$image->getClientOriginalName();
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadPath = 'public/uploads/product/';
            $image->move($uploadPath,$name);
            $imageUrl =$uploadPath.$name;
            $input['pdf'] =  $imageUrl;
        }

        $save_data = Product::create($input);
        $save_data->sizes()->attach($request->proSize);
        $save_data->colors()->attach($request->proColor);
        
        // image with intervention 
        $images = $request->file('image');
        if($images){
            foreach ($images as $key => $image) {
                $name =  time().'-'.$image->getClientOriginalName();
                $name = strtolower(preg_replace('/\s+/', '-', $name));
                $uploadPath = 'public/uploads/product/';
                $image->move($uploadPath,$name);
                $imageUrl =$uploadPath.$name;

                $pimage             = new Productimage();
                $pimage->product_id = $save_data->id;
                $pimage->image      = $imageUrl;
                $pimage->save();
            }
            
        }

        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('seller.products.index');
    }
     public function edit($id)
    {
        $edit_data = Product::with('images')->find($id);
        $categories = Category::where('parent_id','=','0')->where('status',1)->select('id','name','status')->get();
        $categoryId = Product::find($id)->category_id;
        $subcategoryId = Product::find($id)->subcategory_id;
        $subcategory = Subcategory::where('category_id', '=', $categoryId)->select('id','subcategoryName','status')->get();
        $childcategory = Childcategory::where('subcategory_id', '=', $subcategoryId)->select('id', 'childcategoryName', 'status')->get();
        $brands = Brand::where('status','1')->select('id','name','status')->get();
        $totalsizes = Size::where('status',1)->get();
        $totalcolors = Color::where('status',1)->get();
        $selectcolors = Productcolor::where('product_id',$id)->get();
        $selectsizes = Productsize::where('product_id',$id)->get();

        return view('frontEnd.seller.pages.product_edit',compact('edit_data','categories', 'subcategory', 'childcategory', 'brands', 'selectcolors', 'selectsizes','totalsizes', 'totalcolors'));
    }
    
   
 public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'new_price' => 'required',
            'purchase_price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
          
        $update_data = Product::find($request->id);
        $input = $request->except(['image','files','proSize','proColor']);
        $last_id = Product::orderBy('id', 'desc')->select('id')->first();
        $input['slug'] = strtolower(preg_replace('/[\/\s]+/', '-', $request->name.'-'.$last_id->id));
        $input['status'] = 0;
        $input['topsale'] = $request->topsale?1:0;
        $input['feature_product'] = $request->feature_product?1:0;
        $input['pro_video'] = $request->pro_video;
        $input['seller_id'] = Auth::guard('seller')->user()->id;

        if ($request->pdf) {
            $image = $request->pdf;
            $name =  time().'-'.$image->getClientOriginalName();
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadPath = 'public/uploads/product/';
            $image->move($uploadPath,$name);
            $imageUrl =$uploadPath.$name;
            $input['pdf'] =  $imageUrl;
        }

        $update_data->update($input);
        $update_data->sizes()->sync($request->proSize);
        $update_data->colors()->sync($request->proColor);

        // image with intervention 
        $images = $request->file('image');
        if($images){
            foreach ($images as $key => $image) {
                $name =  time().'-'.$image->getClientOriginalName();
                $name = strtolower(preg_replace('/\s+/', '-', $name));
                $uploadPath = 'public/uploads/product/';
                $image->move($uploadPath,$name);
                $imageUrl =$uploadPath.$name;

                $pimage             = new Productimage();
                $pimage->product_id = $update_data->id;
                $pimage->image      = $imageUrl;
                $pimage->save();
            }
        }

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('seller.products.index');
    }
    
    public function inactive(Request $request)
    {
        $inactive = Product::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Product::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
   public function destroy(Request $request)
    {
        $delete_data = Product::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
    public function imgdestroy(Request $request, $id)
    { 
        $delete_data = Productimage::find($id);
        $delete_data = File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    } 
     public function pricedestroy(Request $request)
    {
        $delete_data = ProductVariable::find($request->id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success', 'Product price delete successfully');
        return redirect()->back();
    }


    //review section data manage

    public function sellerindex(Request $request)
    {
        $show_data = Review::where('seller_id',Auth::guard('seller')->user()->id)->orderBy('id','DESC')->get();
        // return $show_data;
        return view('frontEnd.seller.review.index',compact('show_data'));
    }
    public function sellercreate()
    {
        $products = Product::where(['status'=>1])->select('id','name')->get();
        return view('frontEnd.seller.review.create',compact('products'));
    }
    public function sellerstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'ratting' => 'required',
            'review' => 'required',
            'product_id' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $input['status'] = $request->status==1?'active':'pending';
        $input['seller_id'] = Auth::guard('seller')->user()->id;
        Review::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('seller.reviews.index');
    }
    
    public function selleredit($id)
    {
        $edit_data = Review::find($id);
        $products = Product::where(['status'=>1])->select('id','name')->get();
        return view('frontEnd.seller.review.edit',compact('edit_data','products'));
    }
    
    public function sellerupdate(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'ratting' => 'required',
            'review' => 'required',
            'product_id' => 'required',
        ]);
        $input = $request->except('hidden_id');
        $input['status'] = $request->status==1?'active':'pending';
        $input['seller_id'] = Auth::guard('seller')->user()->id;
        $update_data = Review::find($request->hidden_id);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('seller.reviews.index');
    }
 
    public function sellerpending(){
        $data = Review::where('status','pending')->get();
        return view('frontEnd.seller.review.pending',compact('data'));
    }
    public function sellerinactive(Request $request){
        $inactive = Review::find($request->hidden_id);
        $inactive->status = 'pending';
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function selleractive(Request $request){
        $active = Review::find($request->hidden_id);
        $active->status = 'active';
        $active->save();
        
        $product = Product::select('id','ratting')->find($active->product_id);
        $product->ratting += 1;
        $product->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function sellerdestroy(Request $request)
    {
        $delete_data = Review::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }


    //question section data manage
    public function sellerQuestionindex(Request $request)
    {
        $show_data = Quition::where('seller_id',Auth::guard('seller')->user()->id)->orderBy('id','DESC')->get();
        return view('frontEnd.seller.question.index',compact('show_data'));
    }
    
    public function sellerQuestionstore(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = $request->status==1?'active':'pending';
        Quition::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('seller.question.index');
    }
    
    public function sellerQuestionedit($id)
    {
        $edit_data = Quition::find($id);
        $products = Product::where(['status'=>1])->select('id','name')->get();
        return view('frontEnd.seller.question.edit',compact('edit_data','products'));
    }
    
    public function sellerQuestionupdate(Request $request)
    {
        
        $this->validate($request, [
            'answer' => 'required',
            
        ]);
        $input = $request->except('hidden_id');
        $input['status'] = $request->status==1?'active':'pending';
        $update_data = Quition::find($request->hidden_id);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('seller.question.index');
    }
 
    public function sellerQuestioninactive(Request $request){
        $inactive = Quition::find($request->hidden_id);
        $inactive->status = 'pending';
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function sellerQuestionactive(Request $request){
        $active = Quition::find($request->hidden_id);
        $active->status = 'active';
        $active->save();
        
        $product = Product::select('id','name')->find($active->product_id);
        $product->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function sellerQuestiondestroy(Request $request)
    {
        $delete_data = Quition::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }

}
