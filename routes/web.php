<?php

//----------------Frontend----------------------
use App\Http\Controllers\backend\AdminCustomersController;
use App\Http\Controllers\backend\AdminOrdersController;
use App\Http\Controllers\backend\AdminPaymentsController;
use App\Models\frontend\Order;
use App\Models\frontend\Payment;
use App\Models\frontend\ShopModel;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginAndRegisterController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\OrderTrackingController;
use App\Http\Controllers\frontend\SearchingController;
use App\Http\Controllers\frontend\SingleProductController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\UserLoginController;
use App\Http\Controllers\frontend\TermOfUseController;
use App\Http\Controllers\frontend\TestimonialController;
use App\Http\Controllers\frontend\BestSellingController;
use App\Http\Controllers\GoogleAuthController;
use App\Mail\VerificationEmail;
use Monolog\Formatter\GoogleCloudLoggingFormatter;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use App\Models\User;





Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact-us', [ContactController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'submitMessage']);
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/term-of-use', [TermOfUseController::class, 'index']);
Route::get('/', [BestSellingController::class, 'index']);


// Product Controller
Route::get('/product/{productname}/{producttoken}', [SingleProductController::class, 'index']);
Route::get('/products/{productname}/{producttoken}', [SingleProductController::class, 'bestSellingProduct']);
Route::post('/makereview/{productname}/{producttoken}', [ShopController::class, 'makeReview'])->name('makereview');
Route::get('/shop-sidebar', [ShopController::class, 'index']);


//User Login Controller
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callBackGoogle']);
Route::get('/user/login', [LoginAndRegisterController::class, 'index']);
Route::post('/user/onlogin', [UserLoginController::class, 'login']);

//User Register Controller
Route::get('/user/register', [RegisterController::class, 'index']);
Route::post('/user/onregister', [UserLoginController::class, 'register'])->name('register');

//User Logout Controller
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

//User Forget Password
Route::get('/user-FogetPassword', [UserLoginController::class, 'forgetPassword'])->name('forget.password');
Route::post('/user-ForgetPassword', [UserLoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/passwordReset/{token}', [UserLoginController::class, 'resetPassword'])->name('password.reset');
Route::post('/passwordUpdate', [UserLoginController::class, 'updatePassword'])->name('password.update');

// Add to cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/bestselling', [CartController::class, 'addBestSelling'])->name('cart.add.bestselling');
Route::patch('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/items', function () {
    $cartItems = Cart::content();
    $cartData = $cartItems->map(function ($item) {
        return [
            'rowId' => $item->rowId,
            'name' => $item->name,
            'price' => $item->price,
            'qty' => $item->qty,
            'imgurl' => $item->options->imgurl,
            'ptoken' => $item->options->ptoken
        ];
    });

    $subtotal = $cartItems->sum(function ($item) {
        return $item->price * $item->qty;
    });

    return response()->json([
        'cartItems' => $cartData,
        'subtotal' => number_format($subtotal, 2),
    ]);
});



// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// Checkout Payment Routes
Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

// Order Tracking Routes
Route::get('/order-tracking', [OrderTrackingController::class, 'index'])->name('order.track');
Route::match(['get', 'post'], '/order/tracking', [OrderTrackingController::class, 'trackOrder'])->name('trackingorder');

Route::get("/shop-sidebar/kuz", [ShopController::class , 'kuzshow'])->name('kuz');
Route::get("/shop-sidebar/igetbar", [ShopController::class , 'igetbarshow'])->name('igetbar');
Route::get("/shop-sidebar/igetmoon", [ShopController::class , 'igetmoonshow'])->name('igetmoon');
Route::get("/shop-sidebar/alibar", [ShopController::class , 'alibarshow'])->name('alibar');

// web.php
Route::get('/search', [SearchingController::class, 'search']);
Route::get('/product-list', [SearchingController::class, 'productlist']);

// Email verification notice route
Route::get('/email/verify', function () {
    $cartItems = Cart::content();
    $subtotal = $cartItems->sum(function ($item) {
        return $item->price * $item->qty;
    });
    $shippingCost = 20.00;
    $total = $subtotal + $shippingCost;
    return view('frontend.auth.verify-email', [
        'cartItems' => $cartItems,
        'subtotal' => number_format($subtotal, 2),
        'total' => number_format($total, 2),
        'shippingCost' => number_format($shippingCost, 2),
    ]);
})->name('verification.notice');




Route::get('/email/verification/{id}/{hash}', function ($id, $hash) {
    // Find the user with the given ID and email verification token
    $user = User::where('id', $id)
        ->where('email_verification_token', $hash)
        ->first();

    if ($user && !$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        $user->email_verification_token = null;
        $user->save();
        Auth::login($user);
        return redirect('/')->with('message', 'Email successfully verified.');
    }

    // Redirect to login page with an error message if the verification link is invalid
    return redirect('/user/login')->withErrors('Invalid verification link or email already verified.');
})->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $user_email = session()->get('email');
    $user = User::where('email', $user_email)->first();

    if ($user) {
        if (!$user->hasVerifiedEmail()) {
            $user->email_verification_token = Str::random(60);
            $user->save();
            $verificationUrl = url('/email/verification', [
                'id' => $user->id,
                'hash' => $user->email_verification_token,
            ]);

            Mail::to($user->email)->send(new VerificationEmail($verificationUrl, $user));

            return back()->with('resent', true);
        } else {
            return back()->with('Your Email is already Verified');
        }

    }

    return back()->with('No user found with the provided email.');
})->middleware(['throttle:6,1'])->name('verification.send');

