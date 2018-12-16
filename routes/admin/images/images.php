<?php 
//Imagenes
Route::get('products/image/{id}', 'ImageController@index')->name('admin.products.images');
Route::post('products/image/{id}', 'ImageController@store')->name('admin.products.images.store');
Route::delete('products/image/{id}', 'ImageController@destroy')->name('admin.products.images.delete');
Route::get('products/image/select/{id}/{image}', 'ImageController@select')->name('admin.products.images.select');
