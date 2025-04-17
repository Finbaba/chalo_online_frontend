<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EcomCustomerAddress;

class AddNewAddressController extends Controller
{
    // Show the Add Address form
    public function index()
    {
        return view('webapp.addnewaddress');
    }

    // Save the address to DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'address_type' => 'required|string',
            'phone' => 'required|string',
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        EcomCustomerAddress::create([
            'fullname' => $validated['fullname'],
            'address_type' => $validated['address_type'],
            'phone' => $validated['phone'],
            'address_line1' => $validated['address_line1'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'postal_code' => $validated['postal_code'],
            'tenant_id' => 1,         // use dynamic auth()->user()->tenant_id if available
            'customer_id' => 1,       // same as above, make dynamic if needed
            'is_primary' => 0,
        ]);

        return redirect()->route('address')->with('success', 'Address saved successfully!');
    }
}
