@extends('layouts/contentLayoutMaster')

@section('title', 'All Teacher List')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
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
                <table class="datatables-teacher table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>teacher_no</th>
                            <th>teacher_first_name</th>
                            <th>teacher_mobile</th>
                            <th>teacher_email</th>
                            <th>teacher_employee_code</th>
                            <th>teacher designation</th>
                            <th>teacher Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" id="formTransfer">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Transfer Teacher</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="teacher_name">Teacher Name</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name"
                            placeholder="Teacher Name" aria-label="Teacher Name" disabled />
                        <input type="text" class="form-control" id="teacher_id" name="teacher_id"
                            placeholder="First Name" aria-label="First Name" hidden />
                        <input type="text" class="form-control" id="school_id" name="school_id" placeholder="First Name"
                            aria-label="First Name" hidden />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="current_school_name">Current School</label>
                        <input type="text" class="form-control" id="current_school_name" name="current_school_name"
                            placeholder="Current School" aria-label="Current School" disabled />
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="transfer_to_school">Transfer To School</label>
                        <select class="form-control" name="transfer_to_school" id="transfer_to_school">
                            <option value="">Select Option</option>
                        </select>

                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="teacher_email">Transfer Date</label>
                        <input type="date" id="transfer_date" name="transfer_date" class="form-control"
                            placeholder="Transfer Date" aria-label="Transfer Date" />
                    </div>

                    <button type="submit" class="btn btn-warning data-submit me-1" id="btnTransfer">Transfer</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <div class="input-group mb-3">
        <div id="recaptcha-container"></div>
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
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

@endsection



@section('page-script')
{{-- Page js files --}}

<script>
var dt_notice_table = $('.datatables-teacher');
var datatable = dt_notice_table.DataTable({
    // datasource definition
    responsive: true,
    searchDelay: 500,
    destroy: true,
    ajax: {
        url: "{{ url('chd/all-teachers-data') }}",
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
            data: 'teacher_no',
            title: 'teacher no',
        },
        {
            data: null,
            title: 'teacher name',
        },
        {
            data: 'teacher_mobile',
            title: 'teacher mobile',
        },
        {
            data: 'teacher_email',
            title: 'teacher email',
        },
        {
            data: 'teacher_employee_code',
            title: 'teacher employee code',
        },
        {
            data: 'teacher_category_type',
            title: 'teacher designation',
        },
        {
            data: null,
            title: 'Teacher Status',
        },
        {
            data: null,
            title: 'Action',
        },
    ],
    columnDefs: [{
            // Actions
            targets: 2,
            title: 'Teacher Name',
            orderable: false,
            render: function(data, type, full, meta) {

                return (
                    '<span>' + data.teacher_first_name + ' ' + data.teacher_last_name + '</span>'
                );
            }
        },
        {
            // Actions
            targets: 7,
            title: 'Teacher Status',
            orderable: false,
            render: function(data, type, full, meta) {

                var strSpan = "";

                if (data.teacher_t_id == null) {

                    if (data.status == 'Working') {
                        strSpan = '<span class="badge rounded-pill badge-light-success">Working</span>';
                    } else if (data.status == 'On Leave') {
                        strSpan = '<span class="badge rounded-pill badge-light-info">On Leave</span>';
                    } else if (data.status == 'Child Care Leave') {
                        strSpan =
                            '<span class="badge rounded-pill badge-light-info">Child Care Leave</span>';
                    } else if (data.status == 'Maternity Leave') {
                        strSpan =
                            '<span class="badge rounded-pill badge-light-info">Maternity Leave</span>';
                    } else if (data.status == 'Retired') {
                        strSpan = '<span class="badge rounded-pill badge-light-danger">Retired</span>';
                    } else if (data.status == 'Expired') {
                        strSpan = '<span class="badge rounded-pill badge-light-danger">Expired</span>';
                    } else if (data.status == 'Transferred') {
                        strSpan =
                            '<span class="badge rounded-pill badge-light-warning">Transferred</span>';
                    } else if (data.status == 'Suspension') {
                        strSpan =
                            '<span class="badge rounded-pill badge-light-warning">Suspension</span>';
                    } else if (data.status == 'Attachment') {
                        strSpan =
                            '<span class="badge rounded-pill badge-light-warning">Attachment</span>';
                    }

                } else {
                    strSpan = '<span class="badge rounded-pill badge-light-danger">Transfered</span>'
                }
                return (strSpan);
            }
        },
        {
            // Actions
            targets: 8,
            title: 'Actions',
            orderable: false,
            render: function(data, type, full, meta) {
                
                return (
                    '<a class="btn btn-outline-warning text-warning" data-bs-toggle="modal" data-bs-target = "#modals-slide-in" data-id="' +
                    data.teacher_id +
                    '" onclick="TransferTeacher(' + data.id + ')" id="btnTransferTeacher">Transfer</a>'
                );
            }
        }
    ],
    order: [
        [2, 'desc']
    ],
    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    displayLength: 10,
    lengthMenu: [10, 25, 50, 75, 100]
});

