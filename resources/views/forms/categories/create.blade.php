<div class="section text-center">
    <h2 class="title">Registrar Nueva Categoría</h2>
    @include('extras.errors')
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="name">Nombre de la Categoría.</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="form-group">
                <label for="description">Descripción.</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{route('categories.index')}}" class="btn btn-warning">Cancelar</a>
    </form>
</div>
