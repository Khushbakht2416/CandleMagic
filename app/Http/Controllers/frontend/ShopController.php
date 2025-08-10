<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\frontend\BestSellingModel;
use App\Models\frontend\ProductReviewsModel;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
class ShopController extends Controller
{
    public function index()
    {
        $result = ShopModel::where('status', 1)->get();

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.shop-sidebar', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result'=> $result
        ]);
    }

    public function kuzshow(){
        $result = ShopModel::where('status', 1)->where('company', 'KUZ')->get();

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.shop-sidebar-kuz', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result'=> $result
        ]);
    }

    public function igetbarshow(){
        $result = ShopModel::where('status', 1)->where('company', 'IGET Bar')->get();

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.shop-sidebar-igetbar', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result'=> $result
        ]);
    }

    public function igetmoonshow(){
        $result = ShopModel::where('status', 1)->where('company', 'IGET Moon')->get();

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.shop-sidebar-igetmoon', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result'=> $result
        ]);
    }

    public function alibarshow(){
        $result = ShopModel::where('status', 1)->where('company', 'AliBar')->get();

        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.shop-sidebar-alibar', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
            'result'=> $result
        ]);
    }


    public function makeReview(Request $request, $productName, $productToken)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review_message' => 'required|string|max:1000',
        ]);



        $product = ShopModel::where('pname', $productName)->where('addtocart', $productToken)->first();
        if(!$product){
            $product = BestSellingModel::where('pname', $productName)->where('addtocart', $productToken)->first();
        }
        $review = new ProductReviewsModel();
        $review->rname = $request->username;
        $review->rmessage = $request->review_message;
        $review->imageurl = "../../frontend/images/user/user.png";
        $review->product_id = $product->id;
        $review->email = $request->email;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

}
