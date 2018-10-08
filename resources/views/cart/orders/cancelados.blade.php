<table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Cliente</th>
                <th>Fecha de Cancelación</th>
                <th>Cantidad de productos</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                @if ($order->status == 4)
                <tr>
                    <td><img src="{{$order->details()->first()->product->featured_image}}" alt="" width="150"></td>
                    <td>{{$order->client_name}}</td>
                    <td>{{$order->date_updated}}</td>
                    <td>{{$order->pieces}}</td>
                    <td>${{$order->total}}</td>
                    <td class="td-actions">
                        <a href="{{route('orders.show',$order->id)}}" target="_blank" rel="tooltip" title="Ver orden" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-info"></i>
                        </a>
                    </td>
                </tr>
                @endif

            @endforeach
        </tbody>
    </table>
