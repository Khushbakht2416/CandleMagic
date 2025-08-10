<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>Admin Login - Candle Magic</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../backend/img/favicon.png" rel="icon">
  <link href="../backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="../backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../backend/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../backend/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../backend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../backend/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../backend/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/admin') }}" class="logo d-flex align-items-center">
        <img src="../backend/img/logo.png" alt="">
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
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#354cc1">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="../{{ $admin->profile_image }}" alt="Profile" class="rounded-circle"
                                style="width: 150px; height: 125px;">
                            <h2>{{ $admin->name }}</h2>
                            <h3>{{ $admin->job }}</h3>
                            <div class="social-links mt-2">
                                <a href="{{ $admin->twitter }}" class="twitter" target="_blank"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="{{ $admin->facebook }}" class="facebook" target="_blank"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $admin->instagram }}" class="instagram" target="_blank"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $admin->linkedin }}" class="linkedin" target="_blank"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">{{ $admin->about }}</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->company }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->job }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->country }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->address }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->phone }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->email }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">


                                    <form action="{{ url('/admin/update/' . $admin->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="mb-3">
                                                    <img id="previewImage" src="../{{ $admin->profile_image }}"
                                                        alt="Profile" style="max-width: 200px;">
                                                </div>
                                                <div class="pt-2">
                                                    <input type="file" class="form-control" id="profileImage"
                                                        name="profileImage" accept="image/*" style="display:none;">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="document.getElementById('profileImage').click();"
                                                        title="Upload new profile image">
                                                        <i class="bi bi-upload"></i> Choose File
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" id="removeImage"
                                                        onclick="removeProfileImage();" style="display:none;"
                                                        title="Remove my profile image">
                                                        <i class="bi bi-trash"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control"
                                                    id="fullName" value="{{ $admin->name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $admin->about }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company"
                                                    value="{{ $admin->company }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job"
                                                    value="{{ $admin->job }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="{{ $admin->country }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="{{ $admin->address }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ $admin->phone }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="{{ $admin->email }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control" id="Twitter"
                                                    value="{{ $admin->twitter }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control"
                                                    id="Facebook" value="{{ $admin->facebook }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control"
                                                    id="Instagram" value="{{ $admin->instagram }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control"
                                                    id="Linkedin" value="{{ $admin->linkedin }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const input = document.getElementById('profileImage');
                                            const preview = document.getElementById('previewImage');
                                            const removeButton = document.getElementById('removeImage');

                                            input.addEventListener('change', function() {
                                                const file = this.files[0];

                                                if (file) {
                                                    const reader = new FileReader();

                                                    reader.addEventListener('load', function() {
                                                        preview.src = reader.result;
                                                        removeButton.style.display = 'inline-block';
                                                    });

                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        });

                                        function removeProfileImage() {
                                            const preview = document.getElementById('previewImage');
                                            const input = document.getElementById('profileImage');
                                            const removeButton = document.getElementById('removeImage');

                                            preview.src = "../{{ $admin->profile_image }}";
                                            input.value = '';
                                            removeButton.style.display = 'none';
                                        }
                                    </script>

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <form method="POST" action="{{ url('/admin/change-credentials/' . $admin->id) }}">
    @csrf

    <div class="row mb-3">
        <label for="currentUsername" class="col-md-4 col-lg-3 col-form-label">Current Username</label>
        <div class="col-md-8 col-lg-9">
            <input name="currentusername" type="text" class="form-control">
            @if ($errors->has('currentusername'))
                <span class="text-danger">
                    {{ $errors->first('currentusername') }}
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <label for="newUsername" class="col-md-4 col-lg-3 col-form-label">New Username</label>
        <div class="col-md-8 col-lg-9">
            <input name="newusername" type="text" class="form-control">
            @if ($errors->has('newusername'))
                <span class="text-danger">
                    {{ $errors->first('newusername') }}
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="currentpassword" type="password" class="form-control">
            @if ($errors->has('currentpassword'))
                <span class="text-danger">
                    {{ $errors->first('currentpassword') }}
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="newpassword" type="password" class="form-control">
            @if ($errors->has('newpassword'))
                <span class="text-danger">
                    {{ $errors->first('newpassword') }}
                </span>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
        <div class="col-md-8 col-lg-9">
            <input name="renewpassword" type="password" class="form-control">
            @if ($errors->has('renewpassword'))
                <span class="text-danger">
                    {{ $errors->first('renewpassword') }}
                </span>
            @endif
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update Credentials</button>
    </div>
</form>



                                </div>

                            </div>

                        </div>
                    </div>

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../backend/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../backend/vendor/chart.js/chart.umd.js"></script>
  <script src="../backend/vendor/echarts/echarts.min.js"></script>
  <script src="../backend/vendor/quill/quill.js"></script>
  <script src="../backend/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../backend/vendor/tinymce/tinymce.min.js"></script>
  <script src="../backend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../backend/js/main.js"></script>

</body>

</html>
