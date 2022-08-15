<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolEntrolmentOfStudent;
use App\Models\SchoolFacilities;
use App\Models\Teacher;
use Illuminate\Http\Request;

class KnowYourSchoolController extends Controller
{


    public function knowYourSchool()
    {
        return view('/knowYourSchool');
    }

    public function kharithiHome()
    {
        return view('/kharithiHome');
    }

    public function searchSchoolDetails(string $school_id)
    {
        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();

        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $teachers = Teacher::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();

        $school['schoolFacility'] = $schoolFacility;
        $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        $school['teachers'] = $teachers;

        return view('/searchSchoolDetails')->with('school', $school);
    }


    
    public function show()
    {   
        $schools = School::all();

        foreach($schools as $school){

            $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
            $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
            $teachers = Teacher::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();

            $school['schoolFacility'] = $schoolFacility;
            $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
            $school['teachers'] = $teachers;

        }
        return view('/searchSchoolTable')->with('schools', $schools);
    }

    public function show2()
    {   
        //$schools = School::all();

        // foreach($schools as $school){

        //     $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
        //     $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
        //     $teachers = Teacher::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();

        //     $school['schoolFacility'] = $schoolFacility;
        //     $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        //     $school['teachers'] = $teachers;

        // }
        return view('/searchSchoolTableList');
    }

    public function allSchoolData()
    {   
        $schools = School::all();

        foreach($schools as $school){

            $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
            $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();
            $teachers = Teacher::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->get();

            $school['schoolFacility'] = $schoolFacility;
            $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
            $school['teachers'] = $teachers;

        }
        return $schools;
    }

    public function searchedSchoolData(Request $request)
    {
        
        $schools = School::where('is_deleted', 0);

        if($request->district != null && $request->district != "" ) {

            $schools = $schools->where('district','LIKE',"%{$request->district}%");
        }

        if($request->school_name != null && $request->school_name != "" ) {

            $schools = $schools->where('school_name','LIKE',"%{$request->school_name}%");
        }

        if($request->udice_code != null && $request->udice_code != "" ) {

            $schools = $schools->where('udice_code','LIKE',"%{$request->udice_code}%");
        }

        if($request->pin != null && $request->pin != "" ) {

            $schools = $schools->where('pin','LIKE',"%{$request->pin}%");
        }

        if($request->school_category != null && $request->school_category != "" ) {

            $schools = $schools->where('school_category','LIKE',"%{$request->school_category}%");
        }

        $schools = $schools->get();

        return $schools;
    }


}
