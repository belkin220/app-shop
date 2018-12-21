<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\Product;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
   
    	$cartDetail = new CartDetail();

    	$product = Product::find($request->product_id);
    	$product_name = $product->name;

        $cartDetail->cart_id = auth()->user()->cart->id; // accesor getCartAttribute creado modelo User.php
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	$notification = "El producto $product_name se ha añadido a tu carrito de compras.";

    	return back()->with(compact('notification'));
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

