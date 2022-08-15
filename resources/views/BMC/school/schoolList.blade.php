@extends('layouts/contentLayoutMaster')

@section('title', 'School List')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
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
                <div class="card-datatable table-responsive pt-0">
                    <table class="school-list-table table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>SL No</th>
                                <th>UDICE CODE</th>
                                <th>School Name</th>
                                <th>Regional Details</th>
                                <th>Basic Details</th>
                                <th>Schol status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>



</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />


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
var dtUserTable = $('.school-list-table');

function GetSchoolData(schoolName, udice_code, pin) {

    dtUserTable.DataTable({
        responsive: true,
        searchDelay: 500,
        destroy: true,
        ajax: {
            url: "{{url('bmc/schoolData')}}",
            type: 'GET',
            dataSrc: ''
        },
        success: function(data) {
            debugger;
        },
        error: function(a, b, c) {
            debugger;
        },

        columns: [{
                data: 'id',
                title: 'id',
            },
            {
                data: 'school_name',
                title: 'School Name',
            },
            {
                data: 'udice_code',
                title: 'udice code',
            },
            {
                data: null,
                title: 'Head Teacher Name',
            },
            {
                data: null,
                title: 'Head Teacher Number',
            },
            {
                data: null,
                title: 'Head Teacher Email',
            }
        ],
        columnDefs: [{
                targets: 3,
                title: 'Head Teacher Name',
                orderable: false,
                render: function(data, type, full, meta) {

                    return '<span>' + data.headTeacher.teacher_first_name + ' ' + data.headTeacher
                        .teacher_last_name + '</span>';
                }
            },
            {
                targets: 4,
                title: 'Head Teacher Name',
                orderable: false,
                render: function(data, type, full, meta) {

                    return '<span>' + data.headTeacher.teacher_mobile + '</span>';
                }
            },
            {
                targets: 5,
                title: 'Head Teacher Name',
                orderable: false,
                render: function(data, type, full, meta) {

                    return '<span>' + data.headTeacher.teacher_email + '</span>';
                }
            }
        ],
        order: [
            [1, 'desc']
        ],
        dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
            '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
            '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
            '>t' +
            '<"d-flex justify-content-between mx-2 row mb-1"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..'
        },
        lengthMenu: [10, 25, 50, 75, 100],
        buttons: [{
            text: feather.icons['plus'].toSvg({
                class: 'me-50 font-small-4'
            }) + 'Add New Record',
            className: 'create-new btn btn-primary',
            action: function(e, dt, node, config) {
                window.location.replace("{{url('bmc/schoolInsert')}}");
            },
            init: function(api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        }],
    });


}

GetSchoolData('', '', '');
</script>


<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection