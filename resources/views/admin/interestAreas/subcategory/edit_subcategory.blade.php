
@extends('admin.layouts.app')

@section('title','Interest Areas Sub Category Edit || PathPorts')

@section('content')


<!-- BEGIN: Content-->

<div class="content-wrapper container-xxl p-0">

<div class="content-header row">

    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Interest Areas Sub Category</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Interest Areas Sub Category</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Lists</a>

                        </li>

                        <li class="breadcrumb-item active">Edit Interest Areas Sub Category

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

            <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="{{route('interestSubCategories.update',$subcategory_data->id)}}" enctype="multipart/form-data">

            @csrf
            {{ method_field('PUT') }}

                 <div class="col-12 col-md-6">

                    <label class="form-label" for="basicSelect">Category</label>
                    <select class="select2-data-array form-select" id="basicSelect" name="cat_id" value="{{ $subcategory_data->cat_id }}">
                        <option value="">Please Select Category</option>
                            @foreach($category_data as $category_datas)
                                <option value="{{$category_datas->id}}" {{$subcategory_data->cat_id == $category_datas->id  ? 'selected' : ''}}>{{$category_datas->category_name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6">



                    <label class="form-label" for="category_name"> Sub Category Name</label>



                    <input type="text" id="subcategory_name" name="subcategory_name" class="form-control"  value="{{$subcategory_data->subcategory_name}}" />



                </div>





                <div class="col-12 text-center mt-2 pt-50">



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

