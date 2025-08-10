<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\CustomMail;
use App\Mail\OrderStatusUpdated;
use App\Mail\SendShipmentMail;
use App\Models\frontend\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminOrdersController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('email')) {
            $request->merge(['status' => $request->status ?? 'pending']);

            $orders = Order::when($request->status && $request->status !== 'all', function ($q) use ($request) {
                return $q->where('status', $request->status);
            })->get();

            return view('backend.pages-orders')->with('orders', $orders);
        }

    }

    public function viewOrders($email)
    {
        if (session()->has('email')) {
            if (!$email) {
                return redirect()->back()->with('error', 'URL have not email of user');
            }
            $users = User::where('email', $email)->first();
            if (!$users) {
                return redirect()->back()->with('error', 'User Is Not Found');
            }
            $orders = Order::where('user_id', $users->id)->get();

            if (!$orders) {
                return redirect()->back()->with('error', 'User has not placed any orders');
            }

            return view('backend.pages-view-orders')->with('orders', $orders);
        }
    }

    public function orderDetails($token)
    {
        if (session()->has('email')) {
            $order = Order::where('remember_token', $token)
                ->with(['user', 'payment'])
                ->firstOrFail();

            if (!$order) {
                return redirect()->back()->with('error', 'Orders is not found');
            }

            return view('backend.pages-view-orders-details')->with('order', $order);
        }
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if (!$order) {
            return response()->json(['success' => false]);
        }
        $order->status = $request->status;
        $order->save();
        return response()->json(['success' => true]);
    }

    public function sendEmail($token)
    {
        $order = Order::where('remember_token', $token)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $transactionId = $order->payment->transaction_id;
        $user = $order->user;
        $verificationToken = $token;
        $orderStatus = $order->status;

        Mail::to($order->user->email)->send(new OrderStatusUpdated($transactionId, $user, $verificationToken, $orderStatus));

        return redirect()->back()->with('success', 'Email sent with updated status.');
    }

    public function sendingShipmentEmail($token, $trackingId)
    {
        $order = Order::where('remember_token', $token)->first();

        $order->status = "shipped";
        $order->tracking_id = $trackingId;
        $order->save();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $user = $order->user;
        $orderStatus = "Shipped";

        Mail::to($order->user->email)->send(new SendShipmentMail($trackingId, $user, $orderStatus));

        return redirect('/admin/view-order-details/' . $token)->with('success', 'Email sent with updated status.');
    }

    public function printingOrder($token)
    {
        if (session()->has('email')) {
            $order = Order::where('remember_token', $token)->first();

            if (!$order) {
                return redirect()->back()->with('error', 'Order not found.');
            }

            $pdf = PDF::loadView('backend.printingLayout', compact('order'));

            return $pdf->download('receipt_order_' . $order->id . '.pdf');
        } else {
            return view('backend.login');
        }
    }

    public function customEmail($orderRememberToken)
    {

        $order = Order::where("remember_token", $orderRememberToken)->first();

        if (!$order) {
            return redirect()->back()->with('error', "The Order is not Found");
        }

        return view('backend.pages-end-customized-email')->with("order", $order);
    }

    public function sendEmailWithCustomData(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
        ]);

        $data = $request->only('subject', 'body');
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment');
        }

        Mail::to($request->email)->send(new CustomMail($data));

        return back()->with('success', 'Email sent successfully!');
    }



}


