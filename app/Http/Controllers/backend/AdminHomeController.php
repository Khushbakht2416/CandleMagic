<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminHomeModel;
use App\Models\backend\AdminBestSellingModel;
use App\Models\backend\AdminShopModel;
use App\Models\backend\AdminTestimonialModel;
use App\Models\backend\AdminContactModal;
use App\Models\frontend\Order;
use App\Models\frontend\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $bestselling = AdminBestSellingModel::all();
        $shops = AdminShopModel::all();
        $testimonials = AdminTestimonialModel::all();
        $contact = AdminContactModal::all();
        $orders = Order::all();
        $payments = Payment::all();
        $customers = User::all();
        return view('backend.index', compact('bestselling',  'shops', 'testimonials' ,'contact', 'orders', 'payments', 'customers'));
    }
}
