@extends('backend.layouts.app')

@section('title','Graduates List || PathPorts')

@section('content')


    <!-- BEGIN: Content-->

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Alumini</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Alumini</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Lists</a>
                                </li>
                                <li class="breadcrumb-item active">Add Alumini
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserFirstName"> First Name</label>
                    <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" value="Gertrude" data-msg="Please enter your first name" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserFirstName"> Last Name</label>
                    <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" value="Gertrude" data-msg="Please enter your last name" />
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserEmail"> Email:</label>
                    <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="gertrude@gmail.com" placeholder="example@domain.com" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserEmail"> Roll Number:</label>
                    <input type="text" id="modalEditUserEmail" name="modalEditUserRoll" class="form-control" value="" placeholder="Enter Your Roll Number" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="pd-default">Year Of Passing</label>
                    <input type="text" id="pd-default" class="form-control pickadate" placeholder="18 June, 2020" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="exampleFormControlTextarea1">University Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="University Address"></textarea>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserPhone">Contact</label>
                    <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="+1 (609) 933-44-22" value="+1 (609) 933-44-22" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserPhone">Alternate Contact</label>
                    <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="+1 (609) 933-44-22" value="+1 (609) 933-44-22" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicSelect">Passout University</label>
                    <select class="form-select" id="basicSelect">
                        <option>IT</option>
                        <option>Blade Runner</option>
                        <option>Thor Ragnarok</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicSelect">courses</label>
                    <select class="form-select" id="basicSelect">
                        <option>IT</option>
                        <option>Blade Runner</option>
                        <option>Thor Ragnarok</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="exampleFormControlTextarea1">University Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="University Address"></textarea>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="pd-default">Year Of Joining</label>
                    <input type="text" id="pd-default" class="form-control pickadate" placeholder="18 June, 2020" />
                </div>
                <div class="col-12 col-md-6">
                     <div class="demo-inline-spacing">
                        <label class="form-label" for="basicSelect">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked />
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicInput">Blood Group</label>
                    <input type="text" class="form-control" id="basicInput" placeholder="Enter Username" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicInput">Password</label>
                    <input type="password" class="form-control" id="basicInput" placeholder="Enter Username" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicInput">Confirm Password</label>
                    <input type="password" class="form-control" id="basicInput" placeholder="Enter Username" />
                </div>
                <div class="col-12 col-md-6">
                    <label for="customFile1" class="form-label">Profile pic</label>
                    <input class="form-control" type="file" id="customFile1" required />
                </div>
                <div class="col-12 col-md-12">
                    <label class="form-label" for="modalEditUserPhone">Interest Areas</label>
                    <br>
                    <div class="demo-inline-spacing">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked="">
                            <label class="form-check-label" for="inlineCheckbox1">Physical Therapy</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Nursing</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Physicians Asst</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Medical and Health Services</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Speech Pathologist</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Physician</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Respiratory Therapist</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Bio-Tech</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Nurse Anesthetist</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked">
                            <label class="form-check-label" for="inlineCheckbox2">Nurse Anesthetist</label>
                        </div>
                    </div>

                </div>

                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
            </form>



        </div>
    </div>

    <!-- END: Content-->


@endsection

@section('styles')


    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">


    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/forms/pickers/form-pickadate.css">

@endsection

@section('scripts')


    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/js/scripts/forms/pickers/form-pickers.js"></script>



@endsection
