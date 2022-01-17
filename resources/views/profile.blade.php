@extends('master')

@section('content')

<div class="container">
    <h3>Profile</h3>
    <div class="profile-content">
        {{-- profile picture --}}
        @foreach ($users as $user)
        <div class="fullname-text">
            <span class="fw-bold">Full Name : </span>
            <p>{{$user->firstName}} {{$user->lastName}}</p>
        </div>
        <hr>
        <div class="phonenum-text">
            <span class="fw-bold">Phone Number : </span>
            <p>{{$user->phoneNumber}}</p>
        </div>
        <hr>
        <div class="email-text">
            <span class="fw-bold">Email : </span>
            <p>{{$user->email}}</p>
        </div>

        @endforeach
        <div class="text-center">
            <button class="bg-danger p-2 mb-3 fw-bold" style="border-radius: 5px; border: none; color: white">Edit Profile</button>
        </div>


    </div>

</div>


@endsection
