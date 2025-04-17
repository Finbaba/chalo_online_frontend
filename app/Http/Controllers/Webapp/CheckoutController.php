<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EcomCoupon;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $grandTotal = 0;
        $totalItems = 0;
        $discount = 0.10; // 10% Discount

        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
            $totalItems += $item['quantity'];
        }

        // Applying 10% Discount
        $itemDiscount = $grandTotal * $discount;
        $finalTotal = $grandTotal - $itemDiscount;

        return view('webapp.checkout', compact('cart', 'grandTotal', 'totalItems', 'itemDiscount', 'finalTotal'));
    }

    public function placeOrder(Request $request)
    {
        // Ensure the user has selected a valid address and payment method
        if (!$request->session()->has('selected_address')) {
            return redirect()->route('checkout')->with('error', 'Please select a shipping address.');
        }

        if ($request->payment_method == 'cash' && !$request->has('agree_to_terms')) {
            return redirect()->route('checkout')->with('error', 'You must agree to the terms and conditions.');
        }

        // Logic for placing the order (e.g., saving the order to database)

        // Order ID and other details can be stored here
        $orderId = 'SPLZ2189-'.time(); // Generate order ID using a timestamp for simplicity
        
        // Optionally store order details (this can be a separate model depending on your design)
        $orderDetails = [
            'order_id' => $orderId,
            'total_amount' => $finalTotal,
            'payment_status' => 'Unpaid',
            'order_status' => 'Pending',
            'customer_id' => auth()->user()->id ?? null, // Assuming user authentication is enabled
        ];

        // Save the order details to the database (You can define an Order model to handle this)
        // Order::create($orderDetails);

        // Redirect to the 'qrcode' page with the order ID for display purposes
        return redirect()->route('Qrcode')->with('orderId', $orderId);
    }

    public function coupon()
    {
        // Pass session data to the view, so success/error messages can be displayed
        return view('webapp.checkout', [
            'coupon_code' => session('coupon_code'),
            'coupon_amount' => session('coupon_amount'),
            'coupon_message' => session('coupon_message'),
            'coupon_success' => session('coupon_success'),
            'applied_coupon' => session('checkout'), // Applied coupon code
        ]);
    }

    public function apply(Request $request)
    {
        // Validate the coupon code input
        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        // Check if the coupon exists and is active
        $coupon = EcomCoupon::where('code', $request->code)->where('status', 'active')->first();

        if ($coupon) {
            // Store the coupon in the session
            session()->put('checkout', $coupon->code);

            // Return with success message
            return redirect()->route('checkout')->with([
                'coupon_success' => true,
                'coupon_code' => $coupon->code,
                'coupon_amount' => $coupon->discount_amount,
                'coupon_message' => "Discount apply successfully",
            ]);
        }

        // If coupon is invalid, return with error message
        return redirect()->back()->with('coupon_error', 'Invalid or expired coupon code.');
    }
}