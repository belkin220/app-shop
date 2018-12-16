<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class WelcomeController extends Controller
{
    public function welcome(){

    	$products=Product::paginate(12);
    	
    	return view('welcome',compact('products'));
    }
}
