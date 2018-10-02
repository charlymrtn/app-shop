<div class="section text-center">
        <h2 class="title">Producto {{$product->name}}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('products.update',$product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Nombre de Producto.</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$product->name)}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="price">Precio de producto.</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{old('price',$product->price)}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="description">Descripción corta.</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{old('description',$product->description)}}">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="long_description">Descripción extendida.</label>
                    <textarea class="form-control" id="long_description" name="long_description" rows="3" >{{old('long_description',$product->long_description)}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('products.index')}}" class="btn btn-warning">Regresar</a>
        </form>
    </div>
