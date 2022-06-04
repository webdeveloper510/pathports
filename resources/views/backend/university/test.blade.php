@extends('backend.layouts.app')
@section('title','Meetings List || PathPorts')
@section('content')

<div class="content-wrapper container-xxl p-0">

     <div class="content-header row">

        <div class="content-header-left col-md-9 col-12 mb-2">

            <div class="row breadcrumbs-top">

                <div class="col-12">

                    <h2 class="content-header-title float-start mb-0">Schedule A Meeting</h2>

                    <div class="breadcrumb-wrapper">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="index.html">Schedule A Meeting</a>

                            </li>

                            <li class="breadcrumb-item"><a href="#">Lists</a>

                            </li>

                            <li class="breadcrumb-item active">Schedule A Meeting

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>



    </div>

    <div class="content-body">

        <!-- Flatpickr Starts -->

        <section id="flatpickr">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">Flatpickr</h4>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-1">

                            <label class="form-label" for="fp-default">Default</label>

                            <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />

                        </div>

                        <div class="col-md-6 mb-1">

                            <label class="form-label" for="fp-time">Time picker</label>

                            <input type="text" id="fp-time" class="form-control flatpickr-time text-start" placeholder="HH:MM" />

                        </div>

                    </div>

                     <div class="col-12 text-center mt-2 pt-50">

                                <button type="submit" class="btn btn-primary me-1">Schedule</button>

                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">

                                    Discard

                                </button>

                            </div>





                </div>

            </div>

        </section>

        <!-- Flatpickr Ends-->



    </div>

</div>
@endsection
@section('styles')

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/flatpickr/flatpickr.min.css">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-flat-pickr.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-pickadate.css">
<!-- END: Page CSS-->

@endsection
@section('scripts')


<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.js"></script>
<script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="{{ asset('/')}}assets/backend/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('/')}}assets/backend/js/scripts/forms/pickers/form-pickers.js"></script>
<!-- END: Page JS-->
@endsection

</body>
</html>
