@section('modal')
    @foreach ($orders as $order)
        @include('modal.change-status')
    @endforeach
@endsection

@section('scripts')

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
                <i class="material-icons">list</i>
                Pedidos Aprobados
            </a>
        </li>
        <li class="nav-item">
                <a class="nav-link" d="pills-cancelados-tab" href="#cancelados" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                    <i class="material-icons">list</i>
                    Pedidos Cancelados
                </a>
            </li>
        <li class="nav-item">
            <a class="nav-link" d="pills-finalizados-tab" href="#finalizados" role="tab" data-toggle="tab" aria-controls="pills-orders" aria-selected="false">
                <i class="material-icons">list</i>
                Pedidos Finalizados
            </a>
        </li>
    </ul>
    <hr>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pendientes" role="tabpanel" aria-labelledby="pills-pendientes-tab">
            @include('cart.orders.pendientes')
        </div>
        <div class="tab-pane fade" id="aprobados" role="tabpanel" aria-labelledby="pills-aprobados-tab">
            @include('cart.orders.aprobados')
        </div>
        <div class="tab-pane fade" id="cancelados" role="tabpanel" aria-labelledby="pills-cancelados-tab">
            @include('cart.orders.cancelados')
        </div>
        <div class="tab-pane fade" id="finalizados" role="tabpanel" aria-labelledby="pills-finalizados-tab">
            @include('cart.orders.finalizados')
        </div>
    </div>

</div>
