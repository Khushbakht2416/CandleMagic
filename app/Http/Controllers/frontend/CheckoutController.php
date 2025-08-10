<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccessMail;
use App\Models\frontend\CheckoutModel;
use App\Models\frontend\Order;
use App\Models\frontend\Payment;
use App\Models\frontend\ShopModel;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
use Str;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 10.00;
        if ($subtotal >= 100 || $subtotal == 0 || Cart::count() > 1) {
            $shippingCost = 0.00;
        }
        $total = $subtotal + $shippingCost;
        return view('frontend.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }

    public function pay(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address_line1' => 'required|string|max:255',
            'suburb' => 'required|string|max:255',
            'state' => 'required|in:Queensland,Tasmania,New South Wales,Victoria,Western Australia,South Australia',
            'postcode' => 'required|string|max:10',

            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0.01',
            'shipping' => 'required|numeric|min:0.00',
            'total' => 'required',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));


        $currency = 'aud';


        $lineItems = [];
        foreach ($request->items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => $item['name']],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Add shipping cost
        $lineItems[] = [
            'price_data' => [
                'currency' => $currency,
                'product_data' => ['name' => 'Shipping'],
                'unit_amount' => $request->shipping * 100,
            ],
            'quantity' => 1,
        ];

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}' .
                '&first_name=' . urlencode($request->first_name) .
                '&last_name=' . urlencode($request->last_name) .
                '&email=' . urlencode($request->email) .
                '&phone=' . urlencode($request->phone) .
                '&country=' . urlencode('Australia') .
                '&address_line1=' . urlencode($request->address_line1) .
                '&suburb=' . urlencode($request->suburb) .
                '&state=' . urlencode($request->state) .
                '&postcode=' . urlencode($request->postcode),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($checkoutSession->url);
    }
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $verification_token = Str::random(10);

        // Validate session id
        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid session.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::retrieve($sessionId);
        $transactionId = $session->payment_intent;
        $billingDetails = [
            'first_name' => $request->query('first_name'),
            'last_name' => $request->query('last_name'),
            'email' => $request->query('email'),
            'phone' => $request->query('phone'),
            'country' => $request->query('country'),
            'address_line1' => $request->query('address_line1'),
            'suburb' => $request->query('suburb'),
            'state' => $request->query('state'),
            'postcode' => $request->query('postcode'),
        ];

        if (!Auth::id()) {
            try {
                $userdata = User::where('email', $billingDetails['email'])->first();
                if (!$userdata) {
                    $randomPassword = Str::random(8);
                    $userdata = User::create([
                        'name' => $billingDetails['first_name'] . " " . $billingDetails['last_name'],
                        'email' => $billingDetails['email'],
                        'password' => Hash::make($randomPassword),
                        'secure_password' => md5($randomPassword),
                    ]);
                }
                Auth::login($userdata);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'User model error');
            }
        }

        $cartItems = Cart::content();
        if ($cartItems->isEmpty()) {
            return redirect()->route('checkout.index')->with('error', 'No items in the cart.');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->qty);
        $shippingCost = ($subtotal >= 100 || Cart::count() > 1) ? 0.00 : 10.00;
        $total = $subtotal + $shippingCost;

        // Create the order
        try {
            $order = Order::create([
                'user_id' => Auth::user()->getAuthIdentifier(),
                'total_price' => $total,
                'status' => 'Pending',
                'order_details' => json_encode($cartItems),
                'billing_details' => json_encode($billingDetails),
                'remember_token' => $verification_token,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('checkout.index')->with('error', 'Order model error');
        }

        // Handle payment
        try {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'stripe',
                'transaction_id' => $transactionId,
                'amount' => $total,
                'currency' => 'AUD',
                'status' => 'completed',
            ]);

            $productIds = $cartItems->pluck('id')->toArray();
            $products = ShopModel::whereIn('id', $productIds)->get()->keyBy('id');

            $updates = [];
            foreach ($cartItems as $item) {
                if (isset($products[$item->id])) {
                    $products[$item->id]->quantity -= $item->qty;
                    $updates[] = [
                        'id' => $item->id,
                        'quantity' => $products[$item->id]->quantity
                    ];
                }
            }

            // Update products in bulk
            foreach ($updates as $update) {
                ShopModel::where('id', $update['id'])->update(['quantity' => $update['quantity']]);
            }

            Cart::destroy();
            session()->put('cartCount', 0);
        } catch (\Exception $e) {
            return redirect()->route('checkout.index')->with('error', 'Payment or session not found.');
        }

        // Send payment success email
        $productDetails = $cartItems->map(function ($item) {
            return [
                'name' => $item->name,
                'brand' => $item->options->brand,
                'price' => number_format($item->price, 2),
                'quantity' => $item->qty,
            ];
        });

        try {
            Mail::to(Auth::user()->email)->send(new PaymentSuccessMail($transactionId, $productDetails, Auth::user(), $verification_token));
        } catch (\Throwable $th) {
            return redirect('/checkout')->with('error', "Your Email is not correct. Your Order is Placed");
        }

        return redirect('/checkout')->with("success", "Thank you for your purchase! Check your email inbox for details.");
    }



    public function cancel()
    {
        return redirect('/checkout')->with("error", "Your payment was canceled. If this was a mistake, please try again.");
    }
}
