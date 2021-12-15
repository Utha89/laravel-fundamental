<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BrandController extends Controller
{
    //Index
    public function Index()
    {
        $data['data'] = Brand::latest()->paginate(5);
        return view('admin.brand.index', $data);
    }

    public function storeBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],

            [
                'brand_name.required'  => 'Tolong ini mah isi dulu ehh!!!',
                'brand_name.min'  => 'Less than 4 char',
            ],
        );
        //Orm insert image
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);


        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Brand inserted successfull');
    }

    //Update brand
    public function Edit($id)
    {
        $data['data'] = Brand::find($id);
        return view('admin.brand.edit', $data);
    }

    public function Update_process(Request $request,  $id)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],

            [
                'brand_name.required'  => 'Tolong ini mah isi dulu ehh!!!',
                'brand_name.min'  => 'Less than 4 char',
            ],
        );

        //Post Unlink image
        $old_image = $request->old_image;
        //Orm update image
        $brand_image = $request->file('brand_image');


        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);

            //fun unlink
            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'updated_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success', 'Brand Updated successfull');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'updated_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success', 'Brand Updated successfull');
        }
    }


    public function Delete_process($id){
        $image = Brand::find($id);
        $old_image= $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand Deleted successfull');
    }
}
