@extends('backend.layouts.app')



@section('title','Interest Area List || PathPorts')



@section('content')



<!-- BEGIN: Content-->



    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-start mb-0">Add university</h2>

                       
                    </div>

                </div>

            </div>



        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- @if($message = session('succes_message'))
        swal("{{ $message }}");
        @endif -->
    
     

        <div class="content-body">

            <section id="">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">

                                <!-- <h4 class="card-title"></h4> -->

                            </div>

                            <div class="card-body">

                                <form id="addUniversityForm" class="row gy-1 pt-75" method="POST" action="{{route('backend.universities.store')}}" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName">University Name</label>

                                        <input type="text" id="uni_name" name="uni_name" value="{{old('uni_name')}}" class="form-control @error('uni_name') is-invalid @enderror" placeholder="John"  data-msg="Please enter your first name" />
                                        @error('uni_name')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>





                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserEmail">Official Email:</label>

                                        <input type="text" id="uni_email" name="uni_email" value="{{old('uni_email')}}" class="form-control @error('uni_email') is-invalid @enderror"  placeholder="example@domain.com" />
                                         @error('uni_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">University Description</label>

                                        <textarea class="form-control  @error('uni_desc') is-invalid @enderror" id="uni_desc"  name="uni_desc" rows="3" placeholder="University Description"></textarea>
                                        @error('uni_desc')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">University Address</label>

                                        <textarea class="form-control  @error('uni_address') is-invalid @enderror" id="uni_address" name="uni_address" rows="3" placeholder="University Address"></textarea> @error('uni_address')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserPhone">Contact</label>

                                        <input type="text" id="uni_contact" value="{{old('uni_contact')}}" name="uni_contact" class="form-control  @error('uni_contact') is-invalid @enderror" />
                                        @error('uni_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserPhone">Alternate Contact</label>

                                        <input type="text" value="{{old('uni_alternate_contact')}}" name="uni_alternate_contact" class="form-control @error('uni_alternate_contact') is-invalid @enderror   phone-number-mask" />
                                         @error('uni_alternate_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror

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

                                        <input class="form-control" type="file" name="uni_image" id="uni_image"  />

                                    </div>

                                 

                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>

                                        <!-- <button type="submit" class="btn btn-outline-success" id="type-success">Add</button> -->

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
