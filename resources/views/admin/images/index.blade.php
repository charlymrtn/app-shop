@extends('layouts.app')

@section('title','Imagenes del producto')

@section('body-class','profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Imágenes del producto {{$product->name}}</h2>
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('images.store',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="photo">
                            <button type="submit" class="btn btn-primary btn-round">Subir una imágen</button>
                            <a href="{{route('products.index')}}" class="btn btn-default btn-round">Regresar</a>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach ($images as $image)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{$image->url}}" alt="" width="250">
                                <form action="{{route('images.destroy',$image->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-round">Eliminar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @include('extras.footer')
@endsection
