@extends('webapp.layouts.app')

@section('content')
<header class="header allhedtop">
  <div class="innerwapperbox">
    <a class="leftarrowicon" href="{{ route('address') }}"><i class="bi bi-arrow-left"></i></a>
    <span>Edit Address</span>
  </div>
</header>

<div class="innerwapperbox">
  <form action="{{ route('editaddress.update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $address->id }}">

    <div class="form-group mb-3">
      <label>Full Name</label>
      <input type="text" name="fullname" value="{{ old('fullname', $address->fullname) }}" required class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Address Type</label>
    <select name="address_type" class="form-control shadow-md" required>
        <option value="">Select Type</option>
        <option value="home" {{ $address->address_type == 'home' ? 'selected' : '' }}>Home</option>
        <option value="office" {{ $address->address_type == 'office' ? 'selected' : '' }}>Office</option>
    </select>
</div>

    <div class="form-group mb-3">
      <label>Phone</label>
      <input type="text" name="phone" value="{{ old('phone', $address->phone) }}" required class="form-control">
    </div>

    <div class="form-group mb-3">
      <label>Address Line 1</label>
      <input type="text" name="address_line1" value="{{ old('address_line1', $address->address_line1) }}" required class="form-control">
    </div>

    <div class="form-group mb-3">
      <label>City</label>
      <input type="text" name="city" value="{{ old('city', $address->city) }}" required class="form-control">
    </div>

    <div class="form-group mb-3">
      <label>State</label>
      <input type="text" name="state" value="{{ old('state', $address->state) }}" required class="form-control">
    </div>

    <div class="form-group mb-3">
      <label>Postal Code</label>
      <input type="text" name="postal_code" value="{{ old('postal_code', $address->postal_code) }}" required class="form-control">
    </div>

    <div class="maxbtnbox">
      <button type="submit" class="checkout-btn">Update Address</button>
    </div>
  </form>
</div>
@endsection
