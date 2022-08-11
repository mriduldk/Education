@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Employeement Details')

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
            <form class="form form-vertical" id="formEmployeement">
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
                                        value="{{ $teacherServiceDetails->post_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Medium School</label>
                                    <!-- <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Employee Code" /> -->
                                    <select class="form-control" name="medium_of_school" id="medium_of_school">
                                        <option value="">Select Option</option>

                                        <option value="Assamese" @php if($teacherServiceDetails->medium_of_school == "Assamese" ) { @endphp selected="selected" @php }  @endphp >Assamese</option>
                                        <option value="Bodo" @php if($teacherServiceDetails->medium_of_school == 'Bodo' ) { @endphp selected="selected" @php }  @endphp>Bodo</option>
                                        <option value="Bengali" @php if($teacherServiceDetails->medium_of_school == 'Bengali' ) { @endphp selected="selected" @php }  @endphp>Bengali</option>
                                        <option value="Hindi" @php if($teacherServiceDetails->medium_of_school == 'Hindi' ) { @endphp selected="selected" @php }  @endphp>Hindi</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Subjects</label>
                                    <input type="text" id="password-vertical" class="form-control" name="subjects"
                                        placeholder="Enter Subjects" value="{{ $teacherServiceDetails->subjects }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Category of Post</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="category_of_post" placeholder="Enter category of Post"
                                        value="{{ $teacherServiceDetails->category_of_post }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Pay Scale</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="pay_scale"
                                        placeholder="Enter Pay Scale" value="{{ $teacherServiceDetails->pay_scale }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Grade Pay</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="grade_pay"
                                        placeholder="Enter Grade Pay" value="{{ $teacherServiceDetails->grade_pay }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Appointment Letter No.</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="appointment_latter_no" placeholder="Enter Appointment Letter no."
                                        value="{{ $teacherServiceDetails->appointment_latter_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Appointment Date</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="appointment_date" placeholder="Enter Appointment Date"
                                        value="{{ $teacherServiceDetails->appointment_date }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Post Creation No</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="post_creation_no" placeholder="Enter Post Creation No"
                                        value="{{ $teacherServiceDetails->post_creation_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Post Creation Date</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="post_creation_date" placeholder="Enter Post Creation Date"
                                        value="{{ $teacherServiceDetails->post_creation_date }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of effect of Service
                                        Provincialisation (if Provincialised then)</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_effect_of_service_provincialisation" placeholder="Enter Date"
                                        value="{{ $teacherServiceDetails->date_of_effect_of_service_provincialisation }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of joining in
                                        Service</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_joining_in_service" placeholder="Enter Date of joining in Service"
                                        value="{{ $teacherServiceDetails->date_of_joining_in_service }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of joining in Present
                                        post</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="date_of_joining_in_present_post" placeholder="Email"
                                        value="{{ $teacherServiceDetails->date_of_joining_in_present_post }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Date of Retirement</label>
                                    <input type="date" id="first-name-vertical" class="form-control"
                                        name="date_of_retirement"
                                        value="{{ $teacherServiceDetails->date_of_retirement }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Period spent on Non-Teaching
                                        assignment</label>
                                    <input type="date" id="first-name-vertical" class="form-control"
                                        name="period_spent_on_non_teaching_assignment"
                                        value="{{ $teacherServiceDetails->period_spent_on_non_teaching_assignment }}" />
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
            debugger;

            var form = $('#formEmployeement')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formEmployeement').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('update-employeement-details')}}",
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