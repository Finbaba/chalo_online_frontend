<?php

namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Example: WishlistController.php
    public function index()
    {
        // Session se wishlist ke product IDs lein, default empty array agar set na ho
        $wishlist = session('wishlist', []);

        // Product details database se retrieve karen
        $wishlistProducts = \App\Models\Product::whereIn('id', $wishlist)->get();

        return view('webapp.wishlist', compact('wishlistProducts'));
    }

   public function toggle(Request $request)
    {
        $productId = $request->input('product_id');
    
        // Session se wishlist fetch karo
        $wishlist = session()->get('wishlist', []);
    
        $action = '';
    
        // Agar wishlist me hai to remove karo
        if (in_array($productId, $wishlist)) {
            // Remove the product from wishlist
            $wishlist = array_filter($wishlist, function ($id) use ($productId) {
                return $id != $productId;
            });
    
            $action = 'removed';
        } else {
            // Add only if not present
            $wishlist[] = $productId;
            $action = 'added';
        }
    
        // Wishlist ko session me store karo
        session()->put('wishlist', array_values($wishlist)); // array_values se index reset ho jata hai
    
        return response()->json([
            'status' => 'success',
            'action' => $action,
            'product_id' => $productId,
            'wishlistCount' => count($wishlist)
        ]);
    }

}



