<div class="section text-center">
    <h2 class="title">Lista de Productos</h2>
    <div class="team">
        <div class="row">
            <div class="text-center">
                <a href="{{route('products.create')}}" class="btn btn-primary btn-round">Nuevo Producto</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th class="col-md-4">Descripción</th>
                        <th>Categoría</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category ? $product->category->name : 'General'}}</td>
                        <td class="text-right">${{$product->price}}</td>
                        <td class="td-actions text-right">
                            <a rel="tooltip" title="Detalles" class="btn btn-info btn-simple btn-xs" disabled="disabled">
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
