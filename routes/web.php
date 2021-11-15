<?php

use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Category Controller
Route::get('/category/all',[CategoryController::class, 'index'])->name('category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$data=User::all();

    $data=DB::table('users')->get();
    return view('dashboard',compact('data'));
})->name('dashboard');
