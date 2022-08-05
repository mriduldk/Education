@extends('layouts/contentLayoutMaster')

@section('title', 'Tender')

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
                    <h4 class="card-title">Add Tender</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" id="tenderForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label for="tender_name" class="col-form-label">Tender Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Tender Name"
                                            id="tender_name" name="tender_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="tender_description">Tender
                                            Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" aria-label="With textarea"
                                            id="tender_description" name="tender_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="ref_no">Ref No</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Ref No" id="ref_no"
                                            name="ref_no">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="published_date">Publish Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" placeholder="Publish Date"
                                            id="published_date" name="published_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="department">Enter Department</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Enter Department"
                                            id="department" name="department">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="document">Tender File</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <input class="form-control" type="file" name="document" id="document" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary me-1" id="tenderSubmit">Submit</button>
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

if ($("#tenderForm").length > 0) {
    $("#tenderForm").validate({
        rules: {
            tender_name: {
                required: true,
                maxlength: 50
            },
            tender_description: {
                required: true,
                maxlength: 50
            },
            published_date: {
                required: true,
                maxlength: 300
            },
            ref_no: {
                required: true,
                maxlength: 300
            },
            department: {
                required: true,
                maxlength: 300
            },
            document: {
                required: true
            },
        },
        messages: {
            tender_name: {
                required: "Please enter Tender Name",
                maxlength: "Tender name maxlength should be 50 characters long."
            },
            tender_description: {
                required: "Please enter Tender Description",
                maxlength: "Tender Description name should less than or equal to 50 characters",
            },
            published_date: {
                required: "Please select Publish Date",
                maxlength: " Publish Date maxlength should be 300 characters long."
            },
            ref_no: {
                required: "Please enter Ref No",
                maxlength: "Ref No maxlength should be 300 characters long."
            },
            department: {
                required: "Please enter Department",
                maxlength: "Department maxlength should be 300 characters long."
            },
            document: {
                required: "Please Select a file"
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#tenderSubmit').html('Please Wait...');
            $("#tenderSubmit").attr("disabled", true);
            debugger;

            var form = $('#tenderForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#tenderForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('tender-store')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#tenderSubmit').html('Submit');
                    $("#tenderSubmit").attr("disabled", false);

                    toastr['success'](
                        'Tender data has been stored succesfully.',
                        'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });

                    window.location.replace("{{url('tender-table')}}");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#tenderSubmit').html('Submit');
                    $("#tenderSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to insert Tender. Please try again.',
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