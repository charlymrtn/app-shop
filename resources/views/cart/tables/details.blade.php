<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio unit.</th>
            <th>Subtotal</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart->details as $detail)
            <tr>
                <td><img src="{{$detail->product->featured_image}}" alt="" width="150"></td>
                <td><a href="{{route('products.show',$detail->product->id)}}">{{$detail->product->name}}</a></td>
                <td>{{$detail->product->category ? $detail->product->category->name : 'General'}}</td>
                <td>{{$detail->quantity}}</td>
                <td>${{$detail->product->price}}</td>
                <td>${{($detail->product->price)*($detail->quantity)}}</td>
                <td class="td-actions">
                    <a href="{{route('products.show',$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-info"></i>
                    </a>
                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#deleteDetail{{$detail->id}}">
                        <i class="fa fa-times"></i>
                    </button>
                </td>
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
