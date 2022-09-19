
@extends('admin.layouts.app')

@section('title','Booster List || PathPorts')

@section('content')


<!-- BEGIN: Content-->

<div class="content-wrapper container-xxl p-0">

<div class="content-header row">

    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Booster</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Booster</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Lists</a>

                        </li>

                        <li class="breadcrumb-item active">Edit Booster

                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </div>



</div>


<div class="content-body">

            <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="{{route('booster.update',$users->id)}}" enctype="multipart/form-data">

            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="university_id" value="{{ auth()->user()->university_id }}">

                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserFirstName"> First Name</label>



                    <input type="text" id="modalEditUserFirstName" name="firstname" class="form-control" placeholder="John" value="{{$users->firstName}}" data-msg="Please enter your first name" />



                </div>



                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserFirstName"> Last Name</label>



                    <input type="text" id="modalEditUserFirstName" name="lastname" class="form-control" placeholder="John" value="{{$users->lastName}}" data-msg="Please enter your last name" />



                </div>


                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserFirstName">Username</label>



                    <input type="text" id="modalEditusername" name="username" class="form-control" placeholder="John" value="{{$users->username}}" data-msg="Please enter your Username" />



                </div>

                @if($role_id != 1)
                <input type="hidden" name="university_id" value="{{ auth()->user()->university_id }}">
                @else
                <div class="col-12 col-md-6">



                <label class="form-label" for="basicSelect">University</label>



                <select class="form-select select2-data-array @error('university_id') is-invalid @enderror" id="basicSelect" name="university_id">



                    <option value="">Please Select University</option>
                    @foreach($university as $universities)

                        <option  value="{{$universities->id}}" {{ $users->university_id == $universities->id ? 'selected' : '' }}>{{$universities->uni_name}}</option>
                        @endforeach;



                </select>
                @error('university_id')<div class="invalid-feedback"> {{ $message }} </div>@enderror


                </div>
                @endif


                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserEmail"> Email</label>



                    <input type="email" id="modalEditUserEmail" name="email" class="form-control" value="{{$users->email}}" placeholder="example@domain.com" />



                </div>

                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserEmail"> Alternate Email</label>



                    <input type="email" id="modalEditUserEmail" name="alternat_email" class="form-control" value="{{$users->alternative_email}}" placeholder="example@domain.com" />



                </div>



               





                <div class="col-12 col-md-6">



                    <label class="form-label" for="modalEditUserPhone">Contact</label>



                    <input type="text" id="modalEditUserPhone" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror" placeholder="123.456.7890" value="{{$users->contact}}" />
                    @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror


                </div>



                



                <!-- <div class="col-12 col-md-6">



                    <label class="form-label" for="basicSelect">University</label>



                    <select class="form-select" id="basicSelect" name="university_id" value="{{$users->university_id}}">



                        <option value="">Please select university</option>
                        @foreach($university as $universities)

                        <option value="{{$universities->id}}" {{$universities->id == $users->university_id  ? 'selected' : ''}}>{{$universities->uni_name}}</option>
                        @endforeach;



                    </select>



                </div> -->



                



               


                <div class="col-12 col-md-6">



                     <div class="demo-inline-spacing">



                        <label class="form-label" for="basicSelect">Gender</label>



                        <div class="form-check form-check-inline">

                           

                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" {{ $users->gender=="0"? 'checked':'' }}/>



                            <label class="form-check-label" for="inlineRadio1">Male</label>



                        </div>



                        <div class="form-check form-check-inline">



                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1" {{ $users->gender=="1"? 'checked':'' }}/>



                            <label class="form-check-label" for="inlineRadio2">Female</label>



                        </div>



                        <div class="form-check form-check-inline">



                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" {{ $users->gender=="2"? 'checked':'' }} />



                            <label class="form-check-label" for="inlineRadio2">Other</label>



                        </div>



                    </div>



                </div>



                



                 <div class="col-12 col-md-6">



                    <label class="form-label" for="basicInput">Password</label>



                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="basicInput" placeholder="Enter Password" autocomplete="off" />
                    @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror


                </div>

                <div class="col-12 col-md-6">



                <label class="form-label" for="basicInput">Confirm Password</label>



                <input type="password" name="confirm_password"  class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput" placeholder="Enter Confirm Password" autocomplete="off" />

                @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror

                </div>






                <div class="col-12 text-center mt-2 pt-50">



                    <button type="submit" class="btn btn-primary me-1 add-button">Update</button>



                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('booster.index')}}">



                        Discard</a>



                    </button>



                </div>



            </form>



            </div>

</div>





    <!-- END: Content-->


@endsection

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

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

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <!-- BEGIN: Page Vendor JS-->



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


    <script>
        $('.phone-number-mask').inputmask('999.999.9999');
    </script>


@endsection

