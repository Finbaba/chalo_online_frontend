<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use App\Models\EcomCustomerAddress;
use Illuminate\Http\Request;

class EditAddressController extends Controller
{
    public function index($id)
    {

        $address = EcomCustomerAddress::findOrFail($id);

        return view('webapp.editaddress', compact('address'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
        ]);

        $address = EcomCustomerAddress::findOrFail($request->id);
        $address->update($request->all());

        return redirect()->route('address')->with('success', 'Address updated successfully');
    }
}
