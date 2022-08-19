@extends('layouts/contentLayoutMaster')

@section('title', 'DI Dashboard')

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
                        <h3 class="fw-bolder mb-75">{{ $dashboard->school->count(); }}</h3>
                        <span>Total School / College</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                            <i data-feather='box' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/di/schoolList') }}"><i data-feather='eye'></i>
                    View</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $dashboard->teacher->count(); }}</h3>
                        <span>Total Teacher</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                        <span class="avatar-content">
                            <i data-feather='home' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/di/teacherList') }}"><i data-feather='eye'></i>
                    View</a>
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
                            <i data-feather='user-check' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/di/approverList') }}"><i data-feather='eye'></i>
                    View</a>
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
                            <i data-feather='home' class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
                <a class="btn btn-gradient-primary" href="{{ url('/di/managerList') }}"><i data-feather='eye'></i>
                    View</a>
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
                <a class="btn btn-gradient-primary" href="{{ url('/di/deoList') }}"><i data-feather='eye'></i>
                    View</a>
            </div>
        </div>

    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatable-user-activity table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>fk_user_id</th>
                            <th>fk_action_taken_user_id</th>
                            <th>date_time</th>
                            <th>message</th>
                            <th>action</th>
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
<script>

var dt_notice_table = $('.datatable-user-activity');
var datatable = dt_notice_table.DataTable({
    // datasource definition
    responsive: true,
    searchDelay: 500,
    destroy: true,
    ajax: {
        url: "{{ url('di/user-activity-data') }}",
        type: 'GET',
        dataSrc: ''
    },
    success: function(data) {
        debugger;
    },
    error: function(a, b, c) {
        debugger;
    },
    // columns definition
    columns: [{
            data: 'id',
            title: 'id',
        },
        {
            data: 'di_name',
            title: 'User',
        },
        {
            data: 'action_taken_user_name',
            title: 'Action Taken On',
        },
        {
            data: 'date_time',
            title: 'date_time',
        },
        {
            data: 'message',
            title: 'message',
        },
        {
            data: 'action',
            title: 'action',
        }
    ],
    columnDefs: [
    {
        // Actions
        targets: 5,
        title: 'Action',
        orderable: false,
        render: function(data, type, full, meta) {

            var strAction = '';
            if(data == 'INSERT') {
                strAction = "<span class='badge rounded-pill badge-light-success'>" + data + "</span>";

            } else if(data == 'UPDATE') {
                strAction = "<span class='badge rounded-pill badge-light-warning '>" + data + "</span>";

            } else if(data == 'DELETE') {
                strAction = "<span class='badge rounded-pill badge-light-danger '>" + data + "</span>";

            } else {
                strAction = "<span class='badge rounded-pill badge-light-info '>" + data + "</span>";
            }

            return (strAction);
        }
    }],
    order: [
        [2, 'desc']
    ],
    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    displayLength: 10,
    lengthMenu: [10, 25, 50, 75, 100]
});

$('div.head-label').html('<h6 class="mb-0">Profile Activities</h6>');


</script>
@endsection