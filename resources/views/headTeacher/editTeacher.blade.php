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
            <form class="form form-vertical" id="formEditTeacher">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Teacher</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_first_name">Teacher First Name</label>
                                    <input type="text" class="form-control dt-full-name" id="teacher_first_name"
                                        name="teacher_first_name" placeholder="First Name" aria-label="First Name"
                                        value="{{ $teacher->teacher_first_name }}" />
                                    <input type="text" class="form-control dt-full-name" id="teacher_id"
                                        name="teacher_id" placeholder="First Name" aria-label="First Name"
                                        value="{{ $teacher->teacher_id }}" hidden />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_last_name">Teacher Last Name</label>
                                    <input type="text" class="form-control dt-full-name" id="teacher_last_name"
                                        name="teacher_last_name" placeholder="Last Name" aria-label="Last Name"
                                        value="{{ $teacher->teacher_last_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_mobile">Phone Number</label>
                                    <input type="text" id="teacher_mobile" name="teacher_mobile"
                                        class="form-control dt-post" placeholder="Phone Number"
                                        aria-label="Phone Number" value="{{ $teacher->teacher_mobile }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_email">Email</label>
                                    <input type="text" id="teacher_email" name="teacher_email"
                                        class="form-control dt-email" placeholder="Email" aria-label="Email"
                                        value="{{ $teacher->teacher_email }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_employee_code">Employee code</label>
                                    <input type="text" class="form-control dt-date" id="teacher_employee_code"
                                        name="teacher_employee_code" placeholder="Employee code"
                                        aria-label="Employee code" value="{{ $teacher->teacher_employee_code }}" />
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1" id="updateTeacher">Update</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</script>

<script>
if ($("#formEditTeacher").length > 0) {
    $("#formEditTeacher").validate({
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
            $('#updateTeacher').html('Please Wait...');
            $("#updateTeacher").attr("disabled", true);
            debugger;

            var form = $('#formEditTeacher')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEditTeacher').serialize();
            console.log(data2);

            $.ajax({
                url: "{{ url('teacher-edit') }}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#updateTeacher').html('Submit');
                    $("#updateTeacher").attr("disabled", false);

                    if (response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        //window.location.reload();
                        window.location.replace("{{ url('allTeacherList') }}");

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
                    $('#updateTeacher').html('Submit');
                    $("#updateTeacher").attr("disabled", false);

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