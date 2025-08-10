<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->secure_password = md5($request->password);
        $user->email_verification_token = Str::random(60);
        $user->save();
        session()->put('email', $user->email);

        $this->sendVerificationEmail($user);


        return redirect()->route('verification.notice')->with('success', 'Registration successful! Please check your email for verification.');
    }

    private function sendVerificationEmail($user)
    {
        $verificationUrl = url('/email/verification', [
            'id' => $user->id,
            'token' => $user->email_verification_token,
        ]);

        Mail::to($user->email)->send(new VerificationEmail($verificationUrl, $user));
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)
                    ->where('email_verification_token', $request->token)
                    ->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->email_verification_token = null;
            $user->save();

            return redirect('/')->with('success', 'Email verified successfully!');
        } else {
            return redirect('/')->with('error', 'Invalid verification link.');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->hasVerifiedEmail()) {
                $user->email_verification_token = Str::random(60);
                $user->save();
                $request->session()->put('email', $user->email);
                $this->sendVerificationEmail($user);

                return redirect()->route('verification.notice')->with('error', 'You need to verify your email address. Check your email.');
            }
            Auth::login($user);
            return redirect()->intended('/')->with('success', 'Login successful.');
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }




    public function forgetPassword()
    {
        $cartItems = Cart::content();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $shippingCost = 20.00;
        $total = $subtotal + $shippingCost;
        return view('frontend.forget_password', [
            'cartItems' => $cartItems,
            'subtotal' => number_format($subtotal, 2),
            'total' => number_format($total, 2),
            'shippingCost' => number_format($shippingCost, 2),
        ]);
    }

    public function sendResetLinkEmail(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('status', 'The Reset Password Link Has been send to your Email.');

        } else {
            return redirect()->back()->with('status', 'The provided email do not match our records.');
        }
    }

    public function resetPassword($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $cartItems = Cart::content();
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->qty;
            });
            $shippingCost = 20.00;
            $total = $subtotal + $shippingCost;
            return view('frontend.reset_password', [
                'cartItems' => $cartItems,
                'subtotal' => number_format($subtotal, 2),
                'total' => number_format($total, 2),
                'shippingCost' => number_format($shippingCost, 2),
                'token' => $token
            ]);
        } else {
            abort(404);
        }
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['token' => 'Invalid token.']);
        }

        $user->password = Hash::make($request->password);
        $user->secure_password = md5($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect('/user/login')->with('status', 'Password has been reset successfully.');
    }

}
