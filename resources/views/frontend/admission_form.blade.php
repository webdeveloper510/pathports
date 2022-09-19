@extends('frontend.layouts.app')


@section('title','Enrollment Form|| PathPorts')


@section('content')


<!-- BEGIN: Content-->






<div class="container">
    <form>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="modern-firstname">First Name*</label>
                <input type="text" id="firstname" name="firstname" class="form-control" />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="modern-lastname">Last Name*</label>
                <input type="text" id="lastname" name="lastname" class="form-control" />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="modern-email">Email*</label>
                <input type="text" id="email" name="email" class="form-control" />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="modern-contact">Phone Number*</label>
                <input type="text" id="contact" name="contact" class="form-control" />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="modern-institution">Institution*</label>
                <input type="text" id="institution" name="institution" class="form-control" />
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="modern-state">State*</label>
                <input type="text" id="state" name="state" class="form-control" />
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary me-1 add-button">Submit</button>
            </div>
        </div>
    </form>
</div>




    <!-- END: Content-->



@endsection



@section('styles')



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/')}}assets/admin/vendors/css/tables/datatable/dataTables.bootstrap5.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->



   


@endsection







@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $('.phone-number-mask').inputmask('999.999.9999');
        $('.alternate-contact-mask').inputmask('999.999.9999');
    </script>


@endsection

