<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CAtegory;

class ProductController extends Controller
{
    public function show(Request $request,$id)
    {
        $carrito = $request->carrito;
    	$product = Product::find($id);
    	$images = $product->images()->get();
       

    	$imagesLeft = collect();
    	$imagesRight = collect();

    	foreach($images as $key => $image) {
    		if($key%2 == 0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}

		return view('products.show',compact('product','imagesLeft', 'imagesRight','carrito'));
    }
   
}
