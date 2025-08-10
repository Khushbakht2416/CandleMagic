<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ContactModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ContactController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.contact-us', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }
    public function submitMessage(Request $request)
    {
        $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'email|required',
                'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
                'message' => 'required'
            ]
            );
        $contact = new ContactModel();
        $contact->fname= $request->fname;
        $contact->lname= $request->lname;
        $contact->email= $request->email;
        $contact->phone= $request->phone;
        $contact->message= $request->message;
        $contact->save();
        return redirect('/contact-us')->with('success', 'Thanks for contacting. We\'ll get back to you ASAP');

    }
}
