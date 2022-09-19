<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pathports</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/')}}assets/multi/img/favicon.png" rel="icon">
  <link href="{{ asset('/')}}assets/multi/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->    
  <link href="{{ asset('/')}}assets/multi/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/multi/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/')}}assets/multi/css/style.css" rel="stylesheet">
</head>
<body>
  @include('frontend.layouts.partials._header')
  @yield('content')
  @include('frontend.layouts.partials._footer')
</body>
</html>

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('/')}}assets/multi/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/aos/aos.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('/')}}assets/multi/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('/')}}assets/multi/js/main.js"></script>