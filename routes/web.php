<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/signup/{product}','App\Http\Controllers\UserController@UserRegister');
Route::post('/signup/{product}','App\Http\Controllers\UserController@createUser')->name('signup');
Route::get('/download/{file}','App\Http\Controllers\UserController@fileDownload')->name('download');
Route::get('/','App\Http\Controllers\ProductController@listProduct');
//Route::get('/{slug}','App\Http\Controllers\ProductController@ProductDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
