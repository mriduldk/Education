@extends('layouts/contentLayoutMaster')

@section('title', 'All Approver List')

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
                            <th>approver_name</th>
                            <th>approver_phone</th>
                            <th>approver_email</th>
                            <th>approver_office_name</th>
                            <th>approver_office_address</th>
                            <th>approver_dictrict</th>
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
            <form class="add-new-record modal-content pt-0" id="formAddApprover">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add Approver</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="approver_name">Approver Name</label>
                        <input type="text" class="form-control dt-full-name" id="approver_name" name="approver_name"
                            placeholder="Approver Name" aria-label="Approver Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_phone">Phone Number</label>
                        <input type="number" id="approver_phone" name="approver_phone" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_email">Email</label>
                        <input type="email" id="approver_email" name="approver_email" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_office_name">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="approver_office_name"
                            name="approver_office_name" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_office_address">Office Address</label>
                        <input type="text" class="form-control dt-date" id="approver_office_address"
                            name="approver_office_address" placeholder="Office Address" aria-label="Office Address" />
                        <input type="text" class="form-control dt-date" id="approver_type" name="approver_type"
                            placeholder="Approver Type" aria-label="Approver Type" value="DMC" hidden />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_dictrict">District</label>
                        <select class="form-control" name="approver_dictrict" id="approver_dictrict">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="addApproverButton">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in-edit">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" id="formEditApprover">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Approver</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="approver_name_e">Approver Name</label>
                        <input type="text" class="form-control dt-full-name" id="approver_name_e" name="approver_name_e"
                            placeholder="Approver Name" aria-label="Approver Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_phone_e">Phone Number</label>
                        <input type="number" id="approver_phone_e" name="approver_phone_e" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_email_e">Email</label>
                        <input type="email" id="approver_email_e" name="approver_email_e" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_office_name_e">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="approver_office_name_e"
                            name="approver_office_name_e" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_office_address_e">Office Address</label>
                        <input type="text" class="form-control dt-date" id="approver_office_address_e"
                            name="approver_office_address_e" placeholder="Office Address" aria-label="Office Address" />
                        <input type="text" class="form-control dt-date" id="approver_type_e" name="approver_type_e"
                            placeholder="Approver Type" aria-label="Approver Type" value="DMC" hidden />
                        <input type="text" class="form-control dt-date" id="approver_id_e" name="approver_id_e"
                            placeholder="Approver Type" aria-label="Approver Type" hidden />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="approver_dictrict_e">District</label>
                        <select class="form-control" name="approver_dictrict_e" id="approver_dictrict_e">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="editApproverButton">Update</button>
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
        url: "{{ url('dmc/all-approvers-data') }}",
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
            data: 'approver_name',
            title: 'approver name',
        },
        {
            data: 'approver_phone',
            title: 'approver mobile',
        },
        {
            data: 'approver_email',
            title: 'approver email',
        },
        {
            data: 'approver_office_name',
            title: 'Office Name',
        },
        {
            data: 'approver_office_address',
            title: 'Office Address',
        },
        {
            data: 'approver_dictrict',
            title: 'District',
        },
        {
            data: null,
            title: 'Actions',
        }
    ],
    columnDefs: [{
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
                '<a id="editApprover" class="dropdown-item edit-record" data-bs-toggle="modal" data-bs-target="#modals-slide-in-edit" data-id="' +
                data
                .approver_id +
                '" ">' +
                feather.icons['edit'].toSvg({
                    class: 'font-small-4 me-50'
                }) +
                'Edit</a>' +
                '<a id="deleteApprover" class="dropdown-item delete-record" data-id="' + data
                .approver_id +
                '" ">' +
                feather.icons['trash-2'].toSvg({
                    class: 'font-small-4 me-50'
                }) +
                'Delete</a>' +
                '</div>' +
                '</div>'
            );
        }
    }],
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

$('div.head-label').html('<h6 class="mb-0">All Approver List</h6>');


