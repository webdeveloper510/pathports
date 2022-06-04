@extends('backend.layouts.app')

@section('title','Alumini List || PathPorts')

@section('content')



    <!-- BEGIN: Content-->

        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
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
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">


                        <!-- profile -->
                        <div class="card">

                            <div class="card-body py-2 my-25">


                                <!-- form -->
                                <form class="validate-form mt-2 pt-50">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12">
                                            <label for="language" class="form-label">Select Role</label>
                                            <select id="language" class="select2 form-select select-role">
                                                <option value="">Select Role</option>
                                                <option value="en">Super Admin</option>
                                                <option value="en">University</option>
                                                <option value="fr">Graduates</option>
                                                <option value="de">Alumini</option>
                                                <option value="pt">Booster</option>
                                            </select>
                                        </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <div class="left_20">
                                        <label ><input type="checkbox" class="flat-red adminfunction" name="categories" value="1" checked> View University </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can view university</p>
                                    </div>

                                    <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="2" > Create and delete university </label></div>
                                <div class="left_80">
                                    <p>Assigned user can create and delete university</p>
                                </div>

                                <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="3" checked> View Graduates </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can view graduates</p>
                                    </div>

                                <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="4" > Create and delete Graduates </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can create and delete graduates</p>
                                    </div>
                                    <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="5" checked> View Alumini </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can view alumini</p>
                                    </div>

                                <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="6" > Create and delete alumini </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can create and delete alumini</p>
                                    </div>

                                    <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="7" > View Interest Areas </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can view interest areas</p>
                                    </div>

                                    <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="8" checked> View Meetings </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can view meetings</p>
                                    </div>

                                <div class="left_20">
                                        <label><input type="checkbox" class="flat-red adminfunction" name="categories" value="9" > Create and delete meetings </label>
                                         </div>
                                    <div class="left_80">
                                        <p>Assigned user can create and delete meetings</p>
                                    </div>
                            </div>
                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                        </div>
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


@endsection



@section('scripts')





@endsection
