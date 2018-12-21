<?php 
Route::get('categories/', 'CategoryController@index')->name('admin.category'); // listado de productos
Route::get('/categories/create/{redirect}', 'CategoryController@create')->name('admin.category.create'); // formulario 
Route::post('/categories/', 'CategoryController@store')->name('admin.category.store'); // registro
Route::get('/categories/edit/{category}/', 'CategoryController@edit')->name('admin.category.edit'); // editar 
Route::post('/categories/update/{category}/', 'CategoryController@update')->name('admin.category.update'); // actualizar
Route::post('/categories/delete/{category}/', 'CategoryController@destroy')->name('admin.category.delete'); // eliminar


