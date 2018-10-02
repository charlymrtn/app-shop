@extends('layouts.app')

@if ($metodo == 'crear')
    @section('title','Guardar Producto')
@elseif ($metodo == 'mostrar')
    @section('title','Ver Producto')
@else
    @section('title','Editar Producto')
@endif

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    </div>
    <div class="main main-raised">
        <div class="container">

            @if ($metodo == 'crear')
                @include('forms.create')
            @else
                @include('forms.edit')
            @endif

        </div>
    </div>
    @include('extras.footer')
@endsection