$("tbody").on("click", "#deleteApprover", function() {

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
                url: "{{ url('dmc/approver-delete') }}",
                method: "POST",
                data: {
                    approver_id: id,
                    approver_type: 'DMC'
                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Approver has been deleted.',
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
                        text: 'Falied to delete Approver. Please try again!',
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

$("tbody").on("click", "#editApprover", function() {

    let id = $(this).attr("data-id");

    $.ajax({
        url: "{{ url('dmc/approver-data-for-edit') }}",
        method: "GET",
        data: {
            approver_id: id
        },
        success: function(response) {

            //$('#myModal').modal('toggle');

            $('#approver_id_e').val(response.approver_id);
            $('#approver_name_e').val(response.approver_name);
            $('#approver_phone_e').val(response.approver_phone);
            $('#approver_email_e').val(response.approver_email);
            $('#approver_office_name_e').val(response.approver_office_name);
            $('#approver_office_address_e').val(response.approver_office_address);
            $('#approver_office_address_e').val(response.approver_office_address);
            $('#approver_dictrict_e').val(response.approver_dictrict).change();
            $('#approver_type_e').val('DMC');

        },
        error: function(jqXHR, textStatus, errorThrown) {

            toastr['error'](
                'Falied to get approver data. Please try again!',
                'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });


        }
    });

});
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<!--  Insert and Edit Approver -->
<script>
if ($("#formAddApprover").length > 0) {
    $("#formAddApprover").validate({
        rules: {
            approver_name: {
                required: true,
                maxlength: 100
            },
            approver_phone: {
                required: true,
                maxlength: 100
            },
            approver_email: {
                required: true,
                maxlength: 100
            },
            approver_office_name: {
                required: true,
                maxlength: 100
            },
            approver_office_address: {
                required: true,
                maxlength: 300
            },
            approver_dictrict: {
                required: true,
                maxlength: 100
            },
            approver_type: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            approver_name: {
                required: "Please enter Approver Name",
                maxlength: "Approver Name maxlength should be 100 characters long."
            },
            approver_phone: {
                required: "Please enter Approver Phone",
                maxlength: "Approver Phone maxlength should be 100 characters long."
            },
            approver_email: {
                required: "Please enter Approver Email",
                maxlength: "Approver Email maxlength should be 100 characters long."
            },
            approver_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            approver_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            approver_dictrict: {
                required: "Please enter District",
                maxlength: "District maxlength should be 100 characters long."
            },
            approver_type: {
                required: "Please enter Approver Type",
                maxlength: "Approver Type maxlength should be 100 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addApproverButton').html('Please Wait...');
            $("#addApproverButton").attr("disabled", true);


            var form = $('#formAddApprover')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formAddApprover').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('dmc/insert-approver') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#addApproverButton').html('Submit');
                    $("#addApproverButton").attr("disabled", false);

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
                    $('#addApproverButton').html('Submit');
                    $("#addApproverButton").attr("disabled", false);

                    toastr['error'](
                        'Failed to Insert. Please try again.',
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

if ($("#formEditApprover").length > 0) {
    $("#formEditApprover").validate({
        rules: {
            approver_name: {
                required: true,
                maxlength: 100
            },
            approver_phone: {
                required: true,
                maxlength: 100
            },
            approver_email: {
                required: true,
                maxlength: 100
            },
            approver_office_name: {
                required: true,
                maxlength: 100
            },
            approver_office_address: {
                required: true,
                maxlength: 300
            },
            approver_dictrict: {
                required: true,
                maxlength: 100
            },
            approver_type: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            approver_name: {
                required: "Please enter Approver Name",
                maxlength: "Approver Name maxlength should be 100 characters long."
            },
            approver_phone: {
                required: "Please enter Approver Phone",
                maxlength: "Approver Phone maxlength should be 100 characters long."
            },
            approver_email: {
                required: "Please enter Approver Email",
                maxlength: "Approver Email maxlength should be 100 characters long."
            },
            approver_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            approver_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            approver_dictrict: {
                required: "Please enter District",
                maxlength: "District maxlength should be 100 characters long."
            },
            approver_type: {
                required: "Please enter Approver Type",
                maxlength: "Approver Type maxlength should be 100 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#editApproverButton').html('Please Wait...');
            $("#editApproverButton").attr("disabled", true);


            var form = $('#formEditApprover')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEditApprover').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('dmc/update-approver') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#editApproverButton').html('Update');
                    $("#editApproverButton").attr("disabled", false);

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
                    $('#editApproverButton').html('Update');
                    $("#editApproverButton").attr("disabled", false);

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