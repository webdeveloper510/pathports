@extends('admin.layouts.app')

@section('title','Permissions || PathPorts')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BEGIN: Content-->
    
        <div class="alert-msg success-msg" style="display:none;">
              <span class="closebtn">&times;</span>  
              <strong id="resultDiv"></strong>
        </div>
    
        <div class="content-wrapper container-xxl p-0 container-main-div">
            <div class="content-header row">
                
                    
               
                <!-- <div id='resultDiv' style="color:green;font-size:16px;"></div>
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Permissions</h2>
                             <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">

                                   <li class="breadcrumb-item active">Add Permissions
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="col-12 d-flex mb-2">

                <h2 class="content-header-title float-start mb-0">Permissions</h2>

            </div>

            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif 



            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                        <!-- profile -->
                        <div class="card">

                            <div class="card-body py-2 my-25">


                                <!-- form -->
                                <form class="validate-form mt-0" method="post"  id="permission_form" onsubmit="return false;">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 pb-2">
                                            <label for="language" class="form-label">Roles</label>
                                            <select id="language user_role" class="select2-data-array form-select select-role">
                                                <option value="">Select Role</option>
                                                @foreach($roles as $users_role)
                                                    <option value="{{$users_role->id}}">{{$users_role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            <div class="form-group">
                                <div class="checkbox">
                            </div>
                        </div>
                                        <!-- <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                        </div> -->
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>


                        <!--/ profile -->
                    </div>
                </div>

            </div>
        </div>

    <!-- END: Content-->
    
    <script>
 $(function() {
    $(".success_div").html('');
						    
	$("#permission_form").submit(function() {

	   var role =  $(".select-role").val();
	   var permissionArray = [];
	   
	    $("input:checkbox[name=categories]:checked").each(function(){
		    permissionArray.push($(this).val());
		  
		});
		console.log(role);
		console.log(permissionArray);
		 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
		$.ajax({
            type: "POST",
            url: "/pathports/storeUserPermission",
            data: { role: role, permissionArray: permissionArray},
            success: function(data) {
           	$(".success-msg").css("display", "block");
			 console.log(data);
            $("#resultDiv").html("Permissions Updated Successfully!!");
            setTimeout(function() {
                $("#resultDiv").fadeOut();
                location.reload();
            }, 3000);
        },
		   
	    });
	});
});
    $(function() {
      
       $('.select-role').on('change', function() {

            $(".checkbox").html('');
	       var role =  $(".select-role").val();
	            $("#resultDiv").empty();
	  
	       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    	    $.ajax({
    	        type: "POST",
    		    url: "/pathports/getUserPermissions",
    		    data: { role: role},

    		 success: function(data) {
    		    console.log(data);
    			var arr = JSON.parse(data);
    			console.log(arr);           	
    			var html ='';
    				
    			$.each($(arr),function(key,value){
    			   var status = value.status;
    			   console.log(status);
    			   console.log(value.name);
    			   if(status==1){
    			   console.log("",value.name);
    			   	html +='<div class="left_20"><label><input type="checkbox" class="flat-red adminfunction" name="categories" value="'+value.id+'" checked> '+value.name+' </label></div><div class="left_80"><p>'+value.description+'</p></div>';
    			   }
    			   else{
    			   	html +='<div class="left_20"><label><input type="checkbox" class="flat-red adminfunction" name="categories" style="padding-left:4px;" value="'+value.id+'"> '+value.name+' </label></div><div class="left_80"><p>'+value.description+'</p></div>';
    			   }
    			});
    			html +='<div class="col-12"><button type="submit" class="btn btn-primary mt-1 me-1">Save</button></div>';
    			$(".checkbox").append(html);	      
    		}
        });

	});
});
    </script>


@endsection


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">

@endsection



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.date.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.time.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/legacy.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/pickers/form-pickers.js"></script>

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script>


@endsection





