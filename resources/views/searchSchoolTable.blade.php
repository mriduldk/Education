@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
<section id="basic-datatable">

    <div class="row m-5" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">School Details</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <!-- School Details -->
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="datatables-basic table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>UDICE CODE</th>
                                <th>School Name</th>
                                <th>Regional Details</th>
                                <th>Basic Details</th>
                                <th>Schol status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($schools as $school)
                            <tr class="text-left text-black">
                                <td class="text-center">@php echo $index; $index = $index + 1; @endphp</td>
                                <td class="text-center">{{ $school->udice_code }}</td>
                                <td class="text-center">{{ $school->school_name }}</td>
                                <td >Village : {{ $school->village }}<br>
                                    Cluster : {{ $school->cluster }}<br>
                                    Block : {{ $school->block }}<br>
                                    District : {{ $school->district }}<br>
                                    State : {{ $school->state }}<br>
                                    PIN : {{ $school->pin }}</td>
                                <td>State Mgmt. : {{ $school->state_management }}<br>
                                    National Mgmt. : {{ $school->national_management }}<br>
                                    School Category : {{ $school->school_category }}<br>
                                    School Type : {{ $school->school_type }}</td>
                                <td class="bg-success text-white text-center"><b>{{ $school->status }}</b></td>
                                <td><a class="btn btn-info" href="{{ route('searchSchoolDetails', ['id' => $school->school_id]) }}"> <i data-feather='external-link'></i>   View Details</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />

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
@endsection
@section('page-script')
{{-- Page js files --}}
<!-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> -->
@endsection