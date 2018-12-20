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
