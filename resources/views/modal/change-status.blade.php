<!-- Modal -->
<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusLabel">Cambiar estatus del pedido.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('orders.update',$order->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    ¿Qué fecha quieres poner a tu orden?
                    <select name="status_id" id="status_id" class="form-control" value="">
                        @foreach ($statues as $status)
                            <option value="{{$status->id}}" @if ($status->id == old('status_id',$order->status)) selected @endif>
                                {{$status->description}}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
