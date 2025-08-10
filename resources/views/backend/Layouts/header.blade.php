<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')- BlazeBloom</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="backend/img/favicon.png" rel="icon">
  <link href="backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="backend/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="backend/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="backend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="backend/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="backend/css/style.css" rel="stylesheet">z
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/admin') }}" class="logo d-flex align-items-center">
        <img src="backend/img/logo.png" alt="">
        <span class="d-none d-lg-block">BlazeBloom</span>
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
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset(session('image', 'default-profile-image.jpg')) }}" alt="Profile" class="rounded-circle">
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

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#bestselling-submenu" data-bs-toggle="collapse" href="#">
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
        <a class="nav-link collapsed" data-bs-target="#shops-submenu" data-bs-toggle="collapse" href="#">
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
            <a class="nav-link collapsed" data-bs-target="#testimonials-submenu" data-bs-toggle="collapse" href="#">
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
