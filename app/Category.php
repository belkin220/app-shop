<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Category extends Model
{
	//validación
		public static $rules=[
		'name'       => 'required|string|min:3',
		'description'=> 'string|max:200',
	];
		public static $message=[
		'name.required' => 'Debes ingresar un nombre para la categoria',
		'description.max' =>'El campo descripción excede de 200 caracteres.',
	];

	protected $fillable = ['name', 'description'];

   // Relación $category->products
   
    public function products()
    {
    	return $this->hasMany(Product::class);
	}

	 public function getFeaturedImageUrlAttribute()
    { 
        //Si la categoria tiene una imagen la mostramos
        if ($this->image)
            return '/images/categories/' . $this->image;
        //Si no la tiene, mostramos la imagen del primer producto de la categoria.
    	$firstProduct = $this->products()->first();
    	if ($firstProduct)
    	return $firstProduct->featured_image_url;
        // Si tanpoco hay imagen asociada al producto, tomaremos una imagen por defecto (default.jpg)
        return '/images/default.png';
    	}
    }
     
        
        