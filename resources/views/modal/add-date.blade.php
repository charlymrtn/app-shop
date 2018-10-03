<!-- Modal -->
<div class="modal fade" id="addDate" tabindex="-1" role="dialog" aria-labelledby="addDateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDateLabel">Anadir fecha de entrega a la orden.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('cart.update',$cart->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    ¿Qué fecha quieres poner a tu orden?
                    <input type="text" name="order_date" class="form-control datetimepicker">
                    <input type="hidden" name="cart_id" value="{{$cart->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
