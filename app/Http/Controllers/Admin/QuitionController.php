<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quition;
use Toastr;

class QuitionController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Quition::orderBy('id','DESC')->get();
        return view('backEnd.question.index',compact('show_data'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = $request->status==1?'active':'pending';
        Quition::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('question.index');
    }
    
    public function edit($id)
    {
        $edit_data = Quition::find($id);
        $products = Product::where(['status'=>1])->select('id','name')->get();
        return view('backEnd.question.edit',compact('edit_data','products'));
    }
    
    public function update(Request $request)
    {
        
        $this->validate($request, [
            'answer' => 'required',
            
        ]);
        $input = $request->except('hidden_id');
        $input['status'] = $request->status==1?'active':'pending';
        $update_data = Quition::find($request->hidden_id);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('question.index');
    }
 
    public function inactive(Request $request){
        $inactive = Quition::find($request->hidden_id);
        $inactive->status = 'pending';
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request){
        $active = Quition::find($request->hidden_id);
        $active->status = 'active';
        $active->save();
        
        $product = Product::select('id','name')->find($active->product_id);
        $product->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Quition::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
