<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Product || {{ $product->pname }}</title>

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Candle Magic - Candles" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../../frontend/images/favicon.png') }}" />
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
    <link rel="stylesheet" href="{{ url('../../frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../../frontend/css/lastudioicon.css') }}" />

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ url('../../frontend/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../../frontend/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../../frontend/css/nice-select2.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('../../frontend/css/style.min.css') }}" />
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


<body>

    <!-- Bootstrap Modal -->
<div class="modal fade" id="stockWarningModal" tabindex="-1" aria-labelledby="stockWarningLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="stockWarningLabel">Warning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Exceeds available stock. Please reduce the quantity.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
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
                                <img src="{{ url('../../frontend/images/logo.png') }}" alt="Logo" width="200"
                                    height="38" />
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
                                    <img src="../../{{ $item->options->imgurl }}" width="70" height="84"
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
            <!-- Off Canvas Sidebar Menu End -->

            <!-- Off Canvas Sidebar Info Start -->

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
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">{{ $product->pname }}</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="/">Home</a></li>
                        <li><a href="/shop-sidebar">Products</a></li>
                        <li><span>{{ $product->pname }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-single-section section-padding-2">
            <div class="container-fluid custom-container">
                <center>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-block p-4 border-left-warning"
                            style="background-color: rgb(170, 177, 125); opacity:1">
                            <strong>
                                <h2 style="color: black">{{ $message }}</h2>
                            </strong>
                        </div>
                    @endif
                </center>
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
                <div class="product-single-wrapper">
                    <div class="product-single-col-1">
                        <div class="product-single-image">
                            <div class="product-single-slide navigation-arrows-style-1">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="product-single-slide swiper-slide">
                                            <center>
                                                <img src="{{ asset($product->imgurl) }}" alt="{{ $product->pname }}"
                                                    width="300" height="420" />
                                            </center>
                                        </div>
                                    </div>
                                    <div class="product-single-zoom">
                                        <div class="zoom">
                                            <a class="product-glightbox" href="{{ asset($product->imgurl) }}"
                                                aria-label="zoom image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-single-col-2">
                        <div class="product-single-content">
                            <h2 class="product-single-content__title">{{ $product->pname }}</h2>
                            <div class="product-single-content__price-stock">
                                <div class="product-single-content__price">
                                    <ins>{{ $product->afterdiscount ?? $product->actualprice }}</ins>
                                    @if ($product->afterdiscount)
                                        <del>{{ $product->actualprice }}</del>
                                    @endif
                                </div>
                                <div class="product-single-content__stock">
                                    <span class="stock-icon">
                                        <i class="dlicon ui-1_check-circle-08"></i>
                                    </span>
                                    <span class="stock-text">
                                        {{ $product->status ? 'In stock '.$product->quantity : 'Out of stock' }}
                                    </span>
                                </div>
                            </div>
                            <div class="product-single-content__short-description">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product-single-content__add-to-cart-wrapper">
                                <div class="product-single-content__quantity-add-to-cart">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->pname }}">
                                        <input type="hidden" name="token" value="{{ $product->addtocart }}">
                                        <div style="display: flex;">
                                            <div class="product-single-content__quantity product-quantity">
                                                <button type="button" class="decrease" aria-label="decrease"
                                                    onclick="decrementQuantity(this)">
                                                    <i class="lastudioicon-i-delete-2"></i>
                                                </button>
                                                <input class="quantity-input" type="text" name="quantity"
                                                    value="1" />
                                                <button type="button" class="increase" aria-label="increase"
                                                    onclick="incrementQuantity(this)">
                                                    <i class="lastudioicon-i-add-2"></i>
                                                </button>
                                            </div>

                                            <button type="submit" class="product-single-content__add-to-cart btn">
                                                Add to cart
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="product-single-content__meta">
                                <div class="product-single-content__meta--item">
                                    <div class="label">Company:</div>
                                    <div class="content">{{ $product->company }}</div>
                                </div>
                                <div class="product-single-content__meta--item">
                                    <div class="label">Duration:</div>
                                    <div class="content">{{ $product->duration }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-single-tabs-section section-padding-2">
            <div class="container-fluid custom-container">
                <div class="product-single-tabs">
                    <ul class="nav justify-content-center">
                        <li>
                            <button class="active" data-bs-toggle="pill" data-bs-target="#description"
                                type="button">
                                Description
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="pill" data-bs-target="#reviews" type="button">
                                Reviews
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-6">
                                    <div class="product-single-tab-description">
                                        <div class="product-single-tab-description-item">
                                            <h4 class="product-single-tab-description-item__title">
                                                + USEFUL INFORMATION
                                            </h4>
                                            <p>{{ $product->information }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div class="product-single-review">
                                <div class="product-comment-form">
                                    <h3 class="comment-title">
                                        Add a review
                                    </h3>
                                    <form method="POST"
                                        action="{{ url('makereview/' . $product->pname . '/' . $product->addtocart) }}">
                                        @csrf
                                        <div class="comment-form">
                                            <div class="single-form">
                                                <label class="single-form__label">Your review *</label>
                                                <textarea class="single-form__input" name="review_message">{{ old('review_message') }}</textarea>
                                            </div>
                                            @if ($errors->has('review_message'))
                                                <span class="text-danger">
                                                    {{ $errors->first('review_message') }}
                                                </span>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Name *</label>
                                                        <input type="text" class="single-form__input"
                                                            name="username" value="{{ old('username') }}" />
                                                    </div>
                                                    @if ($errors->has('username'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('username') }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Email *</label>
                                                        <input type="email" class="single-form__input"
                                                            name="email" value="{{ old('email') }}" />
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="single-form">
                                                <input type="checkbox" name="save" id="save" />
                                                <label class="single-form__label checkbox-label" for="save">
                                                    <span></span>
                                                    Save my name, email, and website in this browser for the next time I
                                                    comment.
                                                </label>
                                            </div>
                                            <div class="single-form">
                                                <button class="single-form__btn" type="submit">Post Review</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="product-single-review-items">
                                    <h3 class="comment-title">Customer reviews</h3>
                                    @foreach ($reviews as $review)
                                        <div class="product-review-item">
                                            <div class="product-review-item__info">
                                                <div class="product-review-item__avatar">
                                                    <img src="{{ $review->imageurl }}" alt="Avatar"
                                                        width="50" height="50" />
                                                </div>
                                                <div class="product-review-item__info-content">
                                                    <h6 class="product-review-item__name">{{ $review->rname }}</h6>
                                                    <div class="product-review-item__date">{{ $review->date }}</div>
                                                </div>
                                            </div>
                                            <div class="product-review-item__content">
                                                <p>{{ $review->rmessage }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Single Tabs End -->
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
                            <img src="{{ url('../../frontend/images/logo.png') }}" alt="Logo" width="110"
                                height="32" loading="lazy" />
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
                            <img src="../../frontend/images/footer-payment-1.png" alt="Footer Payment" width="230"
                                height="17" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer CopyRight End -->
        </div>
    </footer>

    <!-- Footer End -->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Bootstrap JS -->
    <script src="{{ url('../../frontend/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ url('../../frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('../../frontend/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('../../frontend/js/glightbox.min.js') }}"></script>
    <script src="{{ url('../../frontend/js/nice-select2.js') }}"></script>

    <!-- Activation JS -->
    <script src="{{ url('../../frontend/js/main.js') }}"></script>
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
    <script>
        function decrementQuantity(button) {
            var quantityInput = button.form.quantity;
            var currentValue = parseInt(quantityInput.value, 10);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function incrementQuantity(button) {
            var quantityInput = button.form.quantity;
            var currentValue = parseInt(quantityInput.value, 10);
            var maxQuantity = <?php echo $product->quantity; ?>;
            if (currentValue >= 1) {
                if (currentValue < maxQuantity) {
                    quantityInput.value = currentValue + 1;
                } else {
                    var modal = new bootstrap.Modal(document.getElementById('stockWarningModal'));
                    modal.show();
                }
            }
        }
    </script>
    <script src="{{ url('../../frontend/js/main.js') }}"></script>


</body>

</html>
