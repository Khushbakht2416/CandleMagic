<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <title>Orders Details- Candle Magic</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../backend/img/favicon.png" rel="icon">
    <link href="../../backend/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="../../backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../backend/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../backend/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../backend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../backend/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../backend/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/admin') }}" class="logo d-flex align-items-center">
                <img src="../../backend/img/logo.png" alt="">
                <span class="d-none d-lg-block">Candle Magic</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset(session('image', 'default-profile-image.jpg')) }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('username', 'Guest') }}</span>
                    </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ session('username', 'Guest') }}</h6>
                            <span>{{ session('job', 'Job Title') }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin/logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- Modal for confirmation -->
    <div class="modal fade" id="statusChangeModal" tabindex="-1" aria-labelledby="statusChangeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusChangeModalLabel">Confirm Status Change</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to change the status to <strong><span id="newStatusName"></span></strong>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateStatus()">Update Status</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="shipmentModal" tabindex="-1" aria-labelledby="shipmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shipmentModalLabel">Shipment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="shipmentForm">
                        <div class="mb-3">
                            <label for="trackingId" class="form-label">Tracking ID</label>
                            <input type="text" class="form-control" id="trackingId" name="trackingId"
                                placeholder="Enter tracking ID" required>
                            <div class="invalid-feedback" id="trackingIdError">Please enter a valid tracking ID.</div>
                        </div>
                        <p class="text-muted">Once you send the email, the customer will be notified with the shipment
                            details.</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="sendEmailToCustomer()">Send
                        Email</button>
                </div>
            </div>
        </div>
    </div>



    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#bestselling-submenu" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-star"></i>
                    <span>Best Selling</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="bestselling-submenu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('/admin/bestselling') }}">
                            <i class="bi bi-circle"></i><span>All BestSelling</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/add-bestselling') }}">
                            <i class="bi bi-circle"></i><span>Add BestSelling</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#shops-submenu" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-shop"></i>
                    <span>Products</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="shops-submenu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('/admin/shop') }}">
                            <i class="bi bi-circle"></i><span>All Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/add-shop') }}">
                            <i class="bi bi-circle"></i><span>Add Products</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/product_reviews') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Product Review</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#testimonials-submenu" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-chat-dots"></i>
                    <span>Testimonials</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="testimonials-submenu" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('/admin/testimonial') }}">
                            <i class="bi bi-circle"></i><span>All Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/add-testimonial') }}">
                            <i class="bi bi-circle"></i><span>Add Testimonial</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/customers') }}">
                    <i class="bi bi-people"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/orders') }}">
                    <i class="bi bi-credit-card"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/payments') }}">
                    <i class="bi bi-cart"></i>
                    <span>Payments</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/contact') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/admin/profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>

    </aside>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Order - Send Customized Email</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item">Orders</li>
                    <li class="breadcrumb-item active">Customized Email</li>
                </ol>
            </nav>
        </div>

        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#354cc1">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>

        <center>
            @if ($message = Session::get('error'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#e10e0e">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>

        <section class="section">
            <div class="container">
                <div class="row">
                    @php
                        $billing = json_decode($order->billing_details);
                    @endphp
                    <form action="{{ url('/admin/send-custom-email-to-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Recipient Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter recipient email" value="{{ $billing->email }}" disabled>
                            <input type="hidden" name="email" value="{{ $billing->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Message</label>
                            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="attachment" class="form-label">Attachment (optional)</label>
                            <input type="file" class="form-control" id="attachment" name="attachment">
                        </div>
                        <button type="submit" class="btn btn-primary">Send Email</button>
                    </form>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Candle Magic</span></strong>. All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../backend/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../backend/vendor/chart.js/chart.umd.js"></script>
    <script src="../../backend/vendor/echarts/echarts.min.js"></script>
    <script src="../../backend/vendor/quill/quill.js"></script>
    <script src="../../backend/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../backend/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../backend/vendor/php-email-form/validate.js"></script>

    <script>
        function confirmStatusChange() {
            const statusDropdown = document.getElementById('order-status');
            const currentStatus = '{{ $order->status }}';
            const newStatus = statusDropdown.value;
            if (newStatus !== currentStatus) {
                console.log(statusDropdown.value);
                if (newStatus === "shipped") {
                    const shipmentModal = new bootstrap.Modal(document.getElementById('shipmentModal'));
                    shipmentModal.show();
                    window.newStatus = newStatus;
                } else {
                    document.getElementById('newStatusName').innerText = newStatus.charAt(0).toUpperCase() + newStatus
                        .slice(1);
                    const confirmationModal = new bootstrap.Modal(document.getElementById('statusChangeModal'));
                    confirmationModal.show();
                    window.newStatus = newStatus;
                }
            } else {
                statusDropdown.value = currentStatus;
            }
        }

        function sendEmailToCustomer() {
            let trackingId = document.getElementById('trackingId').value.trim();
            console.log(trackingId);
            if (!trackingId) {
                document.getElementById('trackingIdError').style.display = 'block';
                return;
            }

            document.getElementById('trackingIdError').style.display = 'none';
            let url = `/admin/send-shipment-email/{{ $order->remember_token }}/${trackingId}`;
            window.location.href = url;
        }

        function updateStatus() {
            fetch('{{ route('admin.update-order-status', $order->id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: window.newStatus,
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to update order status.');
                    }
                })
                .catch(error => {
                    console.error('There was an error with the fetch operation:', error);
                    alert('An error occurred while updating the order status.');
                });

        }
    </script>
    <script src="../../backend/js/main.js"></script>

</body>

</html>
