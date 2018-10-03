<!-- Modal -->
<div class="modal fade" id="deleteDetail{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="deletedetailLabel{{$detail->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDetailLabel{{$detail->id}}">Eliminar {{$detail->product->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('cart.destroy',$detail->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          ¿Estás seguro de eliminar este producto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
