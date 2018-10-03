<!-- Modal -->
<div class="modal fade" id="addCart" tabindex="-1" role="dialog" aria-labelledby="addCartLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCartLabel">Anadir {{$product->name}} al carrito.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    ¿Cuántas unidades quieres agregar?
                    <input type="number" name="quantity" value="1" class="form-control">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
