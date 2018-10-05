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

        return view('home',compact('cart'));
    }

    public function welcome()
    {
        //$products = Product::orderBy('name')->paginate(9);
        $categories = Category::orderBy('name')->has('products')->paginate(9);
        return view('welcome', compact('categories'));
    }
}