$('div.head-label').html('<h6 class="mb-0">All Teacher List</h6>');


function TransferTeacher(id) {

    //let applicationId = $('#btnTransferTeacher').attr("data-id");
    let applicationId = id;

    var url = '{{ route("teacherDataForTransferCHD", ":id") }}';
    url = url.replace(':id', applicationId);

    var url2 = '{{ route("schoolListOfSameDistrictOfTeacherCHD", ":id") }}';
    url2 = url2.replace(':id', applicationId);

    $('#btnTransfer').html('Loading');
    $('#btnTransfer').attr('disabled', true);

    $.ajax({
        url: url,
        enctype: 'multipart/form-data',
        type: "GET",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {

            $('#btnTransfer').html('Transfer');
            $('#btnTransfer').attr('disabled', false);


            $('#teacher_name').val(response.teacher_first_name + " " + response.teacher_last_name);
            $('#teacher_id').val(response.teacher_id);
            $('#current_school_name').val(response.school_name + ' ( ' + response.udice_code + ' )');
            $('#school_id').val(response.school_id);

        },
        error: function(jqXHR, textStatus, errorThrown) {

            $('#btnTransfer').html('Transfer');
            $('#btnTransfer').attr('disabled', true);


            toastr['error'](
                'Failed to get School data. Please Try again.',
                'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
        }
    });

    $.ajax({
        url: url2,
        enctype: 'multipart/form-data',
        type: "GET",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {

            $('#btnTransfer').html('Transfer');
            $('#btnTransfer').attr('disabled', false);

            //$().text(response.teacher.teacher_email);

            $('#transfer_to_school').empty();
            for (var i = 0; i < response.length; i++) {
                var opt = new Option(response[i].school_name, response[i].school_id);
                $('#transfer_to_school').append(opt);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {

            $('#btnTransfer').html('Transfer');
            $('#btnTransfer').attr('disabled', true);


            toastr['error'](
                'Failed to get School data. Please Try again.',
                'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
        }
    });

}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>
if ($("#formTransfer").length > 0) {
    $("#formTransfer").validate({
        rules: {
            teacher_id: {
                required: true,
                maxlength: 100
            },
            school_id: {
                required: true,
                maxlength: 100
            },
            transfer_to_school: {
                required: true,
                maxlength: 100
            },
            transfer_date: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            teacher_id: {
                required: "This field is mendatory",
                maxlength: "Field should be 100 characters long."
            },
            school_id: {
                required: "This field is mendatory",
                maxlength: "Field should be 100 characters long."
            },
            transfer_to_school: {
                required: "This field is mendatory",
                maxlength: "Field should be 100 characters long."
            },
            transfer_date: {
                required: "This field is mendatory",
                maxlength: "Field should be 100 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnTransfer').html('Please Wait...');
            $("#btnTransfer").attr("disabled", true);

            var form = $('#formTransfer')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{ url('chd/teacherTransfer') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnTransfer').html('Trabsfer');
                    $("#btnTransfer").attr("disabled", false);

                    if (response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        window.location.reload();

                    } else {

                        toastr['error'](
                            response.message,
                            'Error!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#btnTransfer').html('Trabsfer');
                    $("#btnTransfer").attr("disabled", false);

                    toastr['error'](
                        'Failed to update. Please try again.',
                        'Error!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });
                }
            });
        }
    })
}
</script>



<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection