@extends('layouts.app')

@if (!$metodo) @section('title','Lista de productos') @else @section('title','resultados de busqueda') @endif

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

    </div>
    <div class="main main-raised">
        <div class="container">

            @if ($metodo == 'products') @include('admin.products.section-products') @else @include('extras.section-results') @endif

        </div>
    </div>

    @if ($metodo == 'products')
        @foreach ($products as $product)
            @include('modal.delete-product')
        @endforeach
    @endif

    @include('extras.footer')
@endsection
