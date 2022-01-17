@extends('master')

@section('content')

<div class="container">
    <h3>Transaction History</h3>

    @if (count($histories) > 0)
        @for ($i=0;$i<$histories->count();$i++)
        {{-- history 1 --}}
        <div class="history-container mb-3" style="border: rgb(179, 173, 149) 1px solid; border-radius: 5px">
            <div class="card mb-3" style="border: none; border-bottom: 1px solid darkgrey">
                <div class="card-body d-flex">
                    <div>
                        <img src="{{asset($products[$i]->imgPath)}}" alt="" class="img-shoppingcart-item">
                    </div>
                <div class="content-body d-flex justify-content-between" style="width: 1000px">
                    <div>
                        <p class="fw-bold">{{$products[$i]->name}}</p>
                        <p>Rp.{{number_format($products[$i]->price,0)}}</p>
                    </div>
                    <div>
                        <p class="pt-3 text-center">x{{$transaction_details[$i]->quantity}}</p>
                    </div>
                </div>
                </div>
            </div>
            <strong class="d-flex justify-content-end me-3">Total : Rp.{{number_format($products[$i]->price * $transaction_details[$i]->quantity,0)}}</strong>
        </div>
    @endfor
@else
<p>Your History Transaction is empty</p>
@endif

@endsection
