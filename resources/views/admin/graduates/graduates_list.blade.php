@extends('admin.layouts.app')

@section('title','Students List || PathPorts')

@section('content')


<?php $value = session()->get('permissions'); ?>

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">

    </div>

    <div class="content-body">

    <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Students</h2>

        </div>

        <!-- users list start -->

        <section class="app-user-list">


            <!-- @if(in_array(config('constants.options.CreateStudents'),$value))
            <div class="add-button-div">

                
                
                    <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('student.create')}}"><i
                        data-feather="plus"></i> Add Student</a>
               

            </div>  @endif -->



            <!-- list and filter start -->

            <div class="card">



                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->
                    @if(in_array(config('constants.options.CreateStudents'),$value))
            
                        <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('student.create')}}"><i
                        data-feather="plus"></i> Add Student</a>
                    @endif

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

                                
                                <th>First Name</th>

                                <th>Last Name</th>

                                <th>Email</th>

                                <th>Contact</th>
                                <th>University Name</th>
                               
                                @if(in_array(config('constants.options.EditDeleteStudents'),$permission_array))
                                <th>Actions</th>
                                @endif

                            </tr>

                        </thead>

                        <tbody>@foreach($users as $user_list)
                            <tr>
                                
                                <td>{{$user_list->firstName}}</td>
                                <td>{{$user_list->lastName}}</td>
                                <td>{{$user_list->email}}</td>
                                
                                <td>{{$user_list->contact}}</td>
                                <td>{{$user_list->uni_name}}</td>
                                
 
                               
                                @if(in_array(config('constants.options.EditDeleteStudents'),$permission_array))
                                <td>
                                    <div class="dropdown"> 
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <!-- <i data-feather="more-vertical"></i> -->
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a> -->

      
                                                <button value="{{route('student.edit',$user_list->id) }}" class="dropdown-item">
                                                  
                                                    <a class="" href="{{route('student.edit',$user_list->id) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                        
                                            
                                            <form action="{{ route('student.destroy', $user_list->id) }}" method="post">
                                                @csrf

                                                {{ method_field('DELETE') }}
       
                                                <button class="dropdown-item">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                                </button>
                                            
                                            </form>
                                        </div>
                                    </div> 
                                </td>@endif
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

        $('#graduates_table').DataTable();

    });

    </script>





@endsection
