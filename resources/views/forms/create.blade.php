<div class="section text-center">
        <h2 class="title">Registrar Nuevo Producto</h2>
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Nombre de Producto.</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="price">Precio de producto.</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="description">Descripción corta.</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label for="long_description">Descripción extendida.</label>
                    <textarea class="form-control" id="long_description" name="long_description" rows="3"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
