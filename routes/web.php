<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*=============================================
=      Routes guest - users not logged -      =
=============================================*/
Route::get('/','WelcomeController@show')->name('welcome'); // Página de inicio. Se muestran las categorias que tienen productos.
// Categories
Route::get('/categories/{category}/', 'CategoryController@show')->name('category.show'); // Muestra los productos de la categoria  
// Search
Route::get('/search', 'SearchController@show')->name('search');
Route::get('products/json', 'SearchController@data')->name('products.json');
// Products
Route::get('/products/{id}', 'ProductController@show')->name('products.show'); // Muestra el producto que se va a añadir al carrito
/*=====  End of Section comment block  ======*/

/*=============================================
=            Routes for logged users          =
=============================================*/
// Cart
Route::post('/cart', 'CartDetailController@store')->name('cart.store'); // Guarda los detalles del carrito en la BD
Route::delete('/cart/{id}', 'CartDetailController@destroy')->name('cart.delete'); // Elimina un detalle del carrito
Route::post('cart/order', 'CartController@update')->name('cart.update'); // Realiza el pedido del carrito
/*=====  End of Section comment block  ======*/

/*=============================================
=            Routes for admin          =
=============================================*/

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	include('admin/products/products.php');
	include('admin/images/images.php');
	include('admin/categories/categories.php');
	
/*=====  End of Section comment block  ======*/



});

