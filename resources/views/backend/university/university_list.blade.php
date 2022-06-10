@extends('backend.layouts.app')



@section('title','University List || PathPorts')



@section('content')


<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">



    </div>

    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">



            <div class="add-button-div">
                 <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('backend.universities.create')}}">Add University</a>


               <!--  <button type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('backend.universities.create')}}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-25"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                    <span>Add University</span>

                </button> -->

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
                            @foreach($university as $university_data)
                            <tr>
                                <td></td>
                                <td>{{$university_data->uni_name}}</td>
                                <td>{{$university_data->uni_email}}</td>
                                <td>{{$university_data->uni_desc}}</td>
                                <td>{{$university_data->uni_address}}</td>
                                <td>{{$university_data->uni_contact}}</td>

                                <td><img src="{{ asset('/assets/backend/images/'.$university_data->uni_image)}}"
 style="height: 100px; width: 100px;"></td>


                                <td><span class="badge badge-pill badge-light-success mr-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a> -->

                                            
                                                <button value="{{ $university_data->id }}" class="dropdown-item">
                                                    <!-- <a class="" href="{{url('backend/universities/1/edit')}}"> -->
                                                    <a class="" href="{{ route('backend.universities.edit', ['university' => $university_data->id]) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                           
                                            
                                            <form action="{{ route('backend.universities.destroy', ['university' => $university_data->id]) }}" method="post">
                                                @csrf

                                                {{ method_field('DELETE') }}

                                                <button class="dropdown-item">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                                </button>
                                            <!-- <a class="dropdown-item" href="{{ route('backend.universities.destroy', ['university' => $university_data->id]) }}">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a> -->
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

        $('#university_table').DataTable();


        

    });
    /*$(document).on('click', '.editbtn',function () {
        var id = $(this).val();
        
        $('#editUniversity').modal('show');
        $.ajax({
            type:"GET",
            
            url:"/backend/universities/1/edit",
            dataType: 'json',
            success: function (res){
                console.log(res);
                $('#edit_uni_name').val(res.university.uni_name);
                $('#edit_uni_email').val(res.university.uni_email);
                $('#edit_uni_desc').val(res.university.uni_desc);
                $('#edit_uni_address').val(res.university.uni_address);
                $('#edit_uni_contact').val(res.university.uni_contact);
                $('#edit_uni_alternate_contact').val(res.university.uni_alternate_contact);
            }

        });

    });*/

    </script>



@endsection
