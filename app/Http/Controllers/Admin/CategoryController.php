<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
	   public function index() 
	   	{

	   		$categories=Category::paginate(10);
	   		return view('admin.categories.index',compact('categories'));
	   	}

		public function create( $redirect ) 
		{
			// $redirect: Si estamos en la página de creación de un nuevo prducto y la categoria no se encuentra en el select, pulsamos el botón nueva categoria, creamos la categoria y redirige a la página de creación de producto. Esto lo hará si $redirect = 1.
			
			// Si no estamos en la página de creación de productos, sino que vamos a crear directamente una nueva categoria $redirect es 0, por lo tanto no redirige a ninguna página y se crea la categoria normalmente. El metodo store, recibirá el valor de $redirect para saber si tiene que redirigir o no.
			
			$categories=Category::all();
			return view('admin.categories.create',compact('categories','redirect'));
		}
	
		
		public function store(Request $request) 
		{
			 $redirect = $request->redirect;

			 // La validación de campos se encuentra  en el modelo Category.php
			$this->validate($request,Category::$rules,Category::$message);

			 Category::create($request->all());
			//  $category = Category::all();
			// $lastCategory = $category->last();
			// dd($lastCategory);

			$notification = "La categoria $request->name se ha guardado correctamente.";

			 if($redirect == 1) { // Redirige a la página de creación de productos si $redirect = 1
			return redirect('admin/products/create')->with(compact('notification','redirect'));
			}else{
			return redirect('admin/categories')->with(compact('notification'));
		}

		}

				
		public function edit(Category $category) 
		{
			
			return view('admin.categories.edit',compact( 'category'));
		}

		public function update(Request $request, Category $category) 
		{
			$this->validate($request,Category::$rules,Category::$message);

			$category->update($request->all());

			$notification = "La categoria $category->name se ha actualizado correctamente.";

			return redirect('admin/categories')->with(compact('notification'));
		}

		public function destroy(Category $category) 
		{
			$category->delete();

			$notification = "La categoria $category->name se ha eliminado correctamente.";

			return redirect('admin/categories')->with(compact('notification'));
		}
}
