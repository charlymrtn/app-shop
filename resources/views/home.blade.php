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
    @foreach (Auth::user()->cart->details as $detail)
        @include('modal.delete-detail')
    @endforeach
    @include('extras.footer')
@endsection
