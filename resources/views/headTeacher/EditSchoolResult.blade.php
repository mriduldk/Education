@extends('layouts/contentLayoutMaster')

@section('title', 'Insert School Results')

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
            <form class="form form-vertical" id="formResult">
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
                                        <option value="HSLC">HSLC</option>
                                        <option value="HS">HS</option>

                                        <option value="">Select Option</option>
                                        <option value="HSLC" @php if($schoolResult->class == "HSLC" ) { @endphp
                                            selected="selected" @php } @endphp >HSLC</option>
                                        <option value="HS" @php if($schoolResult->class == 'HS' ) { @endphp
                                            selected="selected" @php } @endphp>HS</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="stream">Stream</label>
                                    <input type="text" id="stream" class="form-control" name="stream"
                                        placeholder="Stream" value="{{ $schoolResult->stream }}" />
                                    <input type="text" id="school_r_id" class="form-control" name="school_r_id"
                                        placeholder="Stream" value="{{ $schoolResult->school_r_id  }}" hidden/>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="year">Year</label>
                                    <input type="text" id="year" class="form-control" name="year" placeholder="Year"
                                        value="{{ $schoolResult->year }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_appeared">Total Student Appeared</label>
                                    <input type="number" id="total_appeared" class="form-control" name="total_appeared"
                                        placeholder="Total Student Appeared"
                                        value="{{ $schoolResult->total_appeared }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="distinction">Total Distinction</label>
                                    <input type="number" id="distinction" class="form-control" name="distinction"
                                        placeholder="Total Distinction" value="{{ $schoolResult->distinction }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="star">Total Star</label>
                                    <input type="number" id="star" class="form-control" name="star"
                                        placeholder="Total Star" value="{{ $schoolResult->star }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="fst_division">Total 1st Division</label>
                                    <input type="number" id="fst_division" class="form-control" name="fst_division"
                                        placeholder="Total 1st Division" value="{{ $schoolResult->fst_division }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="snd_division">Total 2nd Division</label>
                                    <input type="number" id="snd_division" class="form-control" name="snd_division"
                                        placeholder="Total 2nd Division" value="{{ $schoolResult->snd_division }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="trd_visision">Total 3rd Division</label>
                                    <input type="number" id="trd_visision" class="form-control" name="trd_visision"
                                        placeholder="Total 3rd Division" value="{{ $schoolResult->trd_visision }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="fail">Total Failed Students</label>
                                    <input type="number" id="fail" class="form-control" name="fail"
                                        placeholder="Total Failed Students" value="{{ $schoolResult->fail }}" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" id="btnSubmit" class="btn btn-primary me-1">Update</button>
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

if ($("#formResult").length > 0) {
    $("#formResult").validate({
        rules: {
            class: {
                required: true,
                    maxlength: 100
            },
            stream: {
                required: true,
                maxlength: 100
            },
            year: {
                required: true,
                maxlength: 100
            },
            fst_division: {
                required: true,
                maxlength: 100
            },
            snd_division: {
                required: true,
                maxlength: 100
            },
            trd_visision: {
                required: true,
                maxlength: 100
            },
            fail: {
                required: true,
                maxlength: 100
            },
            total_appeared: {
                required: true,
                maxlength: 100
            },
            distinction: {
                required: true,
                maxlength: 100
            },
            star: {
                required: true,
                maxlength: 100
            },
        },
        messages: {
            class: {
                required: "This Field is mendatory",
                    maxlength: "This field should be 100 characters long."
            },
            stream: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            year: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            fst_division: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            snd_division: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            yrd_visision: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            fail: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            total_appeared: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            distinction: {
                required: "This Field is mendatory",
                maxlength: "This field should be 100 characters long."
            },
            star: {
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

            var form = $('#formResult')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{url('update-student-details')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnSubmit').html('Update');
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
                    $('#btnSubmit').html('Update');
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