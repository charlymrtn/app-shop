<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Nuevo Pedido</title>
    </head>
    <body>
        <p>Se ha realizado un nuevo pedido</p>
        <p>Estos son los datos del cliente que realizó el pedido:</p>
        <ul>
            <li>
               <strong>Nombre:</strong>
               {{$cart->user->name}}
            </li>
            <li>
                <strong>Correo:</strong>
                {{$cart->user->email}}
            </li>
            <li>
                <strong>Fecha de creación:</strong>
                {{$cart->date_order}}
            </li>
        </ul>
        <hr>
        <p>Detalles de Pedido</p>
        <ul>
            @foreach ($cart->details as $detail)
            <li>
                {{$detail->product->name}} x {{$detail->quantity}}
                ($ {{$detail->quantity * $detail->price}})
            </li>
            @endforeach
        </ul>
        <p>
            <strong>Importe a pagar:</strong> {{$cart->total}}
        </p>
        <hr>
        <p>
            <a href="{{route('orders.show',$cart->id)}}">Haz clic aquí</a>
            Para ver mas información sobre este pedido.
        </p>
    </body>
</html>
