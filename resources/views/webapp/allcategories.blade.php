
@extends('webapp.layouts.app')

@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->
@endpush

@section('content')

<header class="header allhedtop">
    <div class="innerwapperbox">
        <a class="leftarrowicon" href="{{ route('home') }}">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span>All Categories</span>
    </div>
</header>


<div class="allCategorybox">
    <div class="innerwapperbox">
        <ul class="catelistbox">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('sub_categories', ['id' => $category->id]) }}" class="categorySecbx">
                        <img class="img-fluid category-img" 
                             src="{{ 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $category->photo }}" 
                             alt="{{ $category->name }}">
                        <h5>{{ $category->name }}</h5>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection



