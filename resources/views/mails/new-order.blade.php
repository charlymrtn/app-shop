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
        <p>
            <a href="{{route('order.show',$cart->id)}}">Haz clic aquí</a>
            Para ver mas información sobre este pedido.
        </p>
    </body>
</html>
