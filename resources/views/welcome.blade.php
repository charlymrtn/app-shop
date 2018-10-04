@extends('layouts.app')

@section('title','Bienvenid@ a '.config('app.name'))

@section('body-class','landing-page sidebar-collapse')

@section('styles')
    <link href="{{asset('css/custom-styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/typeahead.css')}}" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="{{asset('js/typeahead.bundle.min.js')}}" type="text/javascript"></script>
    <script>
        $(function () {
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,

                prefetch: "{{route('products.json')}}"
                });

                $('#query').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'products',
                source: products
            });
        });
    </script>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Bienvenid@ a {{config('app.name')}}</h1>
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
