@extends('layouts/contentLayoutMaster')

@section('title', 'All BEEO List')

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
                            <th>beeo_no</th>
                            <th>beeo_name</th>
                            <th>beeo_phone</th>
                            <th>beeo_email</th>
                            <th>beeo_office_name</th>
                            <th>beeo_office_address</th>
                            <th>beeo_dictrict</th>
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
            <form class="add-new-record modal-content pt-0" id="formAddBEEO">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Add BEEO</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="beeo_name">BEEO Name</label>
                        <input type="text" class="form-control dt-full-name" id="beeo_name" name="beeo_name"
                            placeholder="BEEO Name" aria-label="BEEO Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_phone">Phone Number</label>
                        <input type="number" id="beeo_phone" name="beeo_phone" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_email">Email</label>
                        <input type="email" id="beeo_email" name="beeo_email" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_office_name">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="beeo_office_name"
                            name="beeo_office_name" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_office_address">Office Address</label>
                        <input type="text" class="form-control dt-date" id="beeo_office_address"
                            name="beeo_office_address" placeholder="Office Address" aria-label="Office Address" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_dictrict">District</label>
                        <select class="form-control" name="beeo_dictrict" id="beeo_dictrict">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="addBEEOButton">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal to Edit record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in-edit">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" id="formEditBEEO">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit BEEO</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="beeo_name_e">BEEO Name</label>
                        <input type="text" class="form-control dt-full-name" id="beeo_name_e" name="beeo_name_e"
                            placeholder="BEEO Name" aria-label="BEEO Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_phone_e">Phone Number</label>
                        <input type="number" id="beeo_phone_e" name="beeo_phone_e" class="form-control dt-post"
                            placeholder="Phone Number" aria-label="Phone Number" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_email_e">Email</label>
                        <input type="email" id="beeo_email_e" name="beeo_email_e" class="form-control dt-email"
                            placeholder="Email" aria-label="Email" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_office_name_e">Office Name</label>
                        <input type="text" class="form-control dt-full-name" id="beeo_office_name_e"
                            name="beeo_office_name_e" placeholder="Office Name" aria-label="Office Name" />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_office_address_e">Office Address</label>
                        <input type="text" class="form-control dt-date" id="beeo_office_address_e"
                            name="beeo_office_address_e" placeholder="Office Address" aria-label="Office Address" />
                        <input type="text" class="form-control dt-date" id="beeo_id_e" name="beeo_id_e"
                            placeholder="BEEO Type" aria-label="BEEO Type" hidden />
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="beeo_dictrict_e">District</label>
                        <select class="form-control" name="beeo_dictrict_e" id="beeo_dictrict_e">
                            <option value="">Select District</option>
                            <option value="Kokrajhar">Kokrajhar</option>
                            <option value="Udalguri">Udalguri</option>
                            <option value="Tamulpur">Tamulpur</option>
                            <option value="Baksa">Baksa</option>
                            <option value="Chirang">Chirang</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit me-1"
                        id="editBEEOButton">Update</button>
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
        url: "{{ url('deeo/all-beeo-data') }}",
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
            data: 'beeo_no',
            title: 'beeo no',
        },
        {
            data: 'beeo_name',
            title: 'beeo name',
        },
        {
            data: 'beeo_phone',
            title: 'beeo mobile',
        },
        {
            data: 'beeo_email',
            title: 'beeo email',
        },
        {
            data: 'beeo_office_name',
            title: 'Office Name',
        },
        {
            data: 'beeo_office_address',
            title: 'Office Address',
        },
        {
            data: 'beeo_dictrict',
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
                '<a id="editBEEO" class="dropdown-item edit-record" data-bs-toggle="modal" data-bs-target="#modals-slide-in-edit" data-id="' +
                data
                .beeo_id +
                '" ">' +
                feather.icons['edit'].toSvg({
                    class: 'font-small-4 me-50'
                }) +
                'Edit</a>' +
                '<a id="deleteBEEO" class="dropdown-item delete-record" data-id="' + data
                .beeo_id +
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

$('div.head-label').html('<h6 class="mb-0">All BEEO List</h6>');


$("tbody").on("click", "#deleteBEEO", function() {

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
                url: "{{ url('deeo/beeo-delete') }}",
                method: "POST",
                data: {
                    beeo_id: id
                },
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'BEEO has been deleted.',
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
                        text: 'Falied to delete BEEO. Please try again!',
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

$("tbody").on("click", "#editBEEO", function() {

    let id = $(this).attr("data-id");

    $.ajax({
        url: "{{ url('deeo/beeo-data-for-edit') }}",
        method: "GET",
        data: {
            beeo_id: id
        },
        success: function(response) {

            //$('#myModal').modal('toggle');

            $('#beeo_id_e').val(response.beeo_id);
            $('#beeo_name_e').val(response.beeo_name);
            $('#beeo_phone_e').val(response.beeo_phone);
            $('#beeo_email_e').val(response.beeo_email);
            $('#beeo_office_name_e').val(response.beeo_office_name);
            $('#beeo_office_address_e').val(response.beeo_office_address);
            $('#beeo_office_address_e').val(response.beeo_office_address);
            $('#beeo_dictrict_e').val(response.beeo_dictrict).change();

        },
        error: function(jqXHR, textStatus, errorThrown) {

            toastr['error'](
                'Falied to get beeo data. Please try again!',
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


<!--  Insert and Edit BEEO -->
<script>
if ($("#formAddBEEO").length > 0) {
    $("#formAddBEEO").validate({
        rules: {
            beeo_name: {
                required: true,
                maxlength: 100
            },
            beeo_phone: {
                required: true,
                maxlength: 100
            },
            beeo_email: {
                required: true,
                maxlength: 100
            },
            beeo_office_name: {
                required: true,
                maxlength: 100
            },
            beeo_office_address: {
                required: true,
                maxlength: 300
            },
            beeo_dictrict: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            beeo_name: {
                required: "Please enter BEEO Name",
                maxlength: "BEEO Name maxlength should be 100 characters long."
            },
            beeo_phone: {
                required: "Please enter BEEO Phone",
                maxlength: "BEEO Phone maxlength should be 100 characters long."
            },
            beeo_email: {
                required: "Please enter BEEO Email",
                maxlength: "BEEO Email maxlength should be 100 characters long."
            },
            beeo_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            beeo_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            beeo_dictrict: {
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
            $('#addBEEOButton').html('Please Wait...');
            $("#addBEEOButton").attr("disabled", true);


            var form = $('#formAddBEEO')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formAddBEEO').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('deeo/insert-beeo') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#addBEEOButton').html('Submit');
                    $("#addBEEOButton").attr("disabled", false);

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
                    $('#addBEEOButton').html('Submit');
                    $("#addBEEOButton").attr("disabled", false);

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

if ($("#formEditBEEO").length > 0) {
    $("#formEditBEEO").validate({
        rules: {
            beeo_name: {
                required: true,
                maxlength: 100
            },
            beeo_phone: {
                required: true,
                maxlength: 100
            },
            beeo_email: {
                required: true,
                maxlength: 100
            },
            beeo_office_name: {
                required: true,
                maxlength: 100
            },
            beeo_office_address: {
                required: true,
                maxlength: 300
            },
            beeo_dictrict: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            beeo_name: {
                required: "Please enter BEEO Name",
                maxlength: "BEEO Name maxlength should be 100 characters long."
            },
            beeo_phone: {
                required: "Please enter BEEO Phone",
                maxlength: "BEEO Phone maxlength should be 100 characters long."
            },
            beeo_email: {
                required: "Please enter BEEO Email",
                maxlength: "BEEO Email maxlength should be 100 characters long."
            },
            beeo_office_name: {
                required: "Please enter Office Name",
                maxlength: "Office Name maxlength should be 100 characters long."
            },
            beeo_office_address: {
                required: "Please enter Office Address",
                maxlength: "Office Address maxlength should be 300 characters long."
            },
            beeo_dictrict: {
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
            $('#editBEEOButton').html('Please Wait...');
            $("#editBEEOButton").attr("disabled", true);


            var form = $('#formEditBEEO')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEditBEEO').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('deeo/update-beeo') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#editBEEOButton').html('Update');
                    $("#editBEEOButton").attr("disabled", false);

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
                    $('#editBEEOButton').html('Update');
                    $("#editBEEOButton").attr("disabled", false);

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