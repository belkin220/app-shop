<?php 
Route::get('/products/', 'ProductController@index')->name('admin.products'); // listado de productos
Route::get('/products/create', 'ProductController@create')->name('admin.products.create'); // formulario 
Route::post('/products/', 'ProductController@store')->name('admin.products.store'); // registro
Route::get('/products/edit/{product}/', 'ProductController@edit')->name('admin.products.edit'); // editar 
Route::post('/products/update/{product}/', 'ProductController@update')->name('admin.products.update'); // actualizar
Route::post('/products/delete/{product}/', 'ProductController@destroy')->name('admin.products.delete'); // eliminar
Route::get('/products/{product}/', 'ProductController@show')->name('admin.products.show'); // Ver un  producto

