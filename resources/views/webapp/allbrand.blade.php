@extends('webapp.layouts.app')
@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->

@endpush
@section('content')

<header class="header allhedtop" >
 <div class="innerwapperbox">
      <a class="leftarrowicon" href="{{ route('home') }}"><i class="bi bi-arrow-left"></i></a> <span>Choose Your favourite Brand</span>
  </div>
    </header>
<div class="allBrandbox">
    <div class="innerwapperbox">
        <ul class="catelistbox">
            @foreach ($brands as $brand)
                <li>
                    <a href="{{ route('sub_brands', ['id' => $brand->id]) }}" class="brandSecbx">
                        <img class="img-fluid brand-img" 
                             src="{{ 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $brand->photo }}" 
                             alt="{{ $brand->name }}">
                        <h5>{{ $brand->name }}</h5>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection


