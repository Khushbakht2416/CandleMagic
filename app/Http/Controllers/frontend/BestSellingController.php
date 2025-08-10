<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\BestSellingModel;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class BestSellingController extends Controller
{
    public function index()
    {
        $products = ShopModel::where('status', 1)
            ->where('bestselling', 1)
            ->orderBy('company')
            ->orderBy('id')
            ->get()
            ->groupBy('company')
            ->map(function ($group) {
                return $group->take(4);
            });

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;

        return view('frontend.index', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'products' => $products,
        ]);
    }
}
