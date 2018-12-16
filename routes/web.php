<?php
Route::get('/','welcomeController@welcome')->name('welcome');
// Customers
	include('customers/customers.php');
// Cart
	include('cart/cart.php');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	include('admin/products/products.php');
	include('admin/images/images.php');

});

