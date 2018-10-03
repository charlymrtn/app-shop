@extends('layouts.app')

@section('title','Pájaro Shop | Dashboard')

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    </div>
    <div class="main main-raised">
        <div class="container">
            @include('cart.cart-detail')
        </div>
    </div>
    @yield('modal')
    @include('extras.footer')
@endsection
