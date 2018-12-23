<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\Product;
use App\Cart;

class CartDetailController extends Controller
{  
      public $classDiv;

      public function __construct() 
        {
            $this->middleware('auth');
              }

    public function store(Request $request)
    {
       // Obtenemos el carrito del usuario activo
        $cart = auth()->user()->cart;

      // De los detalles del carrito, obtenemos los productos y comparamos si algún product_id del carrito
      // coincide con el $request->prduct_id que recibimos por url 
        $productCartDetail = $cart->details()
        ->where('product_id', $request->product_id)
        ->get();

     // Si hay alguna coinicidencia, inyectamos la variable $notification y $classDiv (estilo del div donde se mostrará $notification)
        if($productCartDetail->count() > 0) {
            $classDiv = "alert alert-danger";
            $notification = "El producto seleccionado ya se encuentra en el carrito de compras.";
     // Regresamos a la página dónde se encontraba el usuario
                return back()->with(compact('notification','classDiv'));

        }else{  // Si no hay coincidencias, guardamos el producto en el detalle del carrito

            $cartDetail = new CartDetail();
            $product = Product::find($request->product_id);
            $product_name = $product->name;
            $cartDetail->cart_id = auth()->user()->cart->id; // accesor getCartAttribute creado modelo User.php
            $cartDetail->product_id = $request->product_id;
            $cartDetail->quantity = $request->quantity;
            $cartDetail->product_price = $request->product_price;
            $cartDetail->total = $request->total;
            $cartDetail->save();

            $classDiv = "alert alert-success";
            $notification = "El producto $product_name se ha añadido a tu carrito de compras.";

                return back()->with(compact('notification','classDiv'));
            }
        }
  

    public function destroy($id)
    {
    	$cartDetail =CartDetail::find($id);
    	$product = $cartDetail->product->name;
    	//Evitamos que un usuario malintencionado pueda eliminar el carrito de otro usuario. Debe coincidir el cart->id del carrito con el cart->id del usuario conectado.
    	if($cartDetail->cart_id == auth()->user()->cart->id)
    	//si coincide eliminamos
    	$cartDetail->delete();
    	$notification = "El producto $product se ha eliminado del carrito de compras.";
    	return back()->with(compact('notification'));

    }
}

