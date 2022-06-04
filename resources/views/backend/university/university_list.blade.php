@extends('backend.layouts.app')



@section('title','University List || PathPorts')



@section('content')

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">



    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">

            <!-- <div class="row">

                <div class="col-lg-3 col-sm-6">

                    <div class="card">

                        <div class="card-body d-flex align-items-center justify-content-between">

                            <div>

                                <h3 class="fw-bolder mb-75">21,459</h3>

                                <span>Total Universities</span>

                            </div>

                            <div class="avatar bg-light-primary p-50">

                                <span class="avatar-content">

                                    <i data-feather="user" class="font-medium-4"></i>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="col-lg-3 col-sm-6">

                    <div class="card">

                        <div class="card-body d-flex align-items-center justify-content-between">

                            <div>

                                <h3 class="fw-bolder mb-75">19,860</h3>

                                <span>Active Universities</span>

                            </div>

                            <div class="avatar bg-light-success p-50">

                                <span class="avatar-content">

                                    <i data-feather="user-check" class="font-medium-4"></i>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-sm-6">

                    <div class="card">

                        <div class="card-body d-flex align-items-center justify-content-between">

                            <div>

                                <h3 class="fw-bolder mb-75">237</h3>

                                <span>Pending Universities</span>

                            </div>

                            <div class="avatar bg-light-warning p-50">

                                <span class="avatar-content">

                                    <i data-feather="user-x" class="font-medium-4"></i>

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div> -->

            <!-- list and filter start -->







            <!-- <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addUniversity">+ Add New</button> -->

            <div class="add-button-div">

                <button type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" data-bs-toggle="modal" data-bs-target="#addUniversity">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                    <span>Add University</span>

                </button>

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

                    <table class="user-list-table table" id="university_table">

                        <thead class="table-light">

                            <tr>

                                <th></th>

                                <th>Name</th>

                                <th>Official Email</th>

                                <th>University Description</th>

                                <th>University Address</th>
                                <th>Contact</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>John</td>
                                <td>test@gmail.com</td>
                                <td>test</td>
                                <td>Mohali</td>
                                <td>0123456789</td>



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
                                <td>test@gmail.com</td>
                                <td>test</td>
                                <td>Mohali</td>
                                <td>0123456789</td>
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

                                    <!-- <div class="col-12">

                                        <div class="d-flex align-items-center mt-1">

                                            <div class="form-check form-switch form-check-primary">

                                                <input type="checkbox" class="form-check-input" id="customSwitch10" checked />

                                                <label class="form-check-label" for="customSwitch10">

                                                    <span class="switch-icon-left"><i data-feather="check"></i></span>

                                                    <span class="switch-icon-right"><i data-feather="x"></i></span>

                                                </label>

                                            </div>

                                            <label class="form-check-label fw-bolder" for="customSwitch10">Use as a billing address?</label>

                                        </div>

                                    </div> -->

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

        $('#university_table').DataTable();

    });

    </script>



@endsection
