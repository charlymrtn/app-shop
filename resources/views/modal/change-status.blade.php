<!-- Modal -->
<div class="modal fade" id="changeStatus{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel{{$order->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusLabel{{$order->id}}">Cambiar estatus del pedido.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('orders.update',$order->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    ¿Qué quieres hacer con el pedido?
                    <select name="status_id" id="status_id" class="form-control" value="">
                        @foreach ($statues as $status)
                            <option value="{{$status->id}}" @if ($status->id == old('status_id',$order->status)) selected @endif>
                                {{$status->name}}
                            </option>
                        @endforeach
                    </select>
                    ¿Quieres cambiar la fecha de entrega?
                    <input type="text" name="order_date" class="form-control datetimepicker" value="{{$order->order_date}}">
                    <input type="hidden" name="order_id" value="{{$order->uuid}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
