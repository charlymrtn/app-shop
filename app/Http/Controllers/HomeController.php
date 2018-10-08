<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        $orders = Cart::where('user_id',Auth::user()->id)->where('status',2)->get();
        $metodo = 'home';

        return view('home',compact('cart','orders','metodo'));
    }

    public function welcome()
    {
        //$products = Product::orderBy('name')->paginate(9);
        $categories = Category::orderBy('name')->has('products')->paginate(9);
        return view('welcome', compact('categories'));
    }
}