//--------------------Admin-----------------//
use App\Http\Controllers\backend\AdminHomeController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\AdminLoginController;
use App\Http\Controllers\backend\AdminShopController;
use App\Http\Controllers\backend\AdminBestSellingController;
use App\Http\Controllers\backend\AdminTestimonialController;
use App\Http\Controllers\backend\AdminContactController;
use App\Http\Controllers\backend\AdminProductReviewsController;

//-------Models--------------//
use App\Models\backend\AdminContactModal;
use App\Models\backend\AdminProductReviewsModel;
use App\Models\backend\AdminProfileModel;
use App\Models\backend\AdminShopModel;
use App\Models\backend\AdminBestSellingModel;
use App\Models\backend\AdminTestimonialModel;


// ----------Admin---------------//
Route::get('/admin/profile', [AdminProfileController::class, 'index']);

//Login
Route::get('/admin', function () {
    if (session()->has('email')) {

        $admin = AdminProfileModel::where('id', 1)->first();

        session()->put('job', $admin->job);
        session()->put('image', $admin->profile_image);
        session()->put('username', $admin->name);

        $bestselling = ShopModel::where('bestselling', 1)->get();
        $contact = AdminContactModal::all();
        $product_reviews = AdminProductReviewsModel::all();
        $shops = AdminShopModel::all();
        $testimonials = AdminTestimonialModel::all();
        $customers = User::all();
        $orders = Order::all();
        $payments = Payment::all();
        return view('backend.index', compact('bestselling', 'shops', 'testimonials', 'product_reviews', 'contact','customers', 'orders', 'payments'));
    } else {
        return redirect('/admin/login');
    }
});
Route::get('/admin/login', function () {
    if (session()->has('email')) {
        return redirect('/admin');
    } else {
        return view('backend.login');
    }
});
Route::get('/admin/contact', function () {
    if (session()->has('email')) {
        $contacts = AdminContactModal::all();
        return view('backend.pages-contact', compact('contacts'));
    } else {
        return redirect('/admin/login');
    }
});
Route::get('/admin/product_reviews', function () {
    if (session()->has('email')) {
        $product_reviews = AdminProductReviewsModel::all();
        return view('backend.pages-product_reviews', compact('product_reviews'));
    } else {
        return redirect('/admin/login');
    }
});
Route::get('/admin/logout', function () {
    if (session()->has('email')) {
        session()->pull('email');
        session()->pull('username');
        session()->pull('id');
        session()->flush();
    }
    return redirect('/admin/login');
});

Route::get('/admin/contact/{id}', [AdminContactController::class, 'destroy']);
Route::get('/admin/product_reviews/{id}', [AdminProductReviewsController::class, 'destroy']);


