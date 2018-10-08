@section('modal')
    @foreach ($cart->details as $detail)
        @include('modal.delete-detail')
    @endforeach
    @include('modal.add-date')
@endsection

@section('scripts')
    <script>
        <!-- javascript for init -->
        $('.datetimepicker').datetimepicker({
            format: 'L',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script>
@endsection

<div class="section">
    <h2 class="title text-center">Hola {{Auth::user()->name}}</h2>
    @include('extras.notifications')
    @include('extras.errors')
    <ul class="nav nav-pills nav-pills-icons" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-cart-tab" href="#cart-detail" role="tab" data-toggle="tab" aria-controls="pills-cart" aria-selected="true">
                <i class="material-icons">shopping_cart</i>
                Carrito de compras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" d="pills-orders-tab" href="#orders" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                <i class="material-icons">list</i>
                Pedidos realizados
            </a>
        </li>
    </ul>
    <hr>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="cart-detail" role="tabpanel" aria-labelledby="pills-cart-tab">
            @include('cart.tables.details')
        </div>
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="pills-orders-tab">
            @include('cart.orders')
        </div>
    </div>

</div>
