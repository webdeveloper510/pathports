
@extends('admin.layouts.app')

@section('title','Edit University || PathPorts')

@section('content')


<!-- BEGIN: Content-->

    <div class="content-wrapper container-xxl p-0">



        <div class="content-header row">



            <div class="content-header-left col-md-9 col-12 mb-2">



                <div class="row breadcrumbs-top">



                    <div class="col-12">



                        <h2 class="content-header-title float-start mb-0">Edit University</h2>



                       

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



                              <form id="editUniversityForm" class="row gy-1 pt-75" action="{{ route('universities.update', ['university' => $university->id]) }}" method="post" enctype="multipart/form-data">

                                @csrf

                                {{ method_field('PUT') }}

                                <input type="hidden" id="uni_id" name="uni_id">

                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserFirstName"> Name</label>



                                        <input type="text" id="uni_name" name="uni_name" class="form-control " placeholder="John" value="{{$university->uni_name}}"/>

                                      



                                    </div>






                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalUniversitySlogan">University Slogan</label>



                                        <input type="text" id="edit_uni_slug" name="uni_slug" value="{{$university->uni_slug}}" class="form-control" />

                                       


                                    </div>




                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserEmail">Official Email:</label>



                                        <input type="text" id="edit_uni_email" name="uni_email" class="form-control " value="{{$university->uni_email}}"  />

                                       



                                    </div>


                                    <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserPhone">Contact</label>



                                        <input type="text" id="edit_uni_contact" name="uni_contact" class="form-control phone-number-mask @error('uni_contact') is-invalid @enderror" value="{{$university->uni_contact}}"/>

                                        @error('uni_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror



                                        </div>



                                        <div class="col-12 col-md-6">



                                        <label class="form-label" for="modalEditUserPhone">Alternate Contact</label>



                                        <input type="text" id="edit_uni_alternate_contact" name="uni_alternate_contact" class="form-control alternate-contact-mask @error('uni_alternate_contact') is-invalid @enderror"  value="{{$university->uni_alternate_contact}}" />

                                        @error('uni_alternate_contact')<div class="invalid-feedback"> {{ $message }} </div>@enderror




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

                                        <label for="customFile1" class="form-label">University Logo</label>

                                        <input class="form-control" type="file" name="uni_image" id="uni_image" value="{{$university->uni_image}}" /> 

                                        @if($university->uni_image)
                                        <img src="{{ asset('/assets/admin/images/university/logo/'.$university->uni_image)}}" name="uni_image" style="height: 100px; width: 100px;">
                                        @endif

                                    </div>



                                    



                                    <div class="col-12 text-center mt-2 pt-50">



                                        <button type="submit" class="btn btn-primary me-1 add-button">Update</button>



                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><a href="{{route('universities.index')}}">



                                            Discard</a>



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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/responsive.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/buttons.bootstrap5.min.css">



    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">




    <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/css/pages/modal-create-app.css">







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


    <script>
        $('.phone-number-mask').inputmask('999.999.9999');
        $('.alternate-contact-mask').inputmask('999.999.9999');
    </script>










@endsection

