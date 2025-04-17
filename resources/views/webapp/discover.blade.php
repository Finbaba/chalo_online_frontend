@extends('webapp.layouts.app')
@push('styles')
<link rel="stylesheet" href="../frontend/discover.css" />
@endpush
@section('content')
    <div class="fullbox">

<div class="header innerhed"><h2>Discover More Products</h2></div>
 <!-- Search Bar -->
    <div class="homeSearch">
    <div class="innerwapperbox">
        <input type="text" class="form-control" placeholder="Search products, brands">
        </div>
    </div>
 <div class="innerwapperbox">
<!-- Filter + Sort -->
<div class="filter-sort-container">
    <div class="filter" onclick="openPopup('popup')">
        <span>Filter</span>
        <i class="bi bi-three-dots"></i>
    </div>
    <div class="sort" onclick="openPopup('sortPopup')">
        <span>Sort</span>
        <i class="bi bi-three-dots"></i>
    </div>
</div>
</div>

<!-- Filter Popup -->
<div class="popup-bg FilterPopbx" id="popup">
    <div class="popup-content">
        <form method="GET" action="{{ route('discover') }}">
            <h5 style="font-weight: bold;">Filter by Price</h5>

            @php
                $filters = request('price_filter', []);
                if (!is_array($filters)) {
                    $filters = [$filters];
                }
            @endphp

            <div>
                <input type="checkbox" id="under1k" name="price_filter[]" value="under_1000" {{ in_array('under_1000', $filters) ? 'checked' : '' }}>
                <label for="under1k">Under ₹1,000</label>
            </div>
            <div>
                <input type="checkbox" id="under5k" name="price_filter[]" value="under_5000" {{ in_array('under_5000', $filters) ? 'checked' : '' }}>
                <label for="under5k">Under ₹5,000</label>
            </div>
            <div>
                <input type="checkbox" id="under10k" name="price_filter[]" value="under_10000" {{ in_array('under_10000', $filters) ? 'checked' : '' }}>
                <label for="under10k">Under ₹10,000</label>
            </div>
            <div>
                <input type="checkbox" id="under15k" name="price_filter[]" value="under_15000" {{ in_array('under_15000', $filters) ? 'checked' : '' }}>
                <label for="under15k">Under ₹15,000</label>
            </div>
            <div>
                <input type="checkbox" id="above20k" name="price_filter[]" value="above_20000" {{ in_array('above_20000', $filters) ? 'checked' : '' }}>
                <label for="above20k">Above ₹20,000</label>
            </div>

            <div class="popup-footer">
                <span onclick="closePopup('popup')">Cancel</span>
                <span class="darkbtn" onclick="this.closest('form').submit()">Apply</span>
            </div>
        </form>
    </div>
</div>

<!-- Sort Popup -->
<div class="popup-bg FilterPopbx" id="sortPopup">
    <div class="popup-content">
        <form method="GET" action="{{ route('discover') }}">
            <h5 style="font-weight: bold;">Sort by</h5>

            @php
                $sort_by = request('sort_by');
            @endphp

            <div>
                <input type="radio" id="lowToHigh" name="sort_by" value="price_asc" {{ $sort_by == 'price_asc' ? 'checked' : '' }}>
                <label for="lowToHigh">Price: Low to High</label>
            </div>
            <div>
                <input type="radio" id="highToLow" name="sort_by" value="price_desc" {{ $sort_by == 'price_desc' ? 'checked' : '' }}>
                <label for="highToLow">Price: High to Low</label>
            </div>
            <div>
                <input type="radio" id="az" name="sort_by" value="name_asc" {{ $sort_by == 'name_asc' ? 'checked' : '' }}>
                <label for="az">Name: A-Z</label>
            </div>
            <div>
                <input type="radio" id="za" name="sort_by" value="name_desc" {{ $sort_by == 'name_desc' ? 'checked' : '' }}>
                <label for="za">Name: Z-A</label>
            </div>

            <div class="popup-footer">
                <span onclick="closePopup('sortPopup')">Cancel</span>
                <span  class="darkbtn" onclick="this.closest('form').submit()">Apply</span>
            </div>
        </form>
    </div>
