@extends('layouts/contentLayoutMaster')

@section('title', 'Leave Application List')

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
                            <th>Sl No</th>
                            <th>Application No</th>
                            <th>Name</th>
                            <th>Employee Code</th>
                            <th>Date</th>
                            <th>View Application</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" id="formAddTeacher">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="teacher_first_name">Teacher First Name</label>
                        <input type="text" class="form-control dt-full-name" id="teacher_first_name"
                            name="teacher_first_name" placeholder="First Name" aria-label="First Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="teacher_last_name">Teacher Last Name</label>
                        <input type="text" class="form-control dt-full-name" id="teacher_last_name"
                            name="teacher_last_name" placeholder="Last Name" aria-label="Last Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="teacher_mobile">Phone Number</label>
                        <input type="text" id="teacher_mobile" name="teacher_mobile" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="teacher_email">Email</label>
                        <input type="text" id="teacher_email" name="teacher_email" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="teacher_employee_code">Employee code</label>
                        <input type="text" class="form-control dt-date" id="teacher_employee_code"
                            name="teacher_employee_code" placeholder="Employee code" aria-label="Employee code" />
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1" id="addTeacherButton">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">View Application</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="card-body">

                            <ul class="list-unstyled">
                                <h4>From,</h4>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25" id="modal_userName_with_employee_code"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Mobile: </span>
                                    <span id="modal_phone"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email: </span>
                                    <span id="modal_email"></span>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-1">
                                    <span class="fw-bolder me-25">Date: </span>
                                        <span id="modal_date_from"></span>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="mb-1">
                                        <h4>Subject: </h4>
                                        <span id="modal_subject"></span>
                                    </div>
                                </div>
                                <!-- Basic Textarea start -->

                                <div class="col-12">
                                    <h4>Respected Sir/Madam,</h4>
                                    <span id="model_message"></span>
                                </div>

                                <ul class="list-unstyled card-body mt-2">
                                    <li class="mb-1">
                                        <h4>Thanking You,</h4>
                                    </li>

                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Your sincerely</span>
                                    </li>
                                    <li class="mb-10">
                                        <h5 id="modal_username">
                                            </h3>
                                    </li>
                                    <li class="mb-75">
                                        <h6 id="modal_teacher_post"></h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="footerModal">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnLoading"></button>
                    </div>
                </form>
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
        url: "{{ url('get-all-leave-application') }}",
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
            data: 'leave_application_no',
            title: 'Application No',
        },
        {
            data: 'status',
            title: 'Status',
        },
        {
            data: 'remarks',
            title: 'remarks',
        },
        {
            data: 'leave_date_from',
            title: 'Date',
        },
        {
            data: null,
            title: 'View Application',
        },
        {
            data: null,
            responsivePriority: -1
        },
    ],
    columnDefs: [{
            // Actions
            targets: 2,
            title: 'Teacher Name',
            orderable: false,
            render: function(data, type, full, meta) {

                var spanText = "";

                if(data == "Pending") {
                    spanText = '<span class="badge bg-warning">Pending</span>'
                } else if(data == "Accepted") {
                    spanText = '<span class="badge bg-success">Accepted</span>'
                } else if(data == "Rejected") {
                    spanText = '<span class="badge bg-danger">Rejected</span>'
                } else {
                    spanText = '<span class="badge bg-danger">Pending</span>'
                } 

                return (spanText);
            }
        },{
            // Actions
            targets: 5,
            title: 'View Application',
            orderable: false,
            render: function(data, type, full, meta) {

                return (
                    '<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target = "#inlineForm" data-id="' + data.id +
                    '" onclick="viewApplicationModal(' + data.id +')" id="btnViewApplication">View Application</a>'
                );
            }
        },
        {
            // Actions
            targets: -1,
            title: 'Actions',
            orderable: false,
            render: function(data, type, full, meta) {

                var url = '{{ route("editTeacher", ":id") }}';
                url = url.replace(':id', data.teacher_id);

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
                    '<a id="deleteTeacher" class="dropdown-item delete-record" data-id="' + data
                    .id +
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
        }) + 'Add Leave',
        className: 'create-new btn btn-primary',
        action : function (e, dt, node, config) {
            window.location.replace("{{url('leaveApplication')}}");
        },
        init: function(api, node, config) {
            $(node).removeClass('btn-secondary');
        }
    }],
});

$('div.head-label').html('<h6 class="mb-0">Leave Application List</h6>');


$("tbody").on("click", "#deleteTeacher", function() {
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
                url: "{{url('teacher-delete')}}",
                method: "POST",
                data: {
                    notice_id: id
                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Notice has been deleted.',
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
                        text: 'Falied to delete notice. Please try again!',
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

function viewApplicationModal(id) {

    //let applicationId = $('#btnViewApplication').attr("data-id");
    let applicationId = id;

    var url = '{{ route("GetLeaveApplicationDetails", ":id") }}';
    url = url.replace(':id', applicationId);

    $('#btnLoading').html('Loading');

    $.ajax({
        url: url,
        enctype: 'multipart/form-data',
        type: "GET",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {

            $('#btnLoading').hide();
            $('#footerModal').hide();

            $('#modal_userName_with_employee_code').text(response.teacher.teacher_first_name + " " + response.teacher.teacher_last_name + "( " + response.teacher.teacher_employee_code + " )");
            $('#modal_phone').text(response.teacher.teacher_mobile);
            $('#modal_email').text(response.teacher.teacher_email);
            $('#modal_date_from').text(response.leave_date_from);
            $('#modal_subject').text(response.leave_subject);
            $('#model_message').text(response.leave_message);
            $('#modal_username').text(response.teacher.teacher_first_name + " " + response.teacher.teacher_last_name);
            $('#modal_teacher_post').text(response.teacher.teacher_category_type);

        },
        error: function(jqXHR, textStatus, errorThrown) {

            $('#btnLoading').hide();
            $('#footerModal').hide();

            toastr['error'](
                'Failed to get Leave Application Data. Please Try again.',
                'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
        }
    });

}
</script>

<!-- JQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
if ($("#formAddTeacher").length > 0) {
    $("#formAddTeacher").validate({
        rules: {
            teacher_employee_code: {
                required: true,
                maxlength: 100
            },
            teacher_first_name: {
                required: true,
                maxlength: 100
            },
            teacher_last_name: {
                required: true,
                maxlength: 100
            },
            teacher_mobile: {
                required: true,
                maxlength: 100
            },
            teacher_email: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            teacher_employee_code: {
                required: "Please enter Employee Code",
                maxlength: "Employee Code maxlength should be 100 characters long."
            },
            teacher_first_name: {
                required: "Please enter First Name",
                maxlength: "First Name maxlength should be 100 characters long."
            },
            teacher_last_name: {
                required: "Please enter Last Name",
                maxlength: "Last Name maxlength should be 100 characters long."
            },
            teacher_mobile: {
                required: "Please enter Phone Number",
                maxlength: "Phone Number maxlength should be 100 characters long."
            },
            teacher_email: {
                required: "Please enter Email",
                maxlength: "Email maxlength should be 100 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addTeacherButton').html('Please Wait...');
            $("#addTeacherButton").attr("disabled", true);
            debugger;

            var form = $('#formAddTeacher')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formAddTeacher').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('teacher-add') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#addTeacherButton').html('Submit');
                    $("#addTeacherButton").attr("disabled", false);

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
                    $('#addTeacherButton').html('Submit');
                    $("#addTeacherButton").attr("disabled", false);

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

@endsection