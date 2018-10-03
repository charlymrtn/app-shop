<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Models\CartDetail as Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'product_id.required' => 'El producto es requerido.',
            'quantity.required' => 'La cantidad es requerida.',
            'quantity.numeric' => 'La cantidad debe de ser un número.',
            'quantity.min' => 'La cantidad mínima es un@.',
            'quantity.max' => 'La cantidad máxima es diez.'
        ];

        $rules = [
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1|max:10',
        ];

        $this->validate($request,$rules,$messages);

        $detail = new Detail();
        $detail->cart_id = Auth::user()->cart->id;
        $detail->product_id = $request->product_id;
        $detail->quantity = $request->quantity;
        $detail->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $cart)
    {
        //
        $cart->delete();
        return redirect()->back();
    }
}
