@extends('layouts/contentLayoutMaster')

@section('title', 'Teacher Dashboard')

@section('vendor-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<!-- JQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
    <div class="row">

        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-2" src="{{asset('images/avatars/user.png')}}" height="100"
                                width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4>@php echo $teacher->teacher_first_name . " " . $teacher->teacher_last_name; @endphp
                                </h4>
                                <span class="badge bg-light-secondary">@php echo $teacher->teacher_category_type; @endphp</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">

                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">School Name:</span>
                                <span>@php echo $teacher->school->school_name; @endphp</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">UDICE Code:</span>
                                <span>@php echo $teacher->school->udice_code; @endphp</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Mobile:</span>
                                <span>@php echo $teacher->teacher_mobile; @endphp </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Email:</span>
                                <span>@php echo $teacher->teacher_email; @endphp </span>
                            </li>
                        </ul>

                        <div class="d-flex justify-content-center pt-2">
                            <a href="{{ url('editTeacher') }}" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                <i data-feather='settings'></i> Edit
                            </a>
                            <!-- <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect"><i
                                    data-feather='log-out'></i> Logout</a> -->
                        </div>
                    </div>




                </div>
            </div>
            <!-- /User Card -->
            <!-- Plan Card -->
            <div class="card border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="badge bg-light-primary">Technical</span>
                    </div>
                    <ul class="ps-1 mb-2 mt-2">
                        <li class="mb-50">For any technical issues:</li>
                        <li>Email: support@education.bodoland.gov.in</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
                        <span>Contact</span>
                        <span>+91-9101672624</span>
                    </div>
                    <div class="progress mb-50" style="height: 8px">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="65"
                            aria-valuemax="100" aria-valuemin="80"></div>
                    </div>
                    <div class="d-grid w-100 mt-2">
                        <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                            <i data-feather='phone-call'></i> Contact us
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Plan Card -->
        </div>


        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills mb-2">
                <li class="nav-item">
                    <a class="nav-link active" id="btnSchoolProfile">
                        <span class="fw-bold"> <i data-feather='box'></i> School Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnPersonalDetails">
                        <span class="fw-bold"> <i data-feather='box'></i> Personal Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnFacilities">
                        <span class="fw-bold"><i data-feather='briefcase'></i> Employeement Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnSalaryAccount">
                        <span class="fw-bold"><i data-feather='percent'></i> Salary Account Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnQualification">
                        <span class="fw-bold"><i data-feather='file-text'></i> Qualification</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="btnLeaveStatus">
                        <span class="fw-bold"><i data-feather='list'></i> Leave Status</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" id="btnTransferDetails">
                        <span class="fw-bold"><i data-feather='info'></i> Transfer Details</span>
                    </a>
                </li> -->


            </ul>
            <!--/ User Pills -->

            <div id="divSchoolProfile">

                <div class="card">
                    <h4 class="card-header">School Address</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-black">
                                <tr>
                                    <th>Village </th>
                                    <td>@php echo $teacher->school->village; @endphp</td>
                                    <th>Cluster</th>
                                    <td>@php echo $teacher->school->cluster; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Block </th>
                                    <td>@php echo $teacher->school->block; @endphp</td>
                                    <th>District </th>
                                    <td>@php echo $teacher->school->district; @endphp</td>
                                </tr>
                                <tr>
                                    <th>State </th>
                                    <td>@php echo $teacher->school->state; @endphp</td>
                                    <th>PinCode </th>
                                    <td>@php echo $teacher->school->pin; @endphp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <h4 class="card-header">School Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-black">
                                <tr>
                                    <th>School Name </th>
                                    <td>@php echo $teacher->school->school_name; @endphp</td>
                                    <th>UDISE CODE</th>
                                    <td>@php echo $teacher->school->udice_code; @endphp</td>
                                </tr>
                                <tr>
                                    <th>School Category </th>
                                    <td>@php echo $teacher->school->school_category; @endphp</td>
                                    <th>School Type</th>
                                    <td>@php echo $teacher->school->school_type; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Class From </th>
                                    <td>@php echo $teacher->school->class_from; @endphp</td>
                                    <th>Class To </th>
                                    <td>@php echo $teacher->school->class_to; @endphp</td>
                                </tr>
                                <tr>
                                    <th>State Management </th>
                                    <td>@php echo $teacher->school->state_management; @endphp</td>
                                    <th>National Management </th>
                                    <td>@php echo $teacher->school->national_management; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Status </th>
                                    <td>@php echo $teacher->school->status; @endphp</td>
                                    <th>Location </th>
                                    <td>@php echo $teacher->school->location; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Aff Board Sec </th>
                                    <td>@php echo $teacher->school->aff_board_sec; @endphp</td>
                                    <th>Aff Board H.Sec </th>
                                    <td>@php echo $teacher->school->add_board_h_sec; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Year of Establishment </th>
                                    <td>@php echo $teacher->school->year_of_establishment; @endphp</td>
                                    <th>Pre-Primary </th>
                                    <td>@php echo $teacher->school->pre_primary; @endphp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divPersonalDetails">
                <div class="card">
                    <div class="card-header">
                        <h4>Persolan Details</h4>
                        <a href="{{ url('editTeacher') }}" class="btn btn-gradient-success"><i data-feather='settings'></i> Edit</a>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>@php echo $teacher->teacher_first_name .' ' . $teacher->teacher_last_name; @endphp</td>
                                    <th>Employee Code</th>
                                    <td>@php echo $teacher->teacher_employee_code; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Designation</th>
                                    <td>@php echo $teacher->teacher_category_type; @endphp</td>
                                    <th>Gender</th>
                                    <td>@php echo $teacher->teacher_gender; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Caste</th>
                                    <td>@php echo $teacher->teacher_caste; @endphp</td>
                                    <th>Date Of Birth</th>
                                    <td>@php echo $teacher->teacher_dob; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Religion </th>
                                    <td>@php echo $teacher->teacher_religion; @endphp</td>
                                    <th>Nationality</th>
                                    <td>@php echo $teacher->teacher_nationality; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Present Address</th>
                                    <td colspan="3">@php echo $teacher->teacher_present_address; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Permanent Address</th>
                                    <td colspan="3">@php echo $teacher->teacher_parmanent_address; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Aadhar No</th>
                                    <td>@php echo $teacher->teacher_aadhaar_no; @endphp</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>@php echo $teacher->teacher_email; @endphp</td>
                                    <th>Mobile</th>
                                    <td>@php echo $teacher->teacher_mobile; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Mother Name</th>
                                    <td>@php echo $teacher->teacher_mother_name; @endphp</td>
                                    <th>Father Name</th>
                                    <td>@php echo $teacher->teacher_father_name; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Identification Mark</th>
                                    <td>@php echo $teacher->teacher_identification_mark; @endphp</td>
                                    <th>Blood Group</th>
                                    <td>@php echo $teacher->teacher_blood_group; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Differently Abled</th>
                                    <td>@php echo $teacher->teacher_differntly_abled; @endphp</td>
                                    <th>Maritial Status</th>
                                    <td>@php echo $teacher->teacher_maritial_status; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Spouse Name</th>
                                    <td>@php echo $teacher->teacher_spouse_name; @endphp</td>
                                    <th>Is Spouse working under Govt Service</th>
                                    <td>@php
                                        if($teacher->teacher_spouse_working_under_govt_serveice == 1) {
                                            echo 'Yes';
                                        } else {
                                            echo 'No';
                                        }
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <th>Language</th>
                                    <td>@php echo $teacher->teacher_language; @endphp</td>
                                    <th>TET Category</th>
                                    <td>@php echo $teacher->teacher_tet_category; @endphp</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divFacilities">
                <div class="card">
                    <div class="card-header">
                        <h4>Employeement Details</h4>
                        <a href="{{ url('editEmployeementDetails') }}" class="btn btn-gradient-success"><i data-feather='settings'></i> Edit</a>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name of the Post Held </th>
                                    <td>@php echo $teacher->teacherServiceDetails->post_name; @endphp</td>
                                    <th>Medium of School</th>
                                    <td>@php echo $teacher->teacherServiceDetails->medium_of_school; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Subjects </th>
                                    <td>@php echo $teacher->teacherServiceDetails->subjects; @endphp</td>
                                    <th>Category of Post</th>
                                    <td>@php echo $teacher->teacherServiceDetails->category_of_post; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Pay Scale</th>
                                    <td>@php echo $teacher->teacherServiceDetails->pay_scale; @endphp</td>
                                    <th>Grade Pay </th>
                                    <td>@php echo $teacher->teacherServiceDetails->grade_pay; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Appointment Letter No. </th>
                                    <td>@php echo $teacher->teacherServiceDetails->appointment_latter_no; @endphp</td>
                                    <th>Appointment Date </th>
                                    <td>@php echo $teacher->teacherServiceDetails->appointment_date; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Post Creation No.</th>
                                    <td>@php echo $teacher->teacherServiceDetails->post_creation_no; @endphp</td>
                                    <th>Post Creation Date </th>
                                    <td>@php echo $teacher->teacherServiceDetails->post_creation_date; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Date of effect of Service Provincialisation (If Provincialised then) </th>
                                    <td>@php echo $teacher->teacherServiceDetails->date_of_effect_of_service_provincialisation; @endphp</td>
                                    <th>Date of joining in Service </th>
                                    <td>@php echo $teacher->teacherServiceDetails->date_of_joining_in_service; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Date of joining in Present post</th>
                                    <td>@php echo $teacher->teacherServiceDetails->date_of_joining_in_present_post; @endphp</td>
                                    <th>Period spent on Non-Teaching assignment </th>
                                    <td>@php echo $teacher->teacherServiceDetails->period_spent_on_non_teaching_assignment; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Date of Retirement </th>
                                    <td>@php echo $teacher->teacherServiceDetails->date_of_retirement; @endphp</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divSalary">
                <div class="card">
                    <div class="card-header">
                        <h4>Salary Account and Other Official Account Details</h4>
                        <a href="{{ url('editSalaryAccount') }}" class="btn btn-gradient-success"><i data-feather='settings'></i> Edit</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Permanent Account (PAN) No </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->pan_no; @endphp</td>
                                    <th>Account No (Salary Account)</th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->account_no; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Account Name (Salary Account) </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->account_name; @endphp</td>
                                    <th>Bank Name </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->bank_name; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Branch Name (Salary Account) </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->branch_name; @endphp</td>
                                    <th>IFSC </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->ifsc; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Name of the district where your salary account no is active Name of the state
                                        where your salary account no is active </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->district_name_of_active_salary_account_no; @endphp</td>
                                    <th>Salary Payment Mode Gross Provident Fund (GPF) No </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->salary_payment_mode; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Group Insurance Scheme (GIS) No. </th>
                                    <td>@php echo $teacher->teacherSalaryAccountDetails->group_insurance_scheme; @endphp</td>
                                    <th> </th>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divTeacherQualification">
                <div class="card">
                    <div class="card-header">
                        <h4>Teacher Academic Qualification</h4>
                        <a href="{{ url('editTeacherQualification') }}" class="btn btn-gradient-success"><i data-feather='settings'></i> Edit</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Qualification</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->qualification; @endphp</td>
                                    <th>Stream / Discipline</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->stream_displine; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Subjects Studied</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->subjects_studied; @endphp</td>
                                    <th>Board / University</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->board_university; @endphp</td>
                                </tr>
                                <tr>
                                    <th>School / College</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->school_college; @endphp</td>
                                    <th>Passing Year</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->roll_no; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Marks Obtain</th>
                                    <td>@php echo $teacher->teacherAcademicQualification->marks_obtained; @endphp</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Teacher Professional Qualification</h4>
                        <a href="{{ url('editTeacherQualification') }}" class="btn btn-gradient-success"><i data-feather='settings'></i> Edit</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Qualification</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->qualification; @endphp</td>
                                    <th>Mode</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->mode; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->status; @endphp</td>
                                    <th>Subjects Studied</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->subjects_studied; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Board / University</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->board_university; @endphp</td>
                                    <th>School / College</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->school_college; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Passing Year</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->roll_no; @endphp</td>
                                    <th>Marks Obtain</th>
                                    <td>@php echo $teacher->teacherProfessionalQualification->marks_obtained; @endphp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divLeaveStatus">
                <div class="card">
                    <h4 class="card-header">Teacher Leave Status</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>Reason for Leave</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1; @endphp
                                @foreach($teacher->teacherLeaves as $teacherLeave)
                            
                                <tr>
                                    <td>@php echo $index; $index = $index + 1; @endphp</td>
                                    <td>{{ $teacherLeave->leave_date_from }}</td>
                                    <td>{{ $teacherLeave->leave_subject }}</td>
                                    
                                    @if($teacherLeave->status == 'Pending')
                                    <td><span class="badge badge-glow bg-warning">{{ $teacherLeave->status }}</span></td>
                                    @elseif($teacherLeave->status == 'Accepted')
                                    <td><span class="badge badge-glow bg-success">{{ $teacherLeave->status }}</span></td>
                                    @elseif($teacherLeave->status == 'rejected')
                                    <td><span class="badge badge-glow bg-danger">{{ $teacherLeave->status }}</span></td>
                                    @else
                                    <td><span class="badge badge-glow bg-danger">-NA-</span></td>
                                    @endif

                                    @if($teacherLeave->remarks != '' && $teacherLeave->remarks != null)
                                    <td>{{ $teacherLeave->remarks }}</td>
                                    @else
                                    <td>-NA-</td>
                                    @endif

                                    <td><button class="btn btn-parimary"><i data-feather='arrow-down-circle'></i></button></td>
                                </tr>

                                @endforeach
                                <!-- <tr>
                                    <td>2</td>
                                    <td>26-12-2022</td>
                                    <td>Feaver</td>
                                    <td><span class="badge badge-glow bg-danger">Rejected</span></td>
                                    <td><button class="btn btn-parimary"><i
                                                data-feather='arrow-down-circle'></i></button></td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- <div id="divTransferDetails">
                <div class="card">
                    <h4 class="card-header">Transfer Details</h4>
                    <div class="card-body pt-1">
                        <ul class="timeline ms-50">
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Dotma LP School</h6>
                                        <span class="timeline-event-time me-1">9 years ago</span>
                                    </div>
                                    <p>Past School 05-06-2012</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Tangla LP School</h6>
                                        <span class="timeline-event-time me-1">45 min ago</span>
                                    </div>
                                    <p>Present School Jogin Date(12-12-2022)</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

        </div>

    </div>
</section>


<!-- Buynow Button-->
<!-- <div class="buy-now">
    <a href="{{ url('leaveApplication') }}" class="btn btn-danger"><i data-feather='check-square'></i> Apply for Leave</a>
</div> -->







<script>
$("#divSchoolProfile").show();
$("#divPersonalDetails").hide();
$("#divFacilities").hide();
$("#divSalary").hide();
$("#divTeacherQualification").hide();
$("#divLeaveStatus").hide();
$("#divTransferDetails").hide();

$("#btnPersonalDetails").click(function() {

    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divPersonalDetails").show();
    $("#divTeacherQualification").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").hide();
    $("#divSalary").hide();

    $('#btnFacilities').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');

})

$("#btnSchoolProfile").click(function() {

    $("#divFacilities").hide();
    $("#divPersonalDetails").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divSalary").hide();
    $("#divTeacherQualification").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").hide();
    $("#divSchoolProfile").show();

    $('#btnPersonalDetails').removeClass('active');
    $('#btnFacilities').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');
});


$("#btnFacilities").click(function() {

    $("#divSchoolProfile").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divPersonalDetails").hide();
    $("#divTeacherQualification").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").hide();
    $("#divSalary").hide();

    $("#divFacilities").show();

    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnPersonalDetails').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');

});


$("#btnSalaryAccount").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divPersonalDetails").hide();
    $("#divTeacherQualification").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").hide();

    $("#divSalary").show();

    $('#btnFacilities').removeClass('active');
    $('#btnPersonalDetails').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $(this).addClass('active');

});

$("#btnQualification").click(function() {

    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divPersonalDetails").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").hide();
    $("#divSalary").hide();

    $("#divTeacherQualification").show();

    $('#btnFacilities').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnPersonalDetails').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');

});

$("#btnLeaveStatus").click(function() {

    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divPersonalDetails").hide();
    $("#divTeacherQualification").hide();
    $("#divTransferDetails").hide();
    $("#divSalary").hide();

    $("#divLeaveStatus").show();

    $('#btnFacilities').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnPersonalDetails').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnTransferDetails').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');

})

$("#btnTransferDetails").click(function() {

    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divPersonalDetails").hide();
    $("#divTeacherQualification").hide();
    $("#divLeaveStatus").hide();
    $("#divTransferDetails").show();
    $("#divSalary").hide();

    $('#btnFacilities').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnPersonalDetails').removeClass('active');
    $('#btnQualification').removeClass('active');
    $('#btnLeaveStatus').removeClass('active');
    $('#btnSalaryAccount').removeClass('active');

    $(this).addClass('active');

})


</script>


@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
{{-- data table --}}
<script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection



@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection