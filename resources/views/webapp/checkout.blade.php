@extends('webapp.layouts.app')

@push('styles')
<link rel="stylesheet" href="../frontend/checkout.css" />
@endpush

@section('content')

<header class="header allhedtop">
    <div class="innerwapperbox">
        <a class="leftarrowicon" href="{{ route('cart') }}"><i class="bi bi-arrow-left"></i></a>
        <span>Checkout</span>
    </div>
</header>

<div class="innerwapperbox">
    <h1><i class="fas fa-shopping-cart"></i> Check Out</h1>

    <div class="checkout_section" style="position: relative;">
        <a href="{{ route('address') }}" class="change-btn">Change Address</a>
        <div class="header_checkout_section" onclick="toggleSection(this, 'address-details')">
            <div class="checkout_title">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Shipping Address</span>
            </div>
            <i class="bi bi-chevron-right toggle-icon"></i>
        </div>
        <div class="address-details">
            @if(session('selected_address'))
                <p><i class="bi bi-person-fill"></i> {{ session('selected_address')->fullname }}</p>
                <p><i class="bi bi-geo-fill"></i> {{ session('selected_address')->address_line1 }}, {{ session('selected_address')->city }}, {{ session('selected_address')->state }} - {{ session('selected_address')->postal_code }}</p>
                <p><i class="bi bi-telephone-fill"></i> {{ session('selected_address')->phone }}</p>
            @else
                <p>No address selected</p>
            @endif
        </div>
    </div>

    <div class="checkout_section">
        <div class="header_checkout_section" onclick="toggleSection(this, 'payment-details')">
            <div class="checkout_title">
                <i class="bi bi-credit-card-2-front-fill"></i>
                <span>Payment Mode</span>
            </div>
            <i class="bi bi-chevron-right toggle-icon"></i>
        </div>
        <div class="payment-details">
            <p><i class="bi bi-cash"></i> Cash</p>
        </div>
    </div>

    <div class="checkout_section lastCoupons">
        <div class="header_checkout_section" onclick="toggleSection(this, 'coupon-content')">
            <div class="checkout_title">
                <i class="bi bi-tags-fill"></i>
                <span>Coupons</span>
            </div>
            <i class="bi bi-chevron-right toggle-icon"></i>
        </div>
        <div class="coupon-content">
            <div class="couponbox">
                <div class="couponbox_left">
                    <div class="couponboximage">
                        <img src="../images/coupon.png" alt=""/>
                    </div>

                    @if (session('coupon_success'))
                        <div class="couponboximage_text">
                        @if(session('coupon_code') && session('coupon_amount'))
                            <h5>Flat ₹{{ session('coupon_amount') }} off <b>{{ session('coupon_code') }}</b>!</h5>
                        @endif
                        <p class="greentext">{{ session('coupon_message') }}</p>
                        </div>
                    @endif
                </div>
                <div class="couponbox_righ">
                    <a class="remove_coupon" href="#"><i class="bi bi-x-circle"></i></a>
                </div>
            </div>

            <a href="{{ route('coupons') }}" class="all_coupon"> View All Coupon</a>
        </div>
    </div>

    <div class="summary">
        <div class="summary-item">
            <span>Total Items</span>
            <span>{{ $totalItems ?? 0 }}</span>
        </div>
        <div class="summary-item">
            <span>Subtotal Price</span>
            <span>₹{{ number_format($grandTotal ?? 0, 2) }}</span>
        </div>
        <div class="summary-item">
            <span>Item Discount</span>
            <span>- ₹{{ session('coupon_amount') }}</span>
        </div>
        <div class="summary-item">
            <span>Tax</span>
            <span>₹0.00</span>
        </div>
        <div class="summary-item">
            <span>Shipping Charges</span>
            <span>₹0.00</span>
        </div>
        <div class="summary-item summary-total">
            @php
                $couponAmount = session('coupon_amount', 0);
                $finalAmount = ($grandTotal ?? 0) - $couponAmount;
            @endphp
            <span>Total</span>
            <span>₹{{ number_format($finalAmount, 2) }}</span>
        </div>
        <button onclick="window.location.href='{{ route('Qrcode') }}'" class="checkout-btn">Place Order</button>
        </div>
</div>

<script>
    function toggleSection(header, contentClass) {
        header.classList.toggle('active');
        let content = header.nextElementSibling;
        while (content && !content.classList.contains(contentClass)) {
            content = content.nextElementSibling;
        }

        if (content) {
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        }
    }
</script>

@endsection

@push('scripts')
@endpush