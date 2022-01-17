@extends('master')

@section('content')

<div class="container mb-5">
    <h3 class="mb-4">Wishlist</h3>

    {{-- href ke detail produk --}}
    @if (count($wishlists) > 0)
        @for ($i=0; $i<$wishlists->count(); $i++)
            <a href="/product/details/{{$products[$i]->id}}" class="text-decoration-none" style="color: black">
                <div class="card mb-3">
                    <div class="card-body d-flex">
                        <div>
                            <img src="{{asset($products[$i]->imgPath)}}" alt="" class="img-shoppingcart-item">
                        </div>
                    <div class="content-body d-flex justify-content-between" style="width: 1000px">
                        <div>
                            <p class="fw-bold">{{ $products[$i]->name }}</p>
                            <p>{{ $products[$i]->price }}</p>
                        </div>
                        <div>
                            <form action="/wishlist/delete/{{ $wishlists[$i]->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-danger" style="color: white; border-radius: 5px; border: none">Delete</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
        @endfor
    @else
    <p>Your wishlist is empty</p>
    @endif

</div>

@endsection
