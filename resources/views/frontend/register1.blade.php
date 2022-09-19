<!DOCTYPE html>

<html lang="en">

<head>

  <title>Pathports</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/style.css">
  <link rel = "icon" type = "image/png" href = "{{ asset('/')}}assets/frontend/images/favicon.png">



   <!--  <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/bootstrap.css"> -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/form-wizard.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/frontend/assets/css/custom.css"> -->

    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/style.css">
      <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/style.css">
      <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/custom.css">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>



</head>

<body>



@include('frontend.layouts.partials._header')
<div class="container">
    <!-- Modern Horizontal Wizard -->
    <section class="modern-horizontal-wizard">
        <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box tab_box">
                            <i data-feather="file-text" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title tab_text">University</span>
                            <span class="bs-stepper-subtitle tab_subtitle_text">Add University Details</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <!-- <i data-feather="chevron-right" class="font-medium-2"></i>-->
                </div>
                <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box tab_box">
                            <i data-feather="user" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title tab_text">Graduates</span>
                            <span class="bs-stepper-subtitle tab_subtitle_text">Add Graduates Info</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                   <!-- <i data-feather="chevron-right" class="font-medium-2"></i>-->
                </div>
                <div class="step" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box tab_box">
                            <i data-feather="map-pin" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title tab_text">Alumini</span>
                            <span class="bs-stepper-subtitle tab_subtitle_text">Add Alumini</span>
                        </span>
                    </button>
                </div>
                 <div class="line">
                    <!-- <i data-feather="chevron-right" class="font-medium-2"></i> -->
                </div>
                <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box tab_box">
                            <i data-feather="link" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title tab_text">Booster</span>
                            <span class="bs-stepper-subtitle tab_subtitle_text">Add Booster</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tab_id" value="2">
                    <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                   
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                            @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                            @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Prefered Name</label>
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                            @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-phone">Phone</label>
                            <input type="text" id="contact" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                            @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                            @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Alternate Email</label>
                            <input type="email" id="modern-email" name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror" placeholder="john.doe@email.com"  />
                            @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="confirm_password"  name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                            @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="mb-3 col-md-6">
                            <label for="customFile1" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="formFile" name="graudate_resume">
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <!-- <a href="http://wellspringinfotech.com/pathports/login/"><button class="btn btn-success btn-submit submit_button">Submit</button></a> -->
                        <button type="submit" class="btn btn-primary me-1 add-button">Submit</button>
                    </div>
                    </div>
                </form>
                <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tab_id" value="3">
                    <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                   
                    
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                            @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                            @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Prefered Name</label>
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                            @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-phone">Phone</label>
                            <input type="text" id="contact" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                            @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                            @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Alternate Email</label>
                            <input type="email" id="modern-email" name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror" placeholder="john.doe@email.com"  />
                            @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="confirm_password"  name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                            @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">School ID-no SS#</label>
                            <input type="text" id="modern-sid" class="form-control" placeholder="" aria-label="john.doe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="customFile1" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="uni_image" name="graudate_resume" />
                        </div>
                        
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        
                        <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                        <button type="submit" class="btn btn-primary me-1 add-button">Submit</button>
                    </div>
                    </div>
                </form>
                <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tab_id" value="4">
                    <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                            @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                            @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Prefered Name</label>
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                            @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-phone">Phone</label>
                            <input type="text" id="contact" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                            @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                            @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Alternate Email</label>
                            <input type="email" id="modern-email" name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror" placeholder="john.doe@email.com"  />
                            @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="confirm_password"  name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                            @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">School ID-no SS#</label>
                            <input type="text" id="modern-sid" class="form-control" placeholder="" aria-label="john.doe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="customFile1" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="uni_image"  name="graudate_resume"/>
                        </div>
                        
                    </div>
                     <div class="d-flex justify-content-end mt-3">
                       
                        <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                        <button type="submit" class="btn btn-primary me-1 add-button">Submit</button>
                    </div>
                    
                    </div>
                </form>
                <form method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tab_id" value="5">
                    <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
                    
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" />
                            @error('firstname')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{old('lastname')}}"/>
                            @error('lastname')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Prefered Name</label>
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}"/>
                            @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-phone">Phone</label>
                            <input type="text" id="contact" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" aria-label="john.doe" value="{{old('contact')}}"/>
                            @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
                            @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Alternate Email</label>
                            <input type="email" id="modern-email" name="alternat_email" class="form-control @error('alternat_email') is-invalid @enderror" placeholder="john.doe@email.com"  />
                            @error('alternat_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="confirm_password"  name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />
                            @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="customFile1" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="uni_image"  name="graudate_resume"/>
                        </div>
                        
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        
                        <!-- <button class="btn btn-success btn-submit submit_button"><a href="http://wellspringinfotech.com/pathports/login/">Submit</a></button> -->
                        <button type="submit" class="btn btn-primary me-1 add-button">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /Modern Horizontal Wizard -->
</div>
@include('frontend.layouts.partials._footer')


</body>

</html>



<!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/')}}assets/admin/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/')}}assets/admin/js/core/app-menu.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-wizard.js"></script>
    <!-- END: Page JS-->

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

        $('.phone-number-mask').inputmask('999.999.9999');
    </script>