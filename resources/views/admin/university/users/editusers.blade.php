@extends('admin.layouts.app')

@section('title','Interest Area List || PathPorts')

@section('content')


<!-- BEGIN: Content-->







    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Edit Staff</h2>



                       

                    </div>



                </div>



            </div>







        </div>



        <div class="content-body">



            <section id="">



                <div class="row">



                    <div class="col-12">



                        <div class="card">



                            <div class="card-header">



                                <!-- <h4 class="card-title"></h4> -->



                            </div>

                            @if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif

                            <div class="card-body">



                              <form id="editUsersForm" class="row gy-1 pt-75" action="{{ route('users.update',$users->id) }}" method="post" enctype="multipart/form-data">

                                @csrf

                                {{ method_field('PUT') }}

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">First Name</label>



                                        <input type="text" id="firstName" name="firstName" value="{{$users->firstName}}" class="form-control" />

                                      



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">Last Name</label>



                                        <input type="text" id="lastName" name="lastName" value="{{$users->lastName}}" class="form-control"/>

                                        



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">Username</label>



                                        <input type="text" id="username" name="username" value="{{$users->username}}" class="form-control" />

                                    </div>











                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserEmail">Email:</label>



                                        <input type="text" id="email" name="email" value="{{$users->email}}" class="form-control" />

                                    </div>



                                    

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicInput">Password</label>



                                        <input type="password" class="form-control" id="basicInput"  />



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicInput">Confirm Password</label>



                                        <input type="password" class="form-control" id="basicInput"  />



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicSelect">User Role</label>

                                        <select class="form-select select2-data-array" id="role_id" name="role_id">

                                            <option value="2" {{$users->role_id == 2  ? 'selected' : ''}}>University Admin</option>
                                            <option value="6" {{$users->role_id == 6  ? 'selected' : ''}}>Dean</option>
                                            <option value="7" {{$users->role_id == 7  ? 'selected' : ''}}>Staff</option>
                                            <option value="8" {{$users->role_id == 8  ? 'selected' : ''}}>Coach</option>

                                         

                                        </select>

                                    </div>

                                    



                                    <div class="col-12 col-md-6">
                                        <label for="customFile1" class="form-label">Profile Image</label>
                                        <input class="form-control" type="file" name="image" id="image"  />
                                        @if($users->image)
                                        <img src="{{ asset('/assets/admin/images/profile/'.$users->image)}}" style="height: 100px; width: 100px;">
                                        @endif
                                    </div>



                                 



                                    <div class="col-12 text-center mt-2 pt-50">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Update</button>



                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">

                                        <a href="{{ route('usersList',$university_id) }}">

                                            Discard
                                        </a>


                                        </button>



                                    </div>



                                </form>

                            </div>



                        </div>



                    </div>



                </div>



            </section>















        </div>



    </div>







    <!-- END: Content-->











@endsection







@section('styles')









    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">

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


    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script>








@endsection

