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
            url: "{{url('searchedSchoolData')}}",
            data: {
                'district': '',
                'school_name': schoolName,
                'udice_code': udice_code,
                'pin': pin
            },
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
                data: null,
                responsivePriority: -1
            },
            {
                data: 'udice_code',
                title: 'udice code',
            },
            {
                data: null,
                title: 'School Address',
            },
            {
                data: null,
                title: 'Basic Details',
            },
            {
                data: null,
                title: 'School status',
            }
        ],
        columnDefs: [{
                targets: 1,
                title: 'School Name',
                orderable: false,
                render: function(data, type, full, meta) {

                    var url = '{{ route("searchSchoolDetails", ":id") }}';
                    url = url.replace(':id', data.school_id);

                    return (
                        "<a href='" + url + "' class=''>" + data.school_name + " " +
                        feather.icons['external-link'].toSvg({
                            class: 'font-small-4 me-50'
                        }) +
                        '</a>'
                    );
                }
            },
            {
                targets: 3,
                title: 'School Address',
                orderable: false,
                render: function(data, type, full, meta) {

                    return (
                        "<span>Village : " + data.village + "<br>" +
                        "Cluster : " + data.cluster + "<br>" +
                        "Block : " + data.block + "<br>" +
                        "District : " + data.district + "<br>" +
                        "State : " + data.state + "<br>" +
                        "PIN : " + data.pin + "</span>"
                    );
                }
            },
            {
                targets: 4,
                title: 'Basic Details',
                orderable: false,
                render: function(data, type, full, meta) {

                    return (
                        "<span>State Mgmt : " + data.state_management + "<br>" +
                        "National Mgmt : " + data.national_management + "<br>" +
                        "School Category : " + data.school_category + "<br>" +
                        "School Type : " + data.school_type + "</span>"
                    );
                }
            },
            {
                targets: 5,
                title: 'School status',
                orderable: false,
                render: function(data, type, full, meta) {

                    return (
                        "<span class='badge rounded-pill badge-light-success p-1'>State Mgmt : " +
                        data
                        .status + "</span>"
                    );
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
    });


}

GetSchoolData('', '', '');

</script>


<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection