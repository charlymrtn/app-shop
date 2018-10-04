<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart;

class OrderController extends Controller
{
    //

    public function show(Cart $order)
    {
        return $order;
    }
}
