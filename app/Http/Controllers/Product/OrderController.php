<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Cats\Status;

class OrderController extends Controller
{
    //

    public function index()
    {
        $metodo = 'admin-orders';
        $statues = Status::all();
        $orders = Cart::all();
        return view('home',compact('metodo','orders','statues'));
    }

    public function show(Cart $order)
    {
        $metodo = 'order';
        $cart = $order;
        return view('home',compact('cart','metodo'));
    }

    public function update(Request $request, Cart $order)
    {

    }
}
