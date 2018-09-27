<div class="section text-center">
    <h2 class="title">Lista de Productos</h2>
    <div class="team">
        <div class="row">
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
                        <td>{{$product->category->name}}</td>
                        <td class="text-right">${{$product->price}}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                                <i class="material-icons">info</i>
                            </button>
                            <button type="button" rel="tooltip" title="Editar producto" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
