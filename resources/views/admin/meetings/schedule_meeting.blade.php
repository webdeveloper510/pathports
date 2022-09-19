@extends('admin.layouts.app')



@section('title','Schedule A Meeting || PathPorts')



@section('content')





    <!-- BEGIN: Content-->



    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">

                <div class="row breadcrumbs-top">

                    <div class="col-12">

                        <h2 class="content-header-title float-start mb-0">Schedule A Meeting</h2>

                        <div class="breadcrumb-wrapper">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="index.html">Schedule A Meeting</a>

                                </li>

                                <li class="breadcrumb-item"><a href="#">Lists</a>

                                </li>

                                <li class="breadcrumb-item active">Schedule A Meeting

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

            <div class="content-body">

                <!-- Flatpickr Starts -->

                <section id="flatpickr">

                    <div class="card">

                        <div class="card-header">

                            <!-- <h4 class="card-title">Flatpickr</h4> -->

                        </div>
                        @if(!$students->isEmpty())
                        <div class="card-body">
                                <form id="addMeetingForm" class="row gy-1 pt-75" method="POST" action="{{route('meeting.store')}}">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6 meetng-inner mb-1">

                                        <label class="form-label" for="basicInput">Meeting Title</label>

                                        <input type="text" class="form-control @error('meeting_title') is-invalid @enderror" value="{{old('meeting_title')}}" name="meeting_title" id="basicInput" placeholder="Enter Meeting Title" />
                                        @error('meeting_title')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>
                                    <div class="col-md-6 meetng-inner mb-1">

                                        <label class="form-label" for="basicInput">Meeting Description</label>

                                        <textarea class="form-control" name="meeting_description" value="{{old('meeting_description')}}"></textarea>

                                    </div>

                                    <!-- <div class="col-12 col-md-6">

                                        <label class="form-label" for="basicSelect">University</label>

                                        <select class="form-select @error('university_id') is-invalid @enderror" id="basicSelect" name="university_id">
                                            <option value="">Please select your university</option>
                                            @foreach($univeristy as $universities)

                                            <option  value="{{$universities->id}}" {{ old('university_id') == $universities->id ? 'selected' : '' }}>{{$universities->uni_name}}</option>
                                            @endforeach;
                                        </select>

                                        @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div> -->

                                    <div class="col-md-6 meetng-inner mb-1">
                                   
                                        @if($role_id == 3)
                                            <label class="form-label" for="basicSelect">Select Alumni</label>
                                             <select class="form-select select2 @error('students') is-invalid @enderror" id="alumni_name" name="students" >

                                                    <option value="">Please Select Alumni</option>
                                                    @if($matched_alum_ids)
                                                        @foreach($students as $student)

                                                        <option  value="{{$student->id}}" {{ $matched_alum_ids ==  $student->id ? 'selected' : ''}}>{{$student->firstName}}</option>
                                                        @endforeach;
                                                    @else
                                                        @foreach($students as $student)

                                                            <option  value="{{$student->id}}" {{ (collect(old('students'))->contains($student->id)) ? 'selected':'' }}>{{$student->firstName}}</option>
                                                        @endforeach;
                                                    @endif
                                                </select>
                                        @endif
                                        @if($role_id == 4)
                                            <label class="form-label" for="basicSelect">Select Students</label>
                                            <select class="form-select select2 @error('students') is-invalid @enderror" id="normalMultiSelect" name="students[]" multiple="multiple">
                                            
                                                @foreach($students as $student)

                                                <option  value="{{$student->id}}" {{ (collect(old('students'))->contains($student->id)) ? 'selected':'' }}>{{$student->firstName}}</option>
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
                                    <div class="col-md-6 meetng-inner mb-1">

                                        <label class="form-label" for="fp-default">Timezone</label>
                                        <select class="form-select select2  @error('timezone') is-invalid @enderror" id="timezone" name="timezone">
                                                <option value="" >Select your timezone</option>
                                                <option value="1"  {{ old('timezone') ==  1 ? 'selected' : '' }} >Hawaii Standard Time (HST-10)</option>
                                                <option value="2"  {{ old('timezone') ==  2 ? 'selected' : '' }}>Hawaii-Aleutian Daylight Time (HDT-9)</option>
                                                <option value="3"  {{ old('timezone') ==  3 ? 'selected' : '' }}>Alaska Daylight Time (AKDT-8)</option>
                                                <option value="4"{{ old('timezone') ==  4 ? 'selected' : '' }} >Pacific Daylight Time (PDT-7)</option>
                                                <option value="5" {{ old('timezone') ==  5 ? 'selected' : '' }}>Mountain Standard Time (MST-7)</option> 
                                                <option value="6" {{ old('timezone') ==  6 ? 'selected' : '' }}>Mountain Daylight Time (MDT-6)</option>
                                                <option value="7" {{ old('timezone') ==  7 ? 'selected' : '' }}>Central Daylight Time (CDT-5)</option>
                                                <option value="8" {{ old('timezone') ==  8 ? 'selected' : '' }}>Eastern Daylight Time (EDT-4)</option>
                                                

                                        </select>
                                        @error('timezone')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>

                                    <div class="col-md-4 mb-1 position-relative">

                                        <label class="form-label" for="fp-default">Date</label>

                                        <!-- <input type="text" id="" name="start_date" class="form-control @error('start_date') is-invalid @enderror flatpickr-basic schedule-date" placeholder="YYYY-MM-DD" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                                        @error('start_date')<div class="invalid-feedback"> {{ $message }} </div>@enderror -->

                                        <input type="text" id="datepicker" name="start_date" class="form-control @error('start_date') is-invalid @enderror" placeholder="MM-DD-YY" value=""/style="width: 100%;">
                                        @error('start_date')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>
                                    
                                    <div class="col-md-4 mb-1 position-relative">
                                        <label class="form-label"  for="pt-default">Start Time</label>
                                        <input type="text" id="pt-default" name="start_time"  value="{{old('start_time')}}" class="form-control pickatime @error('start_time') is-invalid @enderror" placeholder="8:00 AM" />
                                        @error('start_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>

                                    <!-- <div class="col-md-3 mb-1">

                                        <label class="form-label" for="fp-default">End Date</label>

                                        <input type="text" id="" name="end_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control flatpickr-basic schedule-date @error('end_date') is-invalid @enderror" placeholder="YYYY-MM-DD" />
                                        @error('end_date')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div> -->
                                    
                                    <div class="col-md-4 mb-1 position-relative">
                                        <label class="form-label" for="pt-default">End Time</label>
                                        <input type="text" name="end_time" id="pt-default" value="{{old('end_time')}}" class="form-control pickatime @error('end_time') is-invalid @enderror" placeholder="8:00 AM" />
                                        @error('end_time')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>
                                    <div class="col-md-6 meetng-inner mb-1">

                                        <label class="form-label" for="basicInput">Meeting Url</label>

                                        <input type="text" value="{{old('meeting_url')}}" class="form-control @error('meeting_url') is-invalid @enderror" name="meeting_url" id="basicInput" placeholder="Enter Meeting Url" />
                                        @error('meeting_url')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                                    </div>
                                    <div class="col-md-6 meetng-inner mb-1">

                                        <label class="form-label" for="fp-default">Agenda</label>
                                        <select class="form-select select2 @error('agenda') is-invalid @enderror" id="normalMultiSelect" name="agenda">
                                            <option>Select Your Agenda</option>
                                            @foreach($agenda as $agendas)

                                            <option  value="{{$agendas->id}}" {{ old('agenda') == $agendas->id ? 'selected' : '' }}>{{$agendas->name}}</option>
                                            @endforeach;
                                        </select>
                                        @error('agenda')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                                    </div>


                                </div>
                                

                                <div class="col-12 text-center mt-2 pt-50">

                                    <button type="submit" class="btn btn-primary me-1 add-button">Schedule</button>

                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('meeting.index')}}">Discard</a></button>

                                </div>

                            </form>



                        </div>
                        @else
                            <p class="no_students py-10" >There are no Students who Matched to your Interest Areas</p>
                        @endif
                   

                    </div>

                </section>

                <!-- Flatpickr Ends-->



            </div>





        </div>

    </div>



    <!-- END: Content-->





