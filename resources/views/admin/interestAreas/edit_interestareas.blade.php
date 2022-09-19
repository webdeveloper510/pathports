
@extends('admin.layouts.app')

@section('title','Interest Areas Edit || PathPorts')

@section('content')

<?php  $value = Session()->get('permissions'); 
//echo "<pre>"; print_r($value);?>
<!-- BEGIN: Content-->

<div class="content-wrapper container-xxl p-0">

<div class="content-header row">

    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Interest Areas</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Interest Areas</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Lists</a>

                        </li>

                        <li class="breadcrumb-item active">Edit Interest Areas

                        </li>

                    </ol>

                </div>

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

            <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="{{route('update_interestArea',$interest_data[0]->id)}}" enctype="multipart/form-data">

            @csrf
        
                <!-- <div class="col-12 col-md-6 interest-inner-div">

                    <label class="form-label category-label" for="basicSelect">Category</label>

                    <select class="form-select" id="interest_areas_category" name="interest_areas_category">
                        <option>Select Category</option>
                        @foreach($category_data as $category_datas)
                       
                        <option value="{{$category_datas->id}}">{{$category_datas->category_name}}</option>
                        @endforeach
                    </select>

                </div>
                <br> -->
                <div class="col-12 col-md-6 interest-inner-div1">
                    <label class="form-label subcategory-label" for="basicSelect">SubCategory</label>
                    <select class="select2-data-array form-select" id="basicSelect" name="subcat_id" value="">
                        <option value="">Please Select Category</option>
                            @foreach($subcategory_data as $subcategory_datas)
                                <option value="{{$subcategory_datas->id}}" {{$subcategory_datas->id == $interest_data[0]->subcat_id  ? 'selected' : ''}}>{{$subcategory_datas->subcategory_name}}</option>
                            @endforeach
                    </select> 
                </div>

                <div class="col-12 col-md-6">



                    <label class="form-label" for="interest_area_name">Interest Area</label>



                    <input type="text" id="interest_area_name" name="interest_area_name" class="form-control"  value="{{$interest_data[0]->interest_area_name}}" />



                </div>





                <div class="col-12 updateclick text-center mt-2 pt-50">



                    <button type="submit" class="btn btn-primary me-1 add-button">Update</button>



                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('interestCategories.index')}}">



                        Discard</a>



                    </button>



                </div>



            </form>



            </div>

</div>





    <!-- END: Content-->


@endsection

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">

@endsection


@section('scripts')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script>

@endsection

