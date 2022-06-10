




@extends('backend.layouts.app')



@section('title','Interest Area List || PathPorts')



@section('content')





<!-- BEGIN: Content-->



    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-start mb-0">Edit university</h2>

                       
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

                              <form id="editUniversityForm" class="row gy-1 pt-75" action="{{ route('backend.universities.update', ['university' => $university->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" id="uni_id" name="uni_id">
                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserFirstName"> Name</label>

                                        <input type="text" id="uni_name" name="uni_name" class="form-control " placeholder="John" value="{{$university->uni_name}}"/>
                                      

                                    </div>





                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserEmail">Official Email:</label>

                                        <input type="text" id="edit_uni_email" name="uni_email" class="form-control " value="{{$university->uni_email}}"  />
                                       

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">University Description</label>

                                        <textarea class="form-control" id="edit_uni_desc"  name="uni_desc" rows="3" >{{$university->uni_desc}}</textarea>
                                       

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="exampleFormControlTextarea1">University Address</label>

                                        <textarea class="form-control" id="edit_uni_address" name="uni_address" rows="3">{{$university->uni_address}}</textarea>

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserPhone">Contact</label>

                                        <input type="text" id="edit_uni_contact" name="uni_contact" class="form-control phone-number-mask" value="{{$university->uni_contact}}"/>

                                    </div>

                                    <div class="col-12 col-md-6">

                                        <label class="form-label" for="modalEditUserPhone">Alternate Contact</label>

                                        <input type="text" id="edit_uni_alternate_contact" name="uni_alternate_contact" class="form-control phone-number-mask"  value="{{$university->uni_alternate_contact}}" />

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
                                        <!-- <img src="{{ asset('/assets/backend/images/'.$university->uni_image)}}"
 style="height: 100px; width: 100px;"> -->
                                        <a href="{{ asset('/assets/backend/images/'.$university->uni_image)}}" download>
                                        <img src="{{ asset('/')}}assets/backend/images/pdf-img.png" style="height: 80px; width: 80px;"></a>


                                    </div>

                                    

                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Update</button>

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
