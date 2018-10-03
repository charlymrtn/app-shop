<div class="section">
    <h2 class="title text-center">Hola {{Auth::user()->name}}</h2>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <ul class="nav nav-pills nav-pills-icons" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                <i class="material-icons">shopping_cart</i>
                Carrito de compras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                <i class="material-icons">list</i>
                Pedidos realizados
            </a>
        </li>
    </ul>

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th class="text-right">Precio</th>
                <th class="text-right">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::user()->cart->details as $detail)
                <tr>
                    <td class="text-center">{{$detail->id}}</td>
                    <td>{{$detail->product->name}}</td>
                    <td>{{$detail->product->category ? $detail->product->category->name : 'General'}}</td>
                    <td>{{$detail->quantity}}</td>
                    <td class="text-right">${{$detail->product->price}}</td>
                    <td class="td-actions text-right">
                        <a href="{{route('images.index',$detail->product->id)}}" rel="tooltip" title="Imagenes" class="btn btn-default btn-simple btn-xs">
                            <i class="fa fa-photo"></i>
                        </a>
                        <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#deleteDetail{{$detail->id}}">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
