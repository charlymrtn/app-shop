<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Pedido Confirmado.</title>
    </head>
    <body>
        <p>Tú pedido ha sido recibido</p>
        <p>Estos son los datos de tú pedido:</p>
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
                ($ {{$detail->quantity * $detail->product->price}})
            </li>
            @endforeach
        </ul>
        <p>
            <strong>Importe a pagar:</strong> {{$cart->total}}
        </p>
        <hr>
    </body>
</html>
