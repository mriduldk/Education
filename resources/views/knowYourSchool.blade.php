@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
<section id="card-navigation">
    <div class="row m-5">
        <h5 class="mb-2">Know your Teacher</h5>
        <div class="col-md-12">
            <div class="card text-center mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs ms-0" id="nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="udice-tab" data-bs-toggle="tab" href="#udice" role="tab"
                                aria-controls="udice" aria-selected="true">Search by UDISE CODE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="name-tab" data-bs-toggle="tab" href="#name" role="tab"
                                aria-controls="name" aria-selected="false">Search by Name</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pin-tab" data-bs-toggle="tab" href="#pin" role="tab"
                                aria-controls="pin" aria-selected="false">Search by Pin Code</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="udice" role="tabpanel" aria-labelledby="udice-tab">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-md-4">
                                        <select class="select2 form-select" disabled id="select2-basic">
                                            <option value="AK">Select District</option>
                                            <option value="HI">Kokrajhar</option>
                                            <option value="CA">Udalguri</option>
                                            <option value="NV">Chirang</option>
                                            <option value="OR">Tamulpur</option>
                                            <option value="OR">Baksa</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="UDICE Code"
                                            id="update_title" name="update_title">
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-primary">Search</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="name" role="tabpanel" aria-labelledby="name-tab">
                            <div class="mb-1 row">
                                <div class="col-md-4">
                                    <select class="select2 form-select" id="select2-basic">
                                        <option value="AK">Select District</option>
                                        <option value="HI">Kokrajhar</option>
                                        <option value="CA">Udalguri</option>
                                        <option value="NV">Chirang</option>
                                        <option value="OR">Tamulpur</option>
                                        <option value="OR">Baksa</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="School Name" id="update_title"
                                        name="update_title">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-primary">Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pin" role="tabpanel" aria-labelledby="pin-tab">
                            <div class="mb-1 row">
                                <div class="col-md-4">
                                    <select class="select2 form-select" disabled id="select2-basic">
                                        <option value="AK">Select District</option>
                                        <option value="HI">Kokrajhar</option>
                                        <option value="CA">Udalguri</option>
                                        <option value="NV">Chirang</option>
                                        <option value="OR">Tamulpur</option>
                                        <option value="OR">Baksa</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" placeholder="PIN Code" id="update_title"
                                        name="update_title">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-primary">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
<!-- <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script> -->
@endsection