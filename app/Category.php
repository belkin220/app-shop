<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Category extends Model
{
	//validación
		public static $rules=[
		'name'       => 'required|string|min:3|unique:categories,name',
		'description'=> 'string|max:200',
	];
		public static $message=[
		'name.required' => 'Debes ingresar un nombre para la categoria',
		'name.unique' => 'el nombre de la categoria ya existe.',
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
    	// buscar la imagen destacada si la hay
    	$featuredProduct = $this->products()->first();
    	// Si no hay imagen destacada $featuredImage tomará el valor de la primera imagen asociada al producto
    	
    	// Si hemos encontrado al menos una imagen asociada al producto evolvemos el campo url (accesor definido en el modelo ProductImage.php)
    	
    		return $featuredProduct->featured_image_url;
    	
    	// Imagen por defecto en caso que los if anteriores fallen
    	

	}
}
