<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerStore;
use App\Models\SellerStoreImages;
use Toastr;
use Image;
use File;
use Str;
use Log;
use Auth;

class SellerStoreController extends Controller
{
    public function index(Request $request)
    {
        $data = SellerStore::where('seller_id', Auth::guard('seller')->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('backEnd.sellerStore.index', compact('data'));
    }
    public function creates()
    {
        return view('backEnd.sellerStore.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
        ]);
        // return $request->all();

        $input = $request->all();

        $image = $request->file('logo');
        if ($image) {
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
        } else {
            $imageUrl = null;
        }

        $image1 = $request->file('cover_photo');
        if ($image1) {
            $name1 = time() . '-' . $image1->getClientOriginalName();
            $name1 = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name1);
            $name1 = strtolower(preg_replace('/\s+/', '-', $name1));
            $uploadpath1 = 'public/uploads/category/';
            $imageUrl1 = $uploadpath1 . $name1;
            $img1 = Image::make($image1->getRealPath());
            $img1->encode('webp', 90);
            $width1 = '';
            $height1 = '';
            $img1->height() > $img1->width() ? ($width1 = null) : ($height1 = null);
            $img1->resize($width1, $height1, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img1->save($imageUrl1);
        } else {
            $imageUrl1 = null;
        }

        $input['slug'] = strtolower(Str::slug($request->title));
        $input['logo'] = $imageUrl;
        $input['cover_photo'] = $imageUrl1;
        $input['seller_id'] = Auth::guard('seller')->user()->id;
        $input = SellerStore::create($input);

        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('seller.store.index');
    }

    public function edit($id)
    {
        $edit_data = SellerStore::find($id);
        return view('backEnd.sellerStore.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $update_data = SellerStore::find($request->id);

        $input = $request->all();
        $image = $request->file('logo');
        if ($image) {
            // image with intervention
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['logo'] = $imageUrl;
            File::delete($update_data->logo);
        } else {
            $input['logo'] = $update_data->logo;
        }

        $image = $request->file('cover_photo');
        if ($image) {
            // image with intervention
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['cover_photo'] = $imageUrl;
            File::delete($update_data->cover_photo);
        } else {
            $input['cover_photo'] = $update_data->cover_photo;
        }

        $input['slug'] = strtolower(Str::slug($request->title));
        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('seller.store.index');
    }

    public function inactive(Request $request)
    {
        $inactive = SellerStore::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = SellerStore::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $delete_data = SellerStore::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }



    // BANNER MANAGE SELLER
    public function indexBanner(Request $request)
    {
        $data = SellerStoreImages::where('seller_id', Auth::guard('seller')->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('backEnd.sellerBanner.index', compact('data'));
    }
    public function createBanner()
    {
        return view('backEnd.sellerBanner.create');
    }
    public function storeBanner(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        // return $request->all();

        $input = $request->all();
        $image = $request->file('image');
        if ($image) {
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
        } else {
            $imageUrl = null;
        }

        $input['image'] = $imageUrl;
        $input['seller_id'] = Auth::guard('seller')->user()->id;
        $input = SellerStoreImages::create($input);

        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('seller.banner.index');
    }

    public function editBanner($id)
    {
        $edit_data = SellerStoreImages::find($id);
        return view('backEnd.sellerBanner.edit', compact('edit_data'));
    }

    public function updateBanner(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $update_data = SellerStoreImages::find($request->id);

        $input = $request->all();
        $image = $request->file('image');
        if ($image) {
            // image with intervention
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/category/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = '';
            $height = '';
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        } else {
            $input['image'] = $update_data->image;
        }

        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('seller.banner.index');
    }

    public function inactiveBanner(Request $request)
    {
        $inactive = SellerStoreImages::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function activeBanner(Request $request)
    {
        $active = SellerStoreImages::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }

    public function destroyBanner(Request $request)
    {
        $delete_data = SellerStoreImages::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }
}
