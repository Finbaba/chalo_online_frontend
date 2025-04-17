@extends('webapp.layouts.app')
@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->
 <style>
.succefully-container {
  text-align: center;
  max-width: 400px;
  margin: 0 auto;
}

.iconsuccefully {
margin:15px 0;
float:left;
width:100%;
}
.iconsuccefully img{
    max-height:120px;
}
h2 {
  margin-top: 20px;
  font-size: 24px;
}

p {
  margin: 10px 0;
}

.details-box {
  background: #f9f9f9;
  border-radius: 10px;
  padding: 20px;
  margin: 30px 0 10px 0;
  text-align: left;
  box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
  /* Soft shadow */
}



.details-box .details-heading {
    padding: 10px 0 20px 0;
    font-size: 18px;
    border-bottom: 1px dashed #d6d6d6;
    margin-bottom: 20px;
    font-weight: bold;


}

.details-box strong {
    display: block;
    margin-top: -9px;
    font-size: 14px;
    font-weight: 600;
}



    </style>
@endpush
@section('content')
   
@endsection



<div class="innerwapperbox">
<div class="succefully-container">
            <div class="iconsuccefully"><img src="../images/party-popper.png" alt=""/></div>
            <h2>Successfully Ordered</h2>
            <p>You have successfully your order and we are<br>delivered to you within 3 days max
            </p>
            <p><strong>"Keep An Eye On Your Notifications!"</strong></p>

            <div class="details-box">
                <h3 class="details-heading">Details</h3>
                <p>Order Status</p>
                <strong>Successful</strong>
                <p>Total Amount</p>
                <strong>2999.0</strong>
                <p>Request ID</p>
                <strong>SPLZ2189-1744348102</strong>
                <p>Payment Status</p>
                <strong>paid</strong>
            </div>

            
        </div>
        
    <div class="maxbtnbox">
            <button  onclick="window.location.href='{{ route('home') }}'" class="checkout-btn ">Explore More</button>
</div>
</div>
@push('scripts')

@endpush
