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
                            <th>teacher_first_name</th>
                            <th>teacher_mobile</th>
                            <th>teacher_email</th>
                            <th>teacher_employee_code</th>
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
        url: "{{ url('all-teachers-of-school') }}",
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
            data: null,
            responsivePriority: -1
        },
    ],
    columnDefs: [{
            // Actions
            targets: 1,
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
        }) + 'Add New Record',
        className: 'create-new btn btn-primary',
        attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
        },
        init: function(api, node, config) {
            $(node).removeClass('btn-secondary');
        }
    }],
});

$('div.head-label').html('<h6 class="mb-0">All Teacher List</h6>');


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

</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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


<!-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> -->
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection