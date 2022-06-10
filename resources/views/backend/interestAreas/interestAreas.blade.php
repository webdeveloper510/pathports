@extends('backend.layouts.app')



@section('title','Interest Area List || PathPorts')



@section('content')



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

                                <li class="breadcrumb-item active">Add Interest Areas

                                </li>

                            </ol>

                        </div>

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

                            <div class="card-body">

                                <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">



                                    <div class="col-12 col-md-12">

                                        <div class="row">

                                            <h1>Interest Areas</h1>
                                            <br>
                                            <div class="col-12 col-md-6">

                                                <label class="form-label" for="basicSelect">Category</label>

                                                <select class="form-select" id="interest_areas_category">
                                                    <option>Select Category</option>
                                                    @foreach($interest_areas_category as $category_data)
                                                   
                                                    <option value="{{$category_data->id}}">{{$category_data->category_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <br>
                                            <div class="col-12 col-md-6">

                                                <label class="form-label" for="basicSelect">SubCategory</label>
                                                
                                                <select class="form-select" id="interest_areas_subcategory">
                                                    <option>Select Sub Category</option>
                                                    @foreach($interest_areas_subcategory as $subcategory_data)
                                                    <option value="{{$subcategory_data->id}}">{{$subcategory_data->subcategory_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <br>

                                            <div class="demo-inline-spacing">
                                                <div class="d-flex interest_area_checkbox" id=" interest_area_checkbox">
                                                @foreach($interest_areas as $interest_areas_data)
                                                
                                                    <div class="form-check form-check-inline interest-area-check">

                                                        <input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox1" value="checked" >

                                                        <label class="form-check-label" for="inlineCheckbox1">{{$interest_areas_data->interest_area_name}}</label>

                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Save</button>

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



@endsection



@section('scripts')



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/')}}assets/backend/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js"></script>


    <script type="text/javascript">
    $(document).ready( function () {
        $('.interest_area_checkbox').html('');
        $("#interest_areas_category").change(function() {

           var cat_id = $('#interest_areas_category :selected').val();
           //alert(cat_id);
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"/backend/getData",
                dataType: 'json',
                data:{cat_id:cat_id},
                success: function (res){
                    //console.log(res);
                   // var res = JSON.parse(response);
                    $('#interest_areas_subcategory').html('');
                    var html='<option value="">Select Sub Category</option>';
                    $.each(res, function(index, val) {
                       html =html+`<option value=${val.id}>${val.subcategory_name}</option>`;
                       });
                       $('#interest_areas_subcategory').html(html);
                   
                }

            });
        });
        $("#interest_areas_subcategory").change(function() {

           var subcat_id = $('#interest_areas_subcategory :selected').val();
           
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"/backend/getSubCatData",
                dataType: 'json',
                data:{subcat_id:subcat_id},
                success: function (res){
                    console.log(res);
                   
                    $('.interest_area_checkbox').html('');
                    var html='';
                    $.each(res, function(index, val) {
                       console.log(val);
                       //html =html+`<option value=${val.id}>${val.subcategory_name}</option>`;
                       html =html+`<div class="form-check form-check-inline interest-area-check"><input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox1" value="checked"><label class="form-check-label" for="inlineCheckbox1">${val.interest_area_name}</label></div>`;
                       });
                       $('.interest_area_checkbox').html(html);

                }

            });
        });
    });
    </script>



@endsection
