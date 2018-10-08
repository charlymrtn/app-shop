<table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cantidad de Productos</th>
                <th>Fecha programada</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <td><img src="{{$order->details()->first()->product->featured_image}}" alt="" width="150"></td>
                    <td>{{$order->pieces}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>{{$order->status_name}}</td>
                    <td>${{($order->total)}}</td>
                    <td class="td-actions">
                        <a href="{{route('orders.show',$order->id)}}" target="_blank" rel="tooltip" title="Ver orden" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-info"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
