@extends('layouts/contentLayoutMaster')

@section('title', 'Notice')

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Notice</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" id="noticeForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label for="notice_title" class="col-form-label">Notice Title</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Notice Title"
                                            id="notice_title" name="notice_title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="notice_publish_date">Publish Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" placeholder="Publish Date"
                                            id="notice_publish_date" name="notice_publish_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="entrusted_dept">Enter Department</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Department"
                                            id="entrusted_dept" name="entrusted_dept" value="Education">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="notice_description">NoticeDescription</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" aria-label="With textarea"
                                            id="notice_description" name="notice_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="notice_file">Notice File</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <input class="form-control" type="file" name="notice_file"
                                                id="notice_file" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary me-1" id="noticeSubmit">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
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
                maxlength: 1000
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
                maxlength: "Your message name maxlength should be 1000 characters long."
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