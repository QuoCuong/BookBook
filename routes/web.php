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

Route::get('/', 'HomeController@index')->name('home');
Route::get('404', function () {
	return view('errors.404');
})->name('404');

Auth::routes();

Route::group([
    'middleware' => ['auth', 'is.admin'],
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'as'         => 'admin.',
], function () {
	Route::get('dashboard', 'HomeController@index')->name('dashboard');

	//Manager Product 
	Route::get('products', 'ProductController@index')->name('products.index');
	Route::get('products/create','ProductController@create')->name('product.create');
	Route::post('products','ProductController@store')->name('product.store');
	Route::delete('products/{id}','ProductController@destroy')->name('product.destroy');	
	Route::get('products/edit/{id}','ProductController@edit')->name('product.edit');
	Route::post('products/update/{id}','ProductController@update')->name('product.update');

	//Manger Image 
	Route::get('images','ImageController@index')->name('image.index');
	Route::get('images/create','ImageController@create')->name('image.create');
	Route::post('images/create/image','ImageController@store')->name('image.store');
	Route::get('images/delete/{product}','ImageController@destroy')->name('image.destroy');
	Route::get('image/edit/{id}', 'ImageController@edit')->name('image.edit');
	Route::post('image/update/{id}','ImageController@update')->name('image.update');

	//Manage ProductDetail
	Route::get('productdetails','ProductDetailController@index')->name('productdetail.index');
	Route::get('productdetails/edit/{id}', 'ProductDetailController@edit')->name('productdetail.edit');
	Route::post('productdetails/update/{id}','ProductDetailController@update')->name('productdetail.update');
	Route::delete('productdetails/{id}','ProductDetailController@destroy')->name('productdetail.destroy');

	//Category
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.delete');

	//Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    Route::get('orders/{order}/edit', 'OrderController@edit')->name('orders.edit');
    Route::put('orders/{order}', 'OrderController@update')->name('orders.update');
    Route::delete('orders/{order}', 'OrderController@destroy')->name('orders.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
