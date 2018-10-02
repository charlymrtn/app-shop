<div class="section text-center">
    <h2 class="title">Lista de Productos</h2>
    <div class="team">
        <div class="row">
            <a href="{{route('products.create')}}" class="btn btn-primary btn-round">Nuevo Producto</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th class="col-md-4">Description</th>
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
                            <a href="{{route('products.show',$product->id)}}" rel="tooltip" title="Ver producto" class="btn btn-info">
                                <i class="material-icons">info</i>
                            </a>
                            <a href="{{route('products.edit',$product->id)}}" rel="tooltip" title="Editar producto" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
</div>
