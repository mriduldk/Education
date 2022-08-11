@extends('layouts/contentLayoutMaster')

@section('title', 'Edit School Details')

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
        <div class="col-md-12 col-12 col-lg-12">
            <form class="form form-vertical" id="schoolForm">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Information</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_name">School Name</label>
                                    <input type="text" id="school_name" class="form-control" name="school_name"
                                        value="{{ $school->school_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="udice_code">UDISE CODE</label>
                                    <input type="number" id="udice_code" class="form-control" name="udice_code"
                                        value="{{ $school->udice_code }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="testtea">Head Teacher</label>
                                    <input type="text" id="testtea" class="form-control" name="contact" disabled
                                        value="{{ $school->headTeacher->teacher_first_name }} {{ $school->headTeacher->teacher_last_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="testtea">Head Teacher Number</label>
                                    <input type="number" id="testtea" class="form-control" name="contact" disabled
                                        value="{{ $school->headTeacher->teacher_mobile }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="testtea">Head Teacher Email</label>
                                    <input type="email" id="testtea" class="form-control" name="fname"
                                        placeholder="Head Teacher Email" disabled
                                        value="{{ $school->headTeacher->teacher_email }}" />
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
                                    <label class="form-label" for="village">Village </label>
                                    <input type="text" id="village" class="form-control" name="village"
                                        placeholder="Village " value="{{ $school->village }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="cluster">Cluster </label>
                                    <input type="text" id="cluster" class="form-control" name="cluster"
                                        placeholder="Cluster " value="{{ $school->cluster }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="block">Block </label>
                                    <input type="text" id="block" class="form-control" name="block" placeholder="Block "
                                        value="{{ $school->block }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="district">District </label>
                                    <input type="text" id="district" class="form-control" name="district"
                                        placeholder="District " value="{{ $school->district }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="state">State </label>
                                    <input type="text" id="state" class="form-control" name="state" placeholder="State "
                                        value="{{ $school->state }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pin">PinCode </label>
                                    <input type="number" id="pin" class="form-control" name="pin" placeholder="PinCode "
                                        value="{{ $school->pin }}" />
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
                                    <label class="form-label" for="school_category">School Category </label>
                                    <input type="text" id="school_category" class="form-control" name="school_category"
                                        value="{{ $school->school_category }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="school_medium">School Medium </label>
                                    <select name="school_medium" id="school_medium"
                                        class="form-select text-capitalize mb-md-0 mb-2xx">
                                        <option value="">Select Option</option>

                                        <option value="Assamese" @php if($school->school_medium == "Assamese" ) {
                                            @endphp selected="selected" @php } @endphp >Assamese</option>
                                        <option value="Bodo" @php if($school->school_medium == 'Bodo' ) { @endphp
                                            selected="selected" @php } @endphp>Bodo</option>
                                        <option value="Bengali" @php if($school->school_medium == 'Bengali' ) { @endphp
                                            selected="selected" @php } @endphp>Bengali</option>
                                        <option value="Hindi" @php if($school->school_medium == 'Hindi' ) { @endphp
                                            selected="selected" @php } @endphp>Hindi</option>

                                    </select>
                                    <!-- <input type="text" id="testtea" class="form-control" name="contact"
                                        placeholder="School Type " /> -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_from">Class From </label>
                                    <input type="text" id="class_from" class="form-control" name="class_from"
                                        placeholder="Class From " value="{{ $school->class_from }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_to">Class To </label>
                                    <input type="text" id="class_to" class="form-control" name="class_to"
                                        placeholder="Class To " value="{{ $school->class_to }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="state_management">State Management </label>
                                    <input type="text" id="state_management" class="form-control"
                                        name="state_management" placeholder="State Management "
                                        value="{{ $school->state_management }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="national_management">National Management </label>
                                    <input type="text" id="national_management" class="form-control"
                                        name="national_management" placeholder="National Management "
                                        value="{{ $school->national_management }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="status">Status </label>
                                    <input type="text" id="status" class="form-control"
                                        name="status" placeholder="Status "
                                        value="{{ $school->status }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="location">Location </label>
                                    <input type="text" id="location" class="form-control" name="location"
                                        placeholder="PinCoLocationde " value="{{ $school->location }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="aff_board_sec">Aff Board Sec </label>
                                    <input type="text" id="aff_board_sec" class="form-control" name="aff_board_sec"
                                        placeholder="Aff Board Sec " value="{{ $school->aff_board_sec }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="add_board_h_sec">Aff Board H.Sec </label>
                                    <input type="text" id="add_board_h_sec" class="form-control" name="add_board_h_sec"
                                        placeholder="Aff Board H.Sec " value="{{ $school->add_board_h_sec }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="year_of_establishment">Year of Establishment </label>
                                    <input type="text" id="year_of_establishment" class="form-control" name="year_of_establishment"
                                        placeholder="Year of Establishment " value="{{ $school->year_of_establishment }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="pre_primary">Pre-Primary </label>
                                    <input type="text" id="pre_primary" class="form-control" name="pre_primary"
                                        placeholder="Pre-Primary " value="{{ $school->pre_primary }}" />
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
                                    <label class="form-label" for="building_status">Building Status </label>
                                    <input type="text" id="building_status" class="form-control" name="building_status"
                                        placeholder="Building Status "
                                        value="{{ $school->schoolFacility->building_status }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="coundary_wall">Boundary Wall </label>
                                    <input type="text" id="coundary_wall" class="form-control" name="coundary_wall"
                                        placeholder="Boundary Wall "
                                        value="{{ $school->schoolFacility->coundary_wall }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="no_of_boys_toilets">No. of Boys Toilets </label>
                                    <input type="text" id="no_of_boys_toilets" class="form-control"
                                        name="no_of_boys_toilets" placeholder="No. of Boys Toilets "
                                        value="{{ $school->schoolFacility->no_of_boys_toilets }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="no_of_girls_toilets">No. of Girls Toilets </label>
                                    <input type="text" id="no_of_girls_toilets" class="form-control"
                                        name="no_of_girls_toilets" placeholder="No. of Girls Toilets "
                                        value="{{ $school->schoolFacility->no_of_girls_toilets }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="no_of_cwsn_toilets">No. of CWSN Toilets </label>
                                    <input type="text" id="no_of_cwsn_toilets" class="form-control"
                                        name="no_of_cwsn_toilets" placeholder="No. of CWSN Toilets "
                                        value="{{ $school->schoolFacility->no_of_cwsn_toilets }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="drinking_water_availability">Drinking Water
                                        Availability
                                    </label>
                                    <input type="text" id="drinking_water_availability" class="form-control"
                                        name="drinking_water_availability" placeholder="Drinking Water Availability "
                                        value="{{ $school->schoolFacility->drinking_water_availability }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="hand_wash_facility">Hand Wash Facility </label>
                                    <input type="text" id="hand_wash_facility" class="form-control"
                                        name="hand_wash_facility" placeholder="Hand Wash Facility "
                                        value="{{ $school->schoolFacility->hand_wash_facility }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_generator">Functional Generator </label>
                                    <input type="text" id="functional_generator" class="form-control"
                                        name="functional_generator" placeholder="Functional Generator "
                                        value="{{ $school->schoolFacility->functional_generator }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="library">Library </label>
                                    <input type="text" id="library" class="form-control" name="library"
                                        placeholder="Library " value="{{ $school->schoolFacility->library }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="reading_corner">PinCode </label>
                                    <input type="text" id="reading_corner" class="form-control" name="reading_corner"
                                        placeholder="PinCode " value="{{ $school->schoolFacility->reading_corner }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="book_bank">Reading Corner </label>
                                    <input type="text" id="book_bank" class="form-control" name="book_bank"
                                        placeholder="Reading Corner "
                                        value="{{ $school->schoolFacility->book_bank }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="book_bank">Book Bank </label>
                                    <input type="text" id="book_bank" class="form-control" name="book_bank"
                                        placeholder="Book Bank " value="{{ $school->schoolFacility->book_bank }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_laptop">Functional Laptop </label>
                                    <input type="text" id="functional_laptop" class="form-control"
                                        name="functional_laptop" placeholder="Functional Laptop "
                                        value="{{ $school->schoolFacility->functional_laptop }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_desktop">Functional Desktop </label>
                                    <input type="text" id="functional_desktop" class="form-control"
                                        name="functional_desktop" placeholder="Functional Desktop "
                                        value="{{ $school->schoolFacility->functional_desktop }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_tablet">Functional Tablet </label>
                                    <input type="text" id="functional_tablet" class="form-control"
                                        name="functional_tablet" placeholder="Functional Tablet "
                                        value="{{ $school->schoolFacility->functional_tablet }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_scanner">Functional Scanner </label>
                                    <input type="text" id="functional_scanner" class="form-control"
                                        name="functional_scanner" placeholder="Functional Scanner "
                                        value="{{ $school->schoolFacility->functional_scanner }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_printer">Functional Printer </label>
                                    <input type="text" id="functional_printer" class="form-control"
                                        name="functional_printer" placeholder="Functional Printer "
                                        value="{{ $school->schoolFacility->functional_printer }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_led">Functional LED </label>
                                    <input type="text" id="functional_led" class="form-control" name="functional_led"
                                        placeholder="Functional LED "
                                        value="{{ $school->schoolFacility->functional_led }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_digiboard">Functional DigiBoard </label>
                                    <input type="text" id="functional_digiboard" class="form-control"
                                        name="functional_digiboard" placeholder="Functional DigiBoard "
                                        value="{{ $school->schoolFacility->functional_digiboard }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_digiboard">Internet </label>
                                    <input type="text" id="functional_digiboard" class="form-control"
                                        name="functional_digiboard" placeholder="Internet "
                                        value="{{ $school->schoolFacility->functional_digiboard }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="dth">DTH </label>
                                    <input type="text" id="dth" class="form-control" name="dth" placeholder="DTH "
                                        value="{{ $school->schoolFacility->dth }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="functional_web_cam">Functional Web Cam </label>
                                    <input type="text" id="functional_web_cam" class="form-control"
                                        name="functional_web_cam" placeholder="Functional Web Cam "
                                        value="{{ $school->schoolFacility->functional_web_cam }}" />
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
                                    <label class="form-label" for="class_rooms">Class Rooms </label>
                                    <input type="text" id="class_rooms" class="form-control" name="class_rooms"
                                        placeholder="Class Rooms " value="{{ $school->class_rooms }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="other_rooms">Other Rooms </label>
                                    <input type="text" id="other_rooms" class="form-control" name="other_rooms"
                                        placeholder="Other Rooms " value="{{ $school->other_rooms }}" />
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
                                    <label class="form-label" for="testtea">Pre-pre_primary </label>
                                    <input type="text" id="pre_primary" class="form-control" name="pre_primary"
                                        placeholder="Pre-Primary "
                                        value="{{ $school->schoolEnreolmentOfStudent->pre_primary }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_1">Class I </label>
                                    <input type="text" id="class_1" class="form-control" name="class_1" placeholder="I "
                                        value="{{ $school->schoolEnreolmentOfStudent->class_1 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_2">Class II </label>
                                    <input type="text" id="class_2" class="form-control" name="class_2"
                                        placeholder="II " value="{{ $school->schoolEnreolmentOfStudent->class_2 }}" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_3">Class III </label>
                                    <input type="text" id="class_3" class="form-control" name="class_3"
                                        placeholder="III " value="{{ $school->schoolEnreolmentOfStudent->class_3 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_4">Class IV </label>
                                    <input type="number" id="class_4" class="form-control" name="class_4"
                                        placeholder="IV " value="{{ $school->schoolEnreolmentOfStudent->class_4 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_5">Class V </label>
                                    <input type="number" id="class_5" class="form-control" name="class_5"
                                        placeholder="V " value="{{ $school->schoolEnreolmentOfStudent->class_5 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_6">Class VI </label>
                                    <input type="number" id="class_6" class="form-control" name="class_6"
                                        placeholder="VI " value="{{ $school->schoolEnreolmentOfStudent->class_6 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_7">Class VII </label>
                                    <input type="number" id="class_7" class="form-control" name="class_7"
                                        placeholder="VII " value="{{ $school->schoolEnreolmentOfStudent->class_7 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_8">Class VIII </label>
                                    <input type="number" id="class_8" class="form-control" name="class_8"
                                        placeholder="VIII " value="{{ $school->schoolEnreolmentOfStudent->class_8 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_9">Class IX </label>
                                    <input type="number" id="class_9" class="form-control" name="class_9"
                                        placeholder="IX " value="{{ $school->schoolEnreolmentOfStudent->class_9 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_10">Class X </label>
                                    <input type="number" id="class_10" class="form-control" name="class_10"
                                        placeholder="X " value="{{ $school->schoolEnreolmentOfStudent->class_10 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_11">Class XI </label>
                                    <input type="number" id="class_11" class="form-control" name="class_11"
                                        placeholder="XI " value="{{ $school->schoolEnreolmentOfStudent->class_11 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="testtea">Class XII </label>
                                    <input type="number" id="testtea" class="form-control" name="testtea"
                                        placeholder="State "
                                        value="{{ $school->schoolEnreolmentOfStudent->school_name }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_12">Class XII </label>
                                    <input type="number" id="class_12" class="form-control" name="class_12"
                                        placeholder="PinCode "
                                        value="{{ $school->schoolEnreolmentOfStudent->class_12 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_1_12">Class(1-12) </label>
                                    <input type="number" id="class_1_12" class="form-control" name="class_1_12"
                                        placeholder="Class(1-12) "
                                        value="{{ $school->schoolEnreolmentOfStudent->class_1_12 }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="class_1_12_with_pre_primary">Class(1-12) With
                                        Pre-Primary
                                    </label>
                                    <input type="number" id="class_1_12_with_pre_primary" class="form-control"
                                        name="class_1_12_with_pre_primary" placeholder="Class(1-12) With Pre-Primary"
                                        value="{{ $school->schoolEnreolmentOfStudent->class_1_12_with_pre_primary }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_male_students">Total Male Students
                                    </label>
                                    <input type="number" id="total_male_students" class="form-control"
                                        name="total_male_students" placeholder="Total Male Students"
                                        value="{{ $school->schoolEnreolmentOfStudent->total_male_students }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_female_students">Total Female Students
                                    </label>
                                    <input type="number" id="total_female_students" class="form-control"
                                        name="total_female_students" placeholder="Total Female Students"
                                        value="{{ $school->schoolEnreolmentOfStudent->total_female_students }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="total_teachers">Total Teachers </label>
                                    <input type="number" id="total_teachers" class="form-control" name="total_teachers"
                                        placeholder="Total Teachers "
                                        value="{{ $school->schoolEnreolmentOfStudent->total_teachers }}" />
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1" id="btnUpdate">Update</button>
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

