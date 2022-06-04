@extends('backend.layouts.app')

@section('title','Dashboard || PathPorts')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75">21,459</h3>
                                <span>Total Universities</span>
                            </div>
                            <div class="avatar bg-light-primary p-50">
                                <span class="avatar-content">
                                    <i data-feather="user" class="font-medium-4"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75">19,860</h3>
                                <span>Total Graduates</span>
                            </div>
                            <div class="avatar bg-light-success p-50">
                                <span class="avatar-content">
                                    <i data-feather="user-check" class="font-medium-4"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75">237</h3>
                                <span>Total Alumini</span>
                            </div>
                            <div class="avatar bg-light-warning p-50">
                                <span class="avatar-content">
                                    <i data-feather="user-x" class="font-medium-4"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- users list ends -->

    </div>
</div>
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection
