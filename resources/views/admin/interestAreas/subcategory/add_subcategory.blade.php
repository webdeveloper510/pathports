@extends('admin.layouts.app')


@section('title','Add InterestArea Sub Category || PathPorts')


@section('content')

<?php $value = Session()->get('permissions');  ?>
<!-- BEGIN: Content-->







    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Add Sub Category</h2>



                       

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



                                <form id="addCategoryForm" class="row gy-1 pt-75" method="POST" action="{{route('interestSubCategories.store')}}" enctype="multipart/form-data">

                                @csrf
                                    <div class="col-12 col-md-6">
                                        <!-- <label class="form-label" for="basicSelect">Category</label> -->



                                        <select class="form-select select2 @error('cat_id') is-invalid @enderror" id="basicSelect" name="cat_id">



                                            <option value="0">Please Select Category</option>
                                            @foreach($data as $cat_data)

                                                <option {{ old('cat_id') == $cat_data->id ? 'selected' : '' }} value="{{$cat_data->id}}">{{$cat_data->category_name}}</option>
                                            @endforeach;



                                        </select>

                                        @error('cat_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>
                                    <div class="col-12 col-md-6">



                                       <!--  <label class="form-label" for="modalEditUserFirstName">Sub Category Name</label> -->



                                        <input type="text" id="subcategory_name" name="subcategory_name" value="{{old('subcategory_name')}}" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Sub Category Name"/>

                                        @error('subcategory_name')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                    </div>





                                    <div class="col-12 subcategory_click text-center mt-2 pt-50">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Add</button>






                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('interestSubCategories.index')}}">



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



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection



@section('scripts')





    <!-- BEGIN: Page Vendor JS-->



    <!-- <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script> -->



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
      $('.select2').select2();
</script>

  
@endsection

