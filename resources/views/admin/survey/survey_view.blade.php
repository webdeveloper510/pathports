@extends('admin.layouts.app')

@section('title','Survey Manage || PathPorts')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>


    <!-- BEGIN: Content-->
    
        <div class="alert-msg success-msg" style="display:none;">
              <span class="closebtn">&times;</span>  
              <strong id="resultDiv"></strong>
        </div>
    
        <div class="content-wrapper container-xxl p-0 container-main-div">
            <div class="content-header row">
                
                    
               
              

            </div>

            <div class="col-12 d-flex mb-2">

                <h2 class="content-header-title float-start mb-0">Survey Management</h2>

            </div>

      



            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                        <!-- profile -->
                        <div class="card">

                            <div class="card-body py-2 my-25">


                                <!-- form -->
                               <form class="validate-form mt-0"  id="surveyManage" method="post" onsubmit="return false" >

                                <div class="col-12 col-md-6">



<label class="form-label" for="basicSelect">Survey Title</label>



<select class="form-select select2-data-array @error('survey_title') is-invalid @enderror" id="surveytitle" name="title">



    <option value="">Select Survey Title</option>
    <!-- <option value="1">WSU REC Salary</option> -->
    <option value="1">Income By Major</option>
    <option value="2">Econ Majors</option>
    <option value="3">Spokane Medical School</option>
    <option value="4">Location</option>
    <option value="5">Demographic</option>
    <option value="6">College Level</option>
    <option value="7">Team or program level</option>
    <option value="8">Individual Level</option>
   
     

          


</select>
@error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror


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





