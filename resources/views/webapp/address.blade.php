@extends('webapp.layouts.app')

@section('content')

<header class="header allhedtop">
    <div class="innerwapperbox" style="position: relative;">
        <a class="leftarrowicon" onclick="history.back()" href="#"><i class="bi bi-arrow-left"></i></a>
        <span>Address</span>
        <a class="add_address" href="{{ route('addnewaddress') }}">Add Address</a>
    </div>
</header>

<div class="innerwapperbox">
    @foreach ($addresses as $address)
    <div class="address-card_page">
        <div class="radio-icon_page">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="selected_address" id="address{{ $loop->index }}"
                    value="{{ $address->id }}" {{ session('selected_address') && session('selected_address')->id == $address->id ? 'checked' : '' }}>
            </div>
        </div>
        <div class="address-info_page">
            <h6>{{ $address->address_type }}</h6>
            <p class="mb-1">{{ $address->fullname }} | {{ $address->phone }}</p>
            <p class="mb-0">{{ $address->address_line1 }}, {{ $address->city }}, {{ $address->state }} - {{ $address->postal_code }}</p>
        </div>
        <div class="edit-icon-circle_page" onclick="window.location.href='{{ route('editaddress', ['id' => $address->id]) }}'">
  <i class="bi bi-pencil"></i>
</div>
<form action="{{ route('address.delete', ['id' => $address->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-icon-circle_page">
        <i class="bi bi-trash"></i>
    </button>
</form>

    </div>
    @endforeach

    <div class="maxbtnbox">
        <form action="{{ route('address.save') }}" method="POST">
            @csrf
            <input type="hidden" name="address_id" id="selected_address_id">
            <button type="submit" class="checkout-btn">Save Address</button>
        </form>
    </div>

</div>

<script>
    // Set the selected address id before submitting the form
    document.querySelectorAll('input[name="selected_address"]').forEach(function(input) {
        input.addEventListener('change', function() {
            document.getElementById('selected_address_id').value = this.value;
        });
    });
</script>

@endsection
