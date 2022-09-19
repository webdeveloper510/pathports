@extends('admin.layouts.app')



@section('title','Edit Meeting || PathPorts')



@section('content')


<?php //echo "<pre>";print_r($alumini_data[0]['firstName']);?>
<!-- BEGIN: Content-->

<div class="content-wrapper container-xxl p-0">

<div class="content-header row">

    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Meetings</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Meetings</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Lists</a>

                        </li>

                        <li class="breadcrumb-item active">Edit Meetings

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

            <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="{{route('meeting.update',$meeting_data->id)}}">
            @csrf
            {{ method_field('PUT') }}




                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserFirstName">Meeting Title</label>



                    <input type="text" id="modalEditUserFirstName" name="meeting_title" class="form-control" placeholder="Please Enter Meeting Title" value="{{$meeting_data->meeting_title}}"  />
                    @error('meeting_title')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                </div>



                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserFirstName">Meeting Description</label>



                    <input type="text" id="modalEditUserFirstName" name="meeting_description" class="form-control" placeholder="Please Enter Meeting Description" value="{{$meeting_data->meeting_description}}" />



                </div>

                                
<div class="col-md-6 meetng-inner mb-1">
                                   
                                         @if($role_id == 3)
                                         <?php  //echo "<pre>";print_r($users);?>
                                            <label class="form-label" for="basicSelect">Select Alumni</label>
                                             <select class="form-select select2 @error('students') is-invalid @enderror" id="alumni_name" name="students" >

                                                    <option value="">Please Select Alumni</option>
                                                      
                                                    @foreach($students as $student)

                                                        <!-- <option  value="{{$student->id}}" {{ (collect(old('students'))->contains($student->id)) ? 'selected':'' }}>{{$student->firstName}}</option> -->

                                                         <option  value="{{$student->id}}" {{ (in_array($student->id, $users)) ? 'selected' : '' }}>{{$student->firstName}}</option> 
                                                    @endforeach;
                                                </select>
                                        @endif
                                        @if($role_id == 4)
                                            <label class="form-label" for="basicSelect">Select Students</label>
                                            <select class="form-select select2 @error('students') is-invalid @enderror" id="normalMultiSelect" name="students[]" multiple="multiple">
                                            
                                                @foreach($students as $student)

                                                <!-- <option  value="{{$student->id}}" {{ (collect(old('students'))->contains($student->id)) ? 'selected':'' }}>{{$student->firstName}}</option> -->

                                                <option  value="{{$student->id}}" {{ (in_array($student->id, $users)) ? 'selected' : '' }}>{{$student->firstName}}</option> 

                                                @endforeach;
                                                
                                            </select>
                                            @error('students')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                        @endif
                                   
                                         
                                       <!--  <select class="form-select @error('students') is-invalid @enderror" id="normalMultiSelect" name="students[]" multiple="multiple">
                                            
                                            @foreach($students as $student)

                                            <option  value="{{$student->id}}" {{ (collect(old('students'))->contains($student->id)) ? 'selected':'' }}>{{$student->firstName}}</option>
                                            @endforeach;
                                            
                                        </select>
                                        @error('students')<div class="invalid-feedback"> {{ $message }} </div>@enderror -->
                                   
                                    </div>

                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="fp-default">Timezone</label>
                                    <!-- <select class="form-select select2 @error('timezone') is-invalid @enderror" id="normalMultiSelect" name="timezone" value="{{$meeting_data->timezone}}"> -->

                                        <select class="form-select select2  @error('timezone') is-invalid @enderror" id="timezone" name="timezone" value="{{$meeting_data->timezone}}">

                                        <option value="" >Select your timezone</option>
                                        <option value="1"  {{$meeting_data->timezone == 1 ? 'selected' : ''}} >Hawaii Standard Time (HST-10)</option>
                                        <option value="2"  {{$meeting_data->timezone == 2 ? 'selected' : ''}} >Hawaii-Aleutian Daylight Time (HDT-9)</option>
                                        <option value="3" {{$meeting_data->timezone == 3 ? 'selected' : ''}}>Alaska Daylight Time (AKDT-8)</option>
                                        <option value="4" {{$meeting_data->timezone == 4 ? 'selected' : ''}} >Pacific Daylight Time (PDT-7)</option>
                                        <option value="5"{{$meeting_data->timezone == 5 ? 'selected' : ''}}>Mountain Standard Time (MST-7)</option> 
                                        <option value="6" {{$meeting_data->timezone == 6 ? 'selected' : ''}}>Mountain Daylight Time (MDT-6)</option>
                                        <option value="7" {{$meeting_data->timezone == 7 ? 'selected' : ''}}>Central Daylight Time (CDT-5)</option>
                                        <option value="8" {{$meeting_data->timezone == 8 ? 'selected' : ''}}>Eastern Daylight Time (EDT-4)</option>
                                    </select>
                                    @error('timezone')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                </div>
                                <?php $start_date_time = explode(" ", $meeting_data->start_date_time); $start_time = $start_date_time[1]." ".$start_date_time[2];

                                    $end_date_time = explode(" ", $meeting_data->end_date_time); $end_time = $end_date_time[1]." ".$end_date_time[2];

                                ?>
                                <div class="col-md-3 mb-1">
                                    
                                    <label class="form-label" for="fp-default">Start Date</label>

                                    <input type="text" id="datepicker" name="start_date" value="{{$start_date_time[0]}}" class="form-control @error('start_date') is-invalid @enderror schedule-date" placeholder="YYYY-MM-DD" />
                                    @error('start_date')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                </div>
                                
                                <div class="col-md-3 mb-1 position-relative">
                                    <label class="form-label"  for="pt-default">Start Time</label>
                                    <input type="text" id="pt-default"  name="start_time" class="form-control pickatime @error('start_time') is-invalid @enderror" placeholder="8:00 AM"  value="{{$start_time}}"/>
                                    @error('start_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div>

                                <!-- <div class="col-md-3 mb-1">

                                    <label class="form-label" for="fp-default">End Date</label>

                                    <input type="text" id="" value="{{ $end_date_time[0] }}" name="end_date" class="form-control flatpickr-basic schedule-date @error('end_date') is-invalid @enderror" placeholder="YYYY-MM-DD" />
                                    @error('end_date')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                </div> -->
                                
                                <div class="col-md-3 mb-1 position-relative">
                                    <label class="form-label" for="pt-default">End Time</label>
                                    <input type="text"  name="end_time" id="pt-default" class="form-control pickatime @error('end_time') is-invalid @enderror" value="{{ $end_time }}" placeholder="8:00 AM" />
                                    @error('end_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div>
                                <div class="col-md-6 mb-1">

                                    <label class="form-label" for="basicInput">Meeting Url</label>

                                    <input type="text" value="{{$meeting_data->meeting_url}}" class="form-control @error('meeting_url') is-invalid @enderror" name="meeting_url" id="basicInput" placeholder="Enter Meeting Url" />
                                    @error('meeting_url')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                </div>
                                <div class="col-md-6 mb-1">

                                    <label class="form-label " for="fp-default">Agenda</label>
                                    <select class="form-select select2 @error('agenda') is-invalid @enderror" id="normalMultiSelect" name="agenda">
                                        <option>Select</option>
                                        @foreach($agenda as $agendas)

                                        <option  value="{{$agendas->id}}" {{ $meeting_data->agenda_id == $agendas->id ? 'selected' : '' }}>{{$agendas->name}}</option>
                                        @endforeach;
                                    </select>
                                    @error('agenda')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                </div>


                
                <div class="col-12 text-center mt-2 pt-50">



                    <button type="submit" class="btn btn-primary me-1 add-button" id="meeting_update">Update</button>



                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('meeting.index')}}">



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

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">




    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<style>
