@extends('webapp.layouts.app')
@push('styles')
<link rel="stylesheet" href="../../frontend/frontend.css" />
<link rel="stylesheet" href="../../frontend/productdetail.css" />
@endpush
@section('content')
<div class="">
        <!-- <div class="header">
            <span onclick="history.back()">&#8592;</span>
            <h2>Product Details</h2>
            <span>&#9742;</span>
        </div>
      -->
        
<header class="header allhedtop" >
 <div class="innerwapperbox">
      <a onclick="history.back()" class="leftarrowicon" href="#"><i class="bi bi-arrow-left"></i></a> <span>Product Details</span>

      <div class="peoduct_detailshed">
        <a href="#"><i class="bi bi-telephone-fill"></i></a>
        <a href="#"><i class="bi bi-share-fill"></i></a>
    </div>
  </div>
    </header>








    <div class="innerwapperbox">
   
        
        <div class="product-content">
            <div class="product-images">
                <div class="slider-container">
                    <div class="main-slider">
                    @foreach ($product->photos ?? [] as $photo)
                        <div class="slide">
                            <img src="{{ $product->first_photo }}" alt="{{ $product->title }}">
                        </div>
                        @endforeach
                       
                    </div>
                    
                    <button class="slider-btn prev">❮</button>
                    <button class="slider-btn next">❯</button>
                </div>

                <div class="thumbnail-container">
                    <div class="thumbnail-slider">
                    @foreach ($product->photos ?? [] as $photo)
                        <div class="thumbnail active" data-index="0">
                            <img src="{{ $product->first_photo }}" alt="{{ $product->title }}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>




     

          
        
            <div class="product-details">
                <div class="product-title-container">
                    <h2>{{ $product->title }}</h2>
                    <button class="wishlist-btn" data-product-id="{{ $product->id }}">
                    <i id="heart-icon-{{ $product->id }}" class="bi bi-heart {{ (session('wishlist') && in_array($product->id, session('wishlist'))) ? 'active' : '' }}"></i>
                    <!-- <i class="bi bi-heart {{ (session('wishlist') && in_array($product->id, session('wishlist'))) ? 'active' : '' }}"></i> -->
                </button>
                </div>
                
                <div class="price-container">
                    <span class="current-price">₹{{ number_format($product->sale_price, 2) }}</span>
                    @if ($product->regular_price > $product->sale_price)
                    <span class="original-price">₹{{ number_format($product->regular_price, 2) }}</span>
                    @endif
                </div>
          

           


                <table class="specs-table">
                    <tr>
                        <th class="specs-tab active" data-tab="specs">Key Specs</th>
                        <th class="specs-tab" data-tab="description">Description</th>
                    </tr>
                </table>
                
                <div class="tab-content">
                    <ul class="specs-list active" data-content="specs">
                    <li><b>Model No:</b> {{ $product->modelno ?? 'N/A' }}</li>
    <li><b>Specifications:</b> {{ $product->specifications ?? 'N/A' }}</li>
    <li><b>Length:</b> {{ $product->length ?? 'N/A' }}</li>
    <li><b>Breadth:</b> {{ $product->breadth ?? 'N/A' }}</li>
    <li><b>Height:</b> {{ $product->height ?? 'N/A' }}</li>
    <li><b>Weight:</b> {{ $product->weight ?? 'N/A' }}</li>
                    </ul>
                    
                    <div class="specs-list" data-content="description">
                    <p>{{ $product->description ?? 'No description available.' }}</p>
</div>
                </div>
                

            </div>
        </div>





  <div class="product-footer">
    <div class="action-buttons">
    @if ($product->available_stock > 0 && $product->stock_status === 'in_stock')
    <form action="{{ route('cart.add') }}" method="POST" style="flex: 1; margin-right: 5px;">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="title" value="{{ $product->title }}">
        <input type="hidden" name="price" value="{{ $product->sale_price }}">
        <input type="hidden" name="photo" value="{{ $product->photos[0]['image'] ?? '' }}">
        <input type="hidden" name="action" value="cart">
        <button type="submit" class="active-2 btn btn-add-to-cart" ><i class="bi bi-cart-plus"></i> Add To Cart</button>
    </form>
 


        <form action="{{ route('cart.add') }}" method="POST" style="flex: 1;">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="title" value="{{ $product->title }}">
        <input type="hidden" name="price" value="{{ $product->sale_price }}">
        <input type="hidden" name="photo" value="{{ $product->photos[0]['image'] ?? '' }}">
        <input type="hidden" name="action" value="buy_now">
        <button type="submit" class="active-2 btn btn-buy-now" style="width: 100%;"> <i class="bi bi-bag-check"></i> Buy Now</button>
    </form>

    @else
          <button class="btn out-of-stock" disabled>Out of Stock</button>
        @endif
            </div>
       
    </div>
</div>

</div>



@endsection 



@push('scripts')
<script>
        function showTab(event,tabId) {
            document.querySelectorAll('.tab-content').forEach(div => {
                div.classList.remove('active');
            });
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>










<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mainSlider = document.querySelector('.main-slider');
                    const slides = document.querySelectorAll('.main-slider .slide');
                    const thumbnails = document.querySelectorAll('.thumbnail');
                    const prevBtn = document.querySelector('.prev');
                    const nextBtn = document.querySelector('.next');
                    
                    let currentSlide = 0;
                    const slideCount = slides.length;
                    
                    // Initialize slider
                    function initSlider() {
                        updateSlider();
                        
                        // Event listeners
                        prevBtn.addEventListener('click', prevSlide);
                        nextBtn.addEventListener('click', nextSlide);
                        
                        // Thumbnail click events
                        thumbnails.forEach(thumbnail => {
                            thumbnail.addEventListener('click', function() {
                                const index = parseInt(this.getAttribute('data-index'));
                                goToSlide(index);
                            });
                        });
                    }
                    
                    // Update slider position and thumbnails
                    function updateSlider() {
                        mainSlider.style.transform = `translateX(-${currentSlide * 100}%)`;
                        
                        thumbnails.forEach((thumb, index) => {
                            thumb.classList.toggle('active', index === currentSlide);
                        });
                    }
                    
                    // Go to specific slide
                    function goToSlide(index) {
                        currentSlide = (index + slideCount) % slideCount;
                        updateSlider();
                    }
                    
                    // Next slide
                    function nextSlide() {
                        currentSlide = (currentSlide + 1) % slideCount;
                        updateSlider();
                    }
                    
                    // Previous slide
                    function prevSlide() {
                        currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                        updateSlider();
                    }
                    
                    // Initialize the slider
                    initSlider();
                });
            </script>



                


                
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.specs-tab');
        const contentItems = document.querySelectorAll('.specs-list');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Update active content
                contentItems.forEach(content => {
                    content.classList.remove('active');
                    if(content.getAttribute('data-content') === tabName) {
                        content.classList.add('active');
                    }
                });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listeners for the buttons
        document.querySelector('.btn-add-to-cart').addEventListener('click', function() {
            // Add your cart functionality here
            console.log('Added to cart');
        });
        
        document.querySelector('.btn-buy-now').addEventListener('click', function() {
            // Add your buy now functionality here
            console.log('Buy now clicked');
        });
    });
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
