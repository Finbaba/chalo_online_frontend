@extends('webapp.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../frontend/home.css" />
@endpush
@section('content')
    <div class="fullbox">
        <!-- Header Section -->
        <header class="header">
            <div class="innerwapperbox">
                <div class="hedbox">
                    <div class="left">
                        <h3>Welcome to Sparsh Plaza</h3>
                        <p style="margin: 0; font-size: 14px;">Find anything what you want</p>
                    </div>
                    <div class="right">
                        <a class="notification" href="{{ route('notification') }}"><i class="bi bi-bell"></i></a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section-->

        <!-- Search Bar -->
        <div class="homeSearch">
            <div class="innerwapperbox">
                <input type="text" class="form-control" placeholder="Search products, brands" />
            </div>
        </div>
        <div class="wapperbox">
            <div class="innerwapperbox">
                <!-- Choose From Categories start-->
                @foreach ($homeSections as $section)

                            @if($section['type'] == 'category')


                                <div class="categorybox">
                                    <div class="SecTitlebox">
                                        <div class="SecTitlebox_left">
                                            {{ $section['title'] }}
                                        </div>
                                        <a class="SecTitlebox_right" href="{{ route('categories') }}">View All</a>
                                    </div>
                                    <div class="swiper-container categorySlider">
                                        <ul class="swiper-wrapper">
                                            @foreach($section['list'] as $category)
                                                <li class="swiper-slide">
                                                    <a href="{{ route('categories') }}" class="categorySecbx">
                                                        <img class="img-fluid category-img"
                                                            src="{{ 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $category->photo }}"
                                                            alt="{{ $category->name }}" />
                                                        <h5>{{ $category->name }}</h5>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <!-- Choose From Categories end-->

                            <!--  Choose Your favourite Brand start-->
                            @if($section['type'] == 'brand')

                                <div class="brandbox">
                                    <div class="SecTitlebox">
                                        <div class="SecTitlebox_left">
                                            {{  $section['title']}}
                                        </div>
                                        <a class="SecTitlebox_right" href="{{ route('brands') }}">View All</a>
                                    </div>
                                    <div class="swiper-container BrandSlider">
                                        <ul class="swiper-wrapper">
                                            @foreach($section['list'] as $brand)
                                                <li class="swiper-slide">
                                                    <a href="{{ route('brands') }}" class="categorySecbx">
                                                        <img class="img-fluid category-img"
                                                            src="{{ 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $brand->photo }}"
                                                            alt="{{ $brand->name }}" />
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <!--  Choose Your favourite Brand end-->

                            <!--  Image slider start-->
                            @if($section['type'] == 'slider')

                                <div class="bannersliderbox">
                                    <div class="swiper-container bannerSlider">
                                        <ul class="swiper-wrapper">
                                            @foreach($section['list'] as $slider)

                                                <li class="swiper-slide">
                                                    <a href="#" class="bannerimg">
                                                        <img class="img-fluid category-img"
                                                            src="{{ 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $slider->image }}"
                                                            alt="category" />
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    </di>
                            @endif

                                <!--  Image slider start-->

                                <!--  Product slidert-->
                                @if($section['type'] == 'product')

                                                <div class="productslider">
                                                    <div class="SecTitlebox">
                                                        <div class="SecTitlebox_left">
                                                            {{ $section['title'] }}
                                                        </div>

                                                        @php
                                                            $firstProduct = $section['list'][0] ?? null;
                                                        @endphp

                                                        @if ($firstProduct)
                                                            <a class="SecTitlebox_right"
                                                                href="{{ route('product.show', ['id' => $firstProduct->id]) }}">View All</a>
                                                        @endif
                                                    </div>

                                                    <div class="swiper-container ProductSlider">
                                                        <ul class="swiper-wrapper">

                                                            @foreach($section['list'] as $product)
                                                                <li class="swiper-slide">
                                                                    <a href="{{ route('product.show', ['id' => $product->id]) }}" class="productbx">
                                                                        <div class="productbox">
                                                                            <div class="pro_offer">
                                                                                Limited Stock
                                                                            </div>
                                                                            <div class="pro_main">
                                                                                <div class="pro_img">
                                                                                    <img
                                                                                        src="{{ isset($product->photos[0]['thumbnail']) ? 'https://s3.ap-south-1.amazonaws.com/chaloonline.in/' . $product->photos[0]['thumbnail'] : asset('no-image.png') }}" />
                                                                                </div>
                                                                                <div class="pro_title">
                                                                                    {{ $product->title }}
                                                                                </div>
                                                                                <div class="pro_price">
                                                                                    <div class="pro_price_left">
                                                                                        ₹ {{ $product->sale_price }}<br />
                                                                                        <span class="redcprice"> ₹ {{ $product->compare_price }}</span>
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
                                @endif
                @endforeach
                    <!--  Product slidert-->

                    <!-- Choose From Categories start-->
                    <!-- <div class="categorybox">

                                            <div class="SecTitlebox">
                                                <div class="SecTitlebox_left">
                                                    Choose From Categories
                                                </div>
                                                <a class="SecTitlebox_right" href="{{ route('categories') }}">View All</a>
                                            </div>
                                            <div class="swiper-container categorySlider">
                                                <ul class="swiper-wrapper">

                                                </ul>
                                            </div>
                                        </div> -->
                    <!-- Choose From Categories end-->

                    <!--  Choose Your favourite Brand start-->

                    <!--  Choose Your favourite Brand end-->

                    <!--  Image slider start-->

                    <!--  Image slider start-->

                    <!--  Product slidert-->

                    <!--<div class="productslider">
                                        <div class="SecTitlebox">
                                            <div class="SecTitlebox_left">
                                                Mobile Accessories
                                            </div>
                                            <a class="SecTitlebox_right" href="#">View All</a>
                                        </div>
                                        <div class="swiper-container ProductSlider">
                                            <ul class="swiper-wrapper">
                                                <li class="swiper-slide">
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer">
                                                                Limited Stock
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="swiper-slide">
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer green_offer">
                                                                Fixed 16% off
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="swiper-slide">
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer">
                                                                Limited Stock
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="swiper-slide">
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer red_offer">
                                                                High on Demand
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="swiper-slide">
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer">
                                                                Limited Stock
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Product slider-->

                    <!--  Product grid-->
                    <!--<div class="productslider">
                                        <div class="SecTitlebox">
                                            <div class="SecTitlebox_left">
                                                New Arrivals
                                            </div>
                                            <a class="SecTitlebox_right" href="#">View All</a>
                                        </div>
                                        <div class="gridprosec">
                                            <ul>
                                                <li>
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer">
                                                                Limited Stock
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer green_offer">
                                                                Fixed 16% off
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer">
                                                                Limited Stock
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" class="productbx">
                                                        <div class="productbox">
                                                            <div class="pro_offer red_offer">
                                                                High on Demand
                                                            </div>
                                                            <div class="pro_main">
                                                                <div class="pro_img">
                                                                    <img src="../images/product.png" />
                                                                </div>
                                                                <div class="pro_title">
                                                                    Latest Smart Mobile Phone
                                                                </div>
                                                                <div class="pro_price">
                                                                    <div class="pro_price_left">
                                                                        ₹ 2499.00<br />
                                                                        <span class="redcprice"> ₹ 2599.00</span>
                                                                    </div>
                                                                    <div class="pro_price_right">
                                                                        <button><img src="../images/whatsapp.png" /></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--  Product grid-->
                </div>
            </div>
        </div>

        <!-- <div class="main-container">
                                    <h2 class="container">CHOOSE YOUR CATEGORIES</h2>
                                    <div id="scrollable" class="scroll-container">  
                                        <div class="category-item mobile">
                                            <i class="category-icon bi bi-phone"></i>
                                            <span class="category-label">Mobile</span>
                                        </div>
                                        <div class="category-item laptops">
                                            <i class="category-icon bi bi-laptop"></i>
                                            <span class="category-label">Laptops</span>
                                        </div>
                                        <div class="category-item" style="background: linear-gradient(to right, #8e2de2, #4a00e0);">
                                            <i class="category-icon bi bi-headphones"></i>
                                            <span class="category-label">Headphones</span>
                                        </div>
                                        <div class="category-item" style="background: linear-gradient(to right, #f12711, #f5af19);">
                                            <i class="category-icon bi bi-tablet"></i>
                                            <span class="category-label">Tablets</span>
                                        </div>
                                        <div class="category-item" style="background: linear-gradient(to right, #00c6ff, #0072ff);">
                                            <i class="category-icon bi bi-smartwatch"></i>
                                            <span class="category-label">Smart Watches</span>
                                        </div>
                                        <div class="category-item" style="background: linear-gradient(to right, #11998e, #38ef7d);">
                                            <i class="category-icon bi bi-camera"></i>
                                            <span class="category-label">Cameras</span>
                                        </div>
                                        <a class="scroll-icon" href="{{ route('categories') }}">
                                            <i class="logo-2">&gt;</i>
                                        </a>
                                    </div>
                                </div> -->

        <!-- 
                                <div class="main-container-2">
                                <h2 class="container">CHOOSE YOUR FAVOURATES BRAND</h2>
                                <div id="scrollable" class="scroll-container">
                                    <div class="scroll-item laptops"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Apple</h2></div>
                                    <div class="scroll-item personal-care"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Samsung</h2></div>
                                    <div class="scroll-item mobile"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">vivo</h2></div>
                                    <div class="scroll-item laptops"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Adidas</h2></div>
                                    <div class="scroll-item personal-care"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">HP</h2></div>
                                    <div class="scroll-item mobile"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Spotify</h2></div>
                                    <div class="scroll-item laptops"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Intel</h2></div>
                                    <div class="scroll-item personal-care"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">CocaCola</h2></div>
                                    <div class="scroll-item mobile"><h2 style="color: black; font-size: small; text-align: center; margin-top: 20px;">Nested</h2></div>
                                    <a class="scroll-icon" href="{{ route('favourite') }}">
                                        <i class="logo-2">&gt;</i>
                                    </a>
                                </div>
                            </div>
                                 -->
        <!-- 
                                <div class="slider-carousel">
                                    <div class="slider-carousel">
                                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{asset('build/assets/images/phone2.jpg')}}" class="d-block w-100" alt="PNG">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{asset('build/assets/images/phone2.jpg')}}" class="d-block w-100" alt="PNG">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{asset('build/assets/images/phone2.jpg')}}" class="d-block w-100" alt="PNG">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#adCarousel" data-bs-slide-to="0" class="active"
                                                aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#adCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#adCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                    </div>
                                </div>
                                 -->

        <!-- <div class="banner">
                                    <h2 class="container-banner">NEW ARRIVAL</h2>
                                </div>
                                <div class="container py-4">



                                    <div class="row">

                                    </div>
                                </div>
                                 -->

        @include('webapp.layouts.footer')
