@extends('layouts/contentLayoutMasterWithoutSideBar')

@section('title', 'Add Teacher Documents')

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


<style>
.error {
    color: red;
}
</style>

@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">

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
                    <form class="form form-vertical" id="formDocument">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Teacher Documents</h4>
                            </div>

                            <div class="card-body">

                                <div class="row align-items-center">

                                    <div class="col-8">
                                        <div class="align-self-center">
                                            <div class="mb-1">
                                                <label for="formFile" class="form-label">Teacher Photo</label>
                                                <input class="form-control" type="file" id="teacherPhoto"
                                                    name="teacherPhoto" accept=".jpg,.jpeg,.png"
                                                    onchange="validateFileTeacherPhoto(event)" />
                                                <div>
                                                    <span class="text-danger">Image size must be less than 250 KB and
                                                        image
                                                        format should be jpg, png or jpeg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <div class="mb-1">
                                            <div>
                                                <img class="square" src="" alt="Teacher Photo" height="120" width="120"
                                                    id="imageTeacherPhoto">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="align-self-center">
                                            <div class="mb-1">
                                                <label for="formFile" class="form-label">Teacher Signature</label>
                                                <input class="form-control" type="file" id="teacherSignature"
                                                    name="teacherSignature" accept=".jpg,.jpeg,.png"
                                                    onchange="validateFileTeacherSignature(event)" />
                                                <div>
                                                    <span class="text-danger">Image size must be less than 250 KB and
                                                        image
                                                        format should be jpg, png or jpeg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="mb-1">
                                            <div>
                                                <img class="square" src="" alt="Teacher Signature" height="80"
                                                    width="200" id="imageTeacherSignature">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-8">
                                        <div class="align-self-center">
                                            <div class="mb-1">
                                                <label for="formFile" class="form-label">Teacher PAN Card</label>
                                                <input class="form-control" type="file" id="panCard" name="panCard"
                                                    accept=".jpg,.jpeg,.png" onchange="validateFilePAN(event)" />
                                                <div>
                                                    <span class="text-danger">Image size must be less than 250 KB and
                                                        image
                                                        format should be jpg, png or jpeg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="mb-1">
                                            <div>
                                                <img class="square" src="" alt="PAN" height="120" width="200"
                                                    id="imagePANCard">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="align-self-center">
                                            <div class="mb-1">
                                                <label for="formFile" class="form-label">Teacher Aadhaar Card
                                                    (Optional)</label>
                                                <input class="form-control" type="file" id="aadhaarCard"
                                                    name="aadhaarCard" accept=".jpg,.jpeg,.png"
                                                    onchange="validateFileAadhaar(event)" />
                                                <div>
                                                    <span class="text-danger">Image size must be less than 250 KB and
                                                        image
                                                        format should be jpg, png or jpeg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="mb-1">
                                            <div>
                                                <img class="square" src="" alt="Aadhaar" height="150" width="150"
                                                    id="imageAadhaarCard">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                           
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <a href="{{ url('insertTeacherQualification') }}"
                                            class="btn btn-danger pull-right">Previous</a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit &
                                            Review</button>
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



<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

<script>
$(function() {
    $('#imageTeacherPhoto').hide();
    $('#imageTeacherSignature').hide();
    $('#imagePANCard').hide();
    $('#imageAadhaarCard').hide();
});

if ($("#formDocument").length > 0) {
    $("#formDocument").validate({
        rules: {
            teacherPhoto: {
                required: true,
                maxlength: 300
            },
            teacherSignature: {
                required: true,
                maxlength: 300
            },
            panCard: {
                required: true,
                maxlength: 300
            }
        },
        messages: {
            teacherPhoto: {
                required: "This field is mendatory",
                maxlength: "Name of document should be less than 300 characters."
            },
            teacherSignature: {
                required: "This field is mendatory",
                maxlength: "Name of document should be less than 300 characters.",
            },
            panCard: {
                required: "This field is mendatory",
                maxlength: "Name of document should be less than 300 characters."
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

            var form = $('#formDocument')[0];
            var data = new FormData(form);

            var data2 = $('#formDocument').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('insert-teacher-documents')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmit').html('Submit & Review');
                    $("#btnSubmit").attr("disabled", false);

                    if (response.status == 200) {

                        toastr['success'](
                            response.message,
                            'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: false
                            });

                        window.location.replace("{{ url('reviewTeacherDetails') }}");

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
                    $('#btnSubmit').html('Submit & Review');
                    $("#btnSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to upload. Please try again.',
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
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection



@section('page-script')
{{-- Page js files --}}

<script>
function validateFileTeacherPhoto(event) {

    var fileName = document.getElementById("teacherPhoto").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    var size = $('#teacherPhoto')[0].files[0].size / 1024;

    if (size > 250) {

        Swal.fire({
            title: 'Error!',
            text: ' Photo size must be smaller than 250 KB.',
            icon: 'error',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });

        $('#teacherPhoto').val('');


    } else {
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {

            $('#imageTeacherPhoto').show();

            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("imageTeacherPhoto");
            imgtag.title = selectedFile.name;
            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);

        } else {

            Swal.fire({
                title: 'Error!',
                text: ' Only jpg/jpeg and png files are allowed!',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

            $('#teacherPhoto').val('');
        }
    }

}

function validateFileTeacherSignature(event) {

    var fileName = document.getElementById("teacherSignature").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    var size = $('#teacherSignature')[0].files[0].size / 1024;

    if (size > 250) {

        Swal.fire({
            title: 'Error!',
            text: ' Photo size must be smaller than 250 KB.',
            icon: 'error',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });

        $('#teacherSignature').val('');


    } else {
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {

            $('#imageTeacherSignature').show();

            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("imageTeacherSignature");
            imgtag.title = selectedFile.name;
            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);

        } else {

            Swal.fire({
                title: 'Error!',
                text: ' Only jpg/jpeg and png files are allowed!',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

            $('#teacherSignature').val('');
        }
    }

}

function validateFilePAN(event) {

    var fileName = document.getElementById("panCard").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    var size = $('#panCard')[0].files[0].size / 1024;

    if (size > 250) {

        Swal.fire({
            title: 'Error!',
            text: ' Photo size must be smaller than 250 KB.',
            icon: 'error',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });

        $('#panCard').val('');


    } else {
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {

            $('#imagePANCard').show();

            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("imagePANCard");
            imgtag.title = selectedFile.name;
            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);

        } else {

            Swal.fire({
                title: 'Error!',
                text: ' Only jpg/jpeg and png files are allowed!',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

            $('#panCard').val('');
        }
    }

}

function validateFileAadhaar(event) {

    var fileName = document.getElementById("aadhaarCard").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    var size = $('#aadhaarCard')[0].files[0].size / 1024;

    if (size > 250) {

        Swal.fire({
            title: 'Error!',
            text: ' Photo size must be smaller than 250 KB.',
            icon: 'error',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });

        $('#aadhaarCard').val('');


    } else {
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {

            $('#imageAadhaarCard').show();

            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("imageAadhaarCard");
            imgtag.title = selectedFile.name;
            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);

        } else {

            Swal.fire({
                title: 'Error!',
                text: ' Only jpg/jpeg and png files are allowed!',
                icon: 'error',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

            $('#aadhaarCard').val('');
        }
    }

}
</script>

@endsection