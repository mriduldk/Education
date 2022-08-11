@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Qualification')

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
            <form class="form form-vertical">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Academic Qualifications</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Qualification</label>
                                    <!-- <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Qualification" /> -->
                                        <select name="" class="form-control">
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
                                    <label class="form-label" for="email-id-vertical">Stream/Discipline)</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Enter Stream/Discipline)" />                                    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Bubjects Studied</label>
                                    <input type="text" id="password-vertical" class="form-control" name="contact"
                                        placeholder="Enter Bubjects Studied" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Board / University</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Board / University" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">School / College</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter School / College" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Passing Year</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Passing Year" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Roll No</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Roll No" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Marks Obtained</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Marks Obtained" />
                                </div>
                            </div>

                        <div class="card-header">
                            <h4 class="card-title">Professional Qualifications</h4>
                        </div>
                        <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Qualification</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Qualification" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Mode</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Mode" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Status</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Status" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Subject Studied</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Subject Studied" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Board / University</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Board / University" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">School / College</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter School / College" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Passing Year</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Passing Year" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Roll No</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Roll No" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Marks Obtained</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Enter Marks Obtained" />
                                </div>
                            </div>
                              
                            



                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="reset" class="btn btn-primary me-1">Submit</button>
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

if ($("#noticeForm").length > 0) {
    $("#noticeForm").validate({
        rules: {
            notice_title: {
                required: true,
                maxlength: 50
            },
            notice_publish_date: {
                required: true,
                maxlength: 50
            },
            entrusted_dept: {
                required: true,
                maxlength: 300
            },
            notice_description: {
                required: true,
                maxlength: 300
            },
            notice_file: {
                required: true
            },
        },
        messages: {
            notice_title: {
                required: "Please enter Notice Title",
                maxlength: "Your name maxlength should be 50 characters long."
            },
            notice_publish_date: {
                required: "Please enter Publish Date",
                maxlength: "The email name should less than or equal to 50 characters",
            },
            entrusted_dept: {
                required: "Please select Department",
                maxlength: "Your message name maxlength should be 300 characters long."
            },
            notice_description: {
                required: "Please enter Notice Description",
                maxlength: "Your message name maxlength should be 300 characters long."
            },
            notice_file: {
                required: "Please Select a file"
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#noticeSubmit').html('Please Wait...');
            $("#noticeSubmit").attr("disabled", true);
            debugger;

            var form = $('#noticeForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#noticeForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('store-data')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#noticeSubmit').html('Submit');
                    $("#noticeSubmit").attr("disabled", false);

                    toastr['success'](
                        'Notice data has been stored succesfully.',
                        'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });

                    window.location.replace("{{url('notice-table')}}");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#noticeSubmit').html('Submit');
                    $("#noticeSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to insert Notice. Please try again.',
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