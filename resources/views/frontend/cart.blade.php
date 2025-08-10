<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Candle Magic || Cart</title>

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
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">Cart</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cart-section section-padding-2">
            <div class="container-fluid custom-container">
                <div class="cart-wrapper">
                    <div class="cart-form">
                        <center>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-block p-4 border-left-warning"
                                    style="background-color: rgb(170, 177, 125); opacity:1">
                                    <strong>
                                        <h2 style="color: black">{{ $message }}</h2>
                                    </strong>
                                </div>
                            @endif
                        </center>
                        <div class="free-shipping-goal">
                            <div class="free-shipping-goal__label text-center">
                                <strong>Product details</strong>
                            </div>
                            <div class="free-shipping-goal__loading-bar">
                                <div class="load-percent" style="width: {{ session('cartCount', 0) * 100  }}%"></div>
                            </div>
                        </div>

                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-remove">&nbsp;</th>
                                        <th class="cart-product-thumbnail">&nbsp;</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-company">Brand</th>
                                        <th class="cart-product-price text-center">Price</th>
                                        <th class="cart-product-quantity text-center">Quantity</th>
                                        <th class="cart-product-subtotal text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr class="cart-item" data-rowid="{{ $item->rowId }}" data-stock="{{ $item->options->maxquantity }}"
                                            data-price="{{ $item->price }}">
                                            <td class="cart-product-remove">
                                                <form action="{{ route('cart.remove', $item->rowId) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="remove">X</button>
                                                </form>
                                            </td>

                                            <td class="cart-product-thumbnail">
                                                <a
                                                    href="{{ url('product' . '/' . $item->name . '/' . $item->options->ptoken) }}">
                                                    <img src="{{ $item->options->imgurl }}" alt="Product"
                                                        width="70" height="89" />
                                                </a>
                                            </td>

                                            <td class="cart-product-name">
                                                <a
                                                    href="{{ url('product' . '/' . $item->name . '/' . $item->options->ptoken) }}">{{ $item->name }}</a>
                                            </td>
                                            <td class="cart-product-company">
                                                {{ $item->options->brand }}
                                            </td>

                                            <td class="cart-product-price text-md-center" data-title="Price">
                                                <span class="price-amount">
                                                    <ins>${{ number_format($item->price, 2) }}</ins>
                                                </span>
                                            </td>

                                            <td class="cart-product-quantity text-md-center" data-title="Quantity">
                                                <div class="product-single-content__quantity product-quantity">
                                                    <button type="button" class="decrease-btn"
                                                        aria-label="decrease">
                                                        <i class="lastudioicon-i-delete-2"></i>
                                                    </button>
                                                    <input class="quantity-input qty-input" type="text"
                                                        name="quantity" value="{{ $item->qty }}" />
                                                    <button type="button" class="increase-btn"
                                                        aria-label="increase">
                                                        <i class="lastudioicon-i-add-2"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td class="cart-product-subtotal text-md-center" data-title="Subtotal">
                                                <span class="price-amount">
                                                    ${{ number_format($item->price * $item->qty, 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr class="">
                                        <td colspan="6" class="actions">
                                            <form action="{{ route('cart.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="cart-update-btn" type="submit">Clear cart</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="cart-collaterals">
                        <div class="cart-totals">
                            <h3 class="cart-totals__title">Cart totals</h3>

                            <div class="cart-totals__table table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>
                                                <span id="subtotal-amount">${{ $subtotal }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                <ul class="shipping-methods">
                                                    <li class="single-form">
                                                        <label for="flat-rate" class="single-form__label">
                                                            <span></span>
                                                            Flat rate:
                                                            <strong
                                                                class="price" id="shipping">${{ number_format($shippingCost, 2) }}</strong>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong id="total-amount">${{ $total }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-totals__checkout">
                                <a href="checkout">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

                let cartItem = button.closest('.cart-item');
                let maxStock = parseInt(cartItem.getAttribute('data-stock'), 10);

                if (newQuantity < 1) return;

                if (change > 0 && newQuantity > maxStock) {
                    var modal = new bootstrap.Modal(document.getElementById('stockWarningModal'));
                    modal.show();
                    return;
                }

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
                        document.querySelector('.badge').textContent = data.cartCount;
                        document.getElementById('shipping').textContent = `$${data.shipping}`;
                    });
            }


        });
    </script>
</body>

</html>
