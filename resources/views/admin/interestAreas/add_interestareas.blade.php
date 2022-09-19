@extends('admin.layouts.app')

@section('title','Interest Area List || PathPorts')

@section('content')

<?php $role_id = auth()->user()->role_id; //echo "<pre>";print_r($userInterestAreas);
 $value = Session()->get('permissions'); 
?>


<!-- BEGIN: Content-->


    <div class="alert-msg success-msg" style="display:none;">
        <span class="closebtn">&times;</span>  
        <strong id="resultDiv"></strong>
    </div>
    <div class="content-wrapper container-xxl p-0 container-main-div">

        <div class="content-header row">

      


        </div>

        @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

        @endif
        <div class="content-body">

        <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Interest Areas</h2>

        </div>

            <section id="">

                <div class="row">

                    <div class="col-12">

                        

                        <div class="card interestareas-main-div">
                            
                            <div class="card-header interestareas-main-div">

                                

                            </div>

                            <div class="card-body">

                                <form  class="row gy-1 pt-75" id="interestArea_form" action="{{ url('/save-interest-areas') }}" method="post">

                                    @csrf

                                    <div class="col-12 col-md-6 interest-inner-div pt-3">

                                      <!--   <label class="form-label category-label" for="basicSelect">Category</label> -->

                                        <select class="form-select select2 @error('interest_areas_category') is-invalid @enderror" id="interest_areas_category" name="interest_areas_category">
                                            <option value="0">Select Category</option>
                                            @foreach($interest_areas_category as $category_data)
                                           
                                            <option value="{{$category_data->id}}">{{$category_data->category_name}}</option>
                                            @endforeach
                                        </select>
                                       @error('interest_areas_category')<div class="invalid-feedback"> {{ $message }} </div>@enderror 
                                    </div>
                                    
                                    <br>
                                    <div class="col-12 col-md-6 interest-inner-div pt-3">

                                       <!--  <label class="form-label subcategory-label" for="basicSelect">SubCategory</label> -->
                                        
                                        <select class="form-select select2  @error('interest_areas_subcategory') is-invalid @enderror" id="interest_areas_subcategory" name="interest_areas_subcategory">
                                            <option value="0">Select Sub Category</option>
                                            @foreach($interest_areas_subcategory as $subcategory_data)
                                            <option value="{{$subcategory_data->id}}">{{$subcategory_data->subcategory_name}}</option>
                                            @endforeach
                                        </select>
                                         @error('interest_areas_subcategory')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>
                                   
                                    <br>

                                    <div class="demo-inline-spacing mt-0">
                                        <div class="col-12 col-md-6 mt-1 interest_area_div1">
                                            <label class="form-label" for="interest_areas"></label><input type="text" id="interest_areas" name="interest_areas" class="form-control @error('interest_areas') is-invalid @enderror" placeholder="Interest Areas Name">
                                            @error('interest_areas')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                        </div>
                                        
                                    </div>
                                        

                                   

                                    <div class="col-12 clicksaveintarea text-center pt-2">

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





    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->


@endsection



@section('scripts')



    <!-- BEGIN: Page Vendor JS-->
<!-- 
    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script> -->

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
  <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->

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
                url:"/pathports/getData",
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
          
           var user_id ='<?php echo Auth::user()->id; ?>';
           var role = '<?php echo $role_id; ?>';

         
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"/pathports/getSubCatData",
                dataType: 'json',
                data:{subcat_id:subcat_id,role:role,user_id:user_id},
                success: function (res){
                 
                    /*$('.interest_area_div').html('');
                    var html=``;
                   
                    html =html+`<label class="form-label" for="interest_areas">Interest Areas Name</label><input type="text" id="interest_areas" name="interest_areas" class="form-control" placeholder="Interest Areas Name">`;
                    $('.interest_area_div').html(html);*/
                }

            });
        });
    });
    $('.select2').select2();
     /*$(function() {
                            
    $("#interestArea_form").submit(function() {
           var user_id ='<?php echo Auth::user()->id; ?>';
           var role =  '<?php echo $role_id;?>';
           var subcat_id = $('#interest_areas_subcategory :selected').val();
           var max_allowed = 5;
           var checked = $("input:checkbox[name=categories]:checked").length;
          
            
           var interestAreaArray = [];
           console.log(subcat_id);
            $("input:checkbox[name=categories]:checked").each(function(){
                interestAreaArray.push($(this).val());
              
            });
     
            console.log(interestAreaArray);
            if (checked > max_allowed ) {
                alert("Please select a maximum of " + max_allowed + " options.");
            }
            else{

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/pathports/storeInterestArea",
                    data: { user_id: user_id,role: role,subcat_id:subcat_id, interestAreaArray: interestAreaArray},
                    success: function(data) {
                    
                    console.log(data);
                    
                    $(".success-msg").css("display", "block");
                    $("#resultDiv").html("Interest Area Saved Successfully!!");
                        
                    setTimeout(function() {
                        $("#resultDiv").fadeOut();
                        location.reload();
                    }, 2000);
                  },
                   
                });
            }
        });
    });*/

    
    </script>



@endsection


