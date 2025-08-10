<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Candle Magic || Home</title>

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Candle Magic - Candles" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontend/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

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
    <style>
        .banner {
            background: rgb(184, 110, 37);
            color: #f5f5f5;
            overflow: hidden;
            position: relative;
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 12px 0;
            white-space: nowrap;
        }

        .banner-text {
            display: flex;
            align-items: center;
            position: absolute;
            animation: slide 25s linear infinite;
            height: 100%;
            padding-left: 100%;
            padding-bottom: 10%;
            gap: 50px;
        }

        .banner-text strong {
            color: white;
            font-weight: 600;
        }

        /* Pause animation on hover */
        .banner:hover .banner-text {
            animation-play-state: paused;
            cursor: default;
        }

        /* Keyframes for infinite scrolling */
        @keyframes slide {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Responsive Fix */
        @media (max-width: 767px) {
            .banner {
                display: block !important;
                font-size: 1rem;
                padding: 10px 0;
            }
        }

        .home-1-slider-content-style-1__title {
            font-size: 2.5rem;
            color: rgb(184, 110, 37);
        }

        @media (max-width: 768px) {
            .home-1-slider-content-style-1__title {
                font-size: 1rem;
                text-align: left;
                width: 50%;
                white-space: normal;
            }

            .home-1-slider-content-style-1__btns {
                font-size: 1rem;
                padding: 2px 2px;
                justify-content: flex-start !important;
            }

            .button-shop{
                font-size: 0.8rem;
                padding: 10px 15px;
            }
        }

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

        .post-logo-center {
            width: min(50vw, 200px);
            height: auto;
            display: block;
            margin: 0 auto;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .post-logo-center {
            width: min(30vw, 150px);
            margin-left: 0px;
        }
        }

    </style>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>


<div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="promoModalLabel">Special Offer!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h4 class="fw-bold">Grab 2 products and enjoy <span style="color: rgb(184, 110, 37);">FREE shipping</span>!</h4>
                <p>Don’t miss out on this amazing deal!</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="shop-sidebar" class="home-1-slider-content-style-1__btn button-shop">Shop Now</a>
            </div>
        </div>
    </div>
</div>

<body>
    <!-- Header Start -->
    <header class="header bg-white header-height">
        <!-- Header Top Start -->
        <div class="header__top">
            <div class="container-fluid custom-container justify-content-center">
                <div class="header__top--wrapper justify-content-center">
                    <p>WELCOME TO CANDLE MAGIC</p>
                </div>
            </div>
        </div>
        <div class="banner">
            <div class="banner-text">
                <strong>Shop More, Save More! Enjoy free shipping on all purchases over $150 across Australia. Exciting
                    new flavors are coming soon! Stay connected for updates and announcements.</strong>
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
                            <div class="header-mid-toggle text-end d-lg-none ms-1 ps-2">
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

        <!-- Slider Start -->
        <div class="slider-section slider-active navigation-arrows-style-1">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slider Item Start -->
                    <div class="slider-item home-1-slider-style-1 swiper-slide d-md-flex align-items-center"
                        style="
                                background-image: url(frontend/images/slider/slider-3.jpg);
                            ">
                        <div class="container-fluid custom-container">
                            <!-- Slider Content Start -->
                            <div class="home-1-slider-content-style-1 text-center">
                                <h2 class="home-1-slider-content-style-1__title">
                                    We ship all over Australia via express shipping
                                </h2>

                                <div class="post-logo-center d-flex justify-content-center">
                                    <img src="frontend/images/australiapost.png"/>
                                </div>

                                <ul class="home-1-slider-content-style-1__btns justify-content-center">
                                    <li class="button-01">
                                        <a class="home-1-slider-content-style-1__btn button-shop" href="shop-sidebar">
                                            Shop now
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Slider Item End -->
                </div>

            </div>
        </div>
        <!-- Slider End -->


        <!-- Product Best Selling Start -->
        <div class="product-section section-padding">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">Best Selling</h2>
                    <div class="section-title__shape">
                        <img src="frontend/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <ul class="home-1-slider-content-style-1__btns justify-content-center">
                    <li class="button-01 border-black">
                        <a class="home-1-slider-content-style-1__btn" href="shop-sidebar">
                            View All Products
                        </a>
                    </li>
                </ul>
                <!-- Section Title End -->

                <!-- Product Wrapper Start -->
                <div class="shop-section section-padding-2">
                    <div class="container-fluid custom-container">
                        <center>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-block p-4 w-50 border-left-warning"
                                    style="background-color: rgb(170, 177, 125); opacity:1">
                                    <strong>
                                        <h2 style="color: black" style="justify-content: center">{{ $message }}
                                        </h2>
                                    </strong>
                                </div>
                            @endif
                        </center>
                        <center>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-block p-4 w-50 border-left-warning"
                                    style="background-color: rgb(170, 177, 125); opacity:1">
                                    <strong>
                                        <h2 style="color: black" style="justify-content: center">{{ $message }}
                                        </h2>
                                    </strong>
                                </div>
                            @endif
                        </center>
                        <div class="shop-wrapper">
                            <div class="row gy-5 justify-content-center">
                                <div class="col-lg-9 mx-auto">
                                    <div class="row">
                                        @foreach ($products as $company => $items)
                                            <div class="company-section">
                                                <h2 style="padding-left:35px" class="mt-4">{{ $company }}</h2>
                                                @php
                                                    if ($company == 'IGET Bar') {
                                                        $company = 'igetbar';
                                                    } elseif ($company == 'IGET Moon') {
                                                        $company = 'igetmoon';
                                                    } elseif ($company == 'AliBar') {
                                                        $company = 'alibar';
                                                    } else {
                                                        $company = 'kuz';
                                                    }
                                                @endphp
                                                <a class="home-1-slider-content-style-1__btn"
                                                    href="{{ route($company) }}">
                                                    View all products related to this brand
                                                </a>
                                                <div class="row">
                                                    @foreach ($items as $row)
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="single-product js-scroll ShortFadeInUp">
                                                                <div class="single-product__thumbnail">
                                                                    @if ($row->saletag == 'Sale')
                                                                        <div
                                                                            class="single-product__thumbnail--badge onsale">
                                                                            {{ $row->saletag }}
                                                                        </div>
                                                                    @endif
                                                                    <div class="single-product__thumbnail--holder">
                                                                        <a
                                                                            href="{{ url('product/' . $row->pname . '/' . $row->addtocart) }}">
                                                                            <img src="{{ $row->imgurl }}"
                                                                                alt="Product" width="344"
                                                                                height="370" />
                                                                        </a>
                                                                    </div>
                                                                    <div class="single-product__thumbnail--meta-2">
                                                                        <form action="{{ route('cart.add') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $row->id }}">
                                                                            <input type="hidden" name="name"
                                                                                value="{{ $row->pname }}">
                                                                            <input type="hidden" name="token"
                                                                                value="{{ $row->addtocart }}">
                                                                            <button type="submit"
                                                                                class="btn btn-primary"
                                                                                style="background-color: white">
                                                                                <i
                                                                                    class="lastudioicon-shopping-cart-3"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <h3
                                                                    class="single-product__info--title d-flex align-items-center">
                                                                    <a
                                                                        href="{{ url('product/' . $row->pname . '/' . $row->addtocart) }}">
                                                                        {{ $row->pname }}
                                                                    </a>
                                                                    @if ($row->quantity == 0)
                                                                        <span class="badge ms-2"
                                                                            style="background: rgb(177, 51, 25); font-size: 10px;">Out
                                                                            of Stock</span>
                                                                    @endif


                                                                </h3>
                                                                <p style="color:rgb(79, 78, 77)">
                                                                    {{ $row->company }}
                                                                </p>
                                                                <p style="color:rgb(79, 78, 77)"> {{ $row->duration }}
                                                                </p>
                                                                <div class="single-product__info--price">
                                                                    @if ($row->saletag == 'Sale')
                                                                        <del>{{ $row->actualprice }}</del>
                                                                        <ins>{{ $row->afterdiscount ?? $row->actualprice }}</ins>
                                                                    @else
                                                                        <ins>{{ $row->actualprice }}</ins>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Wrapper End -->
            </div>
        </div>
        <!-- Product Best Selling End -->
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
            document.querySelectorAll('.increase-btn').forEach(button => {
                button.addEventListener('click', function() {
                    changeQuantity(this, 1);
                });
            });

            document.querySelectorAll('.decrease-btn').forEach(button => {
                button.addEventListener('click', function() {
                    changeQuantity(this, -1);
                });
            });

            function changeQuantity(button, change) {
                let quantityInput = button.parentElement.querySelector('.quantity-input');
                let currentQuantity = parseInt(quantityInput.value, 10);
                let newQuantity = currentQuantity + change;

                if (newQuantity < 1) return;

                quantityInput.value = newQuantity;
                updateCart(button);
            }

            function updateCart(button) {
                let cartItem = button.closest('.cart-item');
                let rowId = cartItem.getAttribute('data-rowid');
                let quantity = parseInt(cartItem.querySelector('.quantity-input').value, 10);

                fetch(`/cart/update/${rowId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        cartItem.querySelector('.cart-product-subtotal .price-amount').textContent =
                            `$${data.carttotal}`;
                        document.getElementById('subtotal-amount').textContent = `$${data.subtotal}`;
                        document.getElementById('total-amount').textContent = `$${data.total}`;
                    });
            }
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let lastShown = localStorage.getItem("promoModalShownTime");
        let currentTime = new Date().getTime();
        let oneHour = 60 * 60 * 1000;
        if (!lastShown || (currentTime - lastShown) > oneHour) {
            let promoModal = new bootstrap.Modal(document.getElementById("promoModal"));
            promoModal.show();
            localStorage.setItem("promoModalShownTime", currentTime);
        }
    });
</script>

</body>

</html>
