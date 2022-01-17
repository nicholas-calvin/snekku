@extends('master')

@section('content')

<div class="container mb-5">
    <h3>{{$categoryName}}</h3>
    <div class="content d-flex mt-4">
        <div class="category-list me-4" style="width: 200px; border-right: black 1px solid; padding-right: 2em;">
            <ul class="list-category">
                @foreach($categories as $category)
                <li><a class="text-decoration-none"  style="color: black" href="{{route('category',['categoryId'=>$category->id])}}">{{$category->name}}</li>
                @endforeach
            </ul>
        </div>
        <div class="category-content">
            <div class="row">
                @foreach($productCategories as $products)
                <div class="col-3">
                    <div class="card mb-3 pb-4">
                        <a href="{{route('productDetail', ['productId'=>$products->id])}}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="product-image-card d-flex justify-content-center mb-2">
                                    <img src="{{asset($products->imgPath)}}" alt="" class="img-thumbnail img-fluid">
                                </div>
                                <div class="product-detail-card">
                                    <strong class="mb-1">{{$products->name}}</strong>
                                    <p class="m-0">Rp. {{$products->price}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>


@endsection