Route::get('/admin/profile', function () {
    if (session()->has('email')) {
        $admin = AdminProfileModel::where('id', 1)->first();
        return view('backend.users-profile', compact('admin'));
    } else {
        return redirect('/admin/login');
    }
});
Route::post('/admin/login', [AdminLoginController::class, 'onlogin']);

Route::get('/admin/bestselling', [AdminBestSellingController::class, 'index']);
Route::get('/admin/enable-bestselling/{id}', [AdminBestSellingController::class, 'enablebestselling']);
Route::get('/admin/disable-bestselling/{id}', [AdminBestSellingController::class, 'disablebestselling']);
Route::get('/admin/delete-bestselling/{id}', [AdminBestSellingController::class, 'deletebestselling']);
Route::get('/admin/edit-bestselling/{id}', [AdminBestSellingController::class, 'editbestselling']);
Route::post('/admin/edit-bestselling/{id}', [AdminBestSellingController::class, 'editsinglebestselling']);
Route::get('/admin/add-bestselling', [AdminBestSellingController::class, 'addbestselling']);
Route::post('/admin/add-bestselling', [AdminBestSellingController::class, 'addsinglebestselling']);

Route::get('/admin/shop', [AdminShopController::class, 'index']);
Route::get('/admin/enable-shop/{id}', [AdminShopController::class, 'enableshop']);
Route::get('/admin/disable-shop/{id}', [AdminShopController::class, 'disableshop']);
Route::get('/admin/delete-shop/{id}', [AdminShopController::class, 'deleteshop']);
Route::get('/admin/edit-shop/{id}', [AdminShopController::class, 'editshop']);
Route::post('/admin/edit-shop/{id}', [AdminShopController::class, 'editsingleshop']);
Route::get('/admin/add-shop', [AdminShopController::class, 'addshop']);
Route::post('/admin/add-shop', [AdminShopController::class, 'addsingleshop']);

Route::get('/admin/testimonial', [AdminTestimonialController::class, 'index']);
Route::get('/admin/enable-testimonial/{id}', [AdminTestimonialController::class, 'enabletestimonial']);
Route::get('/admin/disable-testimonial/{id}', [AdminTestimonialController::class, 'disabletestimonial']);
Route::get('/admin/delete-testimonial/{id}', [AdminTestimonialController::class, 'deletetestimonial']);
Route::get('/admin/edit-testimonial/{id}', [AdminTestimonialController::class, 'edittestimonial']);
Route::post('/admin/edit-testimonial/{id}', [AdminTestimonialController::class, 'editsingletestimonial']);
Route::get('/admin/add-testimonial', [AdminTestimonialController::class, 'addtestimonial']); ///ADD_testimonial
Route::post('/admin/add-testimonial', [AdminTestimonialController::class, 'addsingletestimonial']); ///POST_single_testimonial

Route::post('/admin/update/{id}', [AdminProfileController::class, 'updateAdminProfile']);
Route::post('/admin/change-credentials/{id}', [AdminLoginController::class, 'changeCredentials'])->name('admin.change-credentials');

// customers controllers
Route::get('/admin/customers', [AdminCustomersController::class, 'index'])->name('adminCustomers');

// orders controllers
Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('adminOrdes');
Route::get('/admin/view-orders/{email}', [AdminOrdersController::class, 'viewOrders']);
Route::get('/admin/view-order-details/{token}',[AdminOrdersController::class, 'orderDetails']);
Route::post('/admin/update-order-status/{id}', [AdminOrdersController::class, 'updateOrderStatus'])->name('admin.update-order-status');
Route::get('/admin/send-updated-status/{token}', [AdminOrdersController::class, 'sendEmail'])->name('send.updated.status');
Route::get('/admin/send-shipment-email/{token}/{trackingid}', [AdminOrdersController::class, 'sendingShipmentEmail']);
Route::get('/admin/print-receipt/{token}', [AdminOrdersController::class, "printingOrder"]);


// payments controllers
Route::get('/admin/payments', [AdminPaymentsController::class, 'index'])->name('adminPayments');

// Customize Email
Route::get('/admin/send-custom-email/{orderRememberToken}', [AdminOrdersController::class, "customEmail"]);
Route::post('/admin/send-custom-email-to-user', [AdminOrdersController::class, 'sendEmailWithCustomData']);

