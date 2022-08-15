@extends('layouts/contentLayoutMaster')

@section('title', 'Add Qualification')

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
            <form class="form form-vertical" id="qualificationForm">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Academic Qualifications</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="qualification">Qualification</label>
                                    <!-- <input type="text" id="testtest" class="form-control" name="fname"
                                        placeholder="Enter Qualification" /> -->
                                    <select name="qualification" id="qualification" class="form-control">
                                        <option value="">Select Qualification</option>
                                        <option value="hslc">HSLC</option>
                                        <option value="hs">HS</option>
                                        <option value="graduate">Graduate</option>
                                        <option value="pg">PG</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="stream_displine">Stream/Discipline)</label>
                                    <input type="text" id="stream_displine" class="form-control" name="stream_displine"
                                        placeholder="Enter Stream/Discipline)" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied">Bubjects Studied</label>
                                    <input type="text" id="subjects_studied" class="form-control" name="subjects_studied"
                                        placeholder="Enter Bubjects Studied" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university">Board / University</label>
                                    <input type="text" id="board_university" class="form-control" name="board_university"
                                        placeholder="Enter Board / University" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college">School / College</label>
                                    <input type="text" id="school_college" class="form-control" name="school_college"
                                        placeholder="Enter School / College" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year">Passing Year</label>
                                    <input type="text" id="passing_year" class="form-control" name="passing_year"
                                        placeholder="Enter Passing Year" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="roll_no">Roll No</label>
                                    <input type="text" id="roll_no" class="form-control" name="roll_no"
                                        placeholder="Roll No" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="marks_obtained">Marks Obtained</label>
                                    <input type="text" id="marks_obtained" class="form-control" name="marks_obtained"
                                        placeholder="Marks Obtained" />
                                </div>
                            </div>

                            <div class="card-header">
                                <h4 class="card-title">Professional Qualifications</h4>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="qualification_p">Qualification</label>
                                    <input type="text" id="qualification_p" class="form-control" name="qualification_p"
                                        placeholder="Enter Qualification" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="mode_p">Mode</label>
                                    <input type="text" id="mode_p" class="form-control" name="mode_p"
                                        placeholder="Enter Mode" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="status_p">Status</label>
                                    <input type="text" id="status_p" class="form-control" name="status_p"
                                        placeholder="Enter Status" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="subjects_studied_p">Subject Studied</label>
                                    <input type="text" id="subjects_studied_p" class="form-control" name="subjects_studied_p"
                                        placeholder="Enter Subject Studied" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="board_university_p">Board / University</label>
                                    <input type="text" id="board_university_p" class="form-control" name="board_university_p"
                                        placeholder="Enter Board / University" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_college_p">School / College</label>
                                    <input type="text" id="school_college_p" class="form-control" name="school_college_p"
                                        placeholder="Enter School / College" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="passing_year_p">Passing Year</label>
                                    <input type="text" id="passing_year_p" class="form-control" name="passing_year_p"
                                        placeholder="Enter Passing Year" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="roll_no_p">Roll No</label>
                                    <input type="text" id="roll_no_p" class="form-control" name="roll_no_p"
                                        placeholder="Enter Roll No" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="marks_obtained_p">Marks Obtained</label>
                                    <input type="text" id="marks_obtained_p" class="form-control" name="marks_obtained_p"
                                        placeholder="Enter Marks Obtained" />
                                </div>
                            </div>






                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ url('insertSalaryAccount') }}"
                                    class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
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

if ($("#qualificationForm").length > 0) {
    $("#qualificationForm").validate({
        rules: {
            qualification: {
                required: true,
                maxlength: 100
            },
            stream_displine: {
                required: true,
                maxlength: 100
            },
            subjects_studied: {
                required: true,
                maxlength: 100
            },
            board_university: {
                required: true,
                maxlength: 100
            },
            school_college: {
                required: true,
                maxlength: 100
            },
            passing_year: {
                required: true,
                maxlength: 100
            },
            roll_no: {
                required: true,
                maxlength: 100
            },
            marks_obtained: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            qualification: {
                required: "Please enter Qualificatiom",
                maxlength: "Qualificatiom maxlength should be 100 characters long."
            },
            stream_displine: {
                required: "Please enter Stram",
                maxlength: "Stram should less than or equal to 100 characters",
            },
            subjects_studied: {
                required: "Please enter Subjects",
                maxlength: "Subjects maxlength should be 100 characters long."
            },
            board_university: {
                required: "Please enter Board",
                maxlength: "Board maxlength should be 100 characters long."
            },
            school_college: {
                required: "Please enter School/College",
                maxlength: "School/College maxlength should be 100 characters long."
            },
            passing_year: {
                required: "Please enter Passing Year",
                maxlength: "Passing Year maxlength should be 100 characters long."
            },
            roll_no: {
                required: "Please enter Roll No",
                maxlength: "Roll No maxlength should be 100 characters long."
            },
            marks_obtained: {
                required: "Please enter Marks Obtain",
                maxlength: "Marks Obtain maxlength should be 100 characters long."
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

            var form = $('#qualificationForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#qualificationForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('insert-teacher-qualification')}}",
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
                    $('#btnSubmit').html('Submit');
                    $("#btnSubmit").attr("disabled", false);

                    toastr['error'](
                        response.message,
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