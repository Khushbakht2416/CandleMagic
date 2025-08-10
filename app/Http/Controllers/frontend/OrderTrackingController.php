<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Order;
use App\Models\frontend\OrderTrackingModel;
use App\Models\frontend\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class OrderTrackingController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = $subtotal > 100 ? 0.00 : 10.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.order-tracking', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }

    public function trackOrder(Request $request)
    {
        // Validate request input
        $request->validate([
            'orderId' => 'required|string',
            'transactionId' => 'required|string',
            'email' => 'required|email'
        ]);
        $order = Order::where('remember_token', $request->orderId)
            ->with(['user', 'payment'])
            ->firstOrFail(); // This ensures you get a valid order or fail early

        if (!$order) {
            return redirect('/order-tracking')->with('error', "The Order ID is not valid. Please enter a valid ID.");
        }

        // Ensure payment matches
        if ((string) $order->payment->transaction_id !== (string) $request->transactionId) {
            return redirect('/order-tracking')->with('error', "The Transaction ID is not valid. Please enter a valid ID.");
        }

        // Ensure user email matches
        if ($order->user->email !== $request->email) {
            return redirect('/order-tracking')->with('error', "The Order email is not valid. Please enter a valid email.");
        }

        // Fetch cart content in one call
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        $order->order_details = json_decode($order->order_details, true);

        

        $order->billing_details = json_decode($order->billing_details, true);

        // Define fixed shipping cost
        $shippingCost = $order->payment->amount > 100 ? 0.00 : 10.00;
        $total = $subtotal + $shippingCost;


        return view('frontend.order-tracking-check', [
            'orderDetails' => $order->order_details,
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'user' => $order->user,
            'order' => $order,
            'payment' => $order->payment
        ]);
    }

}
