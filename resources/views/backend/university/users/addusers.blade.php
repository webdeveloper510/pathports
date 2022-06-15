@extends('backend.layouts.app')
@section('title','Add Administrator List || PathPorts')
@section('content')



<!-- BEGIN: Content-->



    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-start mb-0">Add Administrator</h2>

                       
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

                                <form id="addUniversityForm" class="row gy-1 pt-75" method="POST" action="{{route('backend.users.store')}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName">First Name</label>

                                        <input type="text" id="firstName" name="firstName" value="{{old('firstName')}}" class="form-control @error('firstName') is-invalid @enderror" placeholder="John"  data-msg="Please enter your first name" />
                                        @error('firstName')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName">Last Name</label>

                                        <input type="text" id="lastName" name="lastName" value="{{old('lastName')}}" class="form-control @error('lastName') is-invalid @enderror" placeholder="John"  data-msg="Please enter your first name" />
                                        @error('lastName')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName">Username</label>

                                        <input type="text" id="username" name="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror"   data-msg="Please enter your Username" />
                                        @error('username')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>





                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserEmail">Email:</label>

                                        <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="example@domain.com" />
                                         @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    

                                    

                                    

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="basicInput">Password</label>

                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="basicInput" />
                                        @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="basicInput">Confirm Password</label>

                                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput"  />
                                        @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="basicSelect">University Name</label>
                                        <select class="form-select form-control @error('university_id') is-invalid @enderror" id="university_id" name="university_id">
                                            <option>Select University</option>
                                            @foreach($university as $uni_data)
                                            <option value="{{$uni_data->id}}">{{$uni_data->uni_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror
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

            </section>

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

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/backend/css/plugins/extensions/ext-component-sweet-alerts.css">



@endsection



@section('scripts')


    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/vendors/js/extensions/polyfill.min.js"></script>
    <script src="{{ asset('/')}}assets/backend/js/scripts/extensions/ext-component-sweet-alerts.js"></script>

@endsection
