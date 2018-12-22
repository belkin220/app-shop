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
		return view('admin.products.create',compact('categories'));
	}

	public function store(Request $request) 
	{
		//validación
		$rules=[
			'name'       => 'required|string',
			'description'=> 'required|string|max:200',
			'price'      => 'required|numeric|min:0',
			];
			$message=[
				'name.required' => 'Elcampo nombre es obligatorio',
				'description.required' =>'El campo descripción es obligatorio',
				'description.max' =>'El máximo de caracteres permitidos para el campo descripción son' . 'description.max',
				'price.min' =>'No se permiten valores negativos',
				'price.required' =>'El campo precio es obligatorio',
			];
			$this->validate($request,$rules,$message);

		$product                   = new Product();
		$product->name             = $request->input('name');
		$product->description      = $request->input('description');
		$product->category_id      = $request->input('category_id');
		$product->price            = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('admin/products');
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
	
	public function edit($product) 
	{

		$product=Product::find($product);
		$categories=Category::all()->except($product->category->id);

		return view('admin.products.edit',compact('product', 'categories'));
	}

	public function update(Request $request, $product) 
	{
		//validación
		$rules=[
			'name'       => 'required|string',
			'description'=> 'required|string|max:20',
			'price'      => 'required|numeric|min:0',
			];
			$message=[
				'name.required' => 'El campo nombre es obligatorio',
				'description.required' =>'El campo descripción es obligatorio',
				'description.max' =>'El máximo de caracteres permitidos para el campo descripción son 20',
				'price.min' =>'No se permiten valores negativos',
				'price.required' =>'El campo precio es obligatorio',
			];

			$this->validate($request,$rules,$message);

		$product                   = Product::find($id);
		$product->name             = $request->input('name');
		$product->description      = $request->input('description');
		$product->category_id      = $request->input('category_id');
		$product->price            = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('admin/products');
	}

	public function destroy($id) 
	{
		$product = Product::find($id);
		$product->delete();

		return redirect('admin/products');
	}


}