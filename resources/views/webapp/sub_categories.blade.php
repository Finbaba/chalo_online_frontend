@extends('webapp.layouts.app')

@section('content')
    <div class="">

        <header class="header allhedtop">
            <div class="innerwapperbox">
                <a class="leftarrowicon" href="{{ route('categories') }}"><i class="bi bi-arrow-left"></i></a>
                <span>{{ $category->name }}</span>
            </div>
        </header>

        @if($products->count())
                <div class="row">






                    <div class="innerwapperbox">

                        <div class="gridprosec">
                            <ul>
                                @foreach($products as $product)
                                    <li>
                                        <a href="{{ route('product.show', ['id' => $product->id]) }}" class="productbx">
                                            <div class="productbox">
                                                <div class="pro_offer">
                                                    Limited Stock
                                                </div>
                                                <div class="pro_main">
                                                    <div class="pro_img">
                                                        @if($product->photo)
                                                            <img src="https://s3.ap-south-1.amazonaws.com/chaloonline.in/{{ ltrim($product->photo, '/') }}"
                                                                alt="{{ $product->title }}" width="100">

                                                        @else
                                                            <img src="{{ asset('images/default-product.png') }}" alt="No Image" width="100">
                                                        @endif

                                                    </div>
                                                    <div class="pro_title">
                                                        {{ $product->title }}
                                                    </div>
                                                    <div class="pro_price">
                                                        <div class="pro_price_left">
                                                            ₹ 2499.00<br />
                                                            <span class="redcprice">₹{{ number_format($product->sale_price, 2) }}</span>
                                                        </div>
                                                        <div class="pro_price_right">
                                                            <button><img src="../images/whatsapp.png" /></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>










                <!-- 
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="product-card">

                                    @if($product->photo)
                                        <img src="https://s3.ap-south-1.amazonaws.com/chaloonline.in/{{ ltrim($product->photo, '/') }}" alt="{{ $product->title }}" width="100">

                                    @else
                                        <img src="{{ asset('images/default-product.png') }}" alt="No Image" width="100">
                                    @endif


                                    <h5>{{ $product->title }}</h5>
                                    <p>₹{{ number_format($product->sale_price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach -->
            </div>
        @else
            <p style="text-align: center;">No products found for this category.</p>
        @endif
    </div>
@endsection