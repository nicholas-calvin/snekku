@extends('master')

@section('content')

<div class="container">
    <h3>Shopping Cart</h3>

    <div>
        @if (count($carts) > 0)
            @for ($i = 0; $i < $carts->count(); $i++)
            <div class="card mb-3">
                <div class="card-body d-flex">
                    <div>
                        <img src="{{asset($products[$i]->imgPath)}}" alt="" class="img-shoppingcart-item">
                    </div>
                <div class="content-body d-flex justify-content-between" style="width: 1000px">
                    <div>
                        <p class="fw-bold">{{ $products[$i]->name }}</p>
                        <p>Rp. {{ number_format($products[$i]->price * $carts[$i]->quantity, 0) }}</p>
                    </div>
                    <div>
                        <form action="/cart/delete/{{ $carts[$i]->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-danger" style="color: white; border-radius: 5px; border: none">Delete</button>
                        </form>
                        {{-- quantity --}}
                        <p class="pt-3 text-center">x{{ $carts[$i]->quantity }}</p>
                    </div>
                </div>
                </div>
            </div>
            @endfor

        @else
            <p>Your cart is empty</p>
        @endif


        <div class="d-flex justify-content-end align-items-center mb-3" >
            <p class="fw-bold pe-4 m-0">Total : Rp {{ number_format($totalPrice,0) }}</p>
            <a href="/checkout" class="btn btn-dark">Checkout</a>
        </div>


    </div>
</div>



@endsection
