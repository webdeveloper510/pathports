@extends('admin.layouts.app')


@section('title','Interest Area List || PathPorts')


@section('content')


<!-- BEGIN: Content-->







    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Add University</h2>



                       

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



                                <form id="addUniversityForm" class="row gy-1 pt-75" method="POST" action="{{route('universities.store')}}" enctype="multipart/form-data">

                                @csrf

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">University Name</label>



                                        <input type="text" id="uni_name" name="uni_name" value="{{old('uni_name')}}" class="form-control @error('uni_name') is-invalid @enderror" placeholder="University Name"  data-msg="Please enter your first name" />

                                        @error('uni_name')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    











                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserEmail">Official Email</label>



                                        <input type="text" id="uni_email" name="uni_email" value="{{old('uni_email')}}" class="form-control @error('uni_email') is-invalid @enderror"  placeholder="example@domain.com" />

                                         @error('uni_email')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserPhone">Contact</label>



                                        <input type="text" id="uni_contact" value="{{old('uni_contact')}}" name="uni_contact" class="form-control phone-number-mask @error('uni_contact') is-invalid @enderror" />

                                        @error('uni_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserPhone">Alternate Contact</label>



                                        <input type="text" value="{{old('uni_alternate_contact')}}" name="uni_alternate_contact" class="form-control alternate-contact-mask @error('uni_alternate_contact') is-invalid @enderror" />

                                         @error('uni_alternate_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="exampleFormControlTextarea1">University Description</label>



                                        <textarea class="form-control  @error('uni_desc') is-invalid @enderror" id="uni_desc"   name="uni_desc" rows="3" placeholder="University Description">{{old('uni_desc')}}</textarea>

                                        @error('uni_desc')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="exampleFormControlTextarea1">University Address</label>



                                        <textarea class="form-control  @error('uni_address') is-invalid @enderror" id="uni_address" name="uni_address"  rows="3" placeholder="University Address">{{old('uni_address')}}</textarea> @error('uni_address')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>



                                    

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName">University Slogan</label>



                                        <input type="text" id="uni_slug" name="uni_slug" value="{{old('uni_slug')}}" class="form-control @error('uni_slug') is-invalid @enderror" placeholder="University Slogan"  data-msg="Please enter your slug" />

                                        @error('uni_slug')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>

                                    <div class="col-12 col-md-6">



                                        <label for="customFile1" class="form-label">University Logo</label>



                                        <input class="form-control form-control @error('uni_image') is-invalid @enderror" type="file" name="uni_image" id="uni_image"  />
                                        @error('uni_image')<div class="invalid-feedback"> {{ $message }} </div>@enderror


                                    </div>



                                 



                                    <div class="col-12 text-center mt-2 pt-50">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>



                                        <!-- <button type="submit" class="btn btn-outline-success" id="type-success">Add</button> -->



                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('universities.index')}}">



                                            Discard</a>



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



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">





    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/pages/modal-create-app.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/extensions/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/extensions/ext-component-sweet-alerts.css">







@endsection







@section('scripts')


    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


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

    <script>
        $('.phone-number-mask').inputmask('999.999.9999');
        $('.alternate-contact-mask').inputmask('999.999.9999');
    </script>


@endsection