if ($("#schoolForm").length > 0) {
    $("#schoolForm").validate({
        rules: {
            school_name: {
                required: true,
                maxlength: 100
            },
            udice_code: {
                required: true,
                maxlength: 100
            },
            village: {
                required: true,
                maxlength: 100
            },
            cluster: {
                required: true,
                maxlength: 100
            },
            block: {
                required: true,
                maxlength: 100
            },
            district: {
                required: true,
                maxlength: 100
            },
            state: {
                required: true,
                maxlength: 100
            },
            pin: {
                required: true,
                maxlength: 100
            },
            class_from: {
                required: true,
                maxlength: 100
            },
            class_to: {
                required: true,
                maxlength: 100
            },
            school_type: {
                required: true,
                maxlength: 100
            },
            school_category: {
                required: true,
                maxlength: 100
            },
            school_medium: {
                required: true,
                maxlength: 100
            },
            state_management: {
                required: true,
                maxlength: 100
            },
            national_management: {
                required: true,
                maxlength: 100
            },
            status: {
                required: true,
                maxlength: 100
            },
            location: {
                required: true,
                maxlength: 100
            },
            aff_board_sec: {
                required: true,
                maxlength: 100
            },
            add_board_h_sec: {
                required: true,
                maxlength: 100
            },
            year_of_establishment: {
                required: true,
                maxlength: 100
            },
            pre_primary: {
                required: true,
                maxlength: 100
            },
            class_rooms: {
                required: true,
                maxlength: 100
            },
            other_rooms: {
                required: true,
                maxlength: 100
            },
            building_status: {
                required: true,
                maxlength: 100
            },
            coundary_wall: {
                required: true,
                maxlength: 100
            },
            no_of_boys_toilets: {
                required: true,
                maxlength: 100
            },
            no_of_girls_toilets: {
                required: true,
                maxlength: 100
            },
            no_of_cwsn_toilets: {
                required: true,
                maxlength: 100
            },
            drinking_water_availability: {
                required: true,
                maxlength: 100
            },
            hand_wash_facility: {
                required: true,
                maxlength: 100
            },
            functional_generator: {
                required: true,
                maxlength: 100
            },
            library: {
                required: true,
                maxlength: 100
            },
            reading_corner: {
                required: true,
                maxlength: 100
            },
            book_bank: {
                required: true,
                maxlength: 100
            },
            functional_laptop: {
                required: true,
                maxlength: 100
            },
            functional_desktop: {
                required: true,
                maxlength: 100
            },
            functional_tablet: {
                required: true,
                maxlength: 100
            },
            functional_scanner: {
                required: true,
                maxlength: 100
            },
            functional_printer: {
                required: true,
                maxlength: 100
            },
            functional_led: {
                required: true,
                maxlength: 100
            },
            functional_digiboard: {
                required: true,
                maxlength: 100
            },
            internet: {
                required: true,
                maxlength: 100
            },
            dth: {
                required: true,
                maxlength: 100
            },
            functional_web_cam: {
                required: true,
                maxlength: 100
            },
            pre_primary: {
                required: true,
                maxlength: 100
            },
            class_1: {
                required: true,
                maxlength: 100
            },
            class_2: {
                required: true,
                maxlength: 100
            },
            class_3: {
                required: true,
                maxlength: 100
            },
            class_4: {
                required: true,
                maxlength: 100
            },
            class_5: {
                required: true,
                maxlength: 100
            },
            class_6: {
                required: true,
                maxlength: 100
            },
            class_7: {
                required: true,
                maxlength: 100
            },
            class_8: {
                required: true,
                maxlength: 100
            },
            class_9: {
                required: true,
                maxlength: 100
            },
            class_10: {
                required: true,
                maxlength: 100
            },
            class_11: {
                required: true,
                maxlength: 100
            },
            class_12: {
                required: true,
                maxlength: 100
            },
            class_1_12: {
                required: true,
                maxlength: 100
            },
            class_1_12_with_pre_primary: {
                required: true,
                maxlength: 100
            },
            total_male_students: {
                required: true,
                maxlength: 100
            },
            total_female_students: {
                required: true,
                maxlength: 100
            },
            total_teachers: {
                required: true,
                maxlength: 100
            },

        },
        messages: {
            school_name: {
                required: "Please enter School Name",
                maxlength: "School Name should be 100 characters long."
            },
            udice_code: {
                required: "Please enter UDICE CODE",
                maxlength: "UDICE CODE should be 100 characters long."
            },
            village: {
                required: "Please enter Village",
                maxlength: "Village should be 100 characters long."
            },
            cluster: {
                required: "Please enter Cluster",
                maxlength: "Cluster should be 100 characters long."
            },
            block: {
                required: "Please enter Block",
                maxlength: "Block should be 100 characters long."
            },
            district: {
                required: "Please enter District",
                maxlength: "District should be 100 characters long."
            },
            state: {
                required: "Please enter State",
                maxlength: "State should be 100 characters long."
            },
            pin: {
                required: "Please enter PIN",
                maxlength: "PIN should be 100 characters long."
            },
            class_from: {
                required: "Please enter Class Form",
                maxlength: "Class Form should be 100 characters long."
            },
            class_to: {
                required: "Please enter Class To",
                maxlength: "Class To should be 100 characters long."
            },
            school_type: {
                required: "Please enter School Type",
                maxlength: "School Type should be 100 characters long."
            },
            school_category: {
                required: "Please enter TEST",
                maxlength: "TEST should be 100 characters long."
            },
            school_medium: {
                required: "Please enter School Medium",
                maxlength: "School Medium should be 100 characters long."
            },
            state_management: {
                required: "Please enter State Mangement",
                maxlength: "State Mangement should be 100 characters long."
            },
            national_management: {
                required: "Please enter National Management",
                maxlength: "National Management should be 100 characters long."
            },
            status: {
                required: "Please enter Status",
                maxlength: "Status should be 100 characters long."
            },
            location: {
                required: "Please enter Location",
                maxlength: "Location should be 100 characters long."
            },
            aff_board_sec: {
                required: "Please enter Aff Board Sec",
                maxlength: "Aff Board Sec should be 100 characters long."
            },
            add_board_h_sec: {
                required: "Please enter Add Board H.Sec",
                maxlength: "Add Board H.Sec should be 100 characters long."
            },
            year_of_establishment: {
                required: "Please enter Year of Establishment",
                maxlength: "Year of Establishment should be 100 characters long."
            },
            pre_primary: {
                required: "Please enter Pre Primary",
                maxlength: "Pre Primary should be 100 characters long."
            },
            class_rooms: {
                required: "Please enter Class rooms",
                maxlength: "Class rooms should be 100 characters long."
            },
            other_rooms: {
                required: "Please enter Other rooms",
                maxlength: " Other rooms should be 100 characters long."
            },
            building_status: {
                required: "Please enter Building Status",
                maxlength: "Building Status should be 100 characters long."
            },
            coundary_wall: {
                required: "Please enter Boundary Wall",
                maxlength: "Boundary Wall should be 100 characters long."
            },
            no_of_boys_toilets: {
                required: "Please enter No of Boys Toilet",
                maxlength: " No of Boys Toilet should be 100 characters long."
            },
            no_of_girls_toilets: {
                required: "Please enter No of Girls Toilet",
                maxlength: "No of Girls Toilet should be 100 characters long."
            },
            no_of_cwsn_toilets: {
                required: "Please enter No of CWSN Toilet",
                maxlength: "No of CWSN Toilet should be 100 characters long."
            },
            drinking_water_availability: {
                required: "Please enter Drinking Water Availability",
                maxlength: "Drinking Water Availability should be 100 characters long."
            },
            hand_wash_facility: {
                required: "Please enter Hand wash facility",
                maxlength: "Hand wash facility should be 100 characters long."
            },
            functional_generator: {
                required: "Please enter functional generator",
                maxlength: "functional generator should be 100 characters long."
            },
            library: {
                required: "Please enter Library",
                maxlength: "Library should be 100 characters long."
            },
            reading_corner: {
                required: "Please enter Reading Corner",
                maxlength: "Reading Corner should be 100 characters long."
            },
            book_bank: {
                required: "Please enter Book Bank",
                maxlength: "Book Bank should be 100 characters long."
            },
            functional_laptop: {
                required: "Please enter Functional Laptop",
                maxlength: "Functional Laptop should be 100 characters long."
            },
            functional_desktop: {
                required: "Please enter Functonal Desctop",
                maxlength: "Functonal Desctop should be 100 characters long."
            },
            functional_tablet: {
                required: "Please enter Functonal Tablet",
                maxlength: "Functonal Tablet should be 100 characters long."
            },
            functional_scanner: {
                required: "Please enter Functonal Scanner",
                maxlength: "Functonal Scanner should be 100 characters long."
            },
            functional_printer: {
                required: "Please enter Functonal Printer",
                maxlength: "Functonal Printer should be 100 characters long."
            },
            functional_led: {
                required: "Please enter Functonal LED",
                maxlength: "Functonal LED should be 100 characters long."
            },
            functional_digiboard: {
                required: "Please enter Functonal Digiboard",
                maxlength: "Functonal Digiboard should be 100 characters long."
            },
            internet: {
                required: "Please enter Intenet",
                maxlength: "Intenet should be 100 characters long."
            },
            dth: {
                required: "Please enter DTH",
                maxlength: "DTH should be 100 characters long."
            },
            functional_web_cam: {
                required: "Please enter Functional Web Cam",
                maxlength: "Functional Web Cam should be 100 characters long."
            },
            pre_primary: {
                required: "Please enter Pre primary",
                maxlength: "Pre primary should be 100 characters long."
            },
            class_1: {
                required: "Please enter Class 1",
                maxlength: "Class 1 should be 100 characters long."
            },
            class_2: {
                required: "Please enter Class 2",
                maxlength: "Class 2 should be 100 characters long."
            },
            class_3: {
                required: "Please enter Class 3",
                maxlength: "Class 3 should be 100 characters long."
            },
            class_4: {
                required: "Please enter Class 4",
                maxlength: "Class 4 should be 100 characters long."
            },
            class_5: {
                required: "Please enter Class 5",
                maxlength: "Class 5 should be 100 characters long."
            },
            class_6: {
                required: "Please enter Class 6",
                maxlength: "Class 6 should be 100 characters long."
            },
            class_7: {
                required: "Please enter Class 7",
                maxlength: "Class 7 should be 100 characters long."
            },
            class_8: {
                required: "Please enter Class 8",
                maxlength: "Class 8 should be 100 characters long."
            },
            class_9: {
                required: "Please enter Class 9",
                maxlength: "Class 9 should be 100 characters long."
            },
            class_10: {
                required: "Please enter Class 10",
                maxlength: "Class 10 should be 100 characters long."
            },
            class_11: {
                required: "Please enter Class1 11",
                maxlength: "Class 11 should be 100 characters long."
            },
            class_12: {
                required: "Please enter Class 12",
                maxlength: "Class 12 should be 100 characters long."
            },
            class_1_12: {
                required: "Please enter Class 1 to 12",
                maxlength: "Class 1 to 12 should be 100 characters long."
            },
            class_1_12_with_pre_primary: {
                required: "Please enter Class 1 to 12 With Pre primary",
                maxlength: "Class 1 to 12 With Pre primary should be 100 characters long."
            },
            total_male_students: {
                required: "Please enter Total Male Student",
                maxlength: "Total Male Student should be 100 characters long."
            },
            total_female_students: {
                required: "Please enter Total Female Student",
                maxlength: "Total Female Student should be 100 characters long."
            },
            total_teachers: {
                required: "Please enter Total Teacher",
                maxlength: "Total Teacher should be 100 characters long."
            },

        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnUpdate').html('Please Wait...');
            $("#btnUpdate").attr("disabled", true);
            debugger;

            var form = $('#schoolForm')[0];
            var data = new FormData(form);
            //console.log(data);
            var data2 = $('#schoolForm').serialize();
            console.log(data2);

            $.ajax({
                url: "{{url('edit-school-details')}}",
                enctype: 'multipart/form-data',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $('#btnUpdate').html('Submit');
                    $("#btnUpdate").attr("disabled", false);

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
                    $('#btnUpdate').html('Submit');
                    $("#btnUpdate").attr("disabled", false);

                    toastr['error'](
                        'Failed to Update School Details. Please try again.',
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