@extends('layouts/contentLayoutMaster')

@section('title', 'Leave Application')

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
        <div class="col-md-12 col-12 pl-5">
            <form class="form form-vertical" id="leaveForm">
                <div class="card">
                    <div class="p-4">
                        <div class="card-header">
                            <h4 class="card-title">Leave Application</h4>
                            <button id="select-files" class="btn btn-gradient-primary"><i
                                    data-feather='arrow-up-circle'></i> OR-Upload Application</button>
                        </div>
                        <div class="card-body">

                            <ul class="list-unstyled">
                                <h4>From,</h4>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Dipankar Rabha</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Employment ID:</span>
                                    <span>18260318302</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">School Name:</span>
                                    <span>Lower Primary School (LPS)</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">UDICE Code:</span>
                                    <span>18260318302</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Mobile:</span>
                                    <span>8822538701 </span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email:</span>
                                    <span>dhanshribasumataryonline@gmail.com </span>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-vertical">Date</label>
                                        <input type="date" id="first-name-vertical" class="form-control" name="date"
                                            id="date" />
                                    </div>
                                </div>

                                <ul class="list-unstyled mt-4">
                                    <h4>To,</h4>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Dipankar Rabha</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Employment ID:</span>
                                        <span>18260318302</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Head Master</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">UDICE Code:</span>
                                        <span>18260318302</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Mobile:</span>
                                        <span>8822538701 </span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Email:</span>
                                        <span>dhanshribasumataryonline@gmail.com </span>
                                    </li>
                                </ul>

                                <div class="col-12 mt-3">
                                    <div class="mb-1">
                                        <h4>Subject: </h4>
                                        <input type="text" id="subject" class="form-control" name="subject"
                                            placeholder="Application for" />
                                    </div>
                                </div>
                                <!-- Basic Textarea start -->

                                <div class="card-header">
                                    <h4 class="card-title">Respected Sir/Madam,</h4>
                                </div>
                                <div class="mb-1">
                                    <textarea class="form-control" id="message" name="message" rows="3"
                                        placeholder="Write your Application" style="height: 20rem"></textarea>
                                </div>

                                <!-- Basic Textarea end -->

                                <ul class="list-unstyled card-body mt-5">
                                    <li class="mb-4">
                                        <h4>Thanking You,</h4>
                                    </li>

                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Your sincerely</span>
                                    </li>
                                    <li class="mb-10">
                                        <h5>Dipankar Rabha</h3>
                                    </li>
                                    <li class="mb-75">
                                        <h6">Assistant Teacher</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <div class="card-footer">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1" id="btnSubmitLeave">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</section>



<script>
var isRtl = $('html').attr('data-textdirection') === 'rtl';

if ($("#leaveForm").length > 0) {
    $("#leaveForm").validate({
        rules: {
            date: {
                required: true,
                maxlength: 50
            },
            message: {
                required: true,
                maxlength: 500
            },
            subject: {
                required: true,
                maxlength: 200
            }
        },
        messages: {
            date: {
                required: "Please select your leave date",
                maxlength: "Invalid date formate."
            },
            message: {
                required: "Please enter your leave message",
                maxlength: "Leave message should less than or equal to 300 characters",
            },
            subject: {
                required: "Please enter subject",
                maxlength: "Your subject maxlength should be 200 characters long."
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnSubmitLeave').html('Please Wait...');
            $("#btnSubmitLeave").attr("disabled", true);
            debugger;

            var form = $('#leaveForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#leaveForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('leave-insert')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmitLeave').html('Submit');
                    $("#btnSubmitLeave").attr("disabled", false);

                    toastr['success'](
                        'Leave has been successfully regstered.',
                        'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });

                    window.location.replace("{{url('teacherDashboard')}}");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#btnSubmitLeave').html('Submit');
                    $("#btnSubmitLeave").attr("disabled", false);

                    toastr['error'](
                        'Failed to register your leave application. Please try again.',
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