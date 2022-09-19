@extends('admin.layouts.app')



@section('title','Interest Area List || PathPorts')



@section('content')

<?php $role_id = auth()->user()->role_id; //echo "<pre>";print_r($userInterestAreas);?>
<?php $value = session()->get('permissions'); ?>

<!-- BEGIN: Content-->


    <div class="alert-msg success-msg" style="display:none;">
        <span class="closebtn">&times;</span>  
        <strong id="resultDiv"></strong>
    </div>
    <div class="content-wrapper container-xxl p-0 container-main-div">

        <div class="content-header row">

            <!-- <div class="content-header-left col-md-9 col-12 mb-2">
                <div id='resultDiv' style="color:green;font-size:16px;"></div>
            </div> -->



        </div>

        <div class="content-body">

        <div class="col-12 d-flex mb-3">

            <h2 class="content-header-title float-start mb-0">Interest Areas</h2>

        </div>

            <section id="">

                <div class="row">

                    <div class="col-12">

                        @if ($message = Session::get('success'))

                            <div class="alert alert-success">

                                <p>{{ $message }}</p>

                            </div>

                        @endif

                        <div class="card interestareas-main-div">
                            
                            <div class="card-header interestareas-main-div">

                                <!-- <h4 class="card-title"></h4> -->

                            </div>

                            <div class="card-body">

                                <form  class="row gy-1 pt-75" id="interestArea_form" onsubmit="return false;">



                                    <div class="col-12 col-md-12">

                                        <div class="row">
                                            <br>
                                            <div class="col-12 col-md-6 interest-inner-div">

                                                <label class="form-label category-label" for="basicSelect">Category</label>

                                                <select class="form-select select2" id="interest_areas_category">
                                                    <option>Select Category</option>
                                                    @foreach($interest_areas_category as $category_data)
                                                   
                                                    <option value="{{$category_data->id}}">{{$category_data->category_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <br>
                                            <div class="col-12 col-md-6 interest-inner-div">

                                                <label class="form-label subcategory-label" for="basicSelect">SubCategory</label>
                                                
                                                <select class="form-select select2" id="interest_areas_subcategory">
                                                    <option>Select Sub Category</option>
                                                    @foreach($interest_areas_subcategory as $subcategory_data)
                                                    <option value="{{$subcategory_data->id}}">{{$subcategory_data->subcategory_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <br>

                                            <div class="demo-inline-spacing">
                                                <div class="col-md-12 interest_area_checkbox" id=" interest_area_checkbox">
                                                <!-- @foreach($interest_areas as $interest_areas_data)
                                      
                                                    <div class="form-check form-check-inline col-xs-4 interest-area-check">

                                                        <input class="form-check-input " type="checkbox" id="inlineCheckbox1" value="checked"  >

                                                        <label class="form-check-label" for="inlineCheckbox1">{{$interest_areas_data->interest_area_name}}</label>

                                                    </div>


                                                @endforeach -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if( auth()->user()->role_id == 3 || auth()->user()->role_id == 4)

                                    <div class="col-12 text-center mt-2 pt-50">

                                        <button type="submit" class="btn btn-primary me-1 add-button">Save</button>

                                    </div>
                                    @endif

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

    <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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
                 
                   // console.log(res);
                   
                    $('.interest_area_checkbox').html('');
                    var html=``;
                    var all_ids = [];
                    //console.log(res.interest_areas);
                    //console.log(res.selected_interest);
                    
                    
                    $.each(res.interest_areas, function(index, val) {
                       
                        let get_array = res.selected_interest.filter( data => data.interest_id == val.id)
                        console.log("get_array",get_array.length);
                          if(get_array.length == 1){
                         
                            html =html+`<div class="form-check form-check-inline interest-area-check col-md-4"><input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox1" value="${val.id}" name="categories" checked><label class="form-check-label" for="inlineCheckbox1">${val.interest_area_name}</label></div>`;
                       
                          }
                          else{
                         
                            html =html+`<div class="form-check form-check-inline interest-area-check col-md-4"><input class="form-check-input checkbox-input" type="checkbox" id="inlineCheckbox1" value="${val.id}" name="categories"><label class="form-check-label" for="inlineCheckbox1">${val.interest_area_name}</label></div>`;
                          }

                        
                    });
                    $('.interest_area_checkbox').html(html);
                }

            });
        });
    });

     $(function() {
                            
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
                    //location.reload();
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
    });

    
    
	$('.add-button').change(function(e) {
		   
		e.preventDefault();
		   var subcat_id = $('.interest_area_checkbox :selected').val();
            //alert(subcat_id);
		//var formData = new FormData(this);
	});
   

    $('.select2').select2();
    </script>



@endsection


