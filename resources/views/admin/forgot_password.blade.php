


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    @section('title','Login Page || PathPorts')
    <link rel="apple-touch-icon" href="{{ asset('/')}}assets/admin/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/')}}assets/admin/images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/custom.css?v={{ time() }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
    <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
    <!-- Forgot Password basic -->
    <div class="card mb-0">
    <div class="card-body">
    <!-- <a href="index.html" class="brand-logo path-logo">
        <img src="{{ asset('/')}}assets/admin/images/path-logo.png" alt="path-logo">
    </a> -->
    @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
    <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
    <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

    <form class="auth-forgot-password-form mt-2" action="{{route('submit-ForgetPassword')}}" method="POST">
    @csrf
    <div class="mb-1">
    <label for="forgot-password-email" class="form-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="forgot-password-email" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
    @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
    </div>
    <button class="btn btn-primary w-100" tabindex="2">Send reset link</button>
    </form>

    <p class="text-center mt-2">
    <a href="{{url('login')}}"> <i data-feather="chevron-left"></i> Back to login </a>
    </p>
    </div>
    </div>
    <!-- /Forgot Password basic -->
    </div>
    </div>

    </div>
    </div>
    </div>
    <!-- END: Content-->

      <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/')}}assets/backend/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/')}}assets/admin/js/core/app-menu.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/core/app.js"></script>
    <!-- END: Theme JS-->


</body>
<!-- END: Body-->

</html>
