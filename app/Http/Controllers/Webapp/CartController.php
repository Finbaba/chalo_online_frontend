<?php
 
namespace App\Http\Controllers\Webapp;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\EcomOrder;
use App\Models\EcomOrderItem;
 
class CartController extends Controller
{
    // Add item to cart
    public function addToCart(Request $request)
    {
        $product = [
            'id' => $request->id,
            'title' => $request->title,
            'photo' => $request->photo,
            'price' => $request->price,
            'quantity' => 1
        ];
 
        $cart = session()->get('cart', []);
 
        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity']++;
        } else {
            $cart[$product['id']] = $product;
        }
 
        session()->put('cart', $cart);
 
        return $request->action === 'buy_now'
            ? redirect()->route('cart')
            : redirect()->route('discover');
    }
 
    // Show cart
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('webapp.cart', compact('cart'));
    }
 
    // Update quantity (+ / -)
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
 
        if (!isset($cart[$id])) {
            return redirect()->route('cart')->with('error', 'Item not found in cart.');
        }
 
        if ($request->action === 'increase') {
            $cart[$id]['quantity'] += 1;
        } elseif ($request->action === 'decrease') {
            $cart[$id]['quantity'] -= 1;
 
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }
 
        session()->put('cart', $cart);
 
        return redirect()->route('cart')->with('success', 'Cart updated.');
    }
 
    // Finalize order & update stock
    public function checkout()
    {
        $cart = session()->get('cart', []);
 
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Cart is empty.');
        }
 
        $order = new EcomOrder();
        $order->tenant_id = 1;
        $order->customer_id = auth()->id();
        $order->order_number = 'ORD-' . time();
        $order->sub_total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $order->total_amount = $order->sub_total;
        $order->payment_method = 'COD';
        $order->payment_status = 'Pending';
        $order->status = 'Pending';
        $order->save();
 
        foreach ($cart as $item) {
            EcomOrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
 
            $product = Product::find($item['id']);
            if ($product) {
                $product->available_stock -= $item['quantity'];
                $product->save();
            }
        }
 
        session()->put('orderId', $order->id);
        session()->put('finalTotal', $order->total_amount);
 
        return redirect()->route('webapp.successfullyordered');
    }
}