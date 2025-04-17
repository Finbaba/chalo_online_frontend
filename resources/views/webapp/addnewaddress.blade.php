@extends('webapp.layouts.app')
@push('styles')
@endpush

@section('content')

<header class="header allhedtop">
    <div class="innerwapperbox" style="position: relative;">
        <a class="leftarrowicon" onclick="history.back()" href="#"><i class="bi bi-arrow-left"></i></a>
        <span>Add New Address</span>
    </div>
</header>

<div class="innerwapperbox">
    <div class="addnewAdd_box">
        <form action="{{ route('saveaddress') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" name="fullname" class="form-control shadow-md" placeholder="Customer Name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address Type</label>
                <select name="address_type" class="form-control shadow-md" required>
                    <option value="">Select Type</option>
                    <option value="home">Home</option>
                    <option value="office">Office</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="text" name="phone" class="form-control shadow-md" placeholder="Enter Your Mobile Number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address_line1" class="form-control shadow-md" placeholder="Enter address" required>
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control shadow-md" placeholder="Enter city" required>
            </div>
            <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control shadow-md" placeholder="Enter state" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Postal Code</label>
                <input type="text" name="postal_code" class="form-control shadow-md" placeholder="Enter postal code" required>
            </div>
            <div class="maxbtnbox">
                <button type="submit" class="checkout-btn">Save Address</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
@endpush
