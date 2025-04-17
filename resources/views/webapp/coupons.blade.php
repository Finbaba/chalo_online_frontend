@extends('webapp.layouts.app')

@section('content')

    <header class="header allhedtop">
        <div class="innerwapperbox">
            <a class="leftarrowicon" onclick="history.back()" href="#"><i class="bi bi-arrow-left"></i></a>
            <span>Your Coupons</span>
        </div>
    </header>

    <div class="innerwapperbox">
        <div class="couponFullbox">
            <div class="row">
                @forelse ($coupans as $coupan)
                    <div class="col-md-4 mb-3">
                        <div class="coupon-card">
                            <h1>{{ $coupan->code }}</h1>
                            <h2>{{ $coupan->slug }}</h2>
                            <h3>
                                @if ($coupan->discount_type == 'percentage')
                                    {{ $coupan->discount_amount }}% off, Max Discount ₹{{ $coupan->max_discount_amount }}
                                @else
                                    Flat ₹{{ $coupan->discount_amount }} off
                                @endif
                            </h3>
                            <div class="coupon-row">
                                <form action="{{ route('apply.coupon') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="code" value="{{ $coupan->code }}">
                                    <button type="submit">Apply Coupon</button>
                                </form>


                                @if (session('coupon_error'))
                                    <div class="alert alert-danger">{{ session('coupon_error') }}</div>
                                @endif

                            </div>
                            <p>Valid Till: {{ \Carbon\Carbon::parse($coupan->expiry_date)->format('d/m/Y') }}</p>
                            <div class="circle1"></div>
                            <div class="circle2"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No coupons available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(code) {
            navigator.clipboard.writeText(code);
            alert("Coupon Code Copied: " + code);
        }
    </script>
@endsection