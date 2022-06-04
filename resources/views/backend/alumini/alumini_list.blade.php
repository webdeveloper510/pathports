@extends('backend.layouts.app')
@section('title','Alumini List || PathPorts')
@section('content')

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">

    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">


            <!-- <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addAlumini">+ Add New</button> -->

            <div class="add-button-div">

                <button type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" data-bs-toggle="modal" data-bs-target="#addAlumini">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                    <span>Add Alumini</span>

                </button>

            </div>



            <!-- list and filter start -->

            <div class="card">

                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->

                    <div class="row">

                        <div class="col-md-4 user_role"></div>

                        <div class="col-md-4 user_plan"></div>

                        <div class="col-md-4 user_status"></div>

                    </div>

                </div>

                <div class="card-datatable table-responsive pt-0">

                    <table class="user-list-table table" id="alumini_table">

                        <thead class="table-light">

                            <tr>

                                <th></th>

                                <th>Name</th>

                                <th>Address</th>

                                <th>Email</th>

                                <th>Contact</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td>John</td>
                                <td>Mohali</td>
                                <td>test@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <!-- <td>

                                    <div class="dropdown">
                                        <a class="pr-1 dropdown-toggle hide-arrow text-primary"
                                            data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <form
                                                action="#"
                                                method="post">

                                                <button type="submit" class="dropdown-item"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Delete University">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                            <a class="dropdown-item"
                                                href="#"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Activate University">
                                                <i data-feather="check" class="mr-50"></i>
                                                <span>Activate</span>
                                            </a>
                                        </div>
                                        <a href="#"
                                            class="item-edit" data-toggle="tooltip" data-placement="top"
                                            title="Edit University">
                                            <i data-feather="edit" class="mr-50"></i>
                                        </a>
                                    </div>
                                </td> -->
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>John</td>
                                <td>Mohali</td>
                                <td>test@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <!-- <td>

                                    <div class="dropdown">
                                        <a class="pr-1 dropdown-toggle hide-arrow text-primary"
                                            data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <form
                                                action="#"
                                                method="post">

                                                <button type="submit" class="dropdown-item"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Delete University">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                            <a class="dropdown-item"
                                                href="#"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Activate University">
                                                <i data-feather="check" class="mr-50"></i>
                                                <span>Activate</span>
                                            </a>
                                        </div>
                                        <a href="#"
                                            class="item-edit" data-toggle="tooltip" data-placement="top"
                                            title="Edit University">
                                            <i data-feather="edit" class="mr-50"></i>
                                        </a>
                                    </div>
                                </td> -->
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>

                <!-- Add Alumini Modal -->

                <div class="modal fade" id="addAlumini" tabindex="-1" aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">

                        <div class="modal-content">

                            <div class="modal-header bg-transparent">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>

                            <div class="modal-body pb-5 px-sm-5 pt-50">

                                <div class="text-center mb-2">

                                    <h1 class="mb-1">Add Alumini</h1>



                                </div>

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

                                        <label class="form-label" for="modalEditUserEmail"> Email</label>

                                        <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="gertrude@gmail.com" placeholder="example@domain.com" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserEmail"> Roll Number</label>

                                        <input type="text" id="modalEditUserEmail" name="modalEditUserRoll" class="form-control" value="" placeholder="Enter Your Roll Number" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="pd-default">Year Of Passing</label>

                                        <input type="text" id="pd-default" class="form-control pickadate" placeholder="18 June, 2020" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">Address</label>

                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>

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

                                        <label class="form-label" for="basicSelect">Courses</label>

                                        <select class=

                                        "form-select" id="basicSelect">

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

                                        <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />

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





                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>

                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">

                                            Discard

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <!--/ Add Alumini Modal End-->

            </div>

            <!-- list and filter end -->

        </section>

        <!-- users list ends -->



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



    <script>

    $(document).ready( function () {

        $('#alumini_table').DataTable();

    });

    </script>





@endsection
