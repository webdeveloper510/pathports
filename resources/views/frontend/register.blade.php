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



    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/wizard/bs-stepper.min.css">
  
     
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/> 
    
   
    <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/style.css">
    <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container {
            width: 100% !important;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 42px;
            padding: 4px 0 0 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder{
            color: #999;
            font-size: 15px;
            margin:  8px 0;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected]{
            background-color: #ed502e;
            color: white;
        }

    </style>
</head>
<body>

@include('frontend.layouts.partials._header')

<div class="main-custom-stepper">
    <div class="container">
        
        <!-- Modern Horizontal Wizard -->
       

        <section class="modern-horizontal-wizard mt-3">
            <div class="bs-stepper wizard-modern modern-wizard-example">

                <div class="bs-stepper-header custom-stepper">

                    <!-- <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box tab_box">
                                <i data-feather="file-text" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title tab_text">University</span>
                                <span class="bs-stepper-subtitle tab_subtitle_text">Add University Details</span>
                            </span>
                        </button>
                    </div> -->
                   <!--  <div class="line">
                        
                    </div> -->
                    <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box tab_box">
                                <i data-feather="user" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title tab_text">Students</span>
                                <span class="bs-stepper-subtitle tab_subtitle_text">Add Students Info</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                       <!-- <i data-feather="chevron-right" class="font-medium-2"></i>-->
                    </div>
                    <div class="step" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box tab_box">
                               <!--  <i data-feather="map-pin" class="font-medium-3"></i> -->
                                     <i data-feather="user" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title tab_text">Alumni</span>
                                <span class="bs-stepper-subtitle tab_subtitle_text">Add Alumni</span>
                            </span>
                        </button>
                    </div>
                     <div class="line">
                        <!-- <i data-feather="chevron-right" class="font-medium-2"></i> -->
                    </div>
                    <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-box tab_box">
                                <!-- <i data-feather="link" class="font-medium-3"></i> -->
                                      <i data-feather="user" class="font-medium-3"></i>
                            </span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title tab_text">Boosters</span>
                                <span class="bs-stepper-subtitle tab_subtitle_text">Add Booster</span>
                            </span>
                        </button>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert register-success">
                        <p>{{ $message }}</p>   
                    </div>
                @endif 
                <div class="bs-stepper-content02">
                    <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tab_id" value="2">
                        <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                       
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-firstname">First Name</label>
                                <input type="text"  name="firstname" placeholder="First Name" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}"  />
                                @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-lastname">Last Name</label>
                                <input type="text"  name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}" placeholder="Last Name"/>
                                @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-username">Prefered Name</label>
                                <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="Prefered Name"/>
                                @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-phone">Phone</label>
                                <input type="text"  name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}" placeholder="Phone"/>
                                @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Email</label>
                                <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email"/>
                                @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Alternate Email</label>
                                <input type="email"  name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror" placeholder="john.doe@email.com" placeholder="Alternate Email" />
                                @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-password">Password</label>
                                <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"/>
                                @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                                <input type="password"   name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  placeholder="Confirm Password"/>
                                @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6 share-sole-detail">
                                <label for="customFile1" class="form-label">Resume</label>
                                <input class="form-control" type="file"  name="graudate_resume">
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <!-- <a href="http://wellspringinfotech.com/pathports/login/"><button class="btn btn-success btn-submit submit_button">Submit</button></a> -->
                            <button type="submit" class="btn btn-primary me-1 add-button register_button">Submit</button>
                        </div>
                        </div>
                    </form>
                    <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tab_id" value="3">
                        <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                       
                        
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-firstname">First Name</label>
                                <input type="text"  name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                                @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-lastname">Last Name</label>
                                <input type="text"  name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                                @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-username">Prefered Name</label>
                                <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                                @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-phone">Phone</label>
                                <input type="text"  name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                                @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Email</label>
                                <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                                @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Alternate Email</label>
                                <input type="email"  name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror"   />
                                @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-password">Password</label>
                                <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" />
                                @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                                <input type="password"   name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                                @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">

                                <label class="form-label">University</label>

                                <select class="form-select user-register select2 @error('university_id') is-invalid @enderror"  name="university_id">
                                    <option value="">Please Select University</option>
                                    @foreach($univeristy as $universities)

                                        <option {{ old('university_id') == $universities->id ? 'selected' : '' }} value="{{$universities->id}}">{{$universities->uni_name}}</option>
                                    @endforeach;
                                </select>

                                @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">School ID-no SS#</label>
                                <input type="text"  class="form-control" placeholder="" aria-label="john.doe" />
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label for="customFile1" class="form-label">Resume</label>
                                <input class="form-control" type="file"  name="graudate_resume" />
                            </div>
                            
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            
                            <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                            <button type="submit" class="btn btn-primary me-1 add-button register_button">Submit</button>
                        </div>
                        </div>
                    </form>
                    <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tab_id" value="4">
                        <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-firstname">First Name</label>
                                <input type="text"  name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                                @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                                @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-username">Prefered Name</label>
                                <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                                @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-phone">Phone</label>
                                <input type="text"  name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                                @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Email</label>
                                <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                                @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Alternate Email</label>
                                <input type="email"  name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror"   />
                                @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-password">Password</label>
                                <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" />
                                @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                                <input type="password"   name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                                @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">

                                <label class="form-label">University</label>

                                <select class="form-select user-register select2 @error('university_id') is-invalid @enderror"  name="university_id">
                                    <option value="">Please Select University</option>
                                    @foreach($univeristy as $universities)

                                        <option {{ old('university_id') == $universities->id ? 'selected' : '' }} value="{{$universities->id}}">{{$universities->uni_name}}</option>
                                    @endforeach;
                                </select>

                                @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">School ID-no SS#</label>
                                <input type="text"  class="form-control" placeholder="" aria-label="john.doe" />
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label for="customFile1" class="form-label">Resume</label>
                                <input class="form-control" type="file"   name="graudate_resume"/>
                            </div>
                            
                        </div>
                         <div class="d-flex justify-content-center mt-3">
                           
                            <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                            <button type="submit" class="btn btn-primary me-1 add-button register_button">Submit</button>
                        </div>
                        
                        </div>
                    </form>
                    <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tab_id" value="5">
                        <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
                        
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-firstname">First Name</label>
                                <input type="text"  name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                                @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-lastname">Last Name</label>
                                <input type="text"  name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                                @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-username">Prefered Name</label>
                                <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                                @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-phone">Phone</label>
                                <input type="text"  name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                                @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Email</label>
                                <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                                @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label class="form-label" for="modern-email">Alternate Email</label>
                                <input type="email"  name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror"   />
                                @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-password">Password</label>
                                <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" />
                                @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                            <div class="form-password-toggle col-md-6">
                                <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                                <input type="password"   name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                                @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 share-sole-detail">

                                <label class="form-label">University</label>

                                <select class="form-select user-register select2  @error('university_id') is-invalid @enderror"  name="university_id">
                                    <option value="">Please Select University</option>
                                    @foreach($univeristy as $universities)

                                        <option {{ old('university_id') == $universities->id ? 'selected' : '' }} value="{{$universities->id}}">{{$universities->uni_name}}</option>
                                    @endforeach;
                                </select>

                                @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                            </div>
                            <div class="col-md-6 share-sole-detail">
                                <label for="customFile1" class="form-label">Resume</label>
                                <input class="form-control" type="file"   name="graudate_resume"/>
                            </div>
                            
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            
                            <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                            <button type="submit" class="btn btn-primary me-1 add-button register_button">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /Modern Horizontal Wizard -->
    </div>
</div>

@include('frontend.layouts.partials._footer')
</body>
</html>

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('/')}}assets/multi/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/aos/aos.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('/')}}assets/multi/vendor/php-email-form/validate.js"></script>

    <script src="{{ asset('/')}}assets/multi/js/main.js"></script>
    <script src="{{ asset('/')}}assets/admin/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/core/app-menu.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/core/app.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-wizard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        $('.select2').select2();
        $('.phone-number-mask').inputmask('999.999.9999');
    </script>
