@extends('layouts/contentLayoutMaster')

@section('title', 'Add School Details')

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
                        <h4 class="card-title">Basic Information</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">School Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="School Name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">UDISE CODE</label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="UDISE CODE" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Head Teacher</label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Head Teacher" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Head Teacher Number</label>
                                    <input type="number" id="password-vertical" class="form-control" name="contact"
                                        placeholder="Head Teacher Number" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Head Teacher Email</label>
                                    <input type="email" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Head Teacher Email" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">School Address</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Village </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Village " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Cluster </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Cluster " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Block </label>
                                    <input type="text" id="password-vertical" class="form-control" name="contact"
                                        placeholder="Block " />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">District </label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="District " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">State </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="State " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">PinCode </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="PinCode " />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">School Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">School Category </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="School Category " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">School Type </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="School Type " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Class From </label>
                                    <input type="text" id="password-vertical" class="form-control" name="contact"
                                        placeholder="Class From " />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Class To </label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="Class To " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">State Management </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="State Management " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">National Management </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="National Management " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Status </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Status " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Location </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="PinCoLocationde " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Aff Board Sec </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Aff Board Sec " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Aff Board H.Sec </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Aff Board H.Sec " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Year of Establishment </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Year of Establishment " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Pre-Primary </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Pre-Primary " />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">School Facilities</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Building Status </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Building Status " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Boundary Wall </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Boundary Wall " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">No. of Boys Toilets </label>
                                    <input type="text" id="password-vertical" class="form-control" name="contact"
                                        placeholder="No. of Boys Toilets " />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">No. of Girls Toilets </label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="No. of Girls Toilets " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">No. of CWSN Toilets </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="No. of CWSN Toilets " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Drinking Water Availability
                                    </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Drinking Water Availability " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Hand Wash Facility </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Hand Wash Facility " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Functional Generator </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Functional Generator " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Library </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Library " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">PinCode </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="PinCode " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Reading Corner </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Reading Corner " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Book Bank </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Book Bank " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Functional Laptop </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Functional Laptop " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Functional Desktop </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Functional Desktop " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Functional Tablet </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Functional Tablet " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Functional Scanner </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Functional Scanner " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Functional Printer </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Functional Printer " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Functional LED </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Functional LED " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Functional DigiBoard </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Functional DigiBoard " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Internet </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Internet " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">DTH </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="DTH " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Functional Web Cam </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Functional Web Cam " />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Room Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Class Rooms </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Class Rooms " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Other Rooms </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Other Rooms " />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">No. of Students & Teachers</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Pre-Primary </label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Pre-Primary " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">I </label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="I " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">II </label>
                                    <input type="text" id="password-vertical" class="form-control" name="contact"
                                        placeholder="II " />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">III </label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="III " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">IV </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="IV " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">V </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="V " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">VI </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="VI " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">VII </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="VII " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">VIII </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="VIII " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">IX </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="IX " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">X </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="X " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">XI </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="XI " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">XII </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="State " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">XII </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="PinCode " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">State </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="State " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Class(1-12) </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Class(1-12) " />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Class(1-12) With Pre-Primary
                                    </label>
                                    <input type="number" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Class(1-12) With Pre-Primary" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Total Teachers </label>
                                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Total Teachers " />
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