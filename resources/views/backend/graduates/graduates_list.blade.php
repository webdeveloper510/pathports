@extends('backend.layouts.app')



@section('title','Graduates List || PathPorts')



@section('content')

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">

    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">



            <!-- <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addGraduates">+ Add New</button> -->

            <div class="add-button-div">

                <!-- <button type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" data-bs-toggle="modal" data-bs-target="#addGraduates">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                    <span>Add Graduates</span>

                </button> -->
                <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{url('/backend/graduatesCreate')}}">Add Graduates</a>

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

                    <table class="user-list-table table" id="graduates_table">

                        <thead class="table-light">

                            <tr>

                                <th></th>

                                <th>First Name</th>

                                <th>Last Name</th>

                                <th>Email</th>

                                
                                <th>Contact</th>
                                <th>University</th>
                                <th>courses</th>

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
                                <td>Baba farid university</td>
                                <td>BCA</td>

                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <td>

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
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>John</td>
                                <td>Mohali</td>
                                <td>test@gmail.com</td>
                                
                                <td>0123456789</td>
                                <td>GNA university</td>
                                <td>MCA</td>
                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <td>

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
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>



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

        $('#graduates_table').DataTable();

    });

    </script>





@endsection
