<?php $university_data = session()->get('university_data'); ?>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/bordered-layout.css">
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

<body class="login vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
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
                    <!-- Login basic -->
                    <div class="card mb-0">
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                  
                                     <p>{{ $message }}</p>
                                </div>
                                @endif
                            
                            @if($u_id)
                            
                                @if($u_id == @$university_data[0]['id'])
                                    <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{ asset('/assets/admin/images/university/logo/'.@$university_data[0]->uni_image)}}" alt="Alverno College | Alverno College"></a>
                                    <h4 class="card-title mb-1">Welcome to {{@$university_data[0]->uni_name}}! 👋</h4>
                                @else
                                    <a href="{{ route('dashboard') }}" class="brand-logo path-logo"><img src="{{ asset('/')}}assets/admin/images/path-logo.png" alt="path-logo"></a>
                                    <h4 class="card-title mb-1">Welcome to Pathports! 👋</h4>
                                @endif
                            @else
                                <a href="{{ route('dashboard') }}" class="brand-logo path-logo"><img src="{{ asset('/')}}assets/admin/images/path-logo.png" alt="path-logo"></a>
                                <h4 class="card-title mb-1">Welcome to Pathports! 👋</h4>
                            @endif

                            <!-- @if($id == @$university_data[0]['id'])
                            <h4 class="card-title mb-1">Welcome to {{@$university_data[0]->uni_name}}! 👋</h4>
                            @else
                            <h4 class="card-title mb-1">Welcome to Pathports! 👋</h4>
                            @endif -->


                            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                           
                            <form class="auth-login-form mt-2" action="{{ route('loginAttempt',$id) }}" method="POST" autocomplete="new-password">
                                @csrf
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" aria-describedby="email" tabindex="1" autofocus />
                                    @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary w-100 add-button btn-block" type="submit" tabindex="4">Sign in</button>
                            </form>
                             <a style="margin-left: 139px;" href="{{ route('forgot-password') }}">Forgot Password?</a>
                        </div>
                    </div>
                   
                    <!-- /Login basic -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('/')}}assets/admin/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('/')}}assets/admin/js/core/app-menu.js"></script>
<script src="{{ asset('/')}}assets/admin/js/core/app.js"></script>
<!-- END: Theme JS-->
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
</html>
