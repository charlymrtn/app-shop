<div class="section text-center">
    <h2 class="title">Lista de Categorías</h2>
    @include('extras.notifications')
    <div class="team">
        <div class="row">
            <div class="text-center">
                <a href="{{route('categories.create')}}" class="btn btn-primary btn-round">Nueva Categoría</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th># de Productos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>
                            <img
                                @if (substr($category->featured_image,0,4) === 'http')
                                    src="{{$category->featured_image}}"
                                @else
                                    src="{{asset($category->featured_image)}}"
                                @endif
                            alt="{{$category->name}}" class="rounded-circle" height="50">
                        </td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->products()->count()}}</td>
                        <td class="td-actions">
                            <a href="{{route('categories.show',$category->id)}}" rel="tooltip" title="Detalles" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-info"></i>
                            </a>
                            <a href="{{route('categories.edit',$category->id)}}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#deleteCategory{{$category->id}}">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}

        </div>
    </div>
</div>
