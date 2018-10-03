@extends('layouts.app')

@section('title','Lista de productos')

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

    </div>
    <div class="main main-raised">
        <div class="container">

            @include('admin.products.section-products')

        </div>
    </div>

    @foreach ($products as $product)
        @include('modal.delete-product')
    @endforeach

    @include('extras.footer')
@endsection
