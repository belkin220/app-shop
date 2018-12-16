<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
    	return 'images/products/default.png';

	}
}
