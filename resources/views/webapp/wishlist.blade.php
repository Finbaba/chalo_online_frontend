@extends('webapp.layouts.app')

@section('content')
<div class="fullbox">
    <header class="header allhedtop">
        <div class="innerwapperbox">
            <h2>Your Wishlist</h2>
        </div>
    </header>

    <div class="innerwapperbox">
        @if($wishlistProducts->count() > 0)
            <div class="wishlist-items">
                @foreach($wishlistProducts as $product)
                    <div class="wishlist-item" style="border: 1px solid #ddd; padding: 10px; margin-bottom: 15px; display: flex;">
                        <div class="wishlist-item-img" style="margin-right: 15px;">
                            <!-- Agar product ka image field 'first_photo' ya koi aur hai -->
                            @if($product->first_photo)
                                <img src="{{ asset($product->first_photo) }}" alt="{{ $product->title }}" style="width: 100px;">
                            @else
                                <img src="{{ asset('images/product-default.png') }}" alt="{{ $product->title }}" style="width: 100px;">
                            @endif
                        </div>
                        <div class="wishlist-item-details">
                            <h4 style="margin: 0 0 5px 0;">{{ $product->title }}</h4>
                            <p style="margin: 0 0 5px 0;">Price: ₹{{ number_format($product->sale_price, 2) }}</p>
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration: none; color: blue;">View Product</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                Your wishlist is empty.
            </div>
        @endif
    </div>
</div>

@include('webapp.layouts.footer')
@endsection
