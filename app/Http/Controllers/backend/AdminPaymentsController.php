<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Payment;
use Illuminate\Http\Request;

class AdminPaymentsController extends Controller
{
    public function index(){
        if (session()->has('email')){
            $payments = Payment::all();
            return view('backend.pages-payments')->with('payments', $payments);
        }
    }
}
