<?php 
Route::get('/products/', 'ProductController@index')->name('admin.products'); // listado de productos
Route::get('/products/create', 'ProductController@create')->name('admin.products.create'); // formulario 
Route::post('/products/', 'ProductController@store')->name('admin.products.store'); // registro
Route::get('/products/edit/{id}/', 'ProductController@edit')->name('admin.products.edit'); // editar 
Route::post('/products/update/{id}/', 'ProductController@update')->name('admin.products.update'); // actualizar
Route::post('/products/delete/{id}/', 'ProductController@destroy')->name('admin.products.delete'); // eliminar

