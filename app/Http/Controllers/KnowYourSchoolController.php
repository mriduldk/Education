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



}
