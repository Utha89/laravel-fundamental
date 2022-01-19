<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Datatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class DatatableController extends Controller
{

    public function index()
    {
        return view('admin.datatable.index');
    }

    //data table
    public function data(Request $request)
    {
        $orderBy = 'categories.id';
        switch ($request->input('order.0.column')) {
            case "1":
                $orderBy = 'categories.category_name';
                break;
            case "2":
                $orderBy = 'users.name';
                break;
        }
        $data = Category::select([
            'categories.*',
            'users.name as nama_user'
        ])
            //->where('status', $jenis)
            ->join('users', 'users.id', '=', 'categories.user_id');
        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(categories.category_name) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(users.name) like ? ', ['%' . strtolower($request->input('search.value')) . '%']);
            });
        }
        $recordsFiltered = $data->get()->count();
        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function storedataTable(Request $request){
        //dd($request->all());
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] =  Carbon::now();
        DB::table('categories')->insert($data);
        return response()->json(true);
    }
}
