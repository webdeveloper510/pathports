@extends('admin.layouts.app')



@section('title','Interest Area Sub Categories List || PathPorts')



@section('content')


<div class="content-wrapper container-xxl p-0">

    <div class="content-header row">

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
    <div class="content-body">

        <!-- users list start -->

        <section class="app-user-list">

        <div class="col-12 d-flex mb-2">

                <h2 class="content-header-title float-start mb-0">Interest Area Sub Categories</h2>

            </div>

            



            <!-- list and filter start -->

            <div class="card">



                <div class="card-body border-bottom">

                    <!-- <h4 class="card-title">Search & Filter</h4> -->
                    <div class="add-button-div">
                       
                        <a class="btn btn-icon btn-primary waves-effect waves-float waves-light add-button" href="{{route('interestSubCategories.create')}}"><i
                        data-feather="plus"></i> Add Sub Category</a>
                    </div> 

                    <div class="row">

                        <div class="col-md-4 user_role"></div>

                        <div class="col-md-4 user_plan"></div>

                        <div class="col-md-4 user_status"></div>

                    </div>

                </div>

                <div class="card-datatable table-responsive pt-0">

                    <table class="user-list-table table" id="subcategory_table">

                        <thead class="table-light">

                            <tr>
                                <!-- <th>Category Name</th> -->
                                <th>Sub Category Name</th>
                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach($data as $subcat_data)
                            <tr>
                                
                                <!-- <td>{{ $subcat_data->category_name }}</td> -->
                                <td>{{ $subcat_data->subcategory_name }}</td>
                                

                               
                                <td>  
                                    <div class="click-edit-dlt">
                                    
                                        <button value="" class="dropdown-item">
                                            <a class="" href="{{route('interestSubCategories.edit',$subcat_data->id) }}">
                                            <i class="fa fa-edit"></i></a>
                                        </button>
                                        
                                        <form action="{{ route('interestSubCategories.destroy', $subcat_data->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="dropdown-item">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                               
                            </tr>
                           @endforeach
                        </tbody>

                    </table>

                </div>

                

            </div>

            <!-- list and filter end -->

        </section>

        <!-- users list ends -->



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



    <script>

    $(document).ready( function () {

        $('#subcategory_table').DataTable();

    });

    </script>
@endsection
