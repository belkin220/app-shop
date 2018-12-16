<?php 


Route::get('customers/products/{id}', 'ProductController@show')->name('customer.products.show'); // Muestra el producto que se va a añadir al carrito
