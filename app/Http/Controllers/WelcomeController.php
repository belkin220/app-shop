<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class WelcomeController extends Controller
{
    public function show(){

    	$categories=Category::has('products')->get();
    	
    	return view('welcome',compact('categories'));
    }
}
