<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;
use App\User;
use Carbon\Carbon;

class CartController extends Controller
{
    public function update()
    {
        $client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pendiente';
        $cart->order_date = Carbon::now();
    	$cart->save(); //UPDATE

        $notification = "Tu pedido se ha registrado correctamente. En breve te contactaremos vía correo electrónico." ;
        //Se enviará el correo a todsosa los usuarios que sean administradores
        $admins = User::where('admin',true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));

        // o también se puede pasar un correo en formato cadena al método to().

    	

    	return back()->with(compact('notification'));
    }
   
}
