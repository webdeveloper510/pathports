@extends('admin.layouts.app')

@section('title','Add Administrator List || PathPorts')

@section('content')







<!-- BEGIN: Content-->







    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Add Staff</h2>



                       

                    </div>



                </div>



            </div>







        </div>

        

        @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

        @endif



        <div class="content-body">



            <section id="">



                <div class="row">



                    <div class="col-12">



                        <div class="card">



                            <div class="card-header">



                                <!-- <h4 class="card-title"></h4> -->



                            </div>



                            <div class="card-body">



                                <form id="addUniversityForm" class="row gy-1 pt-75" method="POST" action="{{route('store',$id)}}" enctype="multipart/form-data">

                                @csrf

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">First Name</label>



                                        <input type="text" id="firstName" name="firstName" value="{{old('firstName')}}" class="form-control @error('firstName') is-invalid @enderror" placeholder="Please Enter Your First Name"/>

                                        @error('firstName')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">Last Name</label>



                                        <input type="text" id="lastName" name="lastName" value="{{old('lastName')}}" class="form-control @error('lastName') is-invalid @enderror" placeholder="Please Enter Your Last Name"  />

                                        @error('lastName')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">Username</label>



                                        <input type="text" id="username" name="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror"  placeholder="Please Enter Your Username"   />

                                        @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>











                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserEmail">Email</label>



                                        <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="Please Enter Your Email" />

                                         @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    



                                    



                                    



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicInput">Password</label>



                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="basicInput" value="{{old('password')}}" placeholder="Please Enter Your Password" />

                                        @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicInput">Confirm Password</label>



                                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput"  placeholder="Please Enter Your Confirm Password"										/>

                                        @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="basicSelect">Role</label>

                                        <select class="form-select select2-data-array @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
    
                                            <option value="">Select Role</option>

                                            @if( auth()->user()->role_id == 1)
                                            <option value="2"  {{ old('role_id') == 2 ? 'selected' : '' }}>University Admin </option>@endif
                                            <option value="6"  {{ old('role_id') == 6 ? 'selected' : '' }}>Dean </option>
                                            <option value="7"  {{ old('role_id') == 7 ? 'selected' : '' }}>Staff</option>
                                            <option value="8"  {{ old('role_id') == 8 ? 'selected' : '' }}>Coach</option>

                                        </select>

                                        @error('role_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    
                                    <div class="col-12 col-md-6">

                                        <label for="customFile1" class="form-label">Profile Image</label>

                                        <input class="form-control" type="file" name="image" id="image"  />

                                    </div>


                                    



                                 



                                    <div class="col-12 text-center mt-2 pt-50">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>



                                        

                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">

                                        <a href="{{ route('usersList',$id) }}">

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



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/extensions/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/extensions/ext-component-sweet-alerts.css">







@endsection







@section('scripts')





    <!-- BEGIN: Page Vendor JS-->



    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/extensions/polyfill.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script>



@endsection

