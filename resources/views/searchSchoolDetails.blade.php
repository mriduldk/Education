@extends('layouts/contentLayoutMaster')

@section('title', 'School Details')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/maps/leaflet.min.css')) }}">

<!-- JQUery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<!-- Font Aswome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-swiper.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/maps/map-leaflet.css')) }}">

@endsection


@section('content')


<section id="basic-datatable">

    <div id="divSchoolProfile">

        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="fa-person-simple"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">@php echo
                            $school->schoolEnreolmentOfStudent->class_1_12_with_pre_primary; @endphp</h2>
                        <p class="card-text">Total Students</p>
                    </div>
                    <div id="line-area-chart-1"></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="credit-card" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">@php echo $school->schoolEnreolmentOfStudent->total_male_students;
                            @endphp</h2>
                        <p class="card-text">Total Male students</p>
                    </div>
                    <div id="line-area-chart-2"></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">

                                <i class="fa-solid fa-person-dress-simple"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">@php echo $school->schoolEnreolmentOfStudent->total_female_students;
                            @endphp</h2>
                        <p class="card-text">Total Female Students</p>
                    </div>
                    <div id="line-area-chart-3"></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="package" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">@php echo $school->schoolEnreolmentOfStudent->total_teachers; @endphp
                        </h2>
                        <p class="card-text">Total Teachers</p>
                    </div>
                    <div id="line-area-chart-4"></div>
                </div>
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

        <div class="row">
            <div class="col-sm-12">
                <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Other Details of School</h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion-border" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#accordionOne" aria-expanded="false"
                                            aria-controls="accordionOne">
                                            <b>School Facilities</b>
                                        </button>
                                    </h2>
                                    <div id="accordionOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="card accordion-body">
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
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                            aria-expanded="false" aria-controls="accordionTwo">
                                            <b>Room Details</b>
                                        </button>
                                    </h2>
                                    <div id="accordionTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="card accordion-body">
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
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordionThree"
                                            aria-expanded="false" aria-controls="accordionThree">
                                            <b>No. of Students</b>
                                        </button>
                                    </h2>
                                    <div id="accordionThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="card accordion-body">
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
                                                            <td>@php echo
                                                                $school->schoolEnreolmentOfStudent->total_teachers;
                                                                @endphp</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="accordionFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                            aria-expanded="false" aria-controls="accordionFour">
                                            <b>Teacher's Information</b>
                                        </button>
                                    </h2>
                                    <div id="accordionFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="card accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Teacher Name</th>
                                                            <th>Employee Code</th>
                                                            <th>Teacher Category</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($school->teachers as $teacher)

                                                        <tr>
                                                            <td>@php echo $i; $i = $i + 1; @endphp</td>
                                                            <td>@php echo $teacher->teacher_first_name; echo
                                                                $teacher->teacher_last_name; @endphp</td>
                                                            <td>@php echo $teacher->teacher_employee_code; @endphp</td>
                                                            <td>@php echo $teacher->teacher_category_type; @endphp</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Gallery</h4>
            </div>
            <div class="card-body">
                <div class="swiper-gallery swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-11.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-12.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-13.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-14.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-15.jpg')}}" alt="banner" />
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper mt-25">
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-11.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-12.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-13.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-14.jpg')}}" alt="banner" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('images/banner/banner-15.jpg')}}" alt="banner" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">School Location (MAP)</h4>
                </div>
                <div class="card-body">
                    <div class="leaflet-map" id="drag-map"></div>
                </div>
            </div>
        </div>

    </div>



</section>


<script>
//$('#myTable').DataTable();
var dt_basic_table = $('.datatables-basic');
var dt_basic = dt_basic_table.DataTable();
</script>

@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/maps/leaflet.min.js'))}}"></script>

@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{asset(mix('js/scripts/components/components-accordion.js'))}}"></script>
<script src="{{ asset(mix('js/scripts/cards/card-statistics.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/extensions/ext-component-swiper.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/maps/map-leaflet.js'))}}"></script>

@endsection