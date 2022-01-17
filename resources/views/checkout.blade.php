@extends('master')

@section('content')

<div class="container mb-5">

    <h2 class="mb-4">Checkout</h2>

    <div class="row">
        <div class="col col-4">
            <h4 class="mb-3">Item</h4>

            @if (count($carts) > 0)
            @for ($i = 0; $i < $carts->count(); $i++)
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <img src="{{asset($products[$i]->imgPath)}}"
                        alt="" class="img-shoppingcart-item img-fluid">
                </div>
                <div class="content-body d-flex justify-content-between align-items-end" style="width: 100%">
                    <div>
                        <p class="fw-bold">{{ $products[$i]->name }}</p>
                        <p class="m-0">Rp.{{ number_format($products[$i]->price,0) }} <span>x {{ $carts[$i]->quantity }}</span></p>
                    </div>
                        <div>
                        {{-- quantity --}}
                            <p class="m-0">Rp.{{ number_format($products[$i]->price * $carts[$i]->quantity,0) }}</p>
                        </div>
                    </div>
             </div>
            @endfor

        @else
            <p>Your cart is empty</p>
        @endif

    </div>
    <div class="col">
        <h4 class="mb-3">Payment</h4>

        <div class="d-flex flex-column justify-content-between">
            <div>
                <h5 class="mb-3">Payment method</h5>
                <div class="border rounded p-2 mb-5">
                    <p class="text-center m-0">BCA</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1">Total bayar</h6>
                    <h4 class="m-0">Rp.{{ number_format($totalPrice, 0) }}</h4>
                </div>

                <form action="/checkout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark">Pay</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
