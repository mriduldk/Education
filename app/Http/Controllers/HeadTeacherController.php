<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\SchoolEntrolmentOfStudent;
use App\Models\SchoolFacilities;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HeadTeacherController extends Controller
{
    public function headTeacherDashboard()
    {

        $school_id = Auth::guard('teacher')->user()->fk_school_id;

        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();

        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        $school['schoolFacility'] = $schoolFacility;
        $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        $school['headTeacher'] = $teacher;

        return view('/headTeacher/headTeacherDashboard')->with('school', $school);
    }

    public function allTeacherList()
    {
        return view('/headTeacher/allTeacherList');
    }

    public function EditSchoolDetails()
    {

        $school_id = Auth::guard('teacher')->user()->fk_school_id;

        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();

        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        $school['schoolFacility'] = $schoolFacility;
        $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        $school['headTeacher'] = $teacher;

        return view('/headTeacher/editSchoolDetails')->with('school', $school);
    }
    public function UpdateSchoolDetails(Request $request)
    {

        $school_id = Auth::guard('teacher')->user()->fk_school_id;

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();
        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school_id)->first();

        if(empty($teacher)) {

            return response()->errorNotFound('Teacher Data not found.');

        } else if(empty($school)) {

            return response()->errorNotFound('School data not found.');

        } else if(empty($schoolFacility)) {

            return response()->errorNotFound('School Facility data not found.');

        } else if(empty($schoolEnreolmentOfStudent)) {

            return response()->errorNotFound('School Student Entrolment data not found.');

        } else {

            $school->school_name = $request->school_name;
            $school->udice_code = $request->udice_code;
            $school->village = $request->village;
            $school->cluster = $request->cluster;
            $school->block = $request->block;
            $school->district = $request->district;
            $school->state = $request->state;
            $school->pin = $request->pin;
            $school->class_from = $request->class_from;
            $school->class_to = $request->class_to;
            $school->school_type = $request->school_type;
            $school->school_category = $request->school_category;
            $school->school_medium = $request->school_medium;
            $school->state_management = $request->state_management;
            $school->national_management = $request->national_management;
            $school->status = $request->status;
            $school->location = $request->location;
            $school->aff_board_sec = $request->aff_board_sec;
            $school->add_board_h_sec = $request->add_board_h_sec;
            $school->year_of_establishment = $request->year_of_establishment;
            $school->pre_primary = $request->pre_primary;
            $school->class_rooms = $request->class_rooms;
            $school->other_rooms = $request->other_rooms;
            $school->modified_by = Auth::guard('teacher')->user()->teacher_id;
            $school->modified_on = Carbon::now()->toDateTimeString();
            $school->save();

            $schoolFacility->building_status = $request->building_status;
            $schoolFacility->coundary_wall = $request->coundary_wall;
            $schoolFacility->no_of_boys_toilets = $request->no_of_boys_toilets;
            $schoolFacility->no_of_girls_toilets = $request->no_of_girls_toilets;
            $schoolFacility->no_of_cwsn_toilets = $request->no_of_cwsn_toilets;
            $schoolFacility->drinking_water_availability = $request->drinking_water_availability;
            $schoolFacility->hand_wash_facility = $request->hand_wash_facility;
            $schoolFacility->functional_generator = $request->functional_generator;
            $schoolFacility->library = $request->library;
            $schoolFacility->reading_corner = $request->reading_corner;
            $schoolFacility->book_bank = $request->book_bank;
            $schoolFacility->functional_laptop = $request->functional_laptop;
            $schoolFacility->functional_desktop = $request->functional_desktop;
            $schoolFacility->functional_tablet = $request->functional_tablet;
            $schoolFacility->functional_scanner = $request->functional_scanner;
            $schoolFacility->functional_printer = $request->functional_printer;
            $schoolFacility->functional_led = $request->functional_led;
            $schoolFacility->functional_digiboard = $request->functional_digiboard;
            $schoolFacility->internet = $request->internet;
            $schoolFacility->dth = $request->dth;
            $schoolFacility->functional_web_cam = $request->functional_web_cam;
            $schoolFacility->modified_by = Auth::guard('teacher')->user()->teacher_id;
            $schoolFacility->modified_on = Carbon::now()->toDateTimeString();
            $schoolFacility->save();

            $schoolEnreolmentOfStudent->pre_primary = $request->pre_primary;
            $schoolEnreolmentOfStudent->class_1 = $request->class_1;
            $schoolEnreolmentOfStudent->class_2 = $request->class_2;
            $schoolEnreolmentOfStudent->class_3 = $request->class_3;
            $schoolEnreolmentOfStudent->class_4 = $request->class_4;
            $schoolEnreolmentOfStudent->class_5 = $request->class_5;
            $schoolEnreolmentOfStudent->class_6 = $request->class_6;
            $schoolEnreolmentOfStudent->class_7 = $request->class_7;
            $schoolEnreolmentOfStudent->class_8 = $request->class_8;
            $schoolEnreolmentOfStudent->class_9 = $request->class_9;
            $schoolEnreolmentOfStudent->class_10 = $request->class_10;
            $schoolEnreolmentOfStudent->class_11 = $request->class_11;
            $schoolEnreolmentOfStudent->class_12 = $request->class_12;
            $schoolEnreolmentOfStudent->class_1_12 = $request->class_1_12;
            $schoolEnreolmentOfStudent->class_1_12_with_pre_primary = $request->class_1_12_with_pre_primary;
            $schoolEnreolmentOfStudent->total_male_students = $request->total_male_students;
            $schoolEnreolmentOfStudent->total_female_students = $request->total_female_students;
            $schoolEnreolmentOfStudent->total_teachers = $request->total_teachers;
            $schoolEnreolmentOfStudent->modified_by = Auth::guard('teacher')->user()->teacher_id;
            $schoolEnreolmentOfStudent->modified_on = Carbon::now()->toDateTimeString();
            $schoolEnreolmentOfStudent->save();

    
            return response()->success('School Details updated successfully', 'school', null);
        }
    }



    public function editHeadTeacher()
    {
        return view('/headTeacher/editHeadTeacher');
    }

    public function addTeacher(){
        return view ('headTeacher/addTeacher');
    }   
    public function bmcDashboard(){
        return view('bmcDashboard/bmcDashboard');
    }
    public function AccessRoles(){
        return view('accessRoles/AccessRoles');
    }
    public function dataEntryOperator(){
        return view('accessRoles/dataEntryOperator');
    }
    public function  addSchool(){
        return view('bmcDashboard/addSchool');
    }
    public function teacherDatas(){
        return view('headTeacher/teacherDatas');
    }







}