<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BrandController extends Controller
{
    //Index
    Public function Index(){
        $data['data']= Brand::latest()->paginate(5);
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
         $name_gen= hexdec(uniqid());
         $img_ext = strtolower($brand_image->getClientOriginalExtension());
         $img_name = $name_gen.'.'.$img_ext;
         $up_location='image/brand/';
         $last_img = $up_location.$img_name;
         $brand_image->move($up_location,$img_name);


         Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
         ]);
         return Redirect()->back()->with('success', 'Brand inserted successfull');
    }
}
