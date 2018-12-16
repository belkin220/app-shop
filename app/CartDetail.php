<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartDetail extends Model
{
	//relacion  CartDetail N            1 product 
	//Un producto se puede asociar con varios Cartdetail pero el cartDetail le pertenece a un producto
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
