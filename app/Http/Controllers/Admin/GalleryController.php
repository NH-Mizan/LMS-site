<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
use File;

class GalleryController extends Controller
{
  public function index(Request $request)
    {
        $data = Gallery::orderBy('id','DESC')->get();
        // return $data;
        return view('backEnd.gallery.index',compact('data'));
    }
    public function create()
    {
        return view('backEnd.gallery.create',);
    }
    public function store(Request $request)
    {

  
        // image with intervention 
        $image = $request->file('image');
        if($image){
        $name =  time().'-'.$image->getClientOriginalName();
        $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
        $name = strtolower(preg_replace('/\s+/', '-', $name));
        $uploadpath = 'public/uploads/category/';
        $imageUrl = $uploadpath.$name; 
        $img=Image::make($image->getRealPath());
        $img->encode('webp', 90);
        $width = "";
        $height = "";
        $img->height() > $img->width() ? $width=null : $height=null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imageUrl);
        }else{
            $imageUrl = null;
        }

        $input = $request->all();
  
        $input['image'] = $imageUrl;
        Gallery::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('gallery.index');
    }
    
    public function edit($id)
    {
        $edit_data = Gallery::find($id);
        
        return view('backEnd.gallery.edit',compact('edit_data',));
    }
    
    public function update(Request $request)
    {
      
        $update_data = Gallery::find($request->id);
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            // image with intervention 
            $name =  time().'-'.$image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath.$name; 
            $img=Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = "";
            $height = "";
            $img->height() > $img->width() ? $width=null : $height=null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        }else{
            $input['image'] = $update_data->image;
        }

  
        $input['status'] = $request->status?1:0;
        
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('gallery.index');
    }
 
    public function inactive(Request $request)
    {
        $inactive = Gallery::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Gallery::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Gallery::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