@endsection



    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".categorySlider", {
                spaceBetween: 15,
                slidesPerView: "3",
                freeMode: true,
                centeredSlides: false,
                loop: true,
                // autoHeight: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".actuals .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-arrows .swiper-next",
                    prevEl: ".swiper-arrows .swiper-prev",
                },
                breakpoints: {
                    420: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    980: {
                        slidesPerView: 5,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    1200: {
                        slidesPerView: 8,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                    1600: {
                        slidesPerView: 9,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                },
            });
        </script>
        <script>
            var swiper = new Swiper(".BrandSlider", {
                spaceBetween: 15,
                slidesPerView: "3",
                freeMode: true,
                centeredSlides: false,
                loop: true,
                // autoHeight: true,
                autoplay: {
                    delay: 5100,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".actuals .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-arrows .swiper-next",
                    prevEl: ".swiper-arrows .swiper-prev",
                },
                breakpoints: {
                    420: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    980: {
                        slidesPerView: 5,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    1200: {
                        slidesPerView: 8,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                    1600: {
                        slidesPerView: 9,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                },
            });
        </script>

        <script>
            var swiper = new Swiper(".bannerSlider", {
                spaceBetween: 15,
                slidesPerView: "1",
                freeMode: true,
                centeredSlides: false,
                loop: true,
                // autoHeight: true,
                autoplay: {
                    delay: 5100,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".actuals .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-arrows .swiper-next",
                    prevEl: ".swiper-arrows .swiper-prev",
                },
            });
        </script>
        <script>
            var swiper = new Swiper(".ProductSlider", {
                spaceBetween: 15,
                slidesPerView: "2",
                freeMode: true,
                centeredSlides: false,
                loop: true,
                // autoHeight: true,
                autoplay: {
                    delay: 5100,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".actuals .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-arrows .swiper-next",
                    prevEl: ".swiper-arrows .swiper-prev",
                },
                breakpoints: {
                    420: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    980: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                    1600: {
                        slidesPerView: 5,
                        spaceBetween: 15,
                        centeredSlides: false,
                        pagination: false,
                        loop: false,
                    },
                },
            });
        </script>
    @endpush
