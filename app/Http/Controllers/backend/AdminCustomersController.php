<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomersController extends Controller
{
    public function index(){
        if (session()->has('email')){
            $users = User::all();
            return view('backend.pages-customers')->with('customers', $users);
        }
    }
}
