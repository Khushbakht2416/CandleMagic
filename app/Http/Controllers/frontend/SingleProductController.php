<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\BestSellingModel;
use App\Models\frontend\ProductReviewsModel;
use App\Models\frontend\ShopModel;
use App\Models\frontend\SingleProductModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SingleProductController extends Controller
{
    public function index($productName, $productToken)
    {
        $product = ShopModel::where('pname', $productName)->where('addtocart', $productToken)->first();
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;

        if ($product) {
            $product_reviews = ProductReviewsModel::where('product_id', $product->id)->get();
            return view('frontend.product-single', [
                'cartItems' => $cartItems,
                'subtotal' => number_format($subtotal, 2),
                'total' => number_format($total, 2),
                'shippingCost' => number_format($shippingCost, 2),
                'product' => $product,
                'reviews' => $product_reviews,
            ]);
        } else {
            $product = BestSellingModel::where('pname', $productName)->where('addtocart', $productToken)->first();
            if ($product) {
                $product_reviews = ProductReviewsModel::where('product_id', $product->id)->get();
                return view('frontend.product-single', [
                    'cartItems' => $cartItems,
                    'subtotal' => number_format($subtotal, 2),
                    'total' => number_format($total, 2),
                    'shippingCost' => number_format($shippingCost, 2),
                    'product' => $product,
                    'reviews' => $product_reviews,
                ]);
            } else {
                return redirect()->back()->withErrors('Product not found or token mismatch.');
            }
        }
    }


    public function bestSellingProduct($productName, $productToken)
    {
        $product = BestSellingModel::where('pname', $productName)->where('addtocart', $productToken)->first();
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;

        if ($product) {
            $product_reviews = ProductReviewsModel::where('product_id', $product->id)->get();
            return view('frontend.product-single', [
                'cartItems' => $cartItems,
                'subtotal' => number_format($subtotal, 2),
                'total' => number_format($total, 2),
                'shippingCost' => number_format($shippingCost, 2),
                'product' => $product,
                'reviews' => $product_reviews,
            ]);
        } else {
            return redirect()->back()->withErrors('Product not found or token mismatch.');
        }
    }

}
