@extends('webapp.layouts.app')

@section('content')
<!-- <a href="{{ route('profile') }}" class="position-absolute" style="top: 10px; left: 55px; font-size: 34px; color: black; text-decoration: none;">
    &larr;
</a> -->

<header class="header allhedtop" >
 <div class="innerwapperbox">
      <a class="leftarrowicon" href="{{ route('profile') }}"><i class="bi bi-arrow-left"></i></a> <span>Order History</span>
  </div>
    </header>

<div class="container mt-4">
    <!-- <h2 class="text-center">Your Orders</h2> -->

    @if(isset($orders) && count($orders) > 0)
        <div class="row">
            @foreach($orders as $order)
                <div class="col-md-6">
                    <!-- <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                            <p class="card-text">Total Price: ₹{{ $order->total_price }}</p>
                            <p class="card-text">Status: <strong>{{ ucfirst($order->status) }}</strong></p>
                            <a href="{{ route('order.details', ['id' => $order->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div> -->


                    <a href="{{ route('order.details', ['id' => $order->id]) }}" class="card orderhistorycard">
                        <div class="top_orderhistorycard">
                            <div class="product_orderhistorycard">
                                <div class="image-box_orderhistorycard">
                                    <img src="https://s3.ap-south-1.amazonaws.com/chaloonline.in/1/product/173870113567a2794f803995.78509907.webp" alt="Phone Image">
                                </div>
                                <div class="details_orderhistorycard">
                                    <h4> {{ $order->id }}</h4>
                                    <div class="amount-status-line_orderhistorycard">
                                        <span class="amount_orderhistorycard">₹{{ $order->total_price }}</span>
                                        <p>Status : <span class="status-badge_orderhistorycard">{{ ucfirst($order->status) }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="qr-icon_orderhistorycard">
                                <i class="bi bi-qr-code_orderhistorycard"></i>
                            </div>
                        </div>
                        <div class="buttons_orderhistorycard">
                            <button class="btn_orderhistorycard review_orderhistorycard"><a href="Review.html">Review</a></button>
                            <button class="btn_orderhistorycard support_orderhistorycard">Support</button>
                        </div>
                    </a>



                 

                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">You have no orders yet.</p>


   
    @endif
</div>
@endsection
