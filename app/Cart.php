<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CartDetail;

class Cart extends Model
{
    public function details()
    {
    	return $this->hasMany(CartDetail::class);
    }

    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach($this->details as $detail) {
    		$total += ($detail->quantity * $detail->product_price) * 1.21;
    		

    	}
    	return str_replace('.', ',',number_format($total,2)) ;
    }
}
