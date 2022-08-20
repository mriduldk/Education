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



                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_gender">Gender</label>
                                    <input type="text" class="form-control dt-date" id="teacher_gender"
                                        name="teacher_gender" placeholder="Gender" aria-label="Gender"
                                        value="{{ $teacher->teacher_gender }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_dob">Date of Birth</label>
                                    <input type="date" class="form-control dt-date" id="teacher_dob" name="teacher_dob"
                                        placeholder="Date of Birth" aria-label="Date of Birth"
                                        value="{{ $teacher->teacher_dob }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_caste">Caste</label>
                                    <input type="text" class="form-control dt-date" id="teacher_caste"
                                        name="teacher_caste" placeholder="Caste" aria-label="Caste"
                                        value="{{ $teacher->teacher_caste }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_religion">Religion</label>
                                    <input type="text" class="form-control dt-date" id="teacher_religion"
                                        name="teacher_religion" placeholder="Religion" aria-label="Religion"
                                        value="{{ $teacher->teacher_religion }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_nationality">Nationality</label>
                                    <input type="text" class="form-control dt-date" id="teacher_nationality"
                                        name="teacher_nationality" placeholder="Nationality" aria-label="Nationality"
                                        value="{{ $teacher->teacher_nationality }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_present_address">Present Address</label>
                                    <input type="text" class="form-control dt-date" id="teacher_present_address"
                                        name="teacher_present_address" placeholder="Present Address"
                                        aria-label="Present Address" value="{{ $teacher->teacher_present_address }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_parmanent_address">Parmanent Address</label>
                                    <input type="text" class="form-control dt-date" id="teacher_parmanent_address"
                                        name="teacher_parmanent_address" placeholder="Parmanent Address"
                                        aria-label="Parmanent Address"
                                        value="{{ $teacher->teacher_parmanent_address }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_aadhaar_no">Aadhaar No</label>
                                    <input type="text" class="form-control dt-date" id="teacher_aadhaar_no"
                                        name="teacher_aadhaar_no" placeholder="Aadhaar No" aria-label="Aadhaar No"
                                        value="{{ $teacher->teacher_aadhaar_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_mobile">Mobile</label>
                                    <input type="text" class="form-control dt-date" id="teacher_mobile"
                                        name="teacher_mobile" placeholder="Mobile" aria-label="Mobile"
                                        value="{{ $teacher->teacher_mobile }}" disabled/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_email">Email</label>
                                    <input type="text" class="form-control dt-date" id="teacher_email"
                                        name="teacher_email" placeholder="Email" aria-label="Email"
                                        value="{{ $teacher->teacher_email }}" disabled/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_mother_name">Mother Name</label>
                                    <input type="text" class="form-control dt-date" id="teacher_mother_name"
                                        name="teacher_mother_name" placeholder="Mother Name" aria-label="Mother Name"
                                        value="{{ $teacher->teacher_mother_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_father_name">Father Name</label>
                                    <input type="text" class="form-control dt-date" id="teacher_father_name"
                                        name="teacher_father_name" placeholder="Father Name" aria-label="Father Name"
                                        value="{{ $teacher->teacher_father_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_identification_mark">Identificaion
                                        Mark</label>
                                    <input type="text" class="form-control dt-date" id="teacher_identification_mark"
                                        name="teacher_identification_mark" placeholder="Identificaion Mark"
                                        aria-label="Identificaion Mark"
                                        value="{{ $teacher->teacher_identification_mark }}" />
                                </div>
                            </div>



                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_blood_group">Blood Group</label>
                                    <input type="text" class="form-control dt-date" id="teacher_blood_group"
                                        name="teacher_blood_group" placeholder="Blood Group" aria-label="Blood Group"
                                        value="{{ $teacher->teacher_blood_group }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_differntly_abled">Differently Abled</label>
                                    <input type="text" class="form-control dt-date" id="teacher_differntly_abled"
                                        name="teacher_differntly_abled" placeholder="Differently Abled"
                                        aria-label="Differently Abled"
                                        value="{{ $teacher->teacher_differntly_abled }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_maritial_status">Maritial Status</label>
                                    <input type="text" class="form-control dt-date" id="teacher_maritial_status"
                                        name="teacher_maritial_status" placeholder="Maritial Status"
                                        aria-label="Maritial Status" value="{{ $teacher->teacher_maritial_status }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_spouse_name">Spouse Name</label>
                                    <input type="text" class="form-control dt-date" id="teacher_spouse_name"
                                        name="teacher_spouse_name" placeholder="Spouse Name" aria-label="Spouse Name"
                                        value="{{ $teacher->teacher_spouse_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_spouse_working_under_govt_serveice">Spouse working under Govt Service</label>
                                    <select name="teacher_spouse_working_under_govt_serveice" id="teacher_spouse_working_under_govt_serveice"
                                        class="form-select text-capitalize mb-md-0 mb-2xx">
                                        <option value="">Select Option</option>
                                        <option value="1" @php if($teacher->teacher_spouse_working_under_govt_serveice == "1" ) {
                                            @endphp selected="selected" @php } @endphp >Yes</option>
                                        <option value="0" @php if($teacher->teacher_spouse_working_under_govt_serveice == '0' || $teacher->teacher_spouse_working_under_govt_serveice == null ) { @endphp
                                            selected="selected" @php } @endphp>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_language">Language</label>
                                    <input type="text" class="form-control dt-date" id="teacher_language"
                                        name="teacher_language" placeholder="Language" aria-label="Language"
                                        value="{{ $teacher->teacher_language }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_tet_category">TET Category</label>
                                    <input type="text" class="form-control dt-date" id="teacher_tet_category"
                                        name="teacher_tet_category" placeholder="TET Category" aria-label="TET Category"
                                        value="{{ $teacher->teacher_tet_category }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_category_type">Designation</label>
                                    <input type="text" class="form-control dt-date" id="teacher_category_type"
                                        name="teacher_category_type" placeholder="Designation" aria-label="Designation"
                                        value="{{ $teacher->teacher_category_type }}" />
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js">

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
            teacher_gender: {
                required: true,
                maxlength: 100
            },
            teacher_dob: {
                required: true,
                maxlength: 100
            },
            teacher_caste: {
                required: true,
                maxlength: 100
            },
            teacher_religion: {
                required: true,
                maxlength: 100
            },
            teacher_nationality: {
                required: true,
                maxlength: 100
            },
            teacher_present_address: {
                required: true,
                maxlength: 300
            },
            teacher_parmanent_address: {
                required: true,
                maxlength: 300
            },
            teacher_aadhaar_no: {
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
            teacher_mother_name: {
                required: true,
                maxlength: 100
            },
            teacher_father_name: {
                required: true,
                maxlength: 100
            },
            teacher_identification_mark: {
                required: true,
                maxlength: 100
            },
            teacher_blood_group: {
                required: true,
                maxlength: 100
            },
            teacher_differntly_abled: {
                required: true,
                maxlength: 100
            },
            teacher_maritial_status: {
                required: true,
                maxlength: 100
            },
            teacher_spouse_name: {
                required: true,
                maxlength: 100
            },
            teacher_spouse_working_under_govt_serveice: {
                required: true,
                maxlength: 100
            },
            teacher_language: {
                required: true,
                maxlength: 100
            },
            teacher_tet_category: {
                required: true,
                maxlength: 100
            },
            teacher_category_type: {
                required: true,
                maxlength: 100
            }
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
            teacher_gender: {
                required: "Please enter Gender",
                maxlength: "Gender maxlength should be 100 characters long."
            },
            teacher_dob: {
                required: "Please enter DOB",
                maxlength: "DOB maxlength should be 100 characters long."
            },
            teacher_caste: {
                required: "Please enter Caste",
                maxlength: "Caste maxlength should be 100 characters long."
            },
            teacher_religion: {
                required: "Please enter Religion",
                maxlength: "Religion maxlength should be 100 characters long."
            },
            teacher_nationality: {
                required: "Please enter Nationality",
                maxlength: "Nationality maxlength should be 100 characters long."
            },
            teacher_present_address: {
                required: "Please enter Present Address",
                maxlength: "Present Address maxlength should be 300 characters long."
            },
            teacher_parmanent_address: {
                required: "Please enter Parmanent address",
                maxlength: "Parmanent address maxlength should be 300 characters long."
            },
            teacher_aadhaar_no: {
                required: "Please enter Aadhaar No",
                maxlength: "Aadhaar No maxlength should be 100 characters long."
            },
            teacher_mobile: {
                required: "Please enter Mobile",
                maxlength: "Mobile maxlength should be 100 characters long."
            },
            teacher_email: {
                required: "Please enter Email",
                maxlength: "Email maxlength should be 100 characters long."
            },
            teacher_mother_name: {
                required: "Please enter Mother Name",
                maxlength: "Mother Name maxlength should be 100 characters long."
            },
            teacher_father_name: {
                required: "Please enter Father Name",
                maxlength: "Father Name maxlength should be 100 characters long."
            },
            teacher_identification_mark: {
                required: "Please enter Identification Mark",
                maxlength: "Identification Mark maxlength should be 100 characters long."
            },
            teacher_blood_group: {
                required: "Please enter Blood group",
                maxlength: "Blood group maxlength should be 100 characters long."
            },
            teacher_differntly_abled: {
                required: "Please enter Differently Abled",
                maxlength: "Differently Abled maxlength should be 100 characters long."
            },
            teacher_maritial_status: {
                required: "Please enter Maritial Status",
                maxlength: "Maritial Status maxlength should be 100 characters long."
            },
            teacher_spouse_name: {
                required: "Please enter Spouse Name",
                maxlength: "Spouse Name maxlength should be 100 characters long."
            },
            teacher_spouse_working_under_govt_serveice: {
                required: "Please enter Spouse working under govt services",
                maxlength: "Spouse working under govt services maxlength should be 100 characters long."
            },
            teacher_language: {
                required: "Please enter Language",
                maxlength: "Language maxlength should be 100 characters long."
            },
            teacher_tet_category: {
                required: "Please enter tet Category",
                maxlength: "tet Category maxlength should be 100 characters long."
            },
            teacher_category_type: {
                required: "Please enter Designation",
                maxlength: "Designation maxlength should be 100 characters long."
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
                url: "{{ url('edit-teacher') }}",
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