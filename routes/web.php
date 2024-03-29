<?php

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
    //return view('frontend.test');//也可以用'/'代替'.'
    return view('frontend.index');
})->name('home');
Route::get('about', function () {
    return view('frontend.about');
})->name('about');
Route::get('products', function () {
    return view('frontend.products');
})->name('products');
Route::get('store', function () {
    return view('frontend.store');
})->name('store');

//若沒有?又沒有給參數則會跑出404頁面(laravel自定義的)
Route::get('users/{name?}', function ($name = 'Chase')
{
    return 'Hello, I am ' .$name;
});
//middleware方法一
//Route::get('elder', 'TestController@test')->middleware('check.age');
//middleware方法二
Route::group(['middleware' => ['check.age']], function () {
    Route::get('elder', 'TestController@test');
});