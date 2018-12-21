<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
   	public function index() 
   	{

   		$products=Product::paginate(10);
   		return view('admin.products.index',compact('products'));
   	}

	public function create() 
	{
		$categories=Category::all();
		return redirect('admin/products/create')->with(compact('categories'));
	}

	public function store(Request $request, Product $product) 
	{
	
		$this->validate($request,Product::$rules,Product::$message);

		Product::create($request->all());

		$notification = "El producto $request->name se ha guardado correctamente.";

		return redirect('admin/products')->with(compact('notification'));
	}

	public function show(Product $product) 
	{
		$images = $product->images;

    	$imagesLeft = collect();
    	$imagesRight = collect();

    	foreach($images as $key => $image) {
    		if($key%2 == 0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}

		return view('admin.products.show',compact('product','imagesLeft', 'imagesRight'));
	}	
	
	public function edit(Product $product) 
	{

		$categories=Category::orderBy('name')->get();

		return view('admin.products.edit',compact('product', 'categories'));
	}

	public function update(Request $request, Product $product) 
	{
		
		$this->validate($request,Product::$rules,Product::$message);

		$product->update($request->all());

		$notification = "El producto $request->name se ha actualizado correctamente.";

		return redirect('admin/products')->with(compact('notification'));
	}

	public function destroy(Product $product) 
	{
		$product->delete();
		$notification = "El producto $product->name se ha eliminado correctamente.";

		return redirect('admin/products')->with(compact('notification'));
	}


}