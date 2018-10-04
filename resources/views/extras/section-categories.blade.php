<div class="section text-center">
    <h2 class="title">Categorías disponibles</h2>

    @include('extras.browser')

    <div class="team">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                            <div class="col-md-6 ml-auto mr-auto">
                                <img src="{{$category->featured_image}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <h4 class="card-title">
                                <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a>
                                <br>
                            </h4>
                            <div class="card-body">
                                <p class="card-description">{{$category->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{$categories->links()}}
        </div>
    </div>
</div>
