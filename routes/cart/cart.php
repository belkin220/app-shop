<?php 
Route::post('/cart', 'CartDetailController@store')->name('cart.store'); //
Route::delete('/cart/{id}', 'CartDetailController@destroy')->name('cart.delete'); 

Route::post('cart/order', 'CartController@update')->name('cart.update'); // Realiza el pedido del carrito