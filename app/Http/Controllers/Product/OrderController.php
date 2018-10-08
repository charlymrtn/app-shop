<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Cats\Status;
use Carbon\Carbon;

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
        //return $request;
        $messages = [
            'order_id.required' => 'El pedido es requerido.',
            'order_date.date' => 'La fecha no es válida.',
            'order_date.after' => 'Día no disponible, mínimo dos días despúes.',
            'status_id.required' => 'El status es requerido.',
            'status_id.numeric' => 'El status debe ser numerico.',
            'order_id.uuid' => 'El número de identificación es inválido.',
        ];

        $rules = [
            'order_id' => 'required|uuid',
            'order_date' => 'nullable|date',
            'status_id' => 'required|numeric'
        ];

        $this->validate($request,$rules,$messages);

        $valido = $this->statusValido($order->status, intval($request->status_id));

        if(!$valido) {

            $notificacion = 'El status es inválido';
            $status = 'error';

            return redirect()->route('orders.index')->with(compact('notificacion','status'));
        }

        if($request->order_id != $order->uuid){
            $notificacion = 'El número de identificación es inválido';
            $status = 'error';

            return redirect()->route('orders.index')->with(compact('notificacion','status'));
        }
        if($request->status_id == 3){
            if($request->has('order_date') && !is_null($request->order_date)){

                $fecha = Carbon::parse($request->order_date);
                if($fecha <= $order->order_date){
                    $notificacion = 'La nueva fecha no puede ser anterior o igual a la fecha inicial del pedido';
                    $status = 'error';

                    return redirect()->route('orders.index')->with(compact('notificacion','status'));
                }else{
                    $order->order_date = $fecha;
                    $order->save();
                }
            }
        }

        $order->status = intval($request->status_id);
        $order->save();

        if($order->status == 3) $notificacion = 'El pedido ha sido aprobado';
        if($order->status == 4) $notificacion = 'El pedido ha sido cancelado';
        $status = 'success';

        return redirect()->route('orders.index')->with(compact('notificacion','status'));

    }

    private function statusValido($actual, $nuevo)
    {
        if($nuevo < $actual) return false;
        if($nuevo == 1) return false;
        if($nuevo == 2) return false;
        if(($nuevo == 3 || $nuevo == 4) && $actual==2) return true;
        if(($nuevo == 5 || $nuevo == 4) && $actual==3) return true;
        if($nuevo == 4 || $nuevo==5) return false;
        return true;
    }

    public function order(Cart $order)
    {
        $metodo = 'order';
        $cart = $order;
        return view('home',compact('cart','metodo'));
    }
}