@endsection



@section('styles')





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/pickadate/pickadate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/pickers/flatpickr/flatpickr.min.css">



    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/forms/select/select2.min.css"> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/plugins/forms/pickers/form-pickadate.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.css"> -->
    
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<style>
td.highlight > a {
    background: #E50104!important;
    color: #fff!important;
}
</style>

@endsection



@section('scripts')






    <!-- <script src="{{ asset('/')}}assets/admin/vendors/js/forms/select/select2.full.min.js"></script> -->
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
    <!-- <script src="{{ asset('/')}}assets/admin/js/scripts/forms/form-select2.js"></script> -->


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    var role_id = <?php echo $role_id ?>;
    if(role_id == 4){
        $('#datepicker').datepicker({
            minDate: 0,
        });
    }

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

                
              

                jQuery(function(){
    
                   
                    var enableDays = alum_dates_array;
                    
                    function enableAllTheseDays(date) {
                        var sdate = $.datepicker.formatDate( 'mm-dd-yy', date)
                        console.log(sdate)
                        if($.inArray(sdate, enableDays) != -1) {
                            return [true];
                        }
                        return [false];
                    }
                       
                    $('#datepicker').datepicker({minDate: 0,dateFormat: 'mm-dd-yy', beforeShowDay: enableAllTheseDays});
                })

                /*$('#datepicker').datepicker({
                    minDate: 0,
                    beforeShowDay: highlightDays
                });

                function highlightDays(date) {
                    for (var i = 0; i < dates.length; i++) {
                        if (new Date(dates[i]).toString() == date.toString()) {
                            return [true, 'highlight'];
                        }
                    }
                    return [true, ''];
                }*/
                
            },
        });
    });


    $('.select2').select2();
   
</script>

@endsection

