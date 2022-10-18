@extends('layouts/contentLayoutMasterWithoutSideBar')

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
                        <h4 class="card-title">Teacher Personal Information</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_first_name">Teacher First
                                        Name</label>
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
                                        aria-label="Phone Number" value="{{ $teacher->teacher_mobile }}" disabled />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_email">Email</label>
                                    <input type="text" id="teacher_email" name="teacher_email"
                                        class="form-control dt-email" placeholder="Email" aria-label="Email"
                                        value="{{ $teacher->teacher_email }}" disabled />
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
                                    <label class="form-label" for="teacher_present_address">Present
                                        Address</label>
                                    <input type="text" class="form-control dt-date" id="teacher_present_address"
                                        name="teacher_present_address" placeholder="Present Address"
                                        aria-label="Present Address" value="{{ $teacher->teacher_present_address }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_parmanent_address">Parmanent
                                        Address</label>
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
                                    <label class="form-label" for="teacher_differntly_abled">Differently
                                        Abled</label>
                                    <input type="text" class="form-control dt-date" id="teacher_differntly_abled"
                                        name="teacher_differntly_abled" placeholder="Differently Abled"
                                        aria-label="Differently Abled"
                                        value="{{ $teacher->teacher_differntly_abled }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="teacher_maritial_status">Maritial
                                        Status</label>
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
                                    <label class="form-label" for="teacher_spouse_working_under_govt_serveice">Spouse
                                        working under Govt Service</label>
                                    <select name="teacher_spouse_working_under_govt_serveice"
                                        id="teacher_spouse_working_under_govt_serveice"
                                        class="form-select text-capitalize mb-md-0 mb-2xx">
                                        <option value="">Select Option</option>
                                        <option value="1" @php if($teacher->
                                            teacher_spouse_working_under_govt_serveice
                                            == "1" ) {
                                            @endphp selected="selected" @php } @endphp >Yes</option>
                                        <option value="0" @php if($teacher->
                                            teacher_spouse_working_under_govt_serveice
                                            == '0' || $teacher->teacher_spouse_working_under_govt_serveice ==
                                            null ) {
                                            @endphp
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

                </div>

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
                                    <label class="form-label" for="rtteaetqaeaatat">Qualification</label>
                                    <!-- <input type="text" id="rtteaetqaeaatat" class="form-control" name="rtteaetqaeaatat"
                                        placeholder="Enter Qualification" /> -->
                                    <select name="qualification" id="qualification" class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="HSLC" @php if($teacherAcademicQualification->
                                            qualification ==
                                            "HSLC" ) {
                                            @endphp selected="selected" @php } @endphp >HSLC</option>
                                        <option value="HS" @php if($teacherAcademicQualification->qualification
                                            == 'HS'
                                            ) { @endphp
                                            selected="selected" @php } @endphp>HS</option>
                                        <option value="Graduate" @php if($teacherAcademicQualification->
                                            qualification ==
                                            'Graduate' ) { @endphp
                                            selected="selected" @php } @endphp>Graduate</option>
                                        <option value="PG" @php if($teacherAcademicQualification->qualification
                                            == 'PG'
                                            ) { @endphp
                                            selected="selected" @php } @endphp>PG</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="stream_displine">Stream/Discipline)</label>
                                    <input type="text" id="stream_displine" class="form-control" name="stream_displine"
                                        placeholder="Enter Stream/Discipline)"
                                        value="{{ $teacherAcademicQualification->stream_displine }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied">Bubjects Studied</label>
                                    <input type="text" id="subjects_studied" class="form-control"
                                        name="subjects_studied" placeholder="Enter Bubjects Studied"
                                        value="{{ $teacherAcademicQualification->subjects_studied }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university">Board / University</label>
                                    <input type="text" id="board_university" class="form-control"
                                        name="board_university" placeholder="Enter Board / University"
                                        value="{{ $teacherAcademicQualification->board_university }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college">School / College</label>
                                    <input type="text" id="school_college" class="form-control" name="school_college"
                                        placeholder="Enter School / College"
                                        value="{{ $teacherAcademicQualification->school_college }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year">Passing Year</label>
                                    <input type="text" id="passing_year" class="form-control" name="passing_year"
                                        placeholder="Enter Passing Year"
                                        value="{{ $teacherAcademicQualification->passing_year }}" />
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
                                        placeholder="Marks Obtained"
                                        value="{{ $teacherAcademicQualification->marks_obtained }}" />
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title">Professional Qualifications</h4>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="qualification_p">Qualification</label>
                                    <input type="text" id="qualification_p" class="form-control" name="qualification_p"
                                        placeholder="Enter Qualification"
                                        value="{{ $teacherProfessionalQualification->qualification }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="mode_p">Mode</label>
                                    <input type="text" id="mode_p" class="form-control" name="mode_p"
                                        placeholder="Enter Mode"
                                        value="{{ $teacherProfessionalQualification->mode }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="status_p">Status</label>
                                    <input type="text" id="status_p" class="form-control" name="status_p"
                                        placeholder="Enter Status"
                                        value="{{ $teacherProfessionalQualification->status }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied_p">Subject Studied</label>
                                    <input type="text" id="subjects_studied_p" class="form-control"
                                        name="subjects_studied_p" placeholder="Enter Subject Studied"
                                        value="{{ $teacherProfessionalQualification->subjects_studied }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university_p">Board /
                                        University</label>
                                    <input type="text" id="board_university_p" class="form-control"
                                        name="board_university_p" placeholder="Enter Board / University"
                                        value="{{ $teacherProfessionalQualification->board_university }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college_p">School / College</label>
                                    <input type="text" id="school_college_p" class="form-control"
                                        name="school_college_p" placeholder="Enter School / College"
                                        value="{{ $teacherProfessionalQualification->school_college }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year_p">Passing Year</label>
                                    <input type="text" id="passing_year_p" class="form-control" name="passing_year_p"
                                        placeholder="Enter Passing Year"
                                        value="{{ $teacherProfessionalQualification->passing_year }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="roll_no_p">Roll No</label>
                                    <input type="text" id="roll_no_p" class="form-control" name="roll_no_p"
                                        placeholder="Enter Roll No"
                                        value="{{ $teacherProfessionalQualification->roll_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="marks_obtained_p">Marks Obtained</label>
                                    <input type="text" id="marks_obtained_p" class="form-control"
                                        name="marks_obtained_p" placeholder="Enter Marks Obtained"
                                        value="{{ $teacherProfessionalQualification->marks_obtained }}" />
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Teacher Documents</h4>
                    </div>

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-4 text-center">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <img class="square" src="{{ $teacher->teacher_image_url }}" alt="Teacher Photo"
                                            height="120" width="120" id="imageTeacherPhoto">
                                    </div>
                                    <span>Teacher Photo</span>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <img class="square" src="{{ $teacher->teacher_signature_url }}"
                                            alt="Teacher Signature" height="80" width="200" id="imageTeacherSignature">
                                    </div>
                                    <span>Teacher Signature</span>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <img class="square" src="{{ $teacher->teacher_pan_url }}" alt="PAN"
                                            height="120" width="200" id="imagePANCard">
                                    </div>
                                    <span>Teacher PAN</span>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="mb-2">
                                    <div class="mb-1">
                                        <img class="square" src="{{ $teacher->teacher_aadhaar_url }}" alt="Aadhaar"
                                            height="150" width="150" id="imageAadhaarCard">
                                    </div>
                                    <span>Teacher Aadhaar</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div >
                                <a href="{{ url('insertTeacher') }}" class="btn btn-secondary pull-right mr-3">Back</a>
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Final Submit</button>
                            </div>
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