<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');

Route::post('/admin/User_adit', [App\Http\Controllers\HomeController::class, 'User_adit'])->name('admin.User_adit')->middleware('admin');

Route::get('admin/List', [App\Http\Controllers\HomeController::class, 'Allusers_list'])->name('admin.List')->middleware('admin');

Route::get('admin/User_create', [App\Http\Controllers\HomeController::class, 'User_create'])->name('admin.User_create')->middleware('admin');

Route::post('admin/inset_list', [App\Http\Controllers\HomeController::class, 'inset_list'])->name('admin.inset_list')->middleware('admin');


Route::get('edit-student/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->middleware('admin');

Route::post('admin/update_list', [App\Http\Controllers\HomeController::class, 'update_list'])->name('admin.update_list')->middleware('admin');

Route::post('admin/delete_list', [App\Http\Controllers\HomeController::class, 'delete_list'])->name('admin.delete_list')->middleware('admin');




