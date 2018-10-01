<div class="section text-center">
    <h2 class="title">Productos disponibles</h2>
    <div class="team">
        <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
            <div class="team-player">
                <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{$product->images()->first() ? $product->images()->first()->image : ''}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">{{$product->name}}
                    <br>
                    <small class="card-description text-muted">
                        {{ $product->category ? $product->category->name : 'General'}}
                    </small>
                </h4>
                <div class="card-body">
                    <p class="card-description">{{$product->description}}</p>
                </div>
                <div class="card-footer justify-content-center">
                    {{-- <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a> --}}
                </div>
                </div>
            </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
