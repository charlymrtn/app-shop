<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart;

class OrderController extends Controller
{
    //

    public function index()
    {
        $pedidos = Cart::all();

        return $pedidos;
    }

    public function show(Cart $order)
    {
        $metodo = 'order';
        $cart = $order;
        return view('home',compact('cart','metodo'));
    }
}
