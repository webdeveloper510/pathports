@extends('backend.layouts.app')



@section('title','Meetings List || PathPorts')



@section('content')

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">



    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">



            <!-- list and filter start -->











            <div class="add-button-div">

                <a class="btn btn-primary btn-round waves-effect waves-float waves-light add-button" href="{{url('/backend/schedule_meeting')}}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Schedule A Meeting

                </a>

            </div>



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

                    <table class="user-list-table table" id="meetings_table">

                        <thead class="table-light">

                            <tr>

                                <th></th>

                                <th>Meeting Title</th>

                                <th>Student Name</th>

                                <th>University</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>

                        </thead>

                         <tbody>
                            <tr>
                                <td></td>
                                <td>Nursing Guidence</td>
                                <td>John</td>
                                <td>GNV university</td>
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
                                <td>Engineering Guidence</td>
                                <td>John</td>
                                <td>GNV university</td>
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



                <!-- Add University Modal -->

                <div class="modal fade" id="addUniversity" tabindex="-1" aria-hidden="true">

                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">

                        <div class="modal-content">

                            <div class="modal-header bg-transparent">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>

                            <div class="modal-body pb-5 px-sm-5 pt-50">

                                <div class="text-center mb-2">

                                    <h1 class="mb-1">Add University</h1>

                                    <!-- <p>Updating user details will receive a privacy audit.</p> -->

                                </div>

                                <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName"> Name</label>

                                        <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" value="Gertrude" data-msg="Please enter your first name" />

                                    </div>





                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserEmail">Official Email:</label>

                                        <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="gertrude@gmail.com" placeholder="example@domain.com" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">University Description</label>

                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="University Description"></textarea>

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

                                        <label class="form-label" for="basicInput">Password</label>

                                        <input type="password" class="form-control" id="basicInput" placeholder="Enter Username" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="basicInput">Confirm Password</label>

                                        <input type="password" class="form-control" id="basicInput" placeholder="Enter Username" />

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label for="customFile1" class="form-label">Image</label>

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

                <!--/ Add University Modal End-->



            </div>

            <!-- list and filter end -->

        </section>

        <!-- users list ends -->



    </div>

</div>

  <!-- END: Content-->



@endsection



@section('styles')



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">







    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/pages/modal-create-app.css">



@endsection



@section('scripts')



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js"></script>





    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-add-new-cc.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/page-pricing.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-add-new-address.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-create-app.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-two-factor-auth.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-edit-user.js"></script>

    <script src="{{ asset('/')}}assets/backend/js/scripts/pages/modal-share-project.js"></script>



    <script>

    $(document).ready( function () {

        $('#meetings_table').DataTable();

    });

    </script>



@endsection
