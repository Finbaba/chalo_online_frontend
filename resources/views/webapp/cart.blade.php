@extends('webapp.layouts.app')
@section('content')
<div class="fullbox">
@if(request()->routeIs('cart'))
    <header class="header allhedtop" >
      <div class="innerwapperbox">
        My Cart
  </div>
    </header>
@endif


<div class="innerwapperbox">
<div class="row">
  <div class="col-md-8">
  @php 
    $grandTotal = 0; 
    $totalItems = 0; 
  @endphp
  @if(count($cart) > 0)
    
    <table class="table table-bordered mt-3">
        <!-- <thead class="thead-light">
            <tr>
                <th>Product Details</th>

                <th>Total</th>
            </tr>
        </thead> -->
        <tbody>
            @foreach($cart as $key => $item)
                @php
                    $itemTotal = $item['price'] * $item['quantity'];
                    $grandTotal += $itemTotal;
                    $totalItems += $item['quantity'];
                @endphp
                <tr>

                    <td>
                  
                  
                  <div class="productcard">
                  <div class="productcard_left">
                  <img src="https://s3.ap-south-1.amazonaws.com/chaloonline.in/{{ $item['photo'] }}" width="60">
                  </div>
                  <div class="productcard_right">
                  {{ $item['title'] }}
                  <p class="cartprice">₹{{ number_format($item['price'], 2) }}</p>
                      </div>
                  </div>
                  
                  </td>
                   
            
                    <!-- <td>{{ $item['quantity'] }}</td> -->
                    <td>
                      
                    <div class="prototalprice">₹{{ number_format($itemTotal, 2) }}</div>

                    <form action="{{ route('cart.update', $key) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary btndarkcart ml-0">-</button>
                            <div>{{ $item['quantity'] }}</div>
                            <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary btndarkcart">+</button>
                              <button class="redbtn"><i class="bi bi-trash3"></i></button>
                            
                        </form>

                    </td>

                </tr>
            @endforeach
            <tr>
                <td class="text-right"><strong>Grand Total:</strong></td>
                <td><strong>₹{{ number_format($grandTotal, 2) }}</strong></td>

            </tr>
        </tbody>
    </table>
      
    @else
        <div class="alert alert-info mt-3">
            Your cart is empty.
        </div>
        <button onclick="window.location.href='{{ route('discover') }}'" 
          style="background: linear-gradient(to bottom, brown, orange); color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 5px;">
                Let's start shopping
        </button>
    @endif
</div>
<div class="col-md-4">
<div class="summary">
    <div class="summary-item">
      <span>Total Items</span>
      <span>{{$totalItems}}</span>
    </div>
    <div class="summary-item">
      <span>Subtotal Price</span>
      <span>{{$grandTotal}}</span>
    </div>
    <div class="summary-item">
      <span>Item Discount</span>
      <span>- Rs 00</span>
    </div>
    <div class="summary-item">
      <span>Tax</span>
      <span>Rs 0</span>
    </div>
    <div class="summary-item">
      <span>Shipping Charges</span>
      <span>Rs 0</span>
    </div>
    <div class="summary-item summary-total">
      <span>Total</span>
      <span>₹{{ number_format($grandTotal ?? 0, 2) }}</span>

    </div>
    <button onclick="window.location.href='{{ route('checkout') }}'" class="checkout-btn ">Check Out</button>
  </div>
</div>

</div>

 



</div>

</div>

@include('webapp.layouts.footer')
@endsection