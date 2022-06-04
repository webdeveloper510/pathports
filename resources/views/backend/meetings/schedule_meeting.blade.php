@extends('backend.layouts.app')



@section('title','Schedule A Meeting || PathPorts')



@section('content')





    <!-- BEGIN: Content-->



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

            <div class="content-body">

                <!-- Flatpickr Starts -->

                <section id="flatpickr">

                    <div class="card">

                        <div class="card-header">

                            <!-- <h4 class="card-title">Flatpickr</h4> -->

                        </div>

                        <div class="card-body">

                            <div class="row">



                                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="basicInput">Meeting Title</label>

                                    <input type="text" class="form-control" id="basicInput" placeholder="Enter Meeting Title" />



                                </div>

                                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="basicSelect">Select University</label>

                                    <select class="form-select" id="basicSelect">

                                        <option>IT</option>

                                        <option>Blade Runner</option>

                                        <option>Thor Ragnarok</option>

                                    </select>

                                </div>





                                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="basicSelect">Select Students</label>

                                    <!-- <select class="form-select" id="basicSelect">

                                        <option>John</option>

                                        <option>Brad</option>

                                        <option>Elinak</option>

                                    </select> -->
                                    <select class="form-select" id="normalMultiSelect" multiple="multiple">
                                            <option selected="selected">John</option>
                                            <option>Brad</option>
                                            <option selected="selected">Camila</option>
                                            <option>Elina</option>
                                            <option>Rosy</option>

                                    </select>



                                </div>

                                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="fp-default">Schedule Date</label>

                                    <input type="text" id="" class="form-control flatpickr-basic schedule-date" placeholder="YYYY-MM-DD" />

                                </div>



                            </div>

                             <div class="col-12 text-center mt-2 pt-50">

                                <button type="submit" class="btn btn-primary me-1 add-button">Schedule</button>

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

    </div>



    <!-- END: Content-->





@endsection



@section('styles')





    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/flatpickr/flatpickr.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-pickadate.css">





@endsection



@section('scripts')









    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.date.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.time.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/legacy.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/forms/pickers/form-pickers.js"></script>





@endsection
