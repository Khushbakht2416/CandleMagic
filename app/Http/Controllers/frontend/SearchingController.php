<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class SearchingController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $result = ShopModel::where('pname', 'like', "%{$query}%")->get();
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 10.00;
        $total = $subtotal + $shippingCost;

        return view('frontend.shop-sidebar', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result' => $result
        ]);

    }

    public function productlist()
    {
        $productsname = ShopModel::select('pname')->where('status', 1)->get();
        $productlist = [];
        foreach ($productsname as $name) {
            $productlist[] = $name['pname'];
        }
        return response()->json($productlist);
    }
}
