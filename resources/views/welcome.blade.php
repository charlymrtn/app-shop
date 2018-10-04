@extends('layouts.app')

@section('title','Bienvenid@ a Pájaro Shop')

@section('body-class','landing-page sidebar-collapse')

@section('styles')
    <style>
      .team .row .col-md-4 {
        margin-bottom: 1em;
      }
      .pagination {text-align: center;}
    </style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Bienvenid@ al Mercado del Pájaro</h1>
          <h4>Un lugar especial para esa persona especial..., Realiza pedidos y te contactarémos para coordinar la entrega.</h4>
          <br>
          <a href="#" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i>  ¿Cómo funciona?
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
        @include('extras.section-main')

        @include('extras.section-categories')

        {{--  @include('extras.section-products')  --}}

        @include('extras.section-contact')

    </div>
  </div>
  @include('extras.footer')
@endsection
