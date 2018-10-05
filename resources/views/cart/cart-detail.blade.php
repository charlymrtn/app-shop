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
    <ul class="nav nav-pills nav-pills-icons" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                <i class="material-icons">shopping_cart</i>
                Carrito de compras
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                <i class="material-icons">list</i>
                Pedidos realizados
            </a>
        </li>
    </ul>
    <hr>
    <h4>Tu carrito de compras presenta {{$cart->details->count()}} productos</h4>

    @include('cart.tables.details')

    <div class="text-center">
            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#addDate">
            <i class="material-icons">done</i> Revisar Pedido
        </button>
    </div>

</div>
