<h4>@if($metodo == 'home')Tu carrito de compras presenta @else Este pedido presenta @endif {{$cart->details->count()}} productos</h4>
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio unit.</th>
            <th>Subtotal</th>
            @if($metodo == 'home') <th>Opciones</th> @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($cart->details as $detail)
            <tr>
                <td><img src="{{$detail->product->featured_image}}" alt="" width="150"></td>
                <td><a href="{{route('products.show',$detail->product->id)}}">{{$detail->product->name}}</a></td>
                <td>{{$detail->product->category ? $detail->product->category->name : 'General'}}</td>
                <td>{{$detail->quantity}}</td>
                <td>${{$detail->price}}</td>
                <td>${{($detail->price)*($detail->quantity)}}</td>
                @if($metodo == 'home')
                    <td class="td-actions">
                        <a href="{{route('products.show',$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-info"></i>
                        </a>
                        <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#deleteDetail{{$detail->id}}">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                @endif
            </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total piezas</th>
            <th>Total</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$cart->pieces}}</td>
            <td>${{$cart->total}}</td>
        </tr>
    </tbody>
</table>
@if($metodo == 'home')
    <div class="text-center">
            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#addDate">
            <i class="material-icons">done</i> Revisar Pedido
        </button>
    </div>
@endif
