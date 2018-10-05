<div class="section text-center">
    <h2 class="title">Categoría {{$category->name}}</h2>
    <div class="avatar">
        <img
        @if (substr($category->featured_image,0,4) === 'http')
            src="{{$category->featured_image}}"
        @else
            src="{{asset($category->featured_image)}}"
        @endif
        alt="{{$category->name}}" class="img-raised rounded-circle img-fluid">
    </div>
    @include('extras.errors')
    <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="name">Nombre de Categoría.</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$category->name)}}">
                </div>
            </div>
            <div class="col-sm-4">
                <label for="image">Imágen.</label>
                <input type="file" id="image" name="image">
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <label for="long_description">Descripción.</label>
                <textarea class="form-control" id="description" name="description" rows="3" >{{old('description',$category->description)}}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{route('categories.index')}}" class="btn btn-warning">Regresar</a>
    </form>
</div>
