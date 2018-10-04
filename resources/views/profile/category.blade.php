<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
    <div class="profile">
        <div class="avatar">
            @if (substr($category->featured_image,0,4) === 'http')
            <img src="{{$category->featured_image}}" alt="{{$category->name}}" class="img-raised rounded-circle img-fluid">
            @else
            <img src="{{asset($category->featured_image)}}" alt="{{$category->name}}" class="img-raised rounded-circle img-fluid">
            @endif
        </div>
        <div class="name">
            <h3 class="title">{{$category->name}}</h3>
            <p>
                {{$category->description}}
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

@include('extras.errors')

@include('extras.notifications')

<div class="section text-center">
    <h2 class="title">Productos de la Categoría {{$category->name}}</h2>
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
