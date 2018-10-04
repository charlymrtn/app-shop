<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        $details = $cart->details;
        $totalPiezas = 0;
        $total = 0;
        foreach ($details as $detail) {
            # code...
            $totalPiezas = $totalPiezas + $detail->quantity;
            $total = $total + ($detail->quantity*$detail->product->price);
        }
        return view('home',compact('cart','details','totalPiezas','total'));
    }

    public function welcome()
    {
        $products = Product::orderBy('name')->paginate(9);
        $categories = Category::orderBy('name')->has('products')->paginate(9);
        return view('welcome', compact('products','categories'));
    }
}
