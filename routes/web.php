<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('product-listing', 'ProductController@index')->name('customer.product.view');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'App\Http\Controllers'], function(){

    Route::group(['prefix' => '/admin'], function(){

        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

        Route::get('/brand', 'AdminBrandController@viewBrandIndex')->name('admin.brand.index');
        Route::post('/brand/add', 'AdminBrandController@storeBrand')->name('admin.brand.store');
        Route::get('/brand/edit/{}', 'AdminBrandController@editBrand')->name('admin.brand.edit');
        Route::post('/brand/update/{}', 'AdminBrandController@updateBrand')->name('admin.brand.update');
        Route::post('/brand/delete/{}', 'AdminBrandController@deleteBrand')->name('admin.brand.delete');

    
    });
    
});
