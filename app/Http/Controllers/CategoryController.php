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
        //Read data dengan orm
        //Parsing data tdk pake compact
        // $data['data'] = Category::all();
        //query orm untuk join
        //tanpa soft delete
        //$data['data'] = Category::latest()->paginate(5);//coba untuk tabel join dan di modelnya edit jg
        //Tanpa sof delete
        // return view('admin.category.index', $data);

        //orm pakai soft delete
        $data = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view(
            'admin.category.index',
            [
                'data' =>  $data,
                'trashCat' => $trashCat
            ]
        );


        //Parsing data pake compact
        //pake latest sama aja kaya order by
        // $data = Category::latest()->get();
        // return view('admin.category.index', compact('data'));

        //=========================================//
        //Read data pake query builder
        //cara 1
        //$data['data'] = DB::select('select * from categories ORDER BY CATEGORY_NAME DESC');
        //cara 2
        //    $data['data'] = DB::table('categories')->latest()->paginate(5);

        //query builder untuk join
        /*
        $data = DB::table('categories')
        ->join('users','categories.user_id','users.id')
        ->select('categories.*','users.name')
        ->latest()->paginate(5);
        return view('admin.category.index',
        [
            'data' =>  $data,
            'total' => $data->total(),
            'perPage' => $data->perPage(),
            'currentPage' => $data->currentPage()
        ]
        );
        */
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

    //edit form with orm
    // public function Edit($id){
    //     $data['data'] = Category::find($id);
    //     return view('admin.category.edit', $data);
    // }

    //edit form with query builder
    public function Edit($id)
    {
        $data['data'] = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', $data);
    }


    //edit process form with orm
    // public function Update_process(Request $request, $id){

    //     //orm update
    //     $data= Category::find($id)->update([
    //         'category_name' => $request->category_name,
    //         'user_id'=>Auth::user()->id,
    //     ]);

    //     return Redirect()->route('category')->with('success', 'category Updated successfull');
    // }

    //edit process form with query builder
    public function Update_process(Request $request, $id)
    {

        //query builder update
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id', $id)->update($data);


        return Redirect()->route('category')->with('success', 'category Updated successfull');
    }

    //Function Soft delete
    public function SoftDelete($id){
        //orm
        $data =Category::find($id)->delete();
        return Redirect()->back()->with('success', 'category Soft delete successfull');
    }

     //Function REstore from Soft delete
     public function Restore($id){
        //orm
        $data =Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'category Restore successfull');
    }

     //Function delete
     public function Delete($id){
        //orm
        $data =Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'category Delete successfull');
    }
}
