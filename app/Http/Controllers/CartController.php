<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pendiente';
    	$cart->save(); //UPDATE

    	$notification = "Tu pedido se ha registrado correctamente. En breve te contactaremos vía correo electrónico." ;

    	return back()->with(compact('notification'));
    }
}
