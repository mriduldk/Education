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
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->

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
                                    <label class="form-label" for="employeement_type">Employeement Type</label>
                                    <select class="form-control" name="employeement_type" id="employeement_type">
                                        <option value="">Select Option</option>
                                        <option value="REGULAR" @php if($teacherServiceDetails->employeement_type == "REGULAR" ) { @endphp selected="selected" @php }  @endphp >REGULAR</option>
                                        <optgroup label="CONTRACTUAL">
                                            <option value="CONTRACTUAL( SSA Contractual )" @php if($teacherServiceDetails->employeement_type == 'CONTRACTUAL( SSA Contractual )' ) { @endphp selected="selected" @php }  @endphp>SSA Contractual</option>
                                            <option value="CONTRACTUAL( Contractual Under Council )" @php if($teacherServiceDetails->employeement_type == 'CONTRACTUAL( Contractual Under Council )' ) { @endphp selected="selected" @php }  @endphp>Contractual Under Council</option>
                                        </optgroup>
                                        <option value="FIX PAY" @php if($teacherServiceDetails->employeement_type == 'FIX PAY' ) { @endphp selected="selected" @php }  @endphp>FIX PAY</option>
                                        <option value="TUTOR" @php if($teacherServiceDetails->employeement_type == 'TUTOR' ) { @endphp selected="selected" @php }  @endphp>TUTOR</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">PRAN No (If Regular)</label>
                                    <input type="text" id="pran_no" class="form-control" name="pran_no"
                                        placeholder="Enter PRAN No" value="{{ $teacherServiceDetails->pran_no }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="uan_no">UAN No (If Contractual)</label>
                                    <input type="text" id="uan_no" class="form-control" name="uan_no"
                                        placeholder="Enter UAN No" value="{{ $teacherServiceDetails->uan_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="ssa_contactual_appointment_order_no">SSA CONTRACTUAL Appointment
                                        Order no (If Contractual)</label>
                                    <input type="text" id="ssa_contactual_appointment_order_no" class="form-control" name="ssa_contactual_appointment_order_no"
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
                                    <!-- <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Employee Code" /> -->
                                    <select class="form-control" name="medium_of_school" id="medium_of_school">
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
                                        placeholder="Enter Subjects" value="{{ $teacherServiceDetails->subjects }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">Category of Post</label>
                                    <input type="text" id="pran_no" class="form-control"
                                        name="category_of_post" placeholder="Enter category of Post"
                                        value="{{ $teacherServiceDetails->category_of_post }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="retention_no">Retention No</label>
                                    <input type="text" id="retention_no" class="form-control" name="retention_no"
                                        placeholder="Enter Retention No"
                                        value="{{ $teacherServiceDetails->retention_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="service_confirmed">Service Conformation</label>
                                    <input type="text" id="service_confirmed" class="form-control" name="service_confirmed"
                                        placeholder="Enter Service Conformation"
                                        value="{{ $teacherServiceDetails->service_confirmed }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">Pay Scale</label>
                                    <input type="text" id="pran_no" class="form-control" name="pay_scale"
                                        placeholder="Enter Pay Scale" value="{{ $teacherServiceDetails->pay_scale }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">Grade Pay</label>
                                    <input type="text" id="pran_no" class="form-control" name="grade_pay"
                                        placeholder="Enter Grade Pay" value="{{ $teacherServiceDetails->grade_pay }}" />
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
                                    <input type="text" id="pran_no" class="form-control"
                                        name="appointment_date" placeholder="Enter Appointment Date"
                                        value="{{ $teacherServiceDetails->appointment_date }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">Post Creation No</label>
                                    <input type="text" id="pran_no" class="form-control"
                                        name="post_creation_no" placeholder="Enter Post Creation No"
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
                                        name="date_of_effect_of_service_provincialisation" placeholder="Enter Date"
                                        value="{{ $teacherServiceDetails->date_of_effect_of_service_provincialisation }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pran_no">Date of joining in
                                        Service</label>
                                    <input type="text" id="pran_no" class="form-control"
                                        name="date_of_joining_in_service" placeholder="Enter Date of joining in Service"
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
            employeement_type: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            employeement_type: {
                required: "Please select Employeement Type",
                maxlength: "Employeement Type should be 100 characters long."
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