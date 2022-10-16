@extends('layouts/contentLayoutMaster')

@section('title', 'Insert Gallery Image')

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
                    <h4 class="card-title">Add Image</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" id="categoryForm">
                        <div class="row">
                            
                            <div class="col-12">
                                <div class="mb-1">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="document">Galery Image</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <input class="form-control" type="file" name="document" id="document" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="category_title">Category Title</label>
                                    <select class="form-control" name="category_title" id="category_title">
                                        <option value="">Select Option</option>
                                        @foreach($imageCategories as $imageCategory)
                                        <option value="{{ $imageCategory->category_id }}" >{{ $imageCategory->category_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-10">
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

if ($("#categoryForm").length > 0) {
    $("#categoryForm").validate({
        rules: {
            category_title: {
                required: true,
                maxlength: 50
            },
            document: {
                required: true,
                maxlength: 200
            }
        },
        messages: {
            category_title: {
                required: "Please Select Category Name",
                maxlength: "Your name maxlength should be 50 characters long."
            },
            document: {
                required: "Please select document",
                maxlength: "Your name maxlength should be 200 characters long."
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

            var form = $('#categoryForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#categoryForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('insert-image')}}",
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
                        'Gallery Image has been stored succesfully.',
                        'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });

                    window.location.replace("{{url('galleryImages')}}");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#noticeSubmit').html('Submit');
                    $("#noticeSubmit").attr("disabled", false);

                    toastr['error'](
                        'Failed to insert Gallery Image. Please try again.',
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