<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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

        //Insert data pake orm

        /*
        //Cara 1
        Category::insert([
            'category_name' => $request->category_name,
            //dpetin user id dr auth user
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        */
        //cara 2 kaya pake object gtu
        // $category = new Category();
        // $category->category_name= $request->category_name;
        // $category->user_id= Auth::user()->id;
        // $category->save();

        //Insert by Query builder
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] =  Carbon::now();
        DB::table('categories')->insert($data);
        return Redirect()->back()->with('success', 'category inserted successfull');
    }
}
