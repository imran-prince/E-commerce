<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','admin'])->group(function(){

    Route::get('/admin',function(){
        return  view('Admin.dashboard');
    })->name('admin.dashboard');

    Route::get('Category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('Category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('Category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('Category/destory/{id}',[CategoryController::class,'destory'])->name('category.destory');
    Route::get('Category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('Category/update/{id}',[CategoryController::class,'update'])->name('category.update');

});
