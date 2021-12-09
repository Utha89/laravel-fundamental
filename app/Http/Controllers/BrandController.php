<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //Index
    Public function Index(){
        $data['data']= Brand::latest()->paginate(5);
        return view('admin.brand.index', $data);
    }
}
