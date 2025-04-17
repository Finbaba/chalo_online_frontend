<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use App\Models\EcomCustomerAddress;
use Illuminate\Http\Request;
use Session;

class AddressController extends Controller
{
    // Display all addresses of the customer
    public function index(Request $request)
    {
        // Assuming you get customer_id from the session or authentication
        $customerId = 1; // Replace with the actual customer ID from session or auth

        // Fetch all addresses for the given customer
        $addresses = EcomCustomerAddress::where('customer_id', $customerId)->get();

        // Check for flash message (like after saving a new address)
        $successMessage = $request->session()->get('success');

        return view('webapp.address', compact('addresses', 'successMessage'));
    }

    // Save the selected address from the list
    public function saveSelectedAddress(Request $request)
    {
        // Get the selected address ID from the request
        $selectedAddressId = $request->input('address_id');

        // Get the address from the database
        $selectedAddress = EcomCustomerAddress::find($selectedAddressId);

        // Store the selected address in the session
        $request->session()->put('selected_address', $selectedAddress);

        // Redirect to the checkout page after saving
        return redirect()->route('checkout');
    }

    // Show the page for adding a new address
    public function addNewAddress()
    {
        return view('webapp.add-new-address');
    }

    // Save the new address added by the user
    public function saveNewAddress(Request $request)
    {
        // Validate the address input
        $validated = $request->validate([
            'address_line1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
        ]);

        // Create a new address instance
        $newAddress = new EcomCustomerAddress();
        $newAddress->customer_id = 1;  // Assuming the customer is logged in with ID 1
        $newAddress->address_line1 = $request->address_line1;
        $newAddress->city = $request->city;
        $newAddress->state = $request->state;
        $newAddress->postal_code = $request->postal_code;
        $newAddress->save();

        // Flash success message and redirect to the address page
        $request->session()->flash('success', 'New address added successfully.');

        return redirect()->route('address');
    }

    // Handle the checkout page and retrieve the selected address from the session
    public function checkout(Request $request)
    {
        // Retrieve the selected address from the session
        $selectedAddress = $request->session()->get('selected_address');

        // You can pass additional data here (e.g., cart items, payment options, etc.)
        return view('webapp.checkout', compact('selectedAddress'));
    }
    public function destroy($id)
{
    $address = EcomCustomerAddress::findOrFail($id);
    $address->delete();

    return redirect()->route('address')->with('success', 'Address deleted successfully');
}

}
