<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Cart;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // accesor para el campo cart_id
    public function getCartAttribute ()
    {
        //Obtener los carritos asociados al usuario que estén activos
        $cart = $this->carts()->where('status', 'Active')->first();
        if ($cart)
            return $cart;
        // si no tiene carrito activo, creamos una nueva instancia de Cart con los siguientes datos:
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id; // id del usuario conectado
        $cart->save();
        // devolvemos el id del carrito creado
        return $cart;

    }
}
