<!DOCTYPE html>
<html lang="en">
   <head>
      <title><title>@yield('title','Laravel')</title></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      

      <link rel="stylesheet" href="{{ asset('/')}}assets/backend/css/style.css">
      <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/custom.css">

      <link rel = "icon" type = "image/png" href = "{{ asset('/')}}assets/frontend/images/favicon.png">
   </head>
   <body>
      @include('frontend.layouts.partials._header')
      @yield('content')
      @include('frontend.layouts.partials._footer')
   </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(".nav-item").hover(
   
     function () {
   
       $(this).addClass("active");
   
     },
   
     function () {
   
       $(this).removeClass("active");
   
     }
   
   );
</script>