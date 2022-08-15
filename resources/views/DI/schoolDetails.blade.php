@extends('layouts/contentLayoutMaster')

@section('title', 'School Details')

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
                            <img class="img-fluid rounded mb-2"
                                src="{{asset('images/school/school.jpg')}}" height="100" width="300"
                                alt="User avatar" />
                            <div class="user-info text-center">
                                <h4>NO.319 KUMGURI LPS</h4>
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
                                <span>NO.319 KUMGURI LPS</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">UDICE Code:</span>
                                <span>18010102404</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher:</span>
                                <span>Dipankar Rabha </span><span class="badge bg-light-danger">Not Registered</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher Number:</span>
                                <span>9876543210 </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher Email:</span>
                                <span>dipankarrabha@gmail.com </span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center pt-2">
                            <a href="{{url ('schoolInsert')}}" class="btn btn-primary me-1" >
                                Edit School Details
                            </a>
                        </div>
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
                        <span class="fw-bold">Facilities</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnRoomDetails">
                        <span class="fw-bold">Room Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnEnrolmentOfStudent" onclick="clicked()">
                        <span class="fw-bold">Enrolment of The Students</span>
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
                    <h4 class="card-header">Facilities</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Building Status </th>
                                    <td>Government</td>
                                    <th>Boundary Wall</th>
                                    <td>No boundary walls</td>
                                </tr>
                                <tr>
                                    <th>No. of Boys Toilets </th>
                                    <td>1</td>
                                    <th>No. of Girls Toilets </th>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>No. of CWSN Toilets </th>
                                    <td>0</td>
                                    <th>Drinking Water Availability </th>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th>Hand Wash Facility </th>
                                    <td>Yes</td>
                                    <th>Functional Generator </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Library </th>
                                    <td>Yes</td>
                                    <th>Reading Corner </th>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th>Book Bank </th>
                                    <td>Yes</td>
                                    <th>Functional Laptop </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Functional Desktop </th>
                                    <td>0</td>
                                    <th>Functional Tablet </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Functional Scanner </th>
                                    <td>0</td>
                                    <th>Functional Printer </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Functional LED </th>
                                    <td>0</td>
                                    <th>Functional DigiBoard </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Internet </th>
                                    <td>No</td>
                                    <th>DTH </th>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <th>Functional Web Cam </th>
                                    <td>0</td>
                                    <th> </th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divRoomDetails">
                <div class="card">
                    <h4 class="card-header">Room Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Class Rooms </th>
                                    <td>5</td>
                                    <th>Other Rooms</th>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="divEnrolmentOfStudent">
                <div class="card">
                    <h4 class="card-header">No. of Students</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Pre-Primary </th>
                                    <td>12</td>
                                    <th>I</th>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <th>II </th>
                                    <td>9</td>
                                    <th>III </th>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <th>IV </th>
                                    <td>15</td>
                                    <th>V </th>
                                    <td>16</td>
                                </tr>
                                <tr>
                                    <th>VI </th>
                                    <td>0</td>
                                    <th>VII </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>VIII </th>
                                    <td>0</td>
                                    <th>V </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>IX </th>
                                    <td>0</td>
                                    <th>X </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>XI </th>
                                    <td>0</td>
                                    <th>XII </th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th>Class(1-12) </th>
                                    <td>57</td>
                                    <th>Class(1-12) With Pre-Primary </th>
                                    <td>69</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <h4 class="card-header">No. of Teachers</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Total Teachers </th>
                                    <td>3</td>
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
$("#divRoomDetails").hide();
$("#divEnrolmentOfStudent").hide();

$("#btnSchoolProfile").click(function() {

    $("#divFacilities").hide();
    $("#divRoomDetails").hide();
    $("#divEnrolmentOfStudent").hide();

    $("#divSchoolProfile").show();

    $('#btnFacilities').removeClass('active');
    $('#btnRoomDetails').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');

    $(this).addClass('active');
});


$("#btnFacilities").click(function() {

    $("#divSchoolProfile").hide();
    $("#divRoomDetails").hide();
    $("#divEnrolmentOfStudent").hide();

    $("#divFacilities").show();

    $('#btnRoomDetails').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');

    $(this).addClass('active');

});

$("#btnRoomDetails").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divEnrolmentOfStudent").hide();

    $("#divRoomDetails").show();

    $('#btnFacilities').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');

    $(this).addClass('active');
});

$("#btnEnrolmentOfStudent").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divRoomDetails").hide();

    $("#divEnrolmentOfStudent").show();

    $('#btnFacilities').removeClass('active');
    $('#btnRoomDetails').removeClass('active');
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