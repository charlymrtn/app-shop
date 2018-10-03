<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
    <div class="profile">
        <div class="avatar">
        <img src="{{$product->featured_image}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
        </div>
        <div class="name">
        <h3 class="title">{{$product->name}}</h3>
        <h6>{{ $product->category ? $product->category->name : 'General'}}</h6>
        <p>
            {{$product->description}}
        </p>
        {{-- <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
        <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
        <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> --}}
        </div>
    </div>
    </div>
</div>
<div class="description text-center">
    <p>{{$product->long_description}}</p>
</div>
<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
        <div class="profile-tabs">

        </div>
    </div>
</div>
<div class="tab-content tab-space">
    <div class="tab-pane active text-center gallery" id="studio">
        <div class="row">
            <div class="col-md-3 ml-auto">
                @foreach ($imgL as $image)
                    <img src="{{$image->url}}" class="rounded">
                @endforeach
            </div>
            <div class="col-md-3 mr-auto">
                @foreach ($imgR as $image)
                    <img src="{{$image->url}}" class="rounded">
                @endforeach
            </div>
        </div>
    </div>
</div>