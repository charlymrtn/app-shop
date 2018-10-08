@section('modal')
    @foreach ($orders as $order)
        @include('modal.change-status')
    @endforeach
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
            <a class="nav-link active" id="pills-pendientes-tab" href="#pendientes" role="tab" data-toggle="tab" aria-controls="pills-cart" aria-selected="true">
                <i class="material-icons">receipt</i>
                Pedidos Pendientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" d="pills-aprobados-tab" href="#aprobados" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                <i class="material-icons">play_circle_filled</i>
                Pedidos Aprobados
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" d="pills-cancelados-tab" href="#cancelados" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                <i class="material-icons">cancel</i>
                Pedidos Cancelados
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" d="pills-finalizados-tab" href="#finalizados" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                <i class="material-icons">check_circle</i>
                Pedidos Entregados
            </a>
        </li>
    </ul>
    <hr>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
            @if ($orders->contains('status', 2))
                @include('cart.orders.pendientes')
            @else
                <h4>No hay pedidos pendientes.</h4>
            @endif
        </div>
        <div class="tab-pane fade" id="aprobados" role="tabpanel" aria-labelledby="pills-aprobados-tab">
            @if ($orders->contains('status', 3))
                @include('cart.orders.aprobados')
            @else
                <h4>No hay pedidos aprobados.</h4>
            @endif
        </div>
        <div class="tab-pane fade" id="cancelados" role="tabpanel" aria-labelledby="pills-cancelados-tab">
            @if ($orders->contains('status', 4))
                @include('cart.orders.cancelados')
            @else
                <h4>No hay pedidos cancelados.</h4>
            @endif
        </div>
        <div class="tab-pane fade" id="finalizados" role="tabpanel" aria-labelledby="pills-finalizados-tab">
            @if ($orders->contains('status', 5))
                @include('cart.orders.finalizados')
            @else
                <h4>No hay pedidos entregados.</h4>
            @endif
        </div>
    </div>

</div>
