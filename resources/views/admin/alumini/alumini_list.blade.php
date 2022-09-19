@extends('admin.layouts.app')
@section('title','Alumni List || PathPorts')
@section('content')
<?php $value = session()->get('permissions'); ?>
<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">

    </div>

    <div class="content-body">

    <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Alumni</h2>

        </div>

        <!-- users list start -->

        <section class="app-user-list">

            
            <!-- <button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addAlumini">+ Add New</button> -->

            <div class="add-button-div">

                <!-- <button type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" data-bs-toggle="modal" data-bs-target="#addAlumini">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                    <span>Add Alumini</span>

                </button> -->
             
                <!-- @if(in_array(config('constants.options.CreateAlumini'),$permission_array))
                    <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('alumni.create')}}">Add Alumni</a>
                @endif -->
            </div>



            <!-- list and filter start -->

            <div class="card">

                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->
                    @if(in_array(config('constants.options.CreateAlumini'),$permission_array))
                        <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('alumni.create')}}"><i
                        data-feather="plus"></i> Add Alumni</a>
                    @endif

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

                                
                                <th>First Name</th>
                                <th>Last Name</th>

                               
                                <th>Email</th>

                                <th>Contact</th>
                                <th>University Name</th>

                                @if(in_array(config('constants.options.EditDeleteAlumini'),$permission_array))
                                <th>Actions</th>@endif

                            </tr>

                        </thead>

                        <tbody>@foreach($users as $user_list)
                            <tr>
                                
                                <td>{{$user_list->firstName}}</td>
                                <td>{{$user_list->lastName}}</td>
                                <td>{{$user_list->email}}</td>
                                
                                <td>{{$user_list->contact}}</td>
                                <td>{{$user_list->uni_name}}</td>
                                
                                @if(in_array(config('constants.options.EditDeleteAlumini'),$permission_array))
                                <td>   
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <!-- <i data-feather="more-vertical"></i> -->
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                   
                                        <div class="dropdown-menu dropdown-menu-end">
                                            

                                               
                                                <button value="{{route('alumni.edit',$user_list->id) }}" class="dropdown-item">
                                                  
                                                    <a class="" href="{{route('alumni.edit',$user_list->id) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                             
                                           
                                               
                                                <form action="{{ route('alumni.destroy', $user_list->id) }}" method="post">
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
                                @endif
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

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">





    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">









@endsection



@section('scripts')





    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>





    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.date.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.time.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/legacy.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/pickers/form-pickers.js"></script>



    <script>

    $(document).ready( function () {

        $('#alumini_table').DataTable();

    });

    </script>





@endsection
