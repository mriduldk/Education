@extends('layouts/contentLayoutMaster')

@section('title', 'Event Table')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')

<!-- Event table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-latest-update table">
                </table>
            </div>
        </div>
    </div>
</section>
<!--/ Basic table -->

@endsection


@section('vendor-script')
{{-- vendor files --}}
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

<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

@endsection
@section('page-script')
{{-- Page js files --}}
<!-- <script src="{{ asset(mix('js/scripts/tables/table-notice.js')) }}"></script> -->

<script>
var dt_latest_update_table = $('.datatables-latest-update');
var datatable = dt_latest_update_table.DataTable({
    // datasource definition
    responsive: true,
    searchDelay: 500,
    destroy: true,
    ajax: {
        url: "{{url('latest-update-table-all-data')}}",
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
            data: 'update_title',
            title: 'Event Title',
        },
        {
            data: 'update_desc',
            title: 'Event Description',
        },
        {
            data: 'date',
            title: 'date',
        },
        {
            data: 'entrusted_dept',
            title: 'Department',
        },
        {
            data: null,
            title: 'Document file',
            responsivePriority: 1
        },
        {
            data: null,
            responsivePriority: -1
        },
    ],
    columnDefs: [
        {
            targets: 5,
            title: 'Event File',
            orderable: false,
            render: function(data, type, full, meta) {
                return (
                    "<a href='" + data.doc + "' class='btn btn-primary'>" +
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

                var url = '{{ route("latest-update.edit", ":id") }}';
                url = url.replace(':id', data.id);

                return (
                    '<div class="d-inline-flex">' +
                    '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                    feather.icons['more-vertical'].toSvg({
                        class: 'font-small-4'
                    }) +
                    '</a>' +
                    '<div class="dropdown-menu dropdown-menu-end">' +
                    "<a href='" + url + "' class='dropdown-item'>" +
                    feather.icons['edit'].toSvg({
                        class: 'font-small-4 me-50'
                    }) +
                    'Edit</a>' +
                    '<a id="deleteLatestUpdate" class="dropdown-item delete-record" data-id="' + data.id +
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
        action : function (e, dt, node, config) {
            window.location.replace("{{url('latest-update-insert')}}");
        },
        init: function(api, node, config) {
            $(node).removeClass('btn-secondary');
        }
    }],
});

$('div.head-label').html('<h6 class="mb-0">Event Table</h6>');


$("tbody").on("click", "#deleteLatestUpdate", function() {
    console.log("Delete Button Clicked");
    let id = $(this).attr("data-id");
    console.log(id);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {

            mydata = {
                notice_id: id
            };
            mythis = this;
            debugger;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('latest-update-delete')}}",
                method: "POST",
                data: {
                    latestUpdate_id: id
                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Event has been deleted.',
                        timer: 1000,
                        timerProgressBar: false,
                        didOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer();
                                if (content) {
                                    const b = content.querySelector(
                                        'b');
                                    if (b) {
                                        b.textContent = Swal
                                            .getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    }).then(result => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload();
                        }
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Falied to delete Event. Please try again!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });


                }
            });

        }
    });

});
</script>

@endsection