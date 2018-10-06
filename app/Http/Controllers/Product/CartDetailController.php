<?php

namespace App\Http\Controllers\Product;

use App\Models\Cart;
use App\Models\CartDetail as Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Mail;
use App\Mail\NewOrder;
use App\Mail\ConfirmOrder;
use App\User;

class CartDetailController extends Controller
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

        $cart_id = Auth::user()->cart->id;

        $detail = Detail::where('cart_id',$cart_id)->where('product_id',$request->product_id)->first();

        if($detail){
            $detail->quantity = $detail->quantity + $request->quantity;
            if($detail->quantity > 10){
                $notificacion = 'No se puede añadir mas de 10 piezas de un mismo producto al carrito de compras.';
                $status = 'error';
                return back()->with(compact('notificacion','status'));
            }
            $detail->save();
        }else{
            $detail = new Detail();
            $detail->cart_id = Auth::user()->cart->id;
            $detail->product_id = $request->product_id;
            $detail->quantity = $request->quantity;
            $detail->save();
        }

        $notificacion = 'El producto fue añadido al carrito.';
        $status = 'success';
        return back()->with(compact('notificacion','status'));
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
        $messages = [
            'cart_id.required' => 'El pedido es requerido.',
            'order_date.required' => 'La fecha es requerida.',
            'order_date.date' => 'La fecha no es válida.',
            'order_date.after' => 'Día no disponible, mínimo dos días.',
        ];

        $rules = [
            'cart_id' => 'required',
            'order_date' => 'required|date|after:tomorrow',
        ];

        $this->validate($request,$rules,$messages);

        $client = Auth::user();
        $cart = $client->cart;

        if($cart->details()->count()>0){
            if($request->cart_id != $cart->id){
                $notificacion = 'error al procesar el pedido';
                $status = 'error';
                return back()->with(compact('notificacion','status'));
            }else{
                $order_date = new Carbon($request->order_date);

                $cart->status = 2;
                $cart->order_date = $order_date;
                $cart->save();

                $admins = User::where('admin',true)->get();

                Mail::to($admins)->send(new NewOrder($cart,$client));
                Mail::to($client)->send(new ConfirmOrder($cart,$client));

                $notificacion = 'Pedido procesado, en espera de confirmación';
                $status = 'success';
                return back()->with(compact('notificacion','status'));
            }
        }else{
            $notificacion = 'El carrito no puede estar vacío';
            $status = 'error';
            return back()->with(compact('notificacion','status'));
        }

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
        if($cart->cart_id == Auth::user()->cart->id){
            $cart->delete();
            $notificacion = 'El producto fue removido del carrito';
            $status = 'success';
        }else{
            $notificacion = 'Hubo un problema al borrar el producto.';
            $status = 'error';
        }

        return redirect()->back()->with(compact('notificacion','status'));
    }
}
