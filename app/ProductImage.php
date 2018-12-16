<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	 protected $fillable = ['image', 'feature', 'product_id'];

     public function product()
    {
    	return $this->belongsTo(Product::class);
	}
/**
 *
 * Esta función se denomina accesor.Crea un campo calculado. Nos devolverá: Si la imagen es una url, la imagen en si de esa url. En caso contrario nos devolverá la imagen guardada en la ruta images/products. En la vista en vez de llamar al campo que contiene la imagen ($image->image), llamaremos al objeto $image->url, siendo url el atributo de la función getUrlAttribute
 *
 */
	public function getUrlAttribute() 
	{
		if (substr($this->image, 0, 4)==="http") {
			return $this->image;
		}
		return '/images/products/' . $this->image ;
	}
}
