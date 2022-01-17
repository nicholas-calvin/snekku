@extends('master')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center mb-5">
    <div class="popular-products w-75">
        <h4 class="mb-4">Popular</h4>
        <div class="popular-item-list">
            <div class="row">
                @foreach($products as $product)
                <div class="col-3">
                    <div class="card mb-3 pb-4">
                        <a href="{{route('productDetail', ['productId'=>$product->id])}}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="product-image-card d-flex justify-content-center mb-2">
                                    <img src="{{asset($product->imgPath)}}" alt="" class="img-thumbnail img-fluid">
                                </div>
                                <div class="product-detail-card">
                                    <strong class="mb-1">{{$product->name}}</strong>
                                    <p class="m-0">Rp. {{number_format($product->price, 0)}}</p>
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
