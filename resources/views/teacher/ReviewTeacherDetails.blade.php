@extends('layouts/contentLayoutMaster')

@section('title', 'Review Teacher Details')

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
            <form class="form form-vertical" id="formTeacher">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Service Details</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Name of the Post Held</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="post_name"
                                        placeholder="Enter name of the post held"
                                        value="{{ $teacherServiceDetails->post_name }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Medium School</label>
                                    <!-- <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Employee Code" /> -->
                                    <select class="form-control" name="medium_of_school" id="medium_of_school" disabled>
                                        <option value="">Select Option</option>

                                        <option value="Assamese" @php if($teacherServiceDetails->medium_of_school ==
                                            "Assamese" ) { @endphp selected="selected" @php } @endphp >Assamese</option>
                                        <option value="Bodo" @php if($teacherServiceDetails->medium_of_school == 'Bodo'
                                            ) { @endphp selected="selected" @php } @endphp>Bodo</option>
                                        <option value="Bengali" @php if($teacherServiceDetails->medium_of_school ==
                                            'Bengali' ) { @endphp selected="selected" @php } @endphp>Bengali</option>
                                        <option value="Hindi" @php if($teacherServiceDetails->medium_of_school ==
                                            'Hindi' ) { @endphp selected="selected" @php } @endphp>Hindi</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Subjects</label>
                                    <input type="text" id="password-vertical" class="form-control" name="subjects"
                                        placeholder="Enter Subjects" value="{{ $teacherServiceDetails->subjects }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Category of Post</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="category_of_post" placeholder="Enter category of Post"
                                        value="{{ $teacherServiceDetails->category_of_post }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Pay Scale</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="pay_scale"
                                        placeholder="Enter Pay Scale" value="{{ $teacherServiceDetails->pay_scale }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Grade Pay</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="grade_pay"
                                        placeholder="Enter Grade Pay" value="{{ $teacherServiceDetails->grade_pay }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Appointment Letter No.</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="appointment_latter_no" placeholder="Enter Appointment Letter no."
                                        value="{{ $teacherServiceDetails->appointment_latter_no }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Appointment Date</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="appointment_date" placeholder="Enter Appointment Date"
                                        value="{{ $teacherServiceDetails->appointment_date }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Post Creation No</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="post_creation_no" placeholder="Enter Post Creation No"
                                        value="{{ $teacherServiceDetails->post_creation_no }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Post Creation Date</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="post_creation_date" placeholder="Enter Post Creation Date"
                                        value="{{ $teacherServiceDetails->post_creation_date }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of effect of Service
                                        Provincialisation (if Provincialised then)</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_effect_of_service_provincialisation" placeholder="Enter Date"
                                        value="{{ $teacherServiceDetails->date_of_effect_of_service_provincialisation }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of joining in
                                        Service</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_joining_in_service" placeholder="Enter Date of joining in Service"
                                        value="{{ $teacherServiceDetails->date_of_joining_in_service }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of joining in Present
                                        post</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_joining_in_present_post" placeholder="Email"
                                        value="{{ $teacherServiceDetails->date_of_joining_in_present_post }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of Retirement</label>
                                    <input type="date" id="first-name-vertical" class="form-control"
                                        name="date_of_retirement"
                                        value="{{ $teacherServiceDetails->date_of_retirement }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Period spent on Non-Teaching
                                        assignment</label>
                                    <input type="date" id="first-name-vertical" class="form-control"
                                        name="period_spent_on_non_teaching_assignment"
                                        value="{{ $teacherServiceDetails->period_spent_on_non_teaching_assignment }}"
                                        disabled />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Salary Account and Other Official Account</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Permanent Account (PAN)
                                        No</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="pan_no"
                                        id="pan_no" placeholder="Enter PAN No"
                                        value="@php echo $teacherSalaryAccountDetails->pan_no; @endphp" disabled />
                                    <input type="text" id="first-name-vertical" class="form-control" name="teacher_id"
                                        id="teacher_id" placeholder="Enter PAN No"
                                        value="@php echo $teacherSalaryAccountDetails->fk_teacher_id; @endphp" hidden
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Account No (Salary
                                        Account)</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="account_no"
                                        id="account_no" placeholder="Enter Account No (Salary Account)"
                                        value="{{ $teacherSalaryAccountDetails->account_no }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Account Name (Salary
                                        Account)</label>
                                    <input type="text" id="password-vertical" class="form-control" name="account_name"
                                        id="account_name" placeholder="Enter Account Name (Salary Account)"
                                        value="{{ $teacherSalaryAccountDetails->account_name }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Bank Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="bank_name"
                                        id="bank_name" placeholder="Enter Bank Name"
                                        value="{{ $teacherSalaryAccountDetails->bank_name }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Branch Name (Salary
                                        Account)</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="branch_name"
                                        id="branch_name" placeholder="Enter Branch Name (Salary Account)"
                                        value="{{ $teacherSalaryAccountDetails->branch_name }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">IFSC</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="ifsc"
                                        id="ifsc" placeholder="Enter IFSC code"
                                        value="{{ $teacherSalaryAccountDetails->ifsc }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Name of the district where your
                                        salary account no is active</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="district_name_of_active_salary_account_no"
                                        id="district_name_of_active_salary_account_no"
                                        placeholder="Name of the district where your salary account no is active"
                                        value="{{ $teacherSalaryAccountDetails->district_name_of_active_salary_account_no }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Name of the state where your
                                        salary account no is active</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="state_name_of_active_salary_account_no"
                                        id="state_name_of_active_salary_account_no"
                                        placeholder="Enter Name of the state where your salary account no is active"
                                        value="{{ $teacherSalaryAccountDetails->state_name_of_active_salary_account_no }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Salary Payment Mode</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="salary_payment_mode" id="salary_payment_mode"
                                        placeholder="Enter Salary Payment Mode"
                                        value="{{ $teacherSalaryAccountDetails->salary_payment_mode }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Gross Provident Fund (GPF)
                                        No</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="gross_provoded_fund" id="gross_provoded_fund"
                                        placeholder="Enter Gross Provident Fund (GPF) No"
                                        value="{{ $teacherSalaryAccountDetails->gross_provoded_fund }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Group Insurance Scheme (GIS)
                                        No.</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="group_insurance_scheme" id="group_insurance_scheme"
                                        placeholder="Enter GIS"
                                        value="{{ $teacherSalaryAccountDetails->group_insurance_scheme }}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Academic Qualifications</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="qualification">Qualification</label>
                                    <select class="form-control" name="qualification" id="qualification" disabled>
                                        <option value="">Select Qualification</option>

                                        <option value="HSLC" @php if($teacherAcademicQualification->Qualification ==
                                            "HSLC" ) { @endphp selected="selected" @php } @endphp >HSLC</option>
                                        <option value="HS" @php if($teacherAcademicQualification->Qualification == 'HS'
                                            ) { @endphp selected="selected" @php } @endphp>Bodo</option>
                                        <option value="Graduate" @php if($teacherAcademicQualification->Qualification ==
                                            'Graduate' ) { @endphp selected="selected" @php } @endphp>Graduate</option>
                                        <option value="PG" @php if($teacherAcademicQualification->Qualification ==
                                            'PG' ) { @endphp selected="selected" @php } @endphp>PG</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="stream_displine">Stream/Discipline)</label>
                                    <input type="text" id="stream_displine" class="form-control" name="stream_displine"
                                        placeholder="Enter Stream/Discipline)" value="{{ $teacherAcademicQualification->stream_displine }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied">Bubjects Studied</label>
                                    <input type="text" id="subjects_studied" class="form-control"
                                        name="subjects_studied" placeholder="Enter Bubjects Studied" value="{{ $teacherAcademicQualification->subjects_studied }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university">Board / University</label>
                                    <input type="text" id="board_university" class="form-control"
                                        name="board_university" placeholder="Enter Board / University" value="{{ $teacherAcademicQualification->board_university }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college">School / College</label>
                                    <input type="text" id="school_college" class="form-control" name="school_college"
                                        placeholder="Enter School / College" value="{{ $teacherAcademicQualification->school_college }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year">Passing Year</label>
                                    <input type="text" id="passing_year" class="form-control" name="passing_year"
                                        placeholder="Enter Passing Year" value="{{ $teacherAcademicQualification->passing_year }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="roll_no">Roll No</label>
                                    <input type="text" id="roll_no" class="form-control" name="roll_no"
                                        placeholder="Roll No" value="{{ $teacherAcademicQualification->roll_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="marks_obtained">Marks Obtained</label>
                                    <input type="text" id="marks_obtained" class="form-control" name="marks_obtained"
                                        placeholder="Marks Obtained" value="{{ $teacherAcademicQualification->marks_obtained }}" />
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title">Professional Qualifications</h4>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="qualification_p">Qualification</label>
                                    <input type="text" id="qualification_p" class="form-control" name="qualification_p"
                                        placeholder="Enter Qualification" value="{{ $teacherAcademicQualification->qualification_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="mode_p">Mode</label>
                                    <input type="text" id="mode_p" class="form-control" name="mode_p"
                                        placeholder="Enter Mode" value="{{ $teacherAcademicQualification->stream_displine }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="status_p">Status</label>
                                    <input type="text" id="status_p" class="form-control" name="status_p"
                                        placeholder="Enter Status" value="{{ $teacherAcademicQualification->status_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied_p">Subject Studied</label>
                                    <input type="text" id="subjects_studied_p" class="form-control"
                                        name="subjects_studied_p" placeholder="Enter Subject Studied" value="{{ $teacherAcademicQualification->subjects_studied_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university_p">Board / University</label>
                                    <input type="text" id="board_university_p" class="form-control"
                                        name="board_university_p" placeholder="Enter Board / University" value="{{ $teacherAcademicQualification->board_university_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college_p">School / College</label>
                                    <input type="text" id="school_college_p" class="form-control"
                                        name="school_college_p" placeholder="Enter School / College" value="{{ $teacherAcademicQualification->school_college_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year_p">Passing Year</label>
                                    <input type="text" id="passing_year_p" class="form-control" name="passing_year_p"
                                        placeholder="Enter Passing Year" value="{{ $teacherAcademicQualification->passing_year_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="roll_no_p">Roll No</label>
                                    <input type="text" id="roll_no_p" class="form-control" name="roll_no_p"
                                        placeholder="Enter Roll No" value="{{ $teacherAcademicQualification->roll_no_p }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="marks_obtained_p">Marks Obtained</label>
                                    <input type="text" id="marks_obtained_p" class="form-control"
                                        name="marks_obtained_p" placeholder="Enter Marks Obtained" value="{{ $teacherAcademicQualification->marks_obtained_p }}" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1" id="btnSubmit">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Back</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

<script>
var isRtl = $('html').attr('data-textdirection') === 'rtl';

if ($("#formTeacher").length > 0) {
    $("#formTeacher").validate({
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnSubmit').html('Please Wait...');
            $("#btnSubmit").attr("disabled", true);
            debugger;

            var form = $('#formTeacher')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formTeacher').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('store-teacher-details')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmit').html('Submit');
                    $("#btnSubmit").attr("disabled", false);

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
                    $('#btnSubmit').html('Submit');
                    $("#btnSubmit").attr("disabled", false);

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