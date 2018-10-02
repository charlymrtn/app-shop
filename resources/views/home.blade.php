@extends('layouts.app')

@section('title','Pájaro Shop | Dashboard')

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Hola {{Auth::user()->name}}</h2>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
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
            </div>
        </div>
    </div>
    @include('extras.footer')
@endsection
