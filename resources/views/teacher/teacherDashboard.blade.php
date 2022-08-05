@extends('layouts/contentLayoutMaster')

@section('title', 'Teacher Dashboard')

@section('vendor-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<!-- JQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
    <div class="row">

        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-2" src="{{asset('images/avatars/teacher.jpg')}}"
                                height="100" width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4>DHANSHIRI BASUMATARY</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">

                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">School Name:</span>
                                <span>Lower Primary School (LPS)</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">UDICE Code:</span>
                                <span>18260318302</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Gender:</span>
                                <span>Female </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Date of Birth:</span>
                                <span>12 May 1971 </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Mobile:</span>
                                <span>8822538701 </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Email:</span>
                                <span>dhanshribasumataryonline@gmail.com </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Caste:</span>
                                <span>ST(P) </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Religion:</span>
                                <span>Hinduism </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Nationality:</span>
                                <span>Indian </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Present Address:</span>
                                <span>PUB NALBARI, TANGLA, BHERGAON, Assam, Udalguri, 784521 </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Permanent Address:</span>
                                <span>PUB NALBARI, TANGLA, BHERGAON, Assam, Udalguri, 784521 </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Blood Group:</span>
                                <span>A+ </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Father's Name:</span>
                                <span>MANI RAM BASUMATARY </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Mother's Name:</span>
                                <span>CHAWKHLY BASUMATARY </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Maritual status:</span>
                                <span>Married </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Spouse Name:</span>
                                <span>JOGEN CH. RABHA </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Personal Identification Marks:</span>
                                <span>BLACK MOLE ON NECK </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Do you have any kind of disability?:</span>
                                <span>No </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Is your spouse working under Goverment Service?:</span>
                                <span>No </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /User Card -->

        </div>


        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills mb-2">
                <li class="nav-item">
                    <a class="nav-link active" id="btnSchoolProfile">
                        <span class="fw-bold">School Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnFacilities">
                        <span class="fw-bold">Employeement Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnEnrolmentOfStudent">
                        <span class="fw-bold">Salary Account and Other Official Account Details</span>
                    </a>
                </li>
            </ul>
            <!--/ User Pills -->

            <div id="divSchoolProfile">
                <div class="card">
                    <h4 class="card-header">School Address</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Village </th>
                                    <td>KUMGURI</td>
                                    <th>Cluster</th>
                                    <td>CHANDRAPARA</td>
                                </tr>
                                <tr>
                                    <th>Block </th>
                                    <td>DOTMA</td>
                                    <th>District </th>
                                    <td>KOKRAJHAR</td>
                                </tr>
                                <tr>
                                    <th>State </th>
                                    <td>Assam</td>
                                    <th>PinCode </th>
                                    <td>783370</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <h4 class="card-header">School Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>School Category </th>
                                    <td>1-Primary</td>
                                    <th>School Type</th>
                                    <td>3-Co-educational</td>
                                </tr>
                                <tr>
                                    <th>Class From </th>
                                    <td>1</td>
                                    <th>Class To </th>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <th>State Management </th>
                                    <td>Dept. Of education</td>
                                    <th>National Management </th>
                                    <td>Department of Education</td>
                                </tr>
                                <tr>
                                    <th>Status </th>
                                    <td>Operational</td>
                                    <th>Location </th>
                                    <td>Rural</td>
                                </tr>
                                <tr>
                                    <th>Aff Board Sec </th>
                                    <td></td>
                                    <th>Aff Board H.Sec </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Year of Establishment </th>
                                    <td>1949</td>
                                    <th>Pre-Primary </th>
                                    <td>No</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divFacilities">
                <div class="card">
                    <h4 class="card-header">Employeement Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name of the Post Held </th>
                                    <td>Regular Tutor (Prov) (Non-Transferable)</td>
                                    <th>Medium of School</th>
                                    <td>Bodo</td>
                                </tr>
                                <tr>
                                    <th>Subjects </th>
                                    <td>All subjects</td>
                                    <th>Category of Post</th>
                                    <td>ASSISTANT TEACHER</td>
                                </tr>
                                <tr>
                                    <th>Pay Scale</th>
                                    <td>14000-60500</td>
                                    <th>Grade Pay </th>
                                    <td>6800</td>
                                </tr>
                                <tr>
                                    <th>Appointment Letter No. </th>
                                    <td></td>
                                    <th>Appointment Date </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Post Creation No.</th>
                                    <td></td>
                                    <th>Post Creation Date </th>
                                    <td>12 May 2031</td>
                                </tr>
                                <tr>
                                    <th>Date of effect of Service Provincialisation (If Provincialised then) </th>
                                    <td></td>
                                    <th>Date of joining in Service </th>
                                    <td>01 Jun 1999</td>
                                </tr>
                                <tr>
                                    <th>Date of joining in Present post Date of Retirement </th>
                                    <td>01 Jun 1999</td>
                                    <th>Period spent on Non-Teaching assignment </th>
                                    <td>NA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divEnrolmentOfStudent">
                <div class="card">
                    <h4 class="card-header">Salary Account and Other Official Account Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Permanent Account (PAN) No </th>
                                    <td>ATFPB85398</td>
                                    <th>Account No (Salary Account)</th>
                                    <td>11429103000</td>
                                </tr>
                                <tr>
                                    <th>Account Name (Salary Account) </th>
                                    <td>DHANSHRI BASUMATARY</td>
                                    <th>Bank Name </th>
                                    <td>State Bank of India</td>
                                </tr>
                                <tr>
                                    <th>Branch Name (Salary Account) </th>
                                    <td>TANGLA</td>
                                    <th>IFSC </th>
                                    <td>SBIN0007118</td>
                                </tr>
                                <tr>
                                    <th>Name of the district where your salary account no is active Name of the state
                                        where your salary account no is active </th>
                                    <td>ASSAM</td>
                                    <th>Salary Payment Mode Gross Provident Fund (GPF) No </th>
                                    <td>ECS</td>
                                </tr>
                                <tr>
                                    <th>Group Insurance Scheme (GIS) No. </th>
                                    <td>PED-261086</td>
                                    <th> </th>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<script>
$("#divSchoolProfile").show();
$("#divFacilities").hide();
$("#divEnrolmentOfStudent").hide();

$("#btnSchoolProfile").click(function() {

    $("#divFacilities").hide();
    $("#divEnrolmentOfStudent").hide();

    $("#divSchoolProfile").show();

    $('#btnFacilities').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');

    $(this).addClass('active');
});


$("#btnFacilities").click(function() {

    $("#divSchoolProfile").hide();
    $("#divEnrolmentOfStudent").hide();

    $("#divFacilities").show();

    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');

    $(this).addClass('active');

});


$("#btnEnrolmentOfStudent").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();

    $("#divEnrolmentOfStudent").show();

    $('#btnFacilities').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');

    $(this).addClass('active');

});
</script>


@endsection

@section('vendor-script')
{{-- Vendor js files --}}
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
{{-- data table --}}
<script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection



@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection