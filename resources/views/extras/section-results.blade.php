<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
    <div class="profile">
        <div class="avatar">
            <img src="{{asset('img/search.jpg')}}" alt="resultados" class="img-raised rounded-circle img-fluid">
        </div>
        <div class="name">
            <h3 class="title">Resultados de busqueda</h3>
            <p>
                Se encontraron {{$products->count()}} resultados, con el término {{$query}}.
            </p>
        </div>
    </div>
    </div>
</div>

<div class="text-center">
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-round">
        <i class="material-icons">backspace</i> Regresar
    </a>
</div>

<div class="section text-center">
    <div class="team">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                            <div class="col-md-6 ml-auto mr-auto">
                                @if (substr($product->featured_image,0,4) === 'http')
                                <img src="{{$product->featured_image}}" alt="{{$product->name}}" class="img-raised rounded-circle img-fluid">
                                @else
                                <img src="{{asset($product->featured_image)}}" alt="{{$product->name}}" class="img-raised rounded-circle img-fluid">
                                @endif
                            </div>
                            <h4 class="card-title">
                                <a href="{{route('products.show',$product->id)}}">{{$product->name}}</a>
                                <br>
                            </h4>
                            <div class="card-body">
                                <p class="card-description">{{$product->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{$products->links()}}
        </div>
    </div>
</div>
