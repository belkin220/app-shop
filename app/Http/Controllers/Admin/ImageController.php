<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    	public function index($id)
    	{
    		$product = Product::find($id);
    		$images  = $product->images()->orderBy('featured','desc')->paginate(3);
    		return view('admin.products.images.index',compact('product', 'images'));
    	}

    	public function store(Request $request, $id)
    	{
    		//guardar imagen en el proyecto
    		$file = $request->file('photo');
    		$path = public_path() . '/images/products';
    		
    		$fileName = uniqid() . $file->getClientOriginalName();
    		$file->move($path,$fileName);

    		//guardar imagen en bd
    		$productImage = new ProductImage();
    		$productImage->image = $fileName;
    		$productImage->product_id = $id;
    		$productImage->save(); //INSERT
    		
    		return back();
    	}

    	public function destroy(Request $request,$id)
    	{
    		// Elimiar la imagen del proyecto
    		// Si el archivo es una url, no tenemos que eliminar nada puesto que no se encuentra dentro del proyecto, sino en una url.
    		// Por lo tanto la variable $deleted será siempre true.
    		// Si no es una url, primero pasamos la ruta completa ($fullPath), luego haciendo uso de la clase File, borramos el archivo.
    		// Si todo va bien, $deleted tomará el valor de true y sólo entonces eliminará el archivo de la bd.
    		// 
    	// 	$image = $request->input('id');
    	// dd($image);
    		$productImage = ProductImage::find($id);

    		if (substr($productImage->image, 0, 4)==="http"){
    			$deleted = true;
    		}else{
    			$fullPath = public_path() . '/images/products/' . $productImage->image ;
    			$deleted = File::delete($fullPath);
    		}
    		// Eliminar de la bd
    		if($deleted) {
    			$productImage->delete();
    		}
    		return back();
    	}

        public function select($id,$image)
        {
            ProductImage::where('product_id',$id)->update([
                'featured' => false
            ]);

            $productImage = ProductImage::find($image);
            $productImage->featured = true;
            $productImage->save();

            return back();

        }
}