td.highlight > a {
    background: #E50104!important;
    color: #fff!important;
}
</style>
@endsection







@section('scripts')


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
  


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        





    <script>

    var role_id = <?php echo $role_id ?>;
    if(role_id == 4){
        $('#datepicker').datepicker({
            minDate: 0,
        });
    }

//

//
    $('#alumni_name').on('change', function() {
        var alum_id = $('#alumni_name').val();
        $("#datepicker" ).datepicker("destroy");
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: "POST",
            url: "/pathports/get_alumini_date",
            data: { alum_id: alum_id},
            success: function(data) {
              
                var res = JSON.parse(data);
                console.log(res);
                var alum_dates_array = [];
                $.each(res, function(index, val) {
                    
                    var alum_dates_conv = val.date;

                    var myDate = new Date(alum_dates_conv);

                    var year = myDate.getFullYear();

                    var month = myDate.getMonth() + 1;
                    if(month <= 9)
                        month = '0'+month;

                    var day= myDate.getDate();
                    if(day <= 9)
                        day = '0'+day;

                    var alum_dates = month +'-'+ day +'-'+ year;
                    

                    alum_dates_array.push(alum_dates);
                });
                console.log(alum_dates_array);

                var dates = alum_dates_array;

                var enableDays = alum_dates_array;
                
                function enableAllTheseDays(date) {
                    var sdate = $.datepicker.formatDate( 'mm-dd-yy', date)
                    console.log(sdate)
                    if($.inArray(sdate, enableDays) != -1) {
                        return [true];
                    }
                    return [false];
                }
                
                    $('#datepicker').datepicker({dateFormat: 'mm-dd-yy', beforeShowDay: enableAllTheseDays});
               
                
            },
        });
    });


    $('.select2').select2();

    $("form").submit(function(){
        var max_allowed = 3 ;
        var checked = $('#students_selected  :selected').length;
    });

</script>

@endsection

