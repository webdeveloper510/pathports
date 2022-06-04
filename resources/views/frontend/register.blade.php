<!DOCTYPE html>

<html lang="en">

<head>

  <title>Pathports</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/style.css">
  <link rel = "icon" type = "image/png" href = "{{ asset('/')}}assets/frontend/images/favicon.png">





	<!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/form-wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/frontend/assets/css/custom.css"> -->

    <link rel="stylesheet" href="{{ asset('/')}}assets/backend/css/style.css">
      <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/style.css">
      <link rel="stylesheet" href="{{ asset('/')}}assets/frontend/css/custom.css">
    <!-- END: Custom CSS-->



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
                <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                    <!-- <div class="content-header">
                        <h5 class="mb-0">Account Details</h5>
                        <small class="text-muted">Enter Your Account Details.</small>
                    </div> -->
					 <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="modern-firstname" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="modern-lastname" class="form-control" placeholder="johndoe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Username</label>
                            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                       <!--  <button class="btn btn-outline-secondary btn-prev" disabled>
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button> -->
                        <button class="btn btn-success btn-submit Submit_button">Submit</button>
                    </div>
                </div>
                <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                    <!-- <div class="content-header">
                        <h5 class="mb-0">Personal Info</h5>
                        <small>Enter Your Personal Info.</small>
                    </div> -->
                   <!-- <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-first-name">First Name</label>
                            <input type="text" id="modern-first-name" class="form-control" placeholder="John" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-last-name">Last Name</label>
                            <input type="text" id="modern-last-name" class="form-control" placeholder="Doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-country">Country</label>
                            <select class="select2 w-100" id="modern-country">
                                <option label=" "></option>
                                <option>UK</option>
                                <option>USA</option>
                                <option>Spain</option>
                                <option>France</option>
                                <option>Italy</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-language">Language</label>
                            <select class="select2 w-100" id="modern-language" multiple>
                                <option>English</option>
                                <option>French</option>
                                <option>Spanish</option>
                            </select>
                        </div>
                    </div>-->
					
					<div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="modern-firstname" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="modern-lastname" class="form-control" placeholder="johndoe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Username</label>
                            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
					
                    <div class="d-flex justify-content-end mt-3">
                        <!-- <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button> -->
                        <button class="btn btn-success btn-submit Submit_button">Submit</button>
                    </div>
                </div>
                <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
                    <!-- <div class="content-header">
                        <h5 class="mb-0">Address</h5>
                        <small>Enter Your Address.</small>
                    </div> -->
                  <!--  <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-address">Address</label>
                            <input type="text" id="modern-address" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-landmark">Landmark</label>
                            <input type="text" id="modern-landmark" class="form-control" placeholder="Borough bridge" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="pincode3">Pincode</label>
                            <input type="text" id="pincode3" class="form-control" placeholder="658921" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="city3">City</label>
                            <input type="text" id="city3" class="form-control" placeholder="Birmingham" />
                        </div>
                    </div>-->
                   
					
					<div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="modern-firstname" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="modern-lastname" class="form-control" placeholder="johndoe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Username</label>
                            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
					 <div class="d-flex justify-content-end mt-3">
                       <!--  <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button> -->
                        <button class="btn btn-success btn-submit Submit_button">Submit</button>
                    </div>
					
                </div>
                <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
                    <!-- <div class="content-header">
                        <h5 class="mb-0">Social Links</h5>
                        <small>Enter Your Social Links.</small>
                    </div> -->
                 <!--   <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-twitter">Twitter</label>
                            <input type="text" id="modern-twitter" class="form-control" placeholder="https://twitter.com/abc" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-facebook">Facebook</label>
                            <input type="text" id="modern-facebook" class="form-control" placeholder="https://facebook.com/abc" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-google">Google+</label>
                            <input type="text" id="modern-google" class="form-control" placeholder="https://plus.google.com/abc" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-linkedin">Linkedin</label>
                            <input type="text" id="modern-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                        </div>
                    </div>-->
					
					<div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-firstname">Firstname</label>
                            <input type="text" id="modern-firstname" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-lastname">Lastname</label>
                            <input type="text" id="modern-lastname" class="form-control" placeholder="johndoe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-username">Username</label>
                            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="modern-email">Email</label>
                            <input type="email" id="modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-password">Password</label>
                            <input type="password" id="modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-3 form-password-toggle col-md-6">
                            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
                            <input type="password" id="modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                    </div>
					
                    <div class="d-flex justify-content-end mt-3">
                        <!-- <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button> -->
                        <button class="btn btn-success btn-submit Submit_button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Modern Horizontal Wizard -->
</div>
@include('frontend.layouts.partials._footer')


</body>

</html>



<!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/')}}assets/backend/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/')}}assets/backend/js/core/app-menu.js"></script>
    <script src="{{ asset('/')}}assets/backend/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/')}}assets/backend/js/scripts/forms/form-wizard.js"></script>
    <!-- END: Page JS-->

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