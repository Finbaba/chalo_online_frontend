@extends('webapp.layouts.app')
@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->
<style>
    .category-circle {
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
@endpush
@section('content')
   
@endsection

@section('title', 'Choose Your Categories')


<div class="container">
    <h2 class="text-center mb-4">Choose Your Categories</h2>
    <div class="row justify-content-center">
        @foreach ($categories as $category)
            <div class="col-md-4 col-sm-6 col-12 mb-4 d-flex justify-content-center">
                <div class="category-circle">
                    <span>{{ $category->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection



@push('scripts')

@endpush
