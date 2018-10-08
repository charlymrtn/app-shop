@section('modal')

@endsection

@section('scripts')

@endsection

<div class="section">
    <h2 class="title text-center">Pedido del día {{$cart->order_date}}</h2>
    @include('extras.notifications')
    @include('extras.errors')
    <hr>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="cart-detail" role="tabpanel" aria-labelledby="pills-cart-tab">
            @include('cart.tables.details')
        </div>
    </div>

</div>
