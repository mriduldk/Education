@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Salary Account')

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <form class="form form-vertical" id="formSalary">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Salary Account and Other Official Account</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Permanent Account (PAN)
                                        No</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="pan_no" id="pan_no"
                                        placeholder="Enter PAN No" value="@php echo $teacherSalaryAccountDetails->pan_no; @endphp" />
                                    <input type="text" id="first-name-vertical" class="form-control" name="teacher_id" id="teacher_id"
                                        placeholder="Enter PAN No" value="@php echo $teacherSalaryAccountDetails->fk_teacher_id; @endphp" hidden />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Account No (Salary
                                        Account)</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="account_no" id="account_no"
                                        placeholder="Enter Account No (Salary Account)" value="{{ $teacherSalaryAccountDetails->account_no }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Account Name (Salary
                                        Account)</label>
                                    <input type="text" id="password-vertical" class="form-control" name="account_name" id="account_name"
                                        placeholder="Enter Account Name (Salary Account)"  value="{{ $teacherSalaryAccountDetails->account_name }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Bank Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="bank_name" id="bank_name"
                                        placeholder="Enter Bank Name"  value="{{ $teacherSalaryAccountDetails->bank_name }}"/> 
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Branch Name (Salary
                                        Account)</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="branch_name" id="branch_name"
                                        placeholder="Enter Branch Name (Salary Account)"  value="{{ $teacherSalaryAccountDetails->branch_name }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">IFSC</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="ifsc" id="ifsc"
                                        placeholder="Enter IFSC code"  value="{{ $teacherSalaryAccountDetails->ifsc }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Name of the district where your
                                        salary account no is active</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="district_name_of_active_salary_account_no" id="district_name_of_active_salary_account_no"
                                        placeholder="Name of the district where your salary account no is active"  value="{{ $teacherSalaryAccountDetails->district_name_of_active_salary_account_no }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Name of the state where your
                                        salary account no is active</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="state_name_of_active_salary_account_no" id="state_name_of_active_salary_account_no"
                                        placeholder="Enter Name of the state where your salary account no is active"  value="{{ $teacherSalaryAccountDetails->state_name_of_active_salary_account_no }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Salary Payment Mode</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="salary_payment_mode" id="salary_payment_mode"
                                        placeholder="Enter Salary Payment Mode"  value="{{ $teacherSalaryAccountDetails->salary_payment_mode }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Gross Provident Fund (GPF)
                                        No</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="gross_provoded_fund" id="gross_provoded_fund"
                                        placeholder="Enter Gross Provident Fund (GPF) No"  value="{{ $teacherSalaryAccountDetails->gross_provoded_fund }}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Group Insurance Scheme (GIS)
                                        No.</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="group_insurance_scheme" id="group_insurance_scheme"
                                        placeholder="Enter GIS"  value="{{ $teacherSalaryAccountDetails->group_insurance_scheme }}"/>
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

if ($("#formSalary").length > 0) {
    $("#formSalary").validate({
        rules: {
            pan_no: {
                required: true,
                maxlength: 50
            },
            account_no: {
                required: true,
                maxlength: 50
            },
            account_name: {
                required: true,
                maxlength: 100
            },
            bank_name: {
                required: true,
                maxlength: 100
            },
            branch_name: {
                required: true,
                maxlength: 100
            },
            ifsc: {
                required: true,
                maxlength: 100
            },
            district_name_of_active_salary_account_no: {
                required: true,
                maxlength: 100
            },
            state_name_of_active_salary_account_no: {
                required: true,
                maxlength: 100
            },
            salary_payment_mode: {
                required: true,
                maxlength: 100
            },
            gross_provoded_fund: {
                required: true,
                maxlength: 100
            },
            group_insurance_scheme: {
                required: true,
                maxlength: 100
            }
        },
        messages: {
            pan_no: {
                required: "Please enter PAN",
                maxlength: "PAN maxlength should be 50 characters long."
            },
            account_no: {
                required: "Please enter Account No",
                maxlength: "Account No should less than or equal to 50 characters",
            },
            account_name: {
                required: "Please select Account Name",
                maxlength: "Account Name maxlength should be 100 characters long."
            },
            bank_name: {
                required: "Please enter Bank Name",
                maxlength: "Bank Name maxlength should be 100 characters long."
            },
            branch_name: {
                required: "Please enter Branch Name",
                maxlength: "Branch name maxlength should be 100 characters long."
            },
            ifsc: {
                required: "Please enter IFSC",
                maxlength: "IFSC maxlength should be 100 characters long."
            },
            district_name_of_active_salary_account_no: {
                required: "Please enter District",
                maxlength: "District maxlength should be 100 characters long."
            },
            state_name_of_active_salary_account_no: {
                required: "Please enter State",
                maxlength: "State maxlength should be 100 characters long."
            },
            salary_payment_mode: {
                required: "Please enter Payment Mode",
                maxlength: "Payment Mode maxlength should be 100 characters long."
            },
            gross_provoded_fund: {
                required: "Please enter GPF",
                maxlength: "GPF name maxlength should be 100 characters long."
            },
            group_insurance_scheme: {
                required: "Please enter GIS",
                maxlength: "GIS maxlength should be 100 characters long."
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

            var form = $('#formSalary')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#formSalary').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('update-salary-account')}}",
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

                        window.location.replace("{{ url('teacherDashboard') }}");

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