@extends('admin.layouts.app')



@section('title','Meetings List || PathPorts')



@section('content')
<?php 
use App\Models\Assign_permission;
use App\Models\Permissions;
$value = session()->get('permissions');
 ?>

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">



    </div>

    <div class="content-body">

    <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Meetings</h2>

        </div>

        <!-- users list start -->

        <section class="app-user-list">



            <!-- list and filter start -->









        <!-- @if(in_array(config('constants.options.CreateMeetings'),$permission_array))
           
            <div class="add-button-div">

                <a class="btn btn-primary btn-round waves-effect waves-float waves-light add-button" href="{{route('meeting.create')}}">Schedule A Meeting</a>

            </div>
           
        @endif -->




            <div class="card">

                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->
                    @if(in_array(config('constants.options.CreateMeetings'),$permission_array))
           
                        <a class="btn btn-primary btn-round waves-effect waves-float waves-light add-button" href="{{route('meeting.create')}}"><i
                        data-feather="plus"></i> Schedule A Meeting</a>
                    @endif

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

                               

                                <th>Meeting Title</th>

                                <th>Alumni Name</th>
                                <th>Students Name</th>

                                <th>University Name</th>
                                <th>Start Date & Time</th>
                                <th>End Date & Time</th>

                                @if(in_array(config('constants.options.EditDeleteMeetings'),$permission_array))
                                <th>Actions</th>
                                @endif
                            </tr>

                        </thead>

                         <tbody>
                            @foreach($meeting_data as $meeting_datas)
                            <tr>
                                
                                <td>{{$meeting_datas->meeting_title}}</td>
                                <td>{{$meeting_datas->amuni_name}}</td>
                                <td>{{$meeting_datas->user_name}}</td>
                                <td>{{$meeting_datas->uni_name}}</td>
                                <td>{{$meeting_datas->start_date_time}}</td>
                                <td>{{$meeting_datas->end_date_time}}</td>
                                
                                
                                @if(in_array(config('constants.options.EditDeleteMeetings'),$permission_array))
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

      
                                                <button value="{{route('meeting.edit',$meeting_datas->id) }}" class="dropdown-item">
                                                  
                                                    <a class="" href="{{route('meeting.edit',$meeting_datas->id) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                        
                                            
                                            <form action="{{ route('meeting.destroy', $meeting_datas->id) }}" method="post">
                                                @csrf

                                                {{ method_field('DELETE') }}
       
                                                <button class="dropdown-item">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                                </button>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </td> @endif
                            </tr>
                            @endforeach
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



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">







    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/pages/modal-create-app.css">



@endsection



@section('scripts')



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>





    <!-- <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-add-new-cc.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/page-pricing.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-add-new-address.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-create-app.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-two-factor-auth.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-edit-user.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-share-project.js"></script> -->



    <script>

    $(document).ready( function () {

        $('#meetings_table').DataTable();

    });

    </script>



@endsection
