<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price', 'category_id', 'long_description'];

    public static  $rules=[
            'name'       => 'required|string',
            'description'=> 'required|string|max:200',
            'price'      => 'required|numeric|min:0',
            ];

    public static $message=[
                'name.required' => 'El campo nombre es obligatorio',
                'description.required' =>'El campo descripción es obligatorio',
                'description.max' =>'El máximo de caracteres permitidos para el campo descripción son' . 'description.max',
                'price.min' =>'No se permiten valores negativos',
                'price.required' =>'El campo precio es obligatorio',
            ];
            
	//$product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

     public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    //accesor: Págima welcome para productos sin imagen relacionada. Evita el error Trying to get property 'image' of non-object //
    
    public function getFeaturedImageUrlAttribute()
    {
    	// buscar la imagen destacada si la hay
    	$featuredImage = $this->images()->where('featured', true)->first();
    	// Si no hay imagen destacada $featuredImage tomará el valor de la primera imagen asociada al producto
    	if(!$featuredImage)
    		$featuredImage = $this->images()->first();	
    	// Si hemos encontrado al menos una imagen asociada al producto evolvemos el campo url (accesor definido en el modelo ProductImage.php)
    	if($featuredImage) {
    		return $featuredImage->url;
    	}
    	// Imagen por defecto en caso que los if anteriores fallen
    	return 'images/default.png';

	}
   
}
