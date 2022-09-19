
@extends('admin.layouts.app')

@section('title','Students Edit || PathPorts')

@section('content')


<!-- BEGIN: Content-->

<div class="content-wrapper container-xxl p-0">

<div class="content-header row">

    <div class="content-header-left col-md-9 col-12 mb-2">

        <div class="row breadcrumbs-top">

            <div class="col-12">

                <h2 class="content-header-title float-start mb-0">Students</h2>

                <div class="breadcrumb-wrapper">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html">Students</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Lists</a>

                        </li>

                        <li class="breadcrumb-item active">Edit Students

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

        <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="{{route('student.update',$users->id)}}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserFirstName"> First Name</label>
                    <input type="text" id="modalEditUserFirstName" name="firstname" class="form-control"  value="{{$users->firstName}}" data-msg="Please enter your first name" />
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserFirstName"> Last Name</label>
                    <input type="text" id="modalEditUserFirstName" name="lastname" class="form-control" value="{{$users->lastName}}" data-msg="Please enter your last name" />
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserEmail"> Email</label>
                    <input type="email" id="modalEditUserEmail" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$users->email}}"  />
                    @error('email')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserEmail"> Alternate Email</label>
                    <input type="email" id="modalEditUserEmail" name="alternat_email" class="form-control" value="{{$users->alternative_email}}"  />
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserPhone">Contact</label>
                    <input type="text" id="modalEditUserPhone" name="contact" class="form-control phone-number-mask @error('contact') is-invalid @enderror"  value="{{$users->contact}}" />
                    @error('contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicSelect">University</label>
                    <select class="select2-data-array form-select" id="basicSelect" name="university_id" value="{{$users->university_id}}">
                        <option value="">Please Select University</option>
                        @foreach($university as $universities)
                            <option value="{{$universities->id}}" {{$users->university_id == $universities->id  ? 'selected' : ''}}>{{$universities->uni_name}}</option>
                        @endforeach;
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="pd-default">Year Of Joining</label>
                    <input type="text" id="" class="form-control flatpickr-basic flatpickr-input" value="{{$users->year_of_joining}}" name="year_of_joining" />
                    @error('year_of_joining')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="modalEditUserPhone">Zip Code</label>
                    <input type="text" id="modalEditUserPhone" name="zip" class="form-control  @error('zip') is-invalid @enderror"  value="{{$users->zip}}" />
                    @error('zip')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <div class="demo-inline-spacing">
                        <label class="form-label" for="basicSelect">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" {{ $users->gender=="0"? 'checked':'' }} />
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1"  {{ $users->gender=="1"? 'checked':'' }}/>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicInput">Password</label>
                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="basicInput" value="{{$users->password}}" />
                    @error('password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label" for="basicInput">Confirm Password</label>
                    <input type="password" name="confirm_password"  class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput" value="{{$users->password}}" />
                    @error('confirm_password')<div class="invalid-feedback"> {{ $message }} </div>@enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="customFile1" class="form-label">Profile Image</label>
                    <input class="form-control" type="file"  name="student_image" value="{{$users->image}}"/>
                    @if($users->image)
                        <img src="{{ asset('/assets/admin/images/student_profile/'.$users->image)}}" name="student_image" style="height: 100px; width: 100px;">
                    @endif
                </div>
                
                <div class="col-12 col-md-6">
                    <label for="customFile1" class="form-label">Resume</label>
                    <input class="form-control" type="file"   name="graduate_resume" value="{{$users->graduate_resume}}"/>
                    @if($users->graduate_resume)
                        <img src="{{ asset('/assets/admin/images/file.jpg')}}"  name="graduate_resume" style="height: 50px; width: 50px;">
                        <a href="{{ asset('/assets/admin/images/student_resume/'.$users->graduate_resume)}}" class="file_image" download><i class="fa-solid fa-download"></i></a></div>  
                     @endif
                </div>

                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-primary me-1 add-button">Update</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('student.index')}}">Discard</a>
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

