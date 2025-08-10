<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\TestimonialModel;
use App\Models\frontend\AboutModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $testimonials = TestimonialModel::where('status', 1)->get();
        $aboutSections = AboutModel::where('status', 1)->get();
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.about', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'testimonials' => $testimonials,
            'aboutSections' => $aboutSections,
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }

}