</div>


<div class="innerwapperbox">


    <div class="row">
	
	
	
<div class="productslider">
    
<div class="gridprosec">
    <ul>

        @php
            $selectedFilters = request('price_filter', []);
            if (!is_array($selectedFilters)) {
                $selectedFilters = [$selectedFilters];
            }

            $sort_by = request('sort_by');

            $products = $products->filter(function($product) use ($selectedFilters) {
                $salePrice = $product->sale_price;
                return empty($selectedFilters) || collect($selectedFilters)->contains(function ($filter) use ($salePrice) {
                    return
                        ($filter == 'under_1000' && $salePrice <= 1000) ||
                        ($filter == 'under_5000' && $salePrice <= 5000) ||
                        ($filter == 'under_10000' && $salePrice <= 10000) ||
                        ($filter == 'under_15000' && $salePrice <= 15000) ||
                        ($filter == 'above_20000' && $salePrice > 20000);
                });
            });

            $products = match($sort_by) {
                'price_asc' => $products->sortBy('sale_price'),
                'price_desc' => $products->sortByDesc('sale_price'),
                'name_asc' => $products->sortBy('title'),
                'name_desc' => $products->sortByDesc('title'),
                default => $products
            };
        @endphp

        @foreach ($products as $product)
            <li class="product-item">
                <!-- Product details ko ek clickable link ke through wrap kar rahe hain -->
                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="productbx">
                    <div class="productbox">
                        <!-- Optional: "Limited Stock" label -->
                        <div class="pro_offer">
                            {{$product->stock_status}}
                        </div>
                        <div class="pro_main">
                            <!-- Product image -->
                            <div class="pro_img">
                                @if($product->first_photo)
                                    <img src="{{ asset($product->first_photo) }}" alt="{{ $product->title }}" />
                                @else
                                    <img src="{{ asset('images/product-default.png') }}" alt="{{ $product->title }}" />
                                @endif
                            </div>
                            <!-- Product title -->
                            <div class="pro_title">
                                {{ $product->title }}
                            </div>
                            <!-- Product price and WhatsApp button -->
                            <div class="pro_price">
                                <div class="pro_price_left">
                                    ₹{{ number_format($product->sale_price, 2) }}<br>
                                    <span class="redcprice">₹{{ number_format($product->compare_price, 2) }}</span>
                                </div>
                                <div class="pro_price_right">
                                    <button type="button">
                                        <img src="{{ asset('images/whatsapp.png') }}" alt="Whatsapp" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Wishlist Button - ye button har product ke li ke andar alag hai -->
                <button class="wishlist-btn" data-product-id="{{ $product->id }}">
                    <i id="heart-icon-{{ $product->id }}" class="bi bi-heart {{ (session('wishlist') && in_array($product->id, session('wishlist'))) ? 'active' : '' }}"></i>
                    <!-- <i class="bi bi-heart {{ (session('wishlist') && in_array($product->id, session('wishlist'))) ? 'active' : '' }}"></i> -->
                </button>
            </li>
        @endforeach

    </ul>
</div>
</div>


    </div>
</div>
</div>

@include('webapp.layouts.footer')
@endsection



@push('scripts')
<script>
    function openPopup(id) {
        document.getElementById(id).style.display = 'flex';
    }
    function closePopup(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>
@endpush


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.wishlist-btn').on('click', function(e) {
        e.preventDefault();
        let btn = $(this);
        let productId = btn.data('product-id');
    
        $.ajax({
            url: '{{ route("wishlist.toggle") }}',
            type: 'POST',
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Sirf clicked button ke icon me class toggle karo
                    if (response.action === 'added') {
                        btn.find('i.bi-heart').addClass('active');
                    } else {
                        btn.find('i.bi-heart').removeClass('active');
                    }
    
                    $('#wishlistCount').text(response.wishlistCount);
                }
            }
        });
    });

</script>
@endpush 


 