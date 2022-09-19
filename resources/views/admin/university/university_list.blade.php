@extends('admin.layouts.app')



@section('title','University List || PathPorts')



@section('content')
<?php $value = session()->get('permissions');  ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">



    </div>

    <div class="content-body">
        <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Universities</h2>

        </div>

        <!-- users list start -->

        <section class="app-user-list">



            <!-- <div class="add-button-div">
                @if(in_array(config('constants.options.CreateUniversity'),$permission_array))

                    <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('universities.create')}}">Add University</a>
                @endif


            

            </div> -->



            <div class="card">

                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->
                    @if(in_array(config('constants.options.CreateUniversity'),$permission_array))

                        <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('universities.create')}}"><i
                        data-feather="plus"></i>Add University</a>
                    @endif

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

                                

                                <th>University Name</th>

                                <th>Official Email</th>
                                <!-- <th>University Description</th> -->
                                <th>University Address</th>
                                <th>Contact</th>
                                <th>University Administrators</th>
                                <th>University Url</th>
                                @if(in_array(config('constants.options.EditDeleteUniversity'),$permission_array))
                                <th>Actions</th>
                                @endif

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($university as $university_data)
                            <?php $en_university_id = base64_encode($university_data->id);  ?>
                            <tr>
                                
                                <td>{{$university_data->uni_name}}</td>
                                <td>{{$university_data->uni_email}}</td>
                                <!-- <td>{{$university_data->uni_desc}}</td> -->
                                <td>{{$university_data->uni_address}}</td>
                                <td>{{$university_data->uni_contact}}</td>
                                <td><a class="view_users" href="{{ route('usersList',$university_data->id) }}"> <i data-feather="eye" class="me-50"></i></a><a class="" href="{{ route('users.index')}}"></a></td>
                                <!-- <td>{{url('/login/'.$en_university_id)}}</td> -->
                                <td><button class="copy-link" onclick="myFunction('{{url('/login/'.$en_university_id)}}')">Copy Link <i class="fa fa-clone"></button></td>

 
                      
                                @if(in_array(config('constants.options.EditDeleteUniversity'),$permission_array))
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <!-- <i data-feather="more-vertical"></i> -->
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        
                                        <div class="dropdown-menu dropdown-menu-end">
                                            

                                                
                                                <button value="{{ $university_data->id }}" class="dropdown-item">
                                                    <!-- <a class="" href="{{url('admin/universities/1/edit')}}"> -->
                                                    <a class="" href="{{ route('universities.edit', ['university' => $university_data->id]) }}">
                                                <i data-feather="edit-2" class="me-50 editbtn"></i>
                                                <span>Edit</span></a>
                                                </button>
                                           
                                            
                                            <form action="{{ route('universities.destroy', ['university' => $university_data->id]) }}" method="post">
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




<!-- 
    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-add-new-cc.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/page-pricing.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-add-new-address.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-create-app.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-two-factor-auth.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-edit-user.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/pages/modal-share-project.js"></script> -->



    <script>

    $(document).ready( function () {

        $('#university_table').DataTable();
    });

    function myFunction(val, event) {
      var inp = document.createElement('input');
      document.body.appendChild(inp)
      inp.value = val;
      inp.select();
      document.execCommand('copy', false);
      inp.remove();
      alert('URL Copied');
    }
        

    </script>



@endsection
