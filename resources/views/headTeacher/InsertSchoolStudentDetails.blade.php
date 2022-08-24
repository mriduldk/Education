@extends('layouts/contentLayoutMaster')

@section('title', 'Insert School Student Details')

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
            <form class="form form-vertical" id="formStudentDetails">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Details</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class">Class Name</label>
                                    <select class="form-control" name="class" id="class">
                                        <option value="">Select Option</option>
                                        <option value="1" >Class 1</option>
                                        <option value="2" >Class 2</option>
                                        <option value="3" >Class 3</option>
                                        <option value="4" >Class 4</option>
                                        <option value="5" >Class 5</option>
                                        <option value="6" >Class 6</option>
                                        <option value="7" >Class 7</option>
                                        <option value="8" >Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10" >Class 10</option>
                                        <option value="11" >Class 11</option>
                                        <option value="12" >Class 12</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_student">Total Student</label>
                                    <input type="number" id="total_student" class="form-control" name="total_student"
                                        placeholder="Total Student" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_male_student">Total Male Student</label>
                                    <input type="number" id="total_male_student" class="form-control"
                                        name="total_male_student" placeholder="Total Male Student" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_female_student">Total Female Student</label>
                                    <input type="number" id="total_female_student" class="form-control"
                                        name="total_female_student"
                                        placeholder="Total Female Student" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="general">General Student</label>
                                    <input type="number" id="general" class="form-control" name="general"
                                        placeholder="General Student" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="obc">OBC/MOBC Student</label>
                                    <input type="number" id="obc" class="form-control" name="obc"
                                        placeholder="OBC/MOBC Student" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="sc">SC Student</label>
                                    <input type="number" id="sc" class="form-control" name="sc"
                                        placeholder="SC Student"  />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="st">ST Student</label>
                                    <input type="number" id="st" class="form-control" name="st"
                                        placeholder="ST Student" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="minority">Minority Student</label>
                                    <input type="number" id="minority" class="form-control" name="minority"
                                        placeholder="Minority Student"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="bpl">BPL Student</label>
                                    <input type="number" id="bpl" class="form-control" name="bpl"
                                        placeholder="BPL Student" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="tea_tribe">Tea Tribe Student</label>
                                    <input type="number" id="tea_tribe" class="form-control" name="tea_tribe"
                                        placeholder="Tea Tribe Student"  />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="others">Others</label>
                                    <input type="number" id="others" class="form-control" name="others"
                                        placeholder="Others"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="students_having_aadhaar_card">Students having Aadhaar
                                        Card</label>
                                    <input type="number" id="students_having_aadhaar_card" class="form-control"
                                        name="students_having_aadhaar_card" placeholder="Students having Aadhaar Card" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="students_having_bank_account">Students having Bank
                                        A/C</label>
                                    <input type="number" id="students_having_bank_account" class="form-control"
                                        name="students_having_bank_account" placeholder="Students having Bank A/C"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pwd_cwsc">PWD/CWSC Students</label>
                                    <input type="number" id="pwd_cwsc" class="form-control"
                                        name="pwd_cwsc" placeholder="PWD/CWSC Students"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="average_age">Average Age of the Student</label>
                                    <input type="number" id="average_age" class="form-control"
                                        name="average_age" placeholder="Average Age of the Student"/>
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

if ($("#formStudentDetails").length > 0) {
    $("#formStudentDetails").validate({
        rules: {
            class: {
                required: true,
                    maxlength: 100
            },
            total_student: {
                required: true,
                maxlength: 100
            },
            total_male_student: {
                required: true,
                maxlength: 100
            },
            total_female_student: {
                required: true,
                maxlength: 100
            },
            general: {
                required: true,
                maxlength: 100
            },
            sc: {
                required: true,
                maxlength: 100
            },
            st: {
                required: true,
                maxlength: 100
            },
            obc: {
                required: true,
                maxlength: 100
            },
            minority: {
                required: true,
                maxlength: 100
            },
            bpl: {
                required: true,
                maxlength: 100
            },
            tea_tribe: {
                required: true,
                maxlength: 100
            },
            others: {
                required: true,
                maxlength: 100
            },
            students_having_aadhaar_card: {
                required: true,
                maxlength: 100
            },
            students_having_bank_account: {
                required: true,
                maxlength: 100
            },
            pwd_cwsc: {
                required: true,
                maxlength: 100
            },
            average_age: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            class: {
                required: "This Field is mendatory",
                    maxlength: "This field should be 100 characters long."
            },
            total_student: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            total_male_student: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            total_female_student: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            general: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            sc: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            st: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            obc: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            minority: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            bpl: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            tea_tribe: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            others: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            students_having_aadhaar_card: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            students_having_bank_account: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            pwd_cwsc: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            average_age: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnSubmit').html('Please Wait...');
            $("#btnSubmit").attr("disabled", true);

            var form = $('#formStudentDetails')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{url('insert-school-student-details')}}",
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

                        window.location.replace("{{ url('headTeacherDashboard') }}");

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