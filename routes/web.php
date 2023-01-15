<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\EmailController;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

//Category Controller
// Route::get('/category/all',[CategoryController::class, 'index'])->name('category');
//Insert category
Route::post('/category/add',[CategoryController::class, 'storeCategory'])->name('storeCategory');

//Update category
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
//Update proses category
Route::post('/category/update_process/{id}',[CategoryController::class, 'Update_process']);

//Soft delete category
Route::get('/softdelete/category/{id}',[CategoryController::class, 'softDelete']);

//Restore from Soft delete category
Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']);

// delete category
Route::get('category/delete/{id}',[CategoryController::class, 'Delete']);


//Brand Controller
Route::get('/brand/all',[BrandController::class, 'index'])->name('brand')->middleware('auth');

//Insert brand
Route::post('/brand/add',[BrandController::class, 'storeBrand'])->name('store');

//Update brand
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit']);

//Update proses brand image
Route::post('/brand/update_process/{id}',[BrandController::class, 'Update_process']);

//Delete proses brand image
Route::get('/brand/delete_process/{id}',[BrandController::class, 'Delete_process']);

//multi image
Route::get('/multipic/all',[BrandController::class, 'Multipic'])->name('multipic');


//Datatable Controller
Route::get('/datatable',[DatatableController::class, 'index']);
Route::any('/datatable/data',[DatatableController::class, 'Data']);
// Route::post('/category/add',[DatatableController::class, 'storedataTable'])->name('storedataTable');

//Email
Route::get('/email',[EmailController::class, 'kirim']);
Route::get('/attach',[EmailController::class, 'attach']);

//Route Notifikasi
Route::get('/pesan',[EmailController::class, 'notif']);


//Auth::routes(['verify' => true]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$data=User::all();

    $data=DB::table('users')->get();
    return view('dashboard',compact('data'));
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    //
    Route::get('/category/all',[CategoryController::class, 'index'])->name('category');

});
