<div class="section text-center">
    <h2 class="title">Lista de Productos</h2>
    @include('extras.notifications')
    <div class="team">
        <div class="row">
            <div class="text-center">
                <a href="{{route('products.create')}}" class="btn btn-primary btn-round">Nuevo Producto</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category ? $product->category->name : 'General'}}</td>
                        <td>${{$product->price}}</td>
                        <td class="td-actions">
                            <a href="{{route('products.show',$product->id)}}" rel="tooltip" title="Detalles" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-info"></i>
                            </a>
                            <a href="{{route('products.edit',$product->id)}}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('images.index',$product->id)}}" rel="tooltip" title="Imagenes" class="btn btn-default btn-simple btn-xs">
                                <i class="fa fa-photo"></i>
                            </a>
                            <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#deleteProduct{{$product->id}}">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}

        </div>
    </div>
</div>
