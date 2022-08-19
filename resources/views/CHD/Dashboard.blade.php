@extends('layouts/contentLayoutMaster')

@section('title', 'CHD Dashboard')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->is->count(); }}</h3>
                        <span>Total IS</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">                        
                        <i data-feather='box'  class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/isList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->dpc->count(); }}</h3>
                        <span>Total DPC</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                        <span class="avatar-content">
                        <i data-feather='home'  class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/dpcList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->dmc->count(); }}</h3>
                        <span>Total DMC</span>
                    </div>
                    <div class="avatar bg-light-success p-50">
                        <span class="avatar-content">
                            <i data-feather="user-check" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/dmcList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->deeo->count(); }}</h3>
                        <span>Total DEEO</span>
                    </div>
                    <div class="avatar bg-light-warning p-50">
                        <span class="avatar-content">                          
                        <i data-feather='user' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/deeoList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->approver->count(); }}</h3>
                        <span>Total Approver</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">                        
                        <i data-feather='box'  class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/approverList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->manager->count(); }}</h3>
                        <span>Total Manager</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                        <span class="avatar-content">
                        <i data-feather='home'  class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/managerList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->deo->count(); }}</h3>
                        <span>Total DEO</span>
                    </div>
                    <div class="avatar bg-light-success p-50">
                        <span class="avatar-content">
                            <i data-feather="user-check" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/deoList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->school->count(); }}</h3>
                        <span>Total Schools</span>
                    </div>
                    <div class="avatar bg-light-warning p-50">
                        <span class="avatar-content">                          
                        <i data-feather='user' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/chd/schoolList') }}"><i data-feather='eye'></i> View</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>id</th>
                            <th>Block Name</th>
                            <th>Administrator Name</th>
                            <th>Contact Details</th>

                            <th>Salary</th> 
                            
                            <th>Status (Completed/Pending)</th> 
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>







@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection



@section('page-script')
{{-- Page js files --}}
<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection