@extends('layouts/contentLayoutMaster')

@section('title', 'Head Teacher Dashboard')

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

        <div class="col-xl-4 col-lg-5 col-md-12 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-2" src="{{asset('images/school/school.jpg')}}" height="100"
                                width="300" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4>{{ $school->school_name; }}</h4>
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
                                <span>{{ $school->school_name; }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">UDICE Code:</span>
                                <span>{{ $school->udice_code; }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher:</span>
                                <span>{{ $school->headTeacher->teacher_first_name; }} {{ $school->headTeacher->teacher_last_name; }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher Number:</span>
                                <span>{{ $school->headTeacher->teacher_mobile; }} </span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Head Teacher Email:</span>
                                <span>{{ $school->headTeacher->teacher_email; }}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center pt-2">
                            <a href="{{url ('editSchoolDetails')}}" class="btn btn-primary me-1">
                                <i data-feather='settings'></i> Edit School Details
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
                        <span class="fw-bold"><i data-feather='book'></i> School Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnFacilities">
                        <span class="fw-bold"><i data-feather='command'></i> Facilities</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnRoomDetails">
                        <span class="fw-bold"><i data-feather='home'></i> Room Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="btnEnrolmentOfStudent" onclick="clicked()">
                        <span class="fw-bold"><i data-feather='user-check'></i> Enrolment of The Students</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="btnLeaveApplication" onclick="clicked()">
                        <span class="fw-bold"><i data-feather='user-check'></i> Leave Applications</span>
                    </a>
                </li> -->
            </ul>
            <!--/ User Pills -->

            <div id="divSchoolProfile">
                <div class="card">
                    <h4 class="card-header">School Address</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-black">
                                <tr>
                                    <th>Village </th>
                                    <td>@php echo $school->village; @endphp</td>
                                    <th>Cluster</th>
                                    <td>@php echo $school->cluster; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Block </th>
                                    <td>@php echo $school->block; @endphp</td>
                                    <th>District </th>
                                    <td>@php echo $school->district; @endphp</td>
                                </tr>
                                <tr>
                                    <th>State </th>
                                    <td>@php echo $school->state; @endphp</td>
                                    <th>PinCode </th>
                                    <td>@php echo $school->pin; @endphp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <h4 class="card-header">School Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-black">
                                <tr>
                                    <th>School Name </th>
                                    <td>@php echo $school->school_name; @endphp</td>
                                    <th>UDISE CODE</th>
                                    <td>@php echo $school->udice_code; @endphp</td>
                                </tr>
                                <tr>
                                    <th>School Category </th>
                                    <td>@php echo $school->school_category; @endphp</td>
                                    <th>School Type</th>
                                    <td>@php echo $school->school_type; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Class From </th>
                                    <td>@php echo $school->class_from; @endphp</td>
                                    <th>Class To </th>
                                    <td>@php echo $school->class_to; @endphp</td>
                                </tr>
                                <tr>
                                    <th>State Management </th>
                                    <td>@php echo $school->state_management; @endphp</td>
                                    <th>National Management </th>
                                    <td>@php echo $school->national_management; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Status </th>
                                    <td>@php echo $school->status; @endphp</td>
                                    <th>Location </th>
                                    <td>@php echo $school->location; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Aff Board Sec </th>
                                    <td>@php echo $school->aff_board_sec; @endphp</td>
                                    <th>Aff Board H.Sec </th>
                                    <td>@php echo $school->add_board_h_sec; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Year of Establishment </th>
                                    <td>@php echo $school->year_of_establishment; @endphp</td>
                                    <th>Pre-Primary </th>
                                    <td>@php echo $school->pre_primary; @endphp</td>
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
                                    <td>@php echo $school->schoolFacility->building_status;
                                        @endphp</td>
                                    <th>Boundary Wall</th>
                                    <td>@php echo $school->schoolFacility->coundary_wall;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>No. of Boys Toilets </th>
                                    <td>@php echo $school->schoolFacility->no_of_boys_toilets;
                                        @endphp</td>
                                    <th>No. of Girls Toilets </th>
                                    <td>@php echo $school->schoolFacility->no_of_girls_toilets;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>No. of CWSN Toilets </th>
                                    <td>@php echo $school->schoolFacility->no_of_cwsn_toilets;
                                        @endphp</td>
                                    <th>Drinking Water Availability </th>
                                    <td>@php echo
                                        $school->schoolFacility->drinking_water_availability;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Hand Wash Facility </th>
                                    <td>@php echo $school->schoolFacility->hand_wash_facility;
                                        @endphp</td>
                                    <th>Functional Generator </th>
                                    <td>@php echo $school->schoolFacility->functional_generator;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Library </th>
                                    <td>@php echo $school->schoolFacility->library; @endphp</td>
                                    <th>Reading Corner </th>
                                    <td>@php echo $school->schoolFacility->reading_corner;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Book Bank </th>
                                    <td>@php echo $school->schoolFacility->book_bank; @endphp
                                    </td>
                                    <th>Functional Laptop </th>
                                    <td>@php echo $school->schoolFacility->functional_laptop;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Functional Desktop </th>
                                    <td>@php echo $school->schoolFacility->functional_desktop;
                                        @endphp</td>
                                    <th>Functional Tablet </th>
                                    <td>@php echo $school->schoolFacility->functional_tablet;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Functional Scanner </th>
                                    <td>@php echo $school->schoolFacility->functional_scanner;
                                        @endphp</td>
                                    <th>Functional Printer </th>
                                    <td>@php echo $school->schoolFacility->functional_printer;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Functional LED </th>
                                    <td>@php echo $school->schoolFacility->functional_led;
                                        @endphp</td>
                                    <th>Functional DigiBoard </th>
                                    <td>@php echo $school->schoolFacility->functional_digiboard;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Internet </th>
                                    <td>@php echo $school->schoolFacility->internet; @endphp
                                    </td>
                                    <th>DTH </th>
                                    <td>@php echo $school->schoolFacility->dth; @endphp</td>
                                </tr>
                                <tr>
                                    <th>Functional Web Cam </th>
                                    <td>@php echo $school->schoolFacility->functional_web_cam;
                                        @endphp</td>
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
                                    <td>@php echo $school->class_rooms; @endphp</td>
                                    <th>Other Rooms</th>
                                    <td>@php echo $school->other_rooms; @endphp</td>
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
                                    <td>@php echo
                                        $school->schoolEnreolmentOfStudent->pre_primary; @endphp
                                    </td>
                                    <th>I</th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_1;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>II </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_2;
                                        @endphp</td>
                                    <th>III </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_3;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>IV </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_4;
                                        @endphp</td>
                                    <th>V </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_5;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>VI </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_6;
                                        @endphp</td>
                                    <th>VII </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_7;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>VIII </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_8;
                                        @endphp</td>
                                    <th>IX </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_9;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>X </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_10;
                                        @endphp</td>
                                    <th>XI </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_11;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>XII </th>
                                    <td>@php echo $school->schoolEnreolmentOfStudent->class_12;
                                        @endphp</td>
                                    <th> </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Class(1-12) </th>
                                    <td>@php echo
                                        $school->schoolEnreolmentOfStudent->class_1_12; @endphp
                                    </td>
                                    <th>Class(1-12) With Pre-Primary </th>
                                    <td>@php echo
                                        $school->schoolEnreolmentOfStudent->class_1_12_with_pre_primary;
                                        @endphp</td>
                                </tr>
                                <tr>
                                    <th>Total Male Student </th>
                                    <td>@php echo
                                        $school->schoolEnreolmentOfStudent->total_male_students; @endphp
                                    </td>
                                    <th>Total Female Student </th>
                                    <td>@php echo
                                        $school->schoolEnreolmentOfStudent->total_female_students;
                                        @endphp</td>
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
                                    <td>@php echo $school->schoolEnreolmentOfStudent->total_teachers;
                                        @endphp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <!-- <div id="divLeaveApplication">
                <div class="card">
                    <h4 class="card-header">Leave Applications</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>Application Id</th>
                                    <th>Name</th>
                                    <th>Employment Id</th>
                                    <th>View Application</th>
                                    <th>View Application</th>
                                    <th width="25%">Action</th>

                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>101524</td>
                                    <td>Dipankar Rabha</td>
                                    <td>6542954264</td>
                                    <td>View Application</td>
                                    <td>Download</td>
                                    <td>

                                        <button class="btn btn-gradient-success btn-sm"><i data-feather='check'></i>
                                            Accept</button>
                                        <button class="btn btn-gradient-danger btn-sm"><i data-feather='x-square'></i>
                                            Reject</button>


                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->

        </div>
</section>



<!-- Floating Button-->
<!-- <div class="buy-now">
    <a href="#" target="_blank" class="btn btn-danger"><i data-feather='plus-circle'></i> Add Teacher</a>
</div> -->


<script>
$("#divSchoolProfile").show();
$("#divFacilities").hide();
$("#divRoomDetails").hide();
$("#divEnrolmentOfStudent").hide();
$("#divLeaveApplication").hide();


$("#btnSchoolProfile").click(function() {

    $("#divFacilities").hide();
    $("#divRoomDetails").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divLeaveApplication").hide();


    $("#divSchoolProfile").show();

    $('#btnFacilities').removeClass('active');
    $('#btnRoomDetails').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnLeaveApplication').removeClass('active');

    $(this).addClass('active');
});


$("#btnFacilities").click(function() {

    $("#divSchoolProfile").hide();
    $("#divRoomDetails").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divLeaveApplication").hide();

    $("#divFacilities").show();

    $('#btnRoomDetails').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnLeaveApplication').removeClass('active');

    $(this).addClass('active');

});

$("#btnRoomDetails").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divLeaveApplication").hide();


    $("#divRoomDetails").show();

    $('#btnFacilities').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $("#btnLeaveApplication").removeClass('active');


    $(this).addClass('active');
});

$("#btnEnrolmentOfStudent").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divRoomDetails").hide();
    $("#divLeaveApplication").hide();


    $("#divEnrolmentOfStudent").show();

    $('#btnFacilities').removeClass('active');
    $('#btnRoomDetails').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnLeaveApplication').removeClass('active');

    $(this).addClass('active');

});

$("#btnLeaveApplication").click(function() {
    $("#divSchoolProfile").hide();
    $("#divFacilities").hide();
    $("#divRoomDetails").hide();
    $("#divEnrolmentOfStudent").hide();
    $("#divLeaveApplication").show();

    $('#btnFacilities').removeClass('active');
    $('#btnRoomDetails').removeClass('active');
    $('#btnSchoolProfile').removeClass('active');
    $('#btnEnrolmentOfStudent').removeClass('active');

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