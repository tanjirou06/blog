<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Routing\RouteRegistrar;

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



Route::get('/',[BlogController::class,'index']);
Route::get('blogs/create',[BlogController::class,'create']);

Route::get('blogs/{id}',[BlogController::class,'show']);
Route::put('blogs/{id}',[BlogController::class,'update']);
Route::get('blogs/{id}/edit',[BlogController::class,'edit']);
Route::delete('blogs/{id}/destroy',[BlogController::class,'destroy'])->name('blogs.destroy');
Route::post('blogs',[BlogController::class,'store']);