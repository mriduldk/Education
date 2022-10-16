@extends('layouts/contentLayoutMaster')

@section('title', 'All DPC List')

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
                            <th>dpc_no</th>
                            <th>dpc_name</th>
                            <th>dpc_phone</th>
                            <th>dpc_email</th>
                            <th>dpc_office_name</th>
                            <th>dpc_office_address</th>
                            <th>dpc_dictrict</th>
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
            <form class="add-new-record modal-content pt-0" id="formAddDPC">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add DPC</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="dpc_name">DPC Name</label>
                        <input type="text" class="form-control dt-full-name" id="dpc_name" name="dpc_name"
                            placeholder="DPC Name" aria-label="DPC Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_phone">Phone Number</label>
                        <input type="number" id="dpc_phone" name="dpc_phone" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_email">Email</label>
                        <input type="email" id="dpc_email" name="dpc_email" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_office_name">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="dpc_office_name"
                            name="dpc_office_name" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_office_address">Office Address</label>
                        <input type="text" class="form-control dt-date" id="dpc_office_address"
                            name="dpc_office_address" placeholder="Office Address" aria-label="Office Address" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_dictrict">District</label>
                        <select class="form-control" name="dpc_dictrict" id="dpc_dictrict">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="addDPCButton">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in-edit">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" id="formEditDPC">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit DPC</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="dpc_name_e">DPC Name</label>
                        <input type="text" class="form-control dt-full-name" id="dpc_name_e" name="dpc_name_e"
                            placeholder="DPC Name" aria-label="DPC Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_phone_e">Phone Number</label>
                        <input type="number" id="dpc_phone_e" name="dpc_phone_e" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_email_e">Email</label>
                        <input type="email" id="dpc_email_e" name="dpc_email_e" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_office_name_e">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="dpc_office_name_e"
                            name="dpc_office_name_e" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_office_address_e">Office Address</label>
                        <input type="text" class="form-control dt-date" id="dpc_office_address_e"
                            name="dpc_office_address_e" placeholder="Office Address" aria-label="Office Address" />
                        <input type="text" class="form-control dt-date" id="dpc_id_e" name="dpc_id_e"
                            placeholder="DPC Type" aria-label="DPC Type" hidden />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="dpc_dictrict_e">District</label>
                        <select class="form-control" name="dpc_dictrict_e" id="dpc_dictrict_e">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="editDPCButton">Update</button>
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
        url: "{{ url('chd/all-dpc-data') }}",
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
            data: 'dpc_name',
            title: 'dpc name',
        },
        {
            data: 'dpc_no',
            title: 'dpc no',
        },
        {
            data: 'dpc_phone',
            title: 'dpc mobile',
        },
        {
            data: 'dpc_email',
            title: 'dpc email',
        },
        {
            data: 'dpc_office_name',
            title: 'Office Name',
        },
        {
            data: 'dpc_office_address',
            title: 'Office Address',
        },
        {
            data: 'dpc_dictrict',
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
                '<a id="editDPC" class="dropdown-item edit-record" data-bs-toggle="modal" data-bs-target="#modals-slide-in-edit" data-id="' +
                data
                .dpc_id +
                '" ">' +
                feather.icons['edit'].toSvg({
                    class: 'font-small-4 me-50'
                }) +
                'Edit</a>' +
                '<a id="deleteDPC" class="dropdown-item delete-record" data-id="' + data
                .dpc_id +
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

$('div.head-label').html('<h6 class="mb-0">All DPC List</h6>');


$("tbody").on("click", "#deleteDPC", function() {

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
                url: "{{ url('chd/dpc-delete') }}",
                method: "POST",
                data: {
                    dpc_id: id
                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'DPC has been deleted.',
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
                        text: 'Falied to delete DPC. Please try again!',
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

$("tbody").on("click", "#editDPC", function() {

    let id = $(this).attr("data-id");

    $.ajax({
        url: "{{ url('chd/dpc-data-for-edit') }}",
        method: "GET",
        data: {
            dpc_id: id
        },
        success: function(response) {

            //$('#myModal').modal('toggle');

            $('#dpc_id_e').val(response.dpc_id);
            $('#dpc_name_e').val(response.dpc_name);
            $('#dpc_phone_e').val(response.dpc_phone);
            $('#dpc_email_e').val(response.dpc_email);
            $('#dpc_office_name_e').val(response.dpc_office_name);
            $('#dpc_office_address_e').val(response.dpc_office_address);
            $('#dpc_office_address_e').val(response.dpc_office_address);
            $('#dpc_dictrict_e').val(response.dpc_dictrict).change();

        },
        error: function(jqXHR, textStatus, errorThrown) {

            toastr['error'](
                'Falied to get dpc data. Please try again!',
                'Error!', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });


        }
    });

});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<!--  Insert and Edit DPC -->
<script>
if ($("#formAddDPC").length > 0) {
    $("#formAddDPC").validate({
        rules: {
            dpc_name: {
                required: true,
                maxlength: 100
            },
            dpc_phone: {
                required: true,
                maxlength: 100
            },
            dpc_email: {
                required: true,
                maxlength: 100
            },
            dpc_office_name: {
                required: true,
                maxlength: 100
            },
            dpc_office_address: {
                required: true,
                maxlength: 300
            },
            dpc_dictrict: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            dpc_name: {
                required: "Please enter DPC Name",
                maxlength: "DPC Name maxlength should be 100 characters long."
            },
            dpc_phone: {
                required: "Please enter DPC Phone",
                maxlength: "DPC Phone maxlength should be 100 characters long."
            },
            dpc_email: {
                required: "Please enter DPC Email",
                maxlength: "DPC Email maxlength should be 100 characters long."
            },
            dpc_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            dpc_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            dpc_dictrict: {
                required: "Please enter District",
                maxlength: "District maxlength should be 100 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addDPCButton').html('Please Wait...');
            $("#addDPCButton").attr("disabled", true);


            var form = $('#formAddDPC')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formAddDPC').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('chd/insert-dpc') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#addDPCButton').html('Submit');
                    $("#addDPCButton").attr("disabled", false);

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
                    $('#addDPCButton').html('Submit');
                    $("#addDPCButton").attr("disabled", false);

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

if ($("#formEditDPC").length > 0) {
    $("#formEditDPC").validate({
        rules: {
            dpc_name: {
                required: true,
                maxlength: 100
            },
            dpc_phone: {
                required: true,
                maxlength: 100
            },
            dpc_email: {
                required: true,
                maxlength: 100
            },
            dpc_office_name: {
                required: true,
                maxlength: 100
            },
            dpc_office_address: {
                required: true,
                maxlength: 300
            },
            dpc_dictrict: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            dpc_name: {
                required: "Please enter DPC Name",
                maxlength: "DPC Name maxlength should be 100 characters long."
            },
            dpc_phone: {
                required: "Please enter DPC Phone",
                maxlength: "DPC Phone maxlength should be 100 characters long."
            },
            dpc_email: {
                required: "Please enter DPC Email",
                maxlength: "DPC Email maxlength should be 100 characters long."
            },
            dpc_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            dpc_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            dpc_dictrict: {
                required: "Please enter District",
                maxlength: "District maxlength should be 100 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#editDPCButton').html('Please Wait...');
            $("#editDPCButton").attr("disabled", true);


            var form = $('#formEditDPC')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEditDPC').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('chd/update-dpc') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#editDPCButton').html('Update');
                    $("#editDPCButton").attr("disabled", false);

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
                    $('#editDPCButton').html('Update');
                    $("#editDPCButton").attr("disabled", false);

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