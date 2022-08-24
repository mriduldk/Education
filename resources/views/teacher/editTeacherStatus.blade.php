@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Teacher')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<!-- JQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<style>
.error {
    color: red;
}
</style>

@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection


@section('content')
<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <form class="form form-vertical" id="formEditTeacherStatus">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Teacher</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="status">Teacher Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Option</option>
                                        <option value="Working" @php if($teacherStatus->status == "Working" ) {
                                            @endphp selected="selected" @php } @endphp >Working</option>
                                        <option value="On Leave" @php if($teacherStatus->status =='On Leave' )
                                            { @endphp selected="selected" @php } @endphp>On Leave</option>
                                        <option value="Child Care Leave" @php if($teacherStatus->status ==
                                            'Child Care Leave' ) { @endphp selected="selected" @php } @endphp>Child
                                            Care Leave</option>
                                        <option value="Maternity Leave" @php if($teacherStatus->status ==
                                            'Maternity Leave' ) { @endphp selected="selected" @php }
                                            @endphp>Maternity Leave</option>
                                        <option value="Retired" @php if($teacherStatus->status == 'Retired' ) {
                                            @endphp selected="selected" @php } @endphp>Retired</option>
                                        <option value="Expired" @php if($teacherStatus->status == 'Expired' ) {
                                            @endphp selected="selected" @php } @endphp>Expired</option>
                                        <option value="Transferred" @php if($teacherStatus->status ==
                                            'Transferred' ) { @endphp selected="selected" @php } @endphp>Transferred
                                        </option>
                                        <option value="Suspension" @php if($teacherStatus->status ==
                                            'Suspension' ) { @endphp selected="selected" @php } @endphp>Suspension
                                        </option>
                                        <option value="Attachment" @php if($teacherStatus->status ==
                                            'Attachment' ) { @endphp selected="selected" @php } @endphp>Attachment
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-3">If status is Attachment</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="attachement_date">Date of Attachment</label>
                                    <input type="date" class="form-control" id="attachement_date"
                                        name="attachement_date" placeholder="Date of Attachment"
                                        aria-label="Date of Attachment" value="{{ $teacherStatus->attachement_date }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="block_name">Name of Block in which
                                        Attach</label>
                                    <input type="text" id="block_name" name="block_name"
                                        class="form-control" placeholder="Name of Block in which Attach"
                                        aria-label="Name of Block in which Attach"
                                        value="{{ $teacherStatus->block_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_name">Name of school where
                                        attached</label>
                                    <input type="text" id="school_name" name="school_name"
                                        class="form-control" placeholder="Name of school where attached"
                                        aria-label="Name of school where attached"
                                        value="{{ $teacherStatus->school_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="udice_code">UDICE code of the
                                        School</label>
                                    <input type="text" class="form-control" id="udice_code"
                                        name="udice_code" placeholder="UDICE code of the School"
                                        aria-label="UDICE code of the School"
                                        value="{{ $teacherStatus->udice_code }}" />
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1" id="updateTeacherStatus">Update</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</section>

</script>

<script>
if ($("#formEditTeacherStatus").length > 0) {
    $("#formEditTeacherStatus").validate({
        rules: {
            status: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            status: {
                required: "Please Select Status",
                maxlength: "Status should be 100 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#updateTeacherStatus').html('Please Wait...');
            $("#updateTeacherStatus").attr("disabled", true);
            

            var form = $('#formEditTeacherStatus')[0];
            var data = new FormData(form);
            
            $.ajax({
                url: "{{ url('edit-teacher-status') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#updateTeacherStatus').html('Submit');
                    $("#updateTeacherStatus").attr("disabled", false);

                    if (response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        window.location.replace("{{ url('teacherDashboard') }}");

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
                    $('#updateTeacherStatus').html('Submit');
                    $("#updateTeacherStatus").attr("disabled", false);

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

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection