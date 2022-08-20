@extends('layouts/contentLayoutMaster')

@section('title', 'Add School Details')

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
            <form class="form form-vertical" id="formSchool">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">School Information</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_name">School Name</label>
                                    <input type="text" id="school_name" class="form-control" name="school_name"
                                        placeholder="School Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="udice_code">UDISE CODE</label>
                                    <input type="number" id="udice_code" class="form-control" name="udice_code"
                                        placeholder="UDISE CODE" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="head_teacher_first_name">Head Teacher First Name</label>
                                    <input type="text" id="head_teacher_first_name" class="form-control" name="head_teacher_first_name"
                                        placeholder="Head Teacher" />
                                </div>
                            </div><div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="head_teacher_last_name">Head Teacher Last Name</label>
                                    <input type="text" id="head_teacher_last_name" class="form-control" name="head_teacher_last_name"
                                        placeholder="Head Teacher" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="head_teacher_number">Head Teacher Number</label>
                                    <input type="number" id="head_teacher_number" class="form-control" name="head_teacher_number"
                                        placeholder="Head Teacher Number" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="head_teacher_email">Head Teacher Email</label>
                                    <input type="email" id="head_teacher_email" class="form-control" name="head_teacher_email"
                                        placeholder="Head Teacher Email" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" id="btnSubmit" class="btn btn-primary me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

<script>
var isRtl = $('html').attr('data-textdirection') === 'rtl';

if ($("#formSchool").length > 0) {
    $("#formSchool").validate({
        rules: {
            school_name: {
                required: true,
                maxlength: 200
            },
            udice_code: {
                required: true,
                maxlength: 50
            },
            head_teacher_first_name: {
                required: true,
                maxlength: 100
            },
            head_teacher_last_name: {
                required: true,
                maxlength: 100
            },
            head_teacher_number: {
                required: true,
                maxlength: 20
            },
            head_teacher_email: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            school_name: {
                required: "Please enter School Name",
                maxlength: "School Name maxlength should be 200 characters long."
            },
            udice_code: {
                required: "Please enter UDICE Code",
                maxlength: "UDICE Code should less than or equal to 50 characters",
            },
            head_teacher_first_name: {
                required: "Please enter First Name",
                maxlength: "First Name maxlength should be 100 characters long."
            },
            head_teacher_last_name: {
                required: "Please enter Last Name",
                maxlength: "Last Name maxlength should be 100 characters long."
            },
            head_teacher_number: {
                required: "Please enter Number",
                maxlength: "Number maxlength should be 20 characters long."
            },
            head_teacher_email: {
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
            $('#btnSubmit').html('Please Wait...');
            $("#btnSubmit").attr("disabled", true);
            
            var form = $('#formSchool')[0];
            var data = new FormData(form);           

            $.ajax({
                url: "{{url('bmc/insert-school')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmit').html('Submit');
                    $("#btnSubmit").attr("disabled", false);

                    if(response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        window.location.replace("{{url('bmc/schoolList')}}");
                        
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
                    $('#btnSubmit').html('Submit');
                    $("#btnSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to insert School. Please try again.',
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