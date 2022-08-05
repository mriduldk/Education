@extends('layouts/contentLayoutMaster')

@section('title', 'All Teacher List')

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
        <div class="col-12">
            <div class="card">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Teacher Name</th>
                            <th>Employee Code</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mridul Bodo</td>
                            <td>18010102404</td>
                            <td>Dipankar Rabha</td>
                            <td>mridul@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-success"> Approved </span></td>
                            <td><a class="btn btn-danger" href="{{url ('schoolDetails')}}">Reject</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dipankar Rabha</td>
                            <td>18010102404</td>
                            <td>9875468888</td>
                            <td>rabha@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bidisa Basumatary</td>
                            <td>18010102404</td>
                            <td>9865774411</td>
                            <td>baru@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Mridul Bodo</td>
                            <td>18010102404</td>
                            <td>Dipankar Rabha</td>
                            <td>mridul@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-success"> Approved </span></td>
                            <td><a class="btn btn-danger" href="{{url ('schoolDetails')}}">Reject</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Dipankar Rabha</td>
                            <td>18010102404</td>
                            <td>9875468888</td>
                            <td>rabha@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bidisa Basumatary</td>
                            <td>18010102404</td>
                            <td>9865774411</td>
                            <td>baru@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Mridul Bodo</td>
                            <td>18010102404</td>
                            <td>Dipankar Rabha</td>
                            <td>mridul@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-success"> Approved </span></td>
                            <td><a class="btn btn-danger" href="{{url ('schoolDetails')}}">Reject</a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Dipankar Rabha</td>
                            <td>18010102404</td>
                            <td>9875468888</td>
                            <td>rabha@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Bidisa Basumatary</td>
                            <td>18010102404</td>
                            <td>9865774411</td>
                            <td>baru@gmail.com</td>
                            <td><span class="badge rounded-pill badge-light-danger"> Not Approved </span></td>
                            <td><a class="btn btn-success" href="{{url ('schoolDetails')}}">Approve</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</section>
<!-- Dashboard Ecommerce ends -->

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
var dt_notice_table = $('.datatables-school');
var assetPath = '../../../app-assets/';
var datatable = dt_notice_table.DataTable({
    // datasource definition
    // responsive: true,
    // searchDelay: 500,
    // destroy: true,
    // ajax: {
    //     url: "{{url('notice-table-all-data')}}",
    //     type: 'GET',
    //     dataSrc: ''
    // },
    ajax: assetPath + 'data/table-datatable-school.json',
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
            data: 'full_name',
            title: 'notice title',
        },
        {
            data: 'post',
            title: 'publish date',
        },
        {
            data: 'email',
            title: 'department',
        },
        {
            data: 'city',
            title: 'notice description',
        },
        {
            data: null,
            title: 'notice file',
            responsivePriority: 1
        },
        {
            data: null,
            responsivePriority: -1
        },
    ],
    columnDefs: [{
            targets: 5,
            title: 'Notice File',
            orderable: false,
            render: function(data, type, full, meta) {
                return (
                    "<a href='" + data.notice_file + "' class='btn btn-primary'>" +
                    feather.icons['download'].toSvg({
                        class: 'font-small-4 me-50'
                    }) +
                    'Download</a>'
                );
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Actions',
            orderable: false,
            render: function(data, type, full, meta) {

                var url = '{{ route("notice.edit", ":id") }}';
                url = url.replace(':id', data.id);

                return (
                    '<div class="d-inline-flex">' +
                    '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                    feather.icons['more-vertical'].toSvg({
                        class: 'font-small-4'
                    }) +
                    '</a>' +
                    '<div class="dropdown-menu dropdown-menu-end">' +
                    '<a href="' + url + '" class="dropdown-item" >' +
                    feather.icons['edit'].toSvg({
                        class: 'font-small-4 me-50'
                    }) +
                    'Edit</a>' +
                    '<a id="deleteNotice" class="dropdown-item delete-record" data-id="' + data.id +
                    '" ">' +
                    feather.icons['trash-2'].toSvg({
                        class: 'font-small-4 me-50'
                    }) +
                    'Delete</a>' +
                    '</div>' +
                    '</div>'
                );
            }
        }
    ],
    order: [
        [2, 'desc']
    ],
    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    displayLength: 10,
    lengthMenu: [10, 25, 50, 75, 100],
    buttons: [{
        text: feather.icons['plus'].toSvg({
            class: 'me-50 font-small-4'
        }) + 'Add New Record',
        className: 'create-new btn btn-primary',
        action: function(e, dt, node, config) {
            window.location.replace("{{url('notice-insert')}}");
        },
        init: function(api, node, config) {
            $(node).removeClass('btn-secondary');
        }
    }],
});
</script>


<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection