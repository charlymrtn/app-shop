@extends('layouts.app')

@section('title','Lista de categorias')

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

    </div>
    <div class="main main-raised">
        <div class="container">

            @include('admin.categories.section-categories')

        </div>
    </div>

    @foreach ($categories as $category)
        @include('modal.delete-category')
    @endforeach

    @include('extras.footer')
@endsection