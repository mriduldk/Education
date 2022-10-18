@extends('layouts/contentLayoutMasterWithoutSideBar')

@section('title', 'Add Employeement Details')

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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-1">Timeline</h4>
                    <span class="timeline-event-time">Complete your profile details to access Teacher Dashboard</span>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <li class="timeline-item">
                            @php
                            if($teacher->is_submited == 0){
                            @endphp
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            @php
                            }
                            else if($teacher->is_submited == 1){
                            @endphp
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            @php
                            }
                            @endphp
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <a href="{{ url('insertTeacher') }}">
                                        <h6>Personal Information</h6>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            @php
                            if($teacherServiceDetails->is_submited == 0){
                            @endphp
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            @php
                            }
                            else if($teacherServiceDetails->is_submited == 1){
                            @endphp
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            @php
                            }
                            @endphp
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <a href="{{ url('insertEmployeementDetails') }}">
                                        <h6>Employeement Details</h6>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            @php
                            if($teacherSalaryAccountDetails->is_submited == 0){
                            @endphp
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            @php
                            }
                            else if($teacherSalaryAccountDetails->is_submited == 1){
                            @endphp
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            @php
                            }
                            @endphp
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <a href="{{ url('insertSalaryAccount') }}">
                                        <h6>Salary Account Details</h6>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            @php
                            if($teacherAcademicQualification->is_submited == 0){
                            @endphp
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            @php
                            }
                            else if($teacherAcademicQualification->is_submited == 1){
                            @endphp
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            @php
                            }
                            @endphp
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <a href="{{ url('insertTeacherQualification') }}">
                                        <h6>Qualification Details</h6>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            @php
                            if($teacher->teacher_image_url == null){
                            @endphp
                            <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                            @php
                            }
                            else {
                            @endphp
                            <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                            @php
                            }
                            @endphp
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between align-items-center mb-50">
                                    <a href="{{ url('insertTeacherDocuments') }}">
                                        <h6>Documents</h6>
                                    </a>
                                    <!-- <div>
                                        <span class="badge rounded-pill badge-light-primary">Design</span>
                                    </div> -->
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-12 col-12">
                    <form class="form form-vertical" id="formEmployeement">
                        <!-- action="{{ url('insert-employeement-details') }}" method="GET" > -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Service Details</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">


                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="employeement_type">Employeement Type</label>
                                            <select class="form-control" name="employeement_type"
                                                id="employeement_type">
                                                <option value="">Select Option</option>
                                                <option value="REGULAR" @php if($teacherServiceDetails->
                                                    employeement_type ==
                                                    "REGULAR" ) { @endphp selected="selected" @php } @endphp >REGULAR
                                                </option>
                                                <optgroup label="CONTRACTUAL">
                                                    <option value="CONTRACTUAL( SSA Contractual )" @php
                                                        if($teacherServiceDetails->employeement_type == 'CONTRACTUAL(
                                                        SSA
                                                        Contractual )' ) { @endphp selected="selected" @php }
                                                        @endphp>SSA
                                                        Contractual</option>
                                                    <option value="CONTRACTUAL( Contractual Under Council )" @php
                                                        if($teacherServiceDetails->employeement_type == 'CONTRACTUAL(
                                                        Contractual Under Council )' ) { @endphp selected="selected"
                                                        @php }
                                                        @endphp>Contractual Under Council</option>
                                                </optgroup>
                                                <option value="FIX PAY" @php if($teacherServiceDetails->
                                                    employeement_type ==
                                                    'FIX PAY' ) { @endphp selected="selected" @php } @endphp>FIX PAY
                                                </option>
                                                <option value="TUTOR" @php if($teacherServiceDetails->employeement_type
                                                    ==
                                                    'TUTOR' ) { @endphp selected="selected" @php } @endphp>TUTOR
                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">PRAN No (If Regular)</label>
                                            <input type="text" id="pran_no" class="form-control" name="pran_no"
                                                placeholder="Enter PRAN No"
                                                value="{{ $teacherServiceDetails->pran_no }}" />
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="uan_no">UAN No (If Contractual)</label>
                                            <input type="text" id="uan_no" class="form-control" name="uan_no"
                                                placeholder="Enter UAN No"
                                                value="{{ $teacherServiceDetails->uan_no }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="ssa_contactual_appointment_order_no">SSA
                                                CONTRACTUAL
                                                Appointment
                                                Order no (If Contractual)</label>
                                            <input type="text" id="ssa_contactual_appointment_order_no"
                                                class="form-control" name="ssa_contactual_appointment_order_no"
                                                placeholder="Enter SSA CONTRACTUAL Appointment Order no"
                                                value="{{ $teacherServiceDetails->ssa_contactual_appointment_order_no }}" />
                                        </div>
                                    </div>





                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Name of the Post Held</label>
                                            <input type="text" id="pran_no" class="form-control" name="post_name"
                                                placeholder="Enter name of the post held"
                                                value="{{ $teacherServiceDetails->post_name }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="email-id-vertical">Teacher Medium</label>

                                            <select class="form-control" name="medium_of_school" id="medium_of_school">
                                                <option value="">Select Option</option>

                                                <option value="Assamese" @php if($teacherServiceDetails->
                                                    medium_of_school ==
                                                    "Assamese" ) { @endphp selected="selected" @php } @endphp >Assamese
                                                </option>
                                                <option value="Bodo" @php if($teacherServiceDetails->medium_of_school ==
                                                    'Bodo'
                                                    ) { @endphp selected="selected" @php } @endphp>Bodo</option>
                                                <option value="Bengali" @php if($teacherServiceDetails->medium_of_school
                                                    ==
                                                    'Bengali' ) { @endphp selected="selected" @php } @endphp>Bengali
                                                </option>
                                                <option value="Hindi" @php if($teacherServiceDetails->medium_of_school
                                                    ==
                                                    'Hindi' ) { @endphp selected="selected" @php } @endphp>Hindi
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="password-vertical">Subjects</label>
                                            <input type="text" id="password-vertical" class="form-control"
                                                name="subjects" placeholder="Enter Subjects"
                                                value="{{ $teacherServiceDetails->subjects }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Category of Post</label>
                                            <input type="text" id="pran_no" class="form-control" name="category_of_post"
                                                placeholder="Enter category of Post"
                                                value="{{ $teacherServiceDetails->category_of_post }}" />
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="retention_no">Retention No</label>
                                            <input type="text" id="retention_no" class="form-control"
                                                name="retention_no" placeholder="Enter Retention No"
                                                value="{{ $teacherServiceDetails->retention_no }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="service_confirmed">Service
                                                Conformation</label>
                                            <input type="text" id="service_confirmed" class="form-control"
                                                name="service_confirmed" placeholder="Enter Service Conformation"
                                                value="{{ $teacherServiceDetails->service_confirmed }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Pay Scale</label>
                                            <input type="text" id="pran_no" class="form-control" name="pay_scale"
                                                placeholder="Enter Pay Scale"
                                                value="{{ $teacherServiceDetails->pay_scale }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Grade Pay</label>
                                            <input type="text" id="pran_no" class="form-control" name="grade_pay"
                                                placeholder="Enter Grade Pay"
                                                value="{{ $teacherServiceDetails->grade_pay }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Appointment Letter No.</label>
                                            <input type="text" id="pran_no" class="form-control"
                                                name="appointment_latter_no" placeholder="Enter Appointment Letter no."
                                                value="{{ $teacherServiceDetails->appointment_latter_no }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Appointment Date</label>
                                            <input type="text" id="pran_no" class="form-control" name="appointment_date"
                                                placeholder="Enter Appointment Date"
                                                value="{{ $teacherServiceDetails->appointment_date }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Post Creation No</label>
                                            <input type="text" id="pran_no" class="form-control" name="post_creation_no"
                                                placeholder="Enter Post Creation No"
                                                value="{{ $teacherServiceDetails->post_creation_no }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Post Creation Date</label>
                                            <input type="text" id="pran_no" class="form-control"
                                                name="post_creation_date" placeholder="Enter Post Creation Date"
                                                value="{{ $teacherServiceDetails->post_creation_date }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Date of effect of Service
                                                Provincialisation (if Provincialised then)</label>
                                            <input type="text" id="pran_no" class="form-control"
                                                name="date_of_effect_of_service_provincialisation"
                                                placeholder="Enter Date"
                                                value="{{ $teacherServiceDetails->date_of_effect_of_service_provincialisation }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Date of joining in
                                                Service</label>
                                            <input type="text" id="pran_no" class="form-control"
                                                name="date_of_joining_in_service"
                                                placeholder="Enter Date of joining in Service"
                                                value="{{ $teacherServiceDetails->date_of_joining_in_service }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Date of joining in Present
                                                post</label>
                                            <input type="text" id="pran_no" class="form-control"
                                                name="date_of_joining_in_present_post" placeholder="Email"
                                                value="{{ $teacherServiceDetails->date_of_joining_in_present_post }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Date of Retirement</label>
                                            <input type="date" id="pran_no" class="form-control"
                                                name="date_of_retirement"
                                                value="{{ $teacherServiceDetails->date_of_retirement }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="pran_no">Period spent on Non-Teaching
                                                assignment</label>
                                            <input type="date" id="pran_no" class="form-control"
                                                name="period_spent_on_non_teaching_assignment"
                                                value="{{ $teacherServiceDetails->period_spent_on_non_teaching_assignment }}" />
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary" id="btnSubmit">Next</button>
                    </div> -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <a href="{{ url('insertTeacher') }}"
                                            class="btn btn-danger pull-right">Previous</a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary" id="btnSubmit">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    </div>

</section>

<script>
var isRtl = $('html').attr('data-textdirection') === 'rtl';

if ($("#formEmployeement").length > 0) {
    $("#formEmployeement").validate({
        rules: {
            post_name: {
                required: true,
                maxlength: 100
            },
            medium_of_school: {
                required: true,
                maxlength: 100
            },
            subjects: {
                required: true,
                maxlength: 100
            },
            category_of_post: {
                required: true,
                maxlength: 100
            },
            pay_scale: {
                required: true,
                maxlength: 100
            },
            grade_pay: {
                required: true,
                maxlength: 100
            },
            appointment_latter_no: {
                required: true,
                maxlength: 100
            },
            appointment_date: {
                required: true,
                maxlength: 100
            },
            post_creation_no: {
                required: true,
                maxlength: 100
            },
            post_creation_date: {
                required: true,
                maxlength: 100
            },
            date_of_effect_of_service_provincialisation: {
                required: true,
                maxlength: 100
            },
            date_of_joining_in_service: {
                required: true,
                maxlength: 100
            },
            date_of_joining_in_present_post: {
                required: true,
                maxlength: 100
            },
            date_of_retirement: {
                required: true,
                maxlength: 100
            },
            period_spent_on_non_teaching_assignment: {
                required: true,
                maxlength: 300
            }
        },
        messages: {
            post_name: {
                required: "Please enter Post Name",
                maxlength: "Post Name maxlength should be 100 characters long."
            },
            medium_of_school: {
                required: "Please select Medium",
                maxlength: "Medium should less than or equal to 100 characters",
            },
            subjects: {
                required: "Please select Subjects",
                maxlength: "Subjects maxlength should be 100 characters long."
            },
            category_of_post: {
                required: "Please enter Category of Post",
                maxlength: "Category of Post maxlength should be 100 characters long."
            },
            pay_scale: {
                required: "Please enter Pay scale",
                maxlength: "Pay scale maxlength should be 100 characters long."
            },
            grade_pay: {
                required: "Please enter Grade Pay",
                maxlength: "Grade Pay maxlength should be 100 characters long."
            },
            appointment_latter_no: {
                required: "Please enter Appointment Latter No",
                maxlength: "Appointment Latter No maxlength should be 100 characters long."
            },
            appointment_date: {
                required: "Please enter Appointment Date",
                maxlength: "Appointment Date maxlength should be 100 characters long."
            },
            post_creation_no: {
                required: "Please enter Post Creatation",
                maxlength: "Post Creatation maxlength should be 100 characters long."
            },
            post_creation_date: {
                required: "Please enter Post Createtion Date",
                maxlength: "Post Createtion Date maxlength should be 100 characters long."
            },
            date_of_effect_of_service_provincialisation: {
                required: "Please enter Service Provincialisation",
                maxlength: "Service Provincialisation maxlength should be 100 characters long."
            },
            date_of_joining_in_service: {
                required: "Please enter Date of Joining",
                maxlength: "Date of Joining maxlength should be 100 characters long."
            },
            date_of_joining_in_present_post: {
                required: "Please enter date of joining in present post",
                maxlength: "Date of Joining maxlength should be 100 characters long."
            },
            date_of_retirement: {
                required: "Please enter Retirement Date",
                maxlength: "Retirement Date maxlength should be 100 characters long."
            },
            period_spent_on_non_teaching_assignment: {
                required: "Please enter Non Teaching Assignment",
                maxlength: "Please enter Non Teaching Assignment maxlength should be 300 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnSubmit').html('Please Wait...');
            $("#btnSubmit").attr("disabled", true);

            var form = $('#formEmployeement')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEmployeement').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('insert-employeement-details')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmit').html('Next');
                    $("#btnSubmit").attr("disabled", false);

                    if (response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        window.location.replace("{{ url('insertSalaryAccount') }}");

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
                    $('#btnSubmit').html('Next');
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