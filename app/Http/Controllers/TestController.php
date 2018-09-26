<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{
    //
    public function welcome()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
