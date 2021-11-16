<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Index
    public function index()
    {
        return view('admin.category.index');
    }

    //Add category
    public function storeCategory(Request $request)
    {
        //dd("tes");die();
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|min:1|max:255|',
            ],
            [
                'category_name.required'  => 'Tolong ini mah isi dulu ehh!!!',
            ],
            
        );
    }
}
