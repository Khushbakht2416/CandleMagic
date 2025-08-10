<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\BestSellingModel;
use App\Models\frontend\ShopModel;
use Auth;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function __construct()
    {
        $this->updateCartCount();
    }

    private function updateCartCount()
    {
        session()->put('cartCount', Cart::count());
    }


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
        return view('frontend.cart', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:shop,id',
            'name' => 'required|string',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = ShopModel::where('pname', $request->name)
            ->where('id', $request->id)
            ->where('addtocart', $request->token)
            ->first();

        if (!$product) {
            return redirect()->back()->with("error", "Product not found.");
        }

        if ($product->quantity < 1) {
            return redirect()->back()->with("error", "Product is out of stock.");
        }

        $cartItem = Cart::content()->where('id', $product->id)->first();
        $requestedQty = $request->quantity ?? 1;

        if ($cartItem) {
            $newQuantity = $cartItem->qty + $requestedQty;

            if ($newQuantity > $product->quantity) {
                return redirect()->back()->with("error", "Oops! You can’t add more than the available stock for this item.");
            }

            Cart::update($cartItem->rowId, $newQuantity);
        } else {
            if ($requestedQty > $product->quantity) {
                return redirect()->back()->with("error", "Requested quantity exceeds available stock.");
            }

            $price = $product->afterdiscount ?? $product->actualprice;
            $price = floatval(preg_replace('/[^\d.]/', '', $price));

            Cart::add([
                'id' => $product->id,
                'name' => $product->pname,
                'qty' => $requestedQty,
                'price' => $price,
                'options' => [
                    'imgurl' => $product->imgurl,
                    'ptoken' => $product->addtocart,
                    'maxquantity' => $product->quantity,
                    'brand' => $product->company,
                ],
            ]);
        }

        $this->updateCartCount();

        session()->flash('open_cart', true);

        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function addBestSelling(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:shop,id',
            'name' => 'required|string',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = BestSellingModel::find($request->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Invalid product.');
        }


        $price = $product->afterdiscount ?? $product->actualprice;
        $price = floatval(preg_replace('/[^\d.]/', '', $price));

        Cart::add([
            'id' => $product->id,
            'name' => $product->pname,
            'qty' => $request->quantity ?? 1,
            'price' => $price,
            'maxquantity' => $product->quantity,
            'options' => [
                'imgurl' => $product->imgurl,
                'ptoken' => $product->addtocart,
                'maxquantity' => $product->quantity,
                'brand' => $product->company,
            ],
        ]);

        $this->updateCartCount();

        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function update(Request $request, $rowId)
    {
        $cartItem = Cart::get($rowId);

        $product = ShopModel::find($cartItem->id);

        $maxQuantity = $product->quantity;

        $newQuantity = min($request->quantity, $maxQuantity);

        Cart::update($rowId, [
            'qty' => $newQuantity,
            'options' => [
                'imgurl' => $product->imgurl,
                'ptoken' => $product->addtocart,
                'maxquantity' => $maxQuantity,
                'brand' => $product->company,
            ]
        ]);


        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        $shipping = ($subtotal >= 100 || Cart::count() > 1) ? 0.00 : 10.00;
        $total = $subtotal + $shipping;
        $cartCount = $cartItems->sum('qty');
        $itemSubtotal = $cartItem->price * $newQuantity;
        return response()->json([
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'carttotal' => number_format($itemSubtotal, 2),
            'cartCount' => $cartCount,
            'shipping' => number_format($shipping, 2),
        ]);
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        $this->updateCartCount();

        return redirect('/cart')->with('success', 'Item removed from cart!');
    }

    public function destroy()
    {
        Cart::destroy();

        $this->updateCartCount();

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
