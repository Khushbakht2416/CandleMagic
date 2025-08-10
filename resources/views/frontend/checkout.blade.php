<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Candle Magic || Checkout</title>

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Candle Magic - Candles" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontend/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (ensure this is after jQuery and Popper if you're using those) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&amp;family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/css/lastudioicon.css') }}" />

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ url('frontend/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/css/nice-select2.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('frontend/css/style.min.css') }}" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <style>
        .whatsapp-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            padding: 10px 15px;
            border-radius: 50px;
            text-decoration: none;
            display: flex;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
            z-index: 1000;
        }

        .whatsapp-chat-button:hover {
            background-color: #128c7e;
            transform: scale(1.05);
        }

        .whatsapp-chat-button a {
            text-decoration: none;
            display: flex;
            align-items: center;
            color: white;
        }

        .whatsapp-chat-button img {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }

        .whatsapp-chat-button span {
            font-size: 16px;
            font-weight: 500;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .whatsapp-chat-button {
                padding: 8px 12px;
                bottom: 55px;
                right: 15px;
            }

            .whatsapp-chat-button img {
                width: 20px;
                height: 20px;
            }

            .whatsapp-chat-button span {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .whatsapp-chat-button {
                padding: 6px 10px;
                bottom: 60px;
                right: 10px;
            }

            .whatsapp-chat-button img {
                width: 18px;
                height: 18px;
            }

            .whatsapp-chat-button span {
                font-size: 12px;
            }
        }
    </style>
</head>

<div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="promoModalLabel">Special Offer!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h4 class="fw-bold">
                    Grab 2 products or spend <span style="color: rgb(184, 110, 37);">$100+</span> and enjoy
                    <span style="color: rgb(184, 110, 37);">FREE shipping</span>!
                </h4>
                <p>Enjoy free shipping on all purchases over $100 across Australia.</p>
                <p>Don’t miss out on this amazing deal!</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="shop-sidebar" class="home-1-slider-content-style-1__btn button-shop">Shop Now</a>
            </div>
        </div>
    </div>
</div>

<body>

    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Share this Website</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <!-- QR Code from Image -->
                    <div class="d-flex justify-content-center">
                        <img src="frontend/images/share-qr-code.png" alt="QR Code" class="img-fluid"
                            style="max-width: 150px;">
                    </div>

                    <!-- Success Message -->
                    <p class="text-success fw-bold mt-3">{{ Session::get('success') }}</p>

                    <!-- Referral Text -->
                    <p>Invite your friends to check out this amazing website!</p>

                    <!-- Share Link -->
                    <input type="text" id="shareLink" class="form-control text-center"
                        value="https://candlemagic.shop" readonly>
                    <p class="text-success fw-bold mt-3" id="successMessage2" style="display:none;">Link copied to
                        clipboard!</p>

                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button style="background: rgb(184, 110, 37); color: white;" class="btn ml-4" id="shareBtn">Share
                        QR</button>
                    <button class="btn btn-secondary mr-4" id="copyBtn">Copy Link</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Header Start -->
    <header class="header bg-white header-height">
        <!-- Header Top Start -->
        <div class="header__top">
            <div class="container-fluid custom-container">
                <div class="header__top--wrapper justify-content-center">
                    <p>WELCOME TO CANDLE MAGIC</p>
                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Middle Start -->
        <div class="header__middle d-flex align-items-center">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-4 d-none d-md-block">
                        <div class="header-mid-search">
                            <form action="{{ url('/search') }}">
                                @csrf
                                <div class="meta-search meta-search--dark">
                                    <input type="search" id="search-product" name="query"
                                        placeholder="Search products…" />
                                    <button aria-label="Search">
                                        <i class="lastudioicon-zoom-1"></i>
                                    </button>
                                </div>
                                <ul id="suggestions-list" class="suggestions-list"></ul>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 col-5">
                        <!-- Header Middle Logo Start -->
                        <div class="header-mid-logo text-md-center">
                            <a href="{{ url('/') }}">
                                <img src="frontend/images/logo.png" alt="Logo" width="200" height="38" />
                            </a>
                        </div>
                        <!-- Header Middle Logo End -->
                    </div>
                    <div class="col-md-4 col-7">
                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Header Middle Meta Start -->
                            <div class="header-mid-meta">
                                <ul class="header-mid-meta__item justify-content-end">
                                    <li class="m-0 ps-1">
                                        <button class="mobile-search-btn d-md-none" data-bs-toggle="modal" data-bs-target="#SearchModal" aria-label="search">
                                            <i class="lastudioicon-zoom-1"></i>
                                        </button>
                                    </li>
                                    <li class="m-0 px-1">
                                        <button data-bs-toggle="offcanvas" data-bs-target="#cartSidebar">
                                            <i class="lastudioicon-bag-20"></i>
                                            <span class="badge">{{ session('cartCount', 0) }}</span>
                                        </button>
                                    </li>
                                    <li class='px-2 mx-0'>
                                        @if (auth()->check())
                                            @php
                                                $userNameParts = explode(' ', auth()->user()->name);
                                                $lastName = end($userNameParts);
                                            @endphp
                                            <div class="dropdown">
                                                <button class="btn text-md text-sm" type="button"
                                                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="padding-bottom: 5px;">
                                                    {{ $lastName }}
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('/logout') }}"
                                                            onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                            <i class="fas fa-sign-out-alt"></i> Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        @else
                                            <a href="{{ url('/user/login') }}" class="btn"
                                                style="padding-bottom: 5px">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </a>
                                        @endif
                                    </li>

                                </ul>
                            </div>
                            <!-- Header Middle Meta End -->

                            <!-- Header Middle Toggle Start -->
                            <div class="header-mid-toggle text-end d-lg-none">
                                <button class="header-mid-toggle__toggle" data-bs-toggle="offcanvas"
                                    data-bs-target="#mobileMenu" aria-label="Menu">
                                    <i class="lastudioicon-menu-4-2"></i>
                                </button>
                            </div>
                            <!-- Header Middle Toggle End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Middle End -->

        <!-- Header Main Start -->
        <div class="header__main d-none d-lg-flex">
            <div class="container-fluid custom-container">
                <!-- Header Main Menu Start -->
                <nav class="header__main--menu position-relative">
                    <!-- Menu Item List Start -->
                    <ul class="menu-items-list menu-uppercase menu-items-list--dark justify-content-center d-flex">
                        <li>
                            <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="position-static">
                            <a class="{{ request()->is('shop-sidebar') ? 'active' : '' }}"
                                href="{{ url('shop-sidebar') }}">
                                <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
                                <span>About us</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('contact-us') ? 'active' : '' }}"
                                href="{{ url('contact-us') }}">
                                <span>Contact Us</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('order-tracking') ? 'active' : '' }}"
                                href="{{ url('order-tracking') }}">
                                <span>Track Order</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Menu Item List End -->
                </nav>
                <!-- Header Main Menu End -->
            </div>
        </div>
        <!-- Header Main End -->

    </header>
    <!-- Header End -->

    <!-- Cart Sidebar Start -->
    <!-- Cart Offcanvas Start -->
    @if (session('open_cart'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var cartSidebar = new bootstrap.Offcanvas(document.getElementById('cartSidebar'));
                cartSidebar.show();
            });
        </script>
    @endif
    <div class="offcanvas offcanvas-end cart-offcanvas" id="cartSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">My Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="remove">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="offcanvas-cart-list">
                @foreach ($cartItems as $item)
                    <li>
                        <!-- Offcanvas Cart Item Start -->
                        <div class="offcanvas-cart-item">
                            <div class="offcanvas-cart-item__thumbnail">
                                <a href="{{ url('product' . '/' . $item->name . '/' . $item->options->ptoken) }}">
                                    <img src="{{ $item->options->imgurl }}" width="70" height="84"
                                        alt="product" />
                                </a>
                            </div>
                            <div class="offcanvas-cart-item__content">
                                <h4 class="offcanvas-cart-item__title">
                                    <a
                                        href="{{ url('product' . '/' . $item->name . '/' . $item->options->ptoken) }}">{{ $item->name }}</a>
                                </h4>
                                <span class="offcanvas-cart-item__quantity">
                                    {{ $item->qty }} × ${{ number_format($item->price, 2) }}
                                </span>
                            </div>
                            <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="offcanvas-cart-item__remove" aria-label="remove"
                                    style="display:contents">
                                    <i class="lastudioicon-e-remove"></i>
                                </button>
                            </form>
                        </div>
                        <!-- Offcanvas Cart Item End -->
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="offcanvas-footer">
            <!-- Free Shipping Goal Start-->
            <div class="free-shipping-goal">
                <div class="free-shipping-goal__loading-bar">
                    <div class="load-percent" style="width: {{ session('cartCount', 0) * 100 }}%"></div>
                </div>
            </div>
            <!-- Free Shipping Goal End-->

            <!-- Cart Totals Table Start-->
            <div class="cart-totals-table">
                <table class="table">
                    <tbody>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total">
                                <strong><span>${{ $subtotal }}</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Cart Totals Table End-->

            <!-- Cart Buttons End-->
            <div class="cart-buttons">
                <a href="{{ url('/checkout') }}" class="cart-buttons__btn-1 btn">Checkout</a>
                <a href="{{ url('/cart') }}" class="cart-buttons__btn-2 btn">View Cart</a>
            </div>
            <!-- Cart Buttons End-->
        </div>
    </div>

    <!-- Cart Offcanvas End -->

    <!-- Cart Sidebar End -->

    <!-- Search Start -->
    <div class="search-modal modal fade" id="SearchModal">
        <button class="search-modal__close" data-bs-dismiss="modal" aria-label="remove">
            <i class="lastudioicon-e-remove"></i>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-modal__form">
                    <form action="{{ url('/search') }}" method="GET">
                        @csrf
                        <div class="meta-search meta-search--dark">
                            <input type="search" id="search-product-modal" name="query"
                                placeholder="Search products…" class="w-100" />
                            <button type="submit" aria-label="search">
                                <i class="lastudioicon-zoom-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Form End  -->
            </div>
        </div>
    </div>

    <!-- Search End -->

    <!-- Offcanvas Menu Start -->
    <div class="offcanvas offcanvas-end offcanvas-sidebar" tabindex="-1" id="offcanvasSidebar">
        <button type="button" class="offcanvas-sidebar__close" data-bs-dismiss="offcanvas" aria-label="remove">
            <i class="lastudioicon-e-remove"></i>
        </button>
        <div class="offcanvas-body">
            <!-- Off Canvas Sidebar Menu Start -->
            <div class="offcanvas-sidebar__menu">
                <ul class="offcanvas-menu-list">
                    <li>
                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="position-static">
                        <a class="{{ request()->is('shop-sidebar') ? 'active' : '' }}"
                            href="{{ url('shop-sidebar') }}">
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
                            <span>About us</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('contact-us') }}">
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('order-tracking') ? 'active' : '' }}"
                            href="{{ url('order-tracking') }}">
                            <span>Track Order</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Off Canvas Sidebar Info End -->


            <!-- Off Canvas Sidebar Social End -->
            <div class="offcanvas-sidebar__copyright">
                <p>
                    &copy; Copyright <strong><span>Candle Magic</span></strong>. All Rights Reserved
                </p>
            </div>
            <!-- Off Canvas Sidebar Social End -->
        </div>
    </div>

    <!-- Offcanvas Menu End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <!-- offcanvas-header Start -->
        <div class="offcanvas-header">
            <button type="button" class="mobile-menu__close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <!-- offcanvas-header End -->

        <!-- offcanvas-body Start -->
        <div class="offcanvas-body">
            <nav class="navbar-mobile-menu">
                <ul class="mobile-menu-items">
                    <li>
                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="position-static">
                        <a class="{{ request()->is('shop-sidebar') ? 'active' : '' }}"
                            href="{{ url('shop-sidebar') }}">
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
                            <span>About us</span>
                        </a>
                    </li>

                    <li>
                        <a class="{{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('contact-us') }}">
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('order-tracking') ? 'active' : '' }}"
                            href="{{ url('order-tracking') }}">
                            <span>Track Order</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- offcanvas-body end -->
    </div>

    <!-- Mobile Menu End -->

    <!-- Mobile Meta Start -->
    <div class="mobile-meta d-md-none">
        <ul class="mobile-meta-items">
            <li>
                <button data-bs-toggle="modal" data-bs-target="#SearchModal" aria-label="search">
                    <i class="lastudioicon-zoom-1" style="margin-right: 5px;"></i>Search Product...
                </button>
            </li>
        </ul>
    </div>

    <!-- Mobile Meta End -->

    <main>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">Checkout</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="/">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="header__top">
            <div class="container-fluid custom-container">
                <div class="header__top--wrapper justify-content-center">
                    <p>We offer Australia-wide express shipping via Australia Post. Please note that our order cutoff
                        time for same-day dispatch is 1:00 PM. Orders placed after this time will be dispatched on the
                        next business day.</p>
                </div>
            </div>
        </div>

        <!-- Checkout Start -->
        <div class="checkout-section">
            <center>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger p-4 w-100"
                        style="background-color: #ffcccc; opacity: 1; text-align: center;">
                        <h2 style="color: black; margin: 0;">{{ $message }}</h2>
                    </div>
                @endif
            </center>

            <div class="container-fluid custom-container">
                <!-- Checkout Start -->
                <div class="checkout-wrapper">
                    <form method="POST" action="{{ route('checkout.pay') }}">
                        @csrf
                        <div class="checkout-row">
                            <!-- Billing Details Column -->
                            <div class="checkout-col-1">
                                <div class="checkout-details">
                                    <h3 class="checkout-details__title">Billing details</h3>
                                    <div class="checkout-details__billing">
                                        <div class="row">
                                            <!-- First Name -->
                                            <div class="col-md-6">
                                                <div class="single-form mb-3">
                                                    <input class="single-form__input form-control" type="text"
                                                        name="first_name" placeholder="First name *"
                                                        value="{{ old('first_name') }}" required />
                                                    @if ($errors->has('first_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Last Name -->
                                            <div class="col-md-6">
                                                <div class="single-form mb-3">
                                                    <input class="single-form__input form-control" type="text"
                                                        name="last_name" placeholder="Last name *"
                                                        value="{{ old('last_name') }}" required />
                                                    @if ($errors->has('last_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phone -->
                                        <div class="single-form mb-3">
                                            <input class="single-form__input form-control" type="text"
                                                name="phone" placeholder="Phone *" value="{{ old('phone') }}"
                                                required />
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>

                                        <!-- Email -->
                                        <div class="single-form mb-3">
                                            <input class="single-form__input form-control" type="email"
                                                name="email" placeholder="Email address *"
                                                value="{{ old('email') }}" required />
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>


                                        <!-- Street Address -->
                                        <div class="single-form mb-3">
                                            <input class="single-form__input form-control" type="text"
                                                name="address_line1" placeholder="Street address *"
                                                value="{{ old('address_line1') }}" required />
                                            @if ($errors->has('address_line1'))
                                                <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                                            @endif
                                        </div>

                                        <!-- Suburb -->
                                        <div class="single-form mb-3">
                                            <input class="single-form__input form-control" type="text"
                                                name="suburb" placeholder="Suburb *" value="{{ old('suburb') }}"
                                                required />
                                            @if ($errors->has('suburb'))
                                                <span class="text-danger">{{ $errors->first('suburb') }}</span>
                                            @endif
                                        </div>

                                        <!-- State (Dropdown) -->
                                        <div class="single-form mb-3">
                                            <select class="single-form__input form-control" name="state" required>
                                                <option value="">Select State *</option>
                                                <option value="Queensland"
                                                    {{ old('state') == 'Queensland' ? 'selected' : '' }}>Queensland
                                                </option>
                                                <option value="Tasmania"
                                                    {{ old('state') == 'Tasmania' ? 'selected' : '' }}>Tasmania
                                                </option>
                                                <option value="New South Wales"
                                                    {{ old('state') == 'New South Wales' ? 'selected' : '' }}>New South
                                                    Wales</option>
                                                <option value="Victoria"
                                                    {{ old('state') == 'Victoria' ? 'selected' : '' }}>Victoria
                                                </option>
                                                <option value="Western Australia"
                                                    {{ old('state') == 'Western Australia' ? 'selected' : '' }}>Western
                                                    Australia</option>
                                                <option value="South Australia"
                                                    {{ old('state') == 'South Australia' ? 'selected' : '' }}>South
                                                    Australia</option>
                                            </select>
                                            @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>

                                        <!-- Postcode -->
                                        <div class="single-form mb-3">
                                            <input class="single-form__input form-control" type="text"
                                                name="postcode" placeholder="Postcode *"
                                                value="{{ old('postcode') }}" required />
                                            @if ($errors->has('postcode'))
                                                <span class="text-danger">{{ $errors->first('postcode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Summary Column -->
                            <div class="checkout-col-2">
                                <div class="checkout-details">
                                    <h3 class="checkout-details__title">Your order</h3>
                                    <div class="checkout-details__order-review">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartItems as $index => $item)
                                                    <tr class="cart-item">
                                                        <td class="product-name">
                                                            {{ $item->name }} &nbsp;
                                                            <strong>×&nbsp;{{ $item->qty }}</strong>
                                                        </td>
                                                        <td class="product-total">
                                                            <span>${{ number_format($item->price * $item->qty, 2) }}</span>
                                                        </td>
                                                        <input type="hidden" name="items[{{ $loop->index }}][name]"
                                                            value="{{ $item->name }}">
                                                        <input type="hidden"
                                                            name="items[{{ $loop->index }}][quantity]"
                                                            value="{{ $item->qty }}">
                                                        <input type="hidden"
                                                            name="items[{{ $loop->index }}][price]"
                                                            value="{{ $item->price }}">

                                                        <!-- Display error messages for each item -->
                                                        @if ($errors->has("items.{$loop->index}.name"))
                                                    <tr>
                                                        <td colspan="2">
                                                            <span
                                                                class="text-danger">{{ $errors->first("items.{$loop->index}.name") }}</span>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($errors->has("items.{$loop->index}.quantity"))
                                                    <tr>
                                                        <td colspan="2">
                                                            <span
                                                                class="text-danger">{{ $errors->first("items.{$loop->index}.quantity") }}</span>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($errors->has("items.{$loop->index}.price"))
                                                    <tr>
                                                        <td colspan="2">
                                                            <span
                                                                class="text-danger">{{ $errors->first("items.{$loop->index}.price") }}</span>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>
                                                        <span id="subtotal-amount">${{ $subtotal }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>
                                                        <strong
                                                            class="price">${{ number_format($shippingCost, 2) }}</strong>
                                                        <input type="hidden" name="shipping"
                                                            value="{{ $shippingCost }}">
                                                        @if ($errors->has('shipping'))
                                                            <div class="text-danger">{{ $errors->first('shipping') }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><strong id="total-amount">${{ $total }}</strong></td>
                                                    <input type="hidden" name="total"
                                                        value="{{ $total }}">
                                                    @if ($errors->has('total'))
                                                        <div class="text-danger">{{ $errors->first('total') }}</div>
                                                    @endif
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <!-- Payment Message -->
                                    <div class="checkout-details__payment-method">
                                        <div class="single-form text-center">
                                            <span>Your personal data will be used to process your order.</span>
                                        </div>
                                        <div class="single-form text-center">
                                            <img src="frontend/images/austrailian post.png" width="150px"
                                                height="80px">
                                            <br>
                                            <span style="color: #D91C29">We ship with Australia Post Express
                                                Shipping</span>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="checkout-details__btn">
                                        <button class="btn btn-primary" type="submit">Payment with Card</button>
                                    </div>

                                    <div class="p-0 mt-4">
                                        <div class="card border-0">
                                            <!-- Header Section -->
                                            <div
                                                class="card-header border-0 bg-white text-muted d-flex justify-content-center align-items-center">
                                                <div class="d-flex align-items-center w-100">
                                                    <hr class="flex-grow-1 border-muted">
                                                    <h5 class="mb-0 mx-2 text-center text-secondary">or bank transfer
                                                    </h5>
                                                    <hr class="flex-grow-1 border-muted">
                                                </div>
                                            </div>

                                            <!-- Bank Transfer Details Section -->
                                            <div class="container mt-4 mb-4">
                                                <div class="card mx-auto" style="max-width: 500px;">
                                                    <div class="card-header py-3 text-center">
                                                        <h5 class="mb-0">Bank Transfer Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <span class="text-muted">Bank Name:</span>
                                                                <span class="font-weight-bold text-dark">0000</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <span class="text-muted">Account Name:</span>
                                                                <span class="font-weight-bold text-dark">0000</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                                <span class="text-muted">BSB:</span>
                                                                <span class="font-weight-bold text-dark">00000</span>
                                                            </li>
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                                                <span class="text-muted">Account Number:</span>
                                                                <span
                                                                    class="font-weight-bold text-dark">000000000</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Checkout End -->
            </div>
        </div>

        <!-- Checkout End -->

    </main>
    <div class="whatsapp-chat-button">
        <a href="https://wa.me/61420517259" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat on WhatsApp">
            <span>Chat with Us</span>
        </a>
    </div>
    <!-- Footer Start -->
    <footer class="footer-section">
        <div class="container-fluid custom-container">
            <!-- Footer Main Start -->
            <div class="footer-main">
                <div class="footer-col-1 align-self-center">
                    <!-- Footer About Start -->
                    <div class="footer-about text-xxl-start text-center mx-xxl-0 mx-auto">
                        <a class="logo justify-content-xxl-start justify-content-center" href="#">
                            <img src="frontend/images/logo.png" alt="Logo" width="110" height="32"
                                loading="lazy" />
                        </a>
                        <p>Tiny flame, endless charm. </p>
                    </div>
                    <!-- Footer About End -->
                </div>

            </div>
            <!-- Footer Main End -->

            <!-- Footer CopyRight Start -->
            <div class="footer-copyright">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="text-center text-md-start">
                            <p>
                                &copy; Copyright <strong><span>Candle Magic</span></strong>. All Rights Reserved
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center text-md-end">
                            <img src="frontend/images/footer-payment-1.png" alt="Footer Payment" width="230"
                                height="17" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ url('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('frontend/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('frontend/js/glightbox.min.js') }}"></script>
    <script src="{{ url('frontend/js/nice-select2.js') }}"></script>
    <script src="{{ url('frontend/js/main.js') }}"></script>
    <script>
        var availableTags = [];

        $.ajax({
            method: 'GET',
            url: '/product-list',
            success: function(response) {
                startautocomplete(response);
            }
        });

        function startautocomplete(availableTags) {
            const options = {
                source: availableTags,
                minLength: 1,
                classes: {
                    "ui-autocomplete": "search-suggestions"
                }
            };

            $("#search-product").autocomplete(options);

            if (window.innerWidth < 768) {
                $("#search-product-modal").autocomplete(options);
            }
        }

        $('#SearchModal').on('shown.bs.modal', function() {
            $('#search-product-modal').trigger('focus');
        });
    </script>

    <script src="{{ url('frontend/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if ("{{ Session::get('success') }}" ===
                "Thank you for your purchase! Check your email inbox for details.") {
                var myModal = new bootstrap.Modal(document.getElementById('shareModal'));
                myModal.show();
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const shareLink = document.getElementById("shareLink").value;

            document.getElementById("copyBtn").addEventListener("click", function() {
                navigator.clipboard.writeText(shareLink).then(() => {
                    const successMessage = document.getElementById("successMessage2");
                    successMessage.style.display = "block";

                    setTimeout(() => {
                        successMessage.style.display = "none";
                    }, 3000);
                }).catch(() => {
                    alert("Failed to copy link.");
                });
            });

            document.getElementById("shareBtn").addEventListener("click", function() {
                if (navigator.share) {
                    // Create the QR code image as a file
                    const qrCodeUrl = 'frontend/images/share-qr-code.png';
                    const qrCodeName = 'Candle Magic.png';
                    fetch(qrCodeUrl)
                        .then(response => response.blob())
                        .then(blob => {
                            const qrCodeFile = new File([blob], qrCodeName, {
                                type: 'image/png'
                            });

                            navigator.share({
                                title: "Check out this amazing website!",
                                text: "Visit this wonderful site and explore!",
                                url: shareLink,
                                files: [qrCodeFile]
                            }).catch((error) => console.error("Error sharing:", error));
                        })
                        .catch(error => {
                            alert("Failed to load QR code image for sharing.");
                            console.error("Error fetching QR code image:", error);
                        });
                } else {
                    alert("Your browser does not support Web Share API.");
                }
            });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let shippingCost = @json($shippingCost);

        if (shippingCost > 0) {
            let promoModal = new bootstrap.Modal(document.getElementById("promoModal"));
            promoModal.show();
        }
    });
</script>


</body>

</html>
