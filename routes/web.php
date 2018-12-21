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
    'as'         => '',
], function () {
	Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');

	//Manager Product 
	Route::get('products', 'ProductController@index')->name('admin.products.index');
	Route::get('products/create','ProductController@create')->name('admin.product.create');
	Route::post('products','ProductController@store')->name('admin.product.store');
	Route::delete('products/{id}','ProductController@destroy')->name('admin.product.destroy');	
	Route::get('products/edit/{id}','ProductController@edit')->name('admin.product.edit');
	Route::post('products/update/{id}','ProductController@update')->name('admin.product.update');

	//Manger Image 
	Route::get('images','ImageController@index')->name('admin.image.index');
	Route::get('images/create','ImageController@create')->name('admin.image.create');
	Route::post('images/create/image','ImageController@store')->name('admin.image.store');
	Route::get('images/delete/{product}','ImageController@destroy')->name('admin.image.destroy');
	Route::get('image/edit/{id}', 'ImageController@edit')->name('admin.image.edit');
	Route::post('image/update/{id}','ImageController@update')->name('admin.image.update');

	//Manage ProductDetail
	Route::get('productdetails','ProductDetailController@index')->name('admin.productdetail.index');
	Route::get('productdetails/edit/{id}', 'ProductDetailController@edit')->name('admin.productdetail.edit');
	Route::post('productdetails/update/{id}','ProductDetailController@update')->name('admin.productdetail.update');
	Route::delete('productdetails/{id}','ProductDetailController@destroy')->name('admin.productdetail.destroy');

	//Order
	Route::get('orders', 'OrderController@index')->name('admin.orders.index');
	Route::get('orders/{order}', 'OrderController@show')->name('admin.orders.show');
	Route::get('orders/{order}/edit', 'OrderController@edit')->name('admin.orders.edit');
	Route::put('orders/{order}', 'OrderController@update')->name('admin.orders.update');
	Route::delete('orders/{order}', 'OrderController@destroy')->name('admin.orders.delete');

	//Order Details
	// Route::get('order_details', 'OrderController@index')->name('admin.orders.index');
	Route::get('order_details/{orderDetail}/edit', 'OrderDetailController@edit')->name('admin.order_details.edit');
	// Route::put('orders/{order}', 'OrderController@update')->name('admin.orders.update');
	Route::delete('order_details/{orderDetail}', 'OrderDetailController@destroy')->name('admin.order_details.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
