@extends('admin.layouts.app')

@section('title','Executive Availability || PathPorts')

@section('content')
<?php 

$date_array = array();
foreach($avail_exist as $data){
    $date = date('m/d/Y',strtotime($data['date']));
    array_push($date_array,$date);
}

$dates_data=json_encode($date_array);
?>


    <!-- BEGIN: Content-->
    <div class="alert-msg-main">
        <div class="alert-msg success-msg" style="display:none;">
                  <span class="closebtn">&times;</span>  
                  <strong id="resultDiv"></strong>
        </div>
    </div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                
            </div>
        </div>
        @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
     
        <div class="card">

            <div class="card-body border-bottom">
                <h2 class="add-availability">Add Your Availability</h2>
            </div>

                 @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif 
                           
                <div class="content-body">
                <div class="card-body">
                <form id="add_ava_amulni" class="row gy-1 pt-75"  onsubmit="return false;">

                @csrf

                    <div class="row">
                        <div class="col-md-12 sole-share-date mb-1">
                            <div class="inner-share-date mt-2 d-flex">         
                                <label class="form-label" for="fp-default" style="padding-right: 5px;">Date</label>
                                <!-- <input type="text" id="flatpickr_date" name="date" class="form-control flatpickr-basic schedule-date @error('date') is-invalid @enderror" placeholder="YYYY-MM-DD" /> -->
                                <input type="text" id="datepicker" name="date" class="form-control  schedule-date @error('date') is-invalid @enderror" placeholder="YYYY-MM-DD" value=""/>
                                @error('date')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            </div>
                                 <button type="submit" class="btn btn-primary me-1 add-button">Save</button>
                            
                        </div>
                        
                        <!-- <div class="col-md-3 mb-1 position-relative">
                            <label class="form-label"  for="pt-default">Start Time</label>
                            <input type="text" id="pt-default" name="start_time"  value="{{old('start_time')}}" class="form-control pickatime @error('start_time') is-invalid @enderror" placeholder="8:00 AM" />
                            @error('start_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                            
                        </div>

                      
                        
                        <div class="col-md-3 mb-1 position-relative">
                            <label class="form-label" for="pt-default">End Time</label>
                            <input type="text" name="end_time" id="pt-default" value="{{old('end_time')}}" class="form-control pickatime @error('end_time') is-invalid @enderror" placeholder="8:00 AM" />
                            @error('end_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                        </div> -->
                      
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


   


    <!-- END: Content-->



@endsection

@section('styles')
<!-- 
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">

    
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<!--     <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.default.min.css" />
    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.common.min.css" />
   
    <link rel="stylesheet" href="{{ asset('/')}}assets/admin/css/kendo.default.mobile.min.css" />  -->

      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" /> -->

      <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> -->

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.css">

@endsection

@section('scripts')

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/tables/datatable/datatables.buttons.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>



    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.date.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/picker.time.js"></script>

    <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/pickadate/legacy.js"></script>

<!--     <script src="{{ asset('/')}}assets/admin/vendors/js/pickers/flatpickr/flatpickr.min.js"></script> -->

    <script src="{{ asset('/')}}assets/admin/js/scripts/forms/pickers/form-pickers.js"></script>
   
    <script src="{{ asset('/')}}assets/admin/js/kendo.all.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script src="http://cdn.craig.is/js/rainbow-custom.min.js"></script> -->
<script>
    $(document).ready(function() {
        var dates_data = <?php echo $dates_data; ?>;
        console.log(dates_data);
       
        $('#datepicker').multiDatesPicker({
            minDate: 0,
            addDates: dates_data,
        });

	
        $('.add-button').click(function(){
            var date = $("#datepicker").val();
            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: "POST",
                url: "/pathports/add-availability",
                data: { date: date},
                success: function(data) {
                    console.log(data);
                    $(".success-msg").css("display", "block");
                    console.log(data);
                    $("#resultDiv").html("Availability Added Successfully");
                    setTimeout(function() {
                        $("#resultDiv").fadeOut();
                        location.reload();
                    }, 1000);
                },
            });
        });
    })
        
</script>





@endsection
    
    


        


