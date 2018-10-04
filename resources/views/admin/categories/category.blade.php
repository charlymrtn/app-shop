@extends('layouts.app')

@if ($metodo == 'crear')
    @section('title','Guardar Categoría')
@elseif ($metodo == 'profile')
    @section('title','Ver Categoría')
@else
    @section('title','Editar Categoría')
@endif

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    </div>
    <div class="main main-raised">
        <div class="container">

            @if ($metodo == 'crear')
                @include('forms.categories.create')
            @elseif ($metodo == 'profile')
                @include('profile.category')
            @else
                @include('forms.categories.edit')
            @endif

        </div>
    </div>
    @yield('modal')
    @include('extras.footer')
@endsection
