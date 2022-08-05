@extends('layouts/contentLayoutMaster')

@section('title', 'Event')

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
<section id="basic-horizontal-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Event</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" id="latestUpadteForm">
                        <div class="row">
                            @foreach($latestUpdates as $latestUpdate)
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label for="update_title" class="col-form-label">Event Title</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Event Title"
                                            id="update_title" name="update_title"
                                            value="{{ $latestUpdate->update_title }}">
                                        <input class="form-control" type="text" placeholder="Enter ID" id="id" name="id"
                                            hidden value="{{ $latestUpdate->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="update_desc">Event Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" aria-label="With textarea" id="update_desc"
                                            name="update_desc">{{ $latestUpdate->update_desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="ref_no">Department</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Department"
                                            id="entrusted_dept" name="entrusted_dept"
                                            value="{{ $latestUpdate->entrusted_dept }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="date">Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Event Date" id="date"
                                            name="date" value="{{ $latestUpdate->date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="doc">Document</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <input class="form-control" type="file" name="doc" id="doc" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary me-1"
                                    id="latestUpadteSubmit">Update</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
var isRtl = $('html').attr('data-textdirection') === 'rtl';


if ($("#latestUpadteForm").length > 0) {
    $("#latestUpadteForm").validate({
        rules: {
            update_title: {
                required: true,
                maxlength: 100
            },
            update_desc: {
                required: true,
                maxlength: 300
            },
            date: {
                required: true,
                maxlength: 300
            },
            entrusted_dept: {
                required: true,
                maxlength: 300
            },
        },
        messages: {
            update_title: {
                required: "Please enter Event Title",
                maxlength: "Event Title maxlength should be 50 characters long."
            },
            update_desc: {
                required: "Please enter Event Description",
                maxlength: "Event Description name should less than or equal to 50 characters",
            },
            date: {
                required: "Please select Date",
                maxlength: "Date maxlength should be 300 characters long."
            },
            entrusted_dept: {
                required: "Please enter Department",
                maxlength: "Department maxlength should be 300 characters long."
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#latestUpadteSubmit').html('Please Wait...');
            $("#latestUpadteSubmit").attr("disabled", true);

            var form = $('#latestUpadteForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#latestUpadteForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('latest-update-update')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    debugger;
                    $('#latestUpadteSubmit').html('Submit');
                    $("#latestUpadteSubmit").attr("disabled", false);
                    toastr['success'](
                        'Event data has been updated succesfully.',
                        'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });

                    window.location.replace("{{url('latest-update-table')}}");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#latestUpadteSubmit').html('Submit');
                    $("#latestUpadteSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to update Event. Please try again.',
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