@extends('admin.layouts.app')


@section('title','Add InterestArea Category || PathPorts')


@section('content')


<!-- BEGIN: Content-->







    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Add Category</h2>



                       

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



                            <div class="card-header py-0">



                                <!-- <h4 class="card-title"></h4> -->



                            </div>



                            <div class="card-body">



                                <form id="addCategoryForm" class="row gy-1 pt-75" method="POST" action="{{route('interestCategories.store')}}" enctype="multipart/form-data">

                                @csrf

                                    <div class="col-12 Categorylab col-md-6 mb-0 mt-2 text-center w-100">



                                       <!--  <label class="form-label" for="modalEditUserFirstName">Category Name</label> -->



                                        <input type="text" id="category_name" name="category_name" value="{{old('category_name')}}" class="form-control @error('category_name') is-invalid @enderror mt-1" placeholder="Category Name"  data-msg="Please enter your Category Name" />

                                        @error('category_name')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>





                                    <div class="col-12 clickaddic  mt-1 pt-50 text-center">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>






                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('interestCategories.index')}}">



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

  
@endsection

