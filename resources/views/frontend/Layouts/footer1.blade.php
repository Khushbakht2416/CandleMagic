<!-- Footer Start -->
<footer class="footer-section">
    <div class="container-fluid custom-container">
        <!-- Footer Main Start -->
        <div class="footer-main">
            <div class="footer-col-1 align-self-center">
                <!-- Footer About Start -->
                <div class="footer-about text-xxl-start text-center mx-xxl-0 mx-auto">
                    <a class="logo justify-content-xxl-start justify-content-center" href="#">
                        <img src="{{ url('../../frontend/images/logo.png') }}" alt="Logo" width="110" height="32"
                            loading="lazy" />
                    </a>
                    <p>Tiny flame, endless charm. </p>
                </div>
                <!-- Footer About End -->
            </div>
            <div class="footer-col-2">
                <!-- Footer Link Start -->
                <div class="footer-link">
                    <div class="footer-link__wrapper">
                        <h2 class="footer-title">Company links</h2>

                        <ul class="footer-link__list">
                            <li><a href="{{ url('/about') }}">About us</a></li>
                            <li><a href="{{ url('/user/login') }}">Login & Register</a></li>
                            <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                            <li><a href="{{ url('/term-of-use') }}">Policy & Privacy</a></li>
                        </ul>
                    </div>
                    <div class="footer-link__wrapper">
                        <h2 class="footer-title">Shop</h2>
                        <ul class="footer-link__list">
                            <li>
                                <a href="shop-sidebar">
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="cart ">
                                    <span>Cart</span>
                                </a>
                            </li>
                            <li>
                                <a href="order-tracking">
                                    <span>Order Tracking</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="footer-link__wrapper">
                        <h2 class="footer-title">Contact</h2>

                        <ul class="footer-link__list">
                            <li>
                                <span>
                                    4517 Washington Ave. Manchester, Kentucky
                                    39495
                                </span>
                            </li>
                            <li>
                                <a href="mailto:info@example.com">
                                    info@example.com
                                </a>
                            </li>
                            <li>
                                <a href="tel:626997-4298">(626)997-4298</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Link End -->
            </div>
        </div>
        <!-- Footer Main End -->

        <!-- Footer CopyRight Start -->
        <div class="footer-copyright">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-center text-md-start">
                        <p>
                            &copy;
                            <span class="current-year"></span>
                            <span> Fatima </span> Made with
                            <i class="lastudioicon-heart-1"></i> by
                            <a href="https://fatima.com/">Fatima</a>
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
        $("#search-product").autocomplete({
            source: availableTags
        });
    }
</script>
<script>
    function decrementQuantity(button) {
        var quantityInput = button.form.quantity;
        var currentValue = parseInt(quantityInput.value, 10);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
</script>
<script src="{{ url('../../frontend/js/main.js') }}"></script>


</body>

</html>
