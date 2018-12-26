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
	Route::get('products/{id}/edit','ProductController@edit')->name('product.edit');
	Route::post('products/{id}/update','ProductController@update')->name('product.update');

    //Manger Image 
	Route::get('images','ImageController@index')->name('image.index');
	Route::get('images/create','ImageController@create')->name('image.create');
	Route::post('images','ImageController@store')->name('image.store');
	Route::delete('images/{product}/delete','ImageController@destroy')->name('image.destroy');
	Route::get('images/{id}/edit', 'ImageController@edit')->name('image.edit');
	Route::post('images/{id}/update','ImageController@update')->name('image.update');


   //Manage ProductDetail
	Route::get('productdetails','ProductDetailController@index')->name('productdetail.index');
	Route::get('productdetails/{id}/edit', 'ProductDetailController@edit')->name('productdetail.edit');
	Route::post('productdetails/{id}/update','ProductDetailController@update')->name('productdetail.update');
	Route::delete('productdetails/{id}','ProductDetailController@destroy')->name('productdetail.destroy');

    //Category
    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('categories', 'CategoryController@store')->name('categories.store');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.delete');

    //Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/pending', 'OrderController@listPending')->name('orders.pending');
    Route::get('orders/approved', 'OrderController@listApproved')->name('orders.approved');
    Route::get('orders/complete', 'OrderController@listComplete')->name('orders.complete');
    Route::get('orders/cancelled', 'OrderController@listCancelled')->name('orders.cancelled');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    Route::post('orders/{order}/{status}', 'OrderController@updateStatus')->name('orders.update.status');
    Route::delete('orders/{order}', 'OrderController@destroy')->name('orders.delete');

    //Comment
    Route::get('comments', 'CommentController@index')->name('comments.index');
    Route::get('comments/order_by/newest', 'CommentController@index')->name('comments.order_by.newest');
    Route::get('comments/filter/rating/five_stars', 'CommentController@filterRating5')->name('comments.filter.rating.5');
    Route::get('comments/filter/rating/four_stars', 'CommentController@filterRating4')->name('comments.filter.rating.4');
    Route::get('comments/filter/rating/three_stars', 'CommentController@filterRating3')->name('comments.filter.rating.3');
    Route::get('comments/filter/rating/two_stars', 'CommentController@filterRating2')->name('comments.filter.rating.2');
    Route::get('comments/filter/rating/one_stars', 'CommentController@filterRating1')->name('comments.filter.rating.1');
    Route::get('comments/{comment}', 'CommentController@show')->name('comments.show');
    Route::put('comments/{comment}', 'CommentController@update')->name('comments.update');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.delete');

     //User
    Route::get('users/admin','UserController@index')->name('user.index');
    Route::get('users/user','UserController@indexUser')->name('user.indexuser');
    Route::get('user/create','UserController@create')->name('user.create');
    Route::post('users','UserController@store')->name('user.store');
    Route::get('users/{id}/edit','UserController@edit')->name('user.edit');
    Route::post('users/{id}','UserController@update')->name('user.update');
    Route::delete('users/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('users/{user}/list_oder', 'UserController@listOrderById')->name('user.list_order');

    //Search
    Route::get('search/orders', 'SearchController@searchOrder')->name('search.orders');
    
});

Auth::routes();
