@extends('webapp.layouts.app')
@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->
@endpush
@section('content')
<header class="header allhedtop" >
 <div class="innerwapperbox" style="    position: relative;">
      <a class="leftarrowicon" onclick="history.back()"  href="#"><i class="bi bi-arrow-left"></i></a> <span>QR Code</span>
      
  </div>
    </header>

<div class="innerwapperbox">
<div class="qr-container">
                <img src="../images/QR.png" alt="QR Code">
            </div>
    <div class="maxbtnbox">
            <button onclick="window.location.href='{{ route('SuccessfullyOrdered') }}'"  class="checkout-btn ">Next</button>
</div>
</div>
@endsection



@push('scripts')

@endpush
