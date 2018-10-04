<div class="section text-center">
        <h2 class="title">Registrar Nuevo Producto</h2>
        @include('extras.errors')
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Nombre de Producto.</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="price">Precio de producto.</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{old('price')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="description">Descripción corta.</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Categoría.</label>
                        <select name="category_id" id="category_id" class="form-control" value="{{old('category_id')}}">
                            <option value="0" disabled selected>Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="long_description">Descripción extendida.</label>
                    <textarea class="form-control" id="long_description" name="long_description" rows="3">{{old('long_description')}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{route('products.index')}}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>
