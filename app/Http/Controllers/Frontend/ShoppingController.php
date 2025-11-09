<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productprice;
use App\Models\Product;
use Toastr;
use Cart;
use DB;

class ShoppingController extends Controller
{

    public function addTocartGet($id, Request $request)
    {
        $qty = 1;
        $productInfo = DB::table('products')->where('id', $id)->first();
        $productImage = DB::table('productimages')->where('product_id', $id)->first();
        $cartinfo = Cart::instance('shopping')->add([
            'id' => $productInfo->id,
            'name' => $productInfo->name,
            'qty' => $qty,
            'price' => $productInfo->new_price,
            'options' => [
                'image' => $productImage->image,
                'old_price' => $productInfo->old_price,
                'slug' => $productInfo->slug,
                'purchase_price' => $productInfo->purchase_price,
                'pdf' => $productInfo->pdf
            ]
        ]);

        // return redirect()->back();
        return response()->json($cartinfo);
    }

    public function cart_store(Request $request)
    {
        $rules = [
            'id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'pro_unit' => 'nullable|string',
        ];

        if ($request->variation == 1) {
            $rules['product_color'] = 'required|string';
        }

        if ($request->variation == 2) {
            $rules['product_size'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $product = Product::where(['id' => $request->id])->first();
        Cart::instance('shopping')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->new_price,
            'options' => [
                'slug' => $product->slug,
                'image' => $product->image->image,
                'old_price' => $product->new_price,
                'purchase_price' => $product->purchase_price,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'pro_unit' => $request->pro_unit,
                'pdf' => $product->pdf,
            ],
        ]);

        Toastr::success('Product successfully add to cart', 'Success!');
        return redirect()->route('customer.checkout');
    }
    public function cart_update(Request $request)
    {
        // Get the row ID of the cart item
        $rowId = $request->id;
        // Fetch the current cart item using the row ID
        $cartItem = Cart::instance('shopping')->get($rowId);
        if ($cartItem) {
            Cart::instance('shopping')->update($rowId, [
                'options' => [
                    'product_size' => $request->product_size ?: $cartItem->options->product_size,
                    'product_color' => $request->product_color ?: $cartItem->options->product_color, 
                    'slug' => $cartItem->options->slug,
                    'image' => $cartItem->options->image,
                    'old_price' => $cartItem->options->old_price, 
                    'purchase_price' => $cartItem->options->purchase_price, 
                    'pro_unit' => $cartItem->options->pro_unit,
                ],
            ]);
        }

        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_remove(Request $request)
    {
        $remove = Cart::instance('shopping')->update($request->id, 0);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_increment(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty + 1;
        $increment = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_decrement(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty - 1;
        $decrement = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_count(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.cart_count', compact('data'));
    }
    public function mobilecart_qty(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.mobilecart_qty', compact('data'));
    }
    public function changeProduct(Request $request)
    {

        $productId = $request->input('id');
        $product = Product::find($productId); 

        if ($product) {
            Cart::instance('shopping')->destroy(); 

            // Add the selected product to the cart
            Cart::instance('shopping')->add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1, // Adjust quantity as needed
                'price' => $product->new_price,
                'options' => [
                    'slug' => $product->slug,
                    'image' => $product->image->image,
                    'old_price' => $product->old_price,
                    'purchase_price' => $product->purchase_price,
                    'pdf' => $product->pdf,
                ],
            ]);
            $data = Cart::instance('shopping')->content();
            return view('frontEnd.layouts.ajax.cart', compact('data'));
        }

        return response()->json(['success' => false, 'message' => 'Product not found.']);
    }
}
