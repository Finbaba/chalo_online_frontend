@extends('layout')

@section('title', 'CHOOSE YOUR FAVOURATES BRAND')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Choose Your Brands</h2>
    <div class="row justify-content-center">
        @foreach ($favourites as $favourite)
            <div class="col-md-4 col-sm-6 col-12 mb-4 d-flex justify-content-center">
                <div class="favourite-circle">
                    <span>{{ $favourite->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .favourite-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #333;
        /* Optional: add a border or shadow */
        border: 2px solid #ccc;
    }
</style>

