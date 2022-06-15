@extends('backend.layouts.app')
@section('title','Users List || PathPorts')
@section('content')


<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">
    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">



            <div class="add-button-div">
                 <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('backend.users.create')}}">Add Administrators</a>
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

                    <table class="user-list-table table" id="users_table">

                        <thead class="table-light">

                            <tr>

                                <th></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($users as $users_data)
                            <tr>
                                <td></td>
                                <td>{{@$users_data->firstName}}</td>
                                <td>{{@$users_data->lastName}}</td>
                                <td>{{@$users_data->name}}</td>
                                <td>{{@$users_data->username}}</td>
                                <td>{{@$users_data->email}}</td>
                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            
                                            
                                            <button value="{{ $users_data->id }}" class="dropdown-item">
                                                    
                                                    <a class="" href="{{ route('backend.users.edit',  $users_data->id) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                           
                                            
                                            <form action="{{ route('backend.users.destroy', $users_data->id) }}" method="post">
                                               

                                                @csrf

                                                {{ method_field('DELETE') }}
                                                <button class="dropdown-item">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                            @endforeach
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

        $('#users_table').DataTable();
    });

    </script>
@endsection
