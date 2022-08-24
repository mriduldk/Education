<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\SchoolEntrolmentOfStudent;
use App\Models\SchoolFacilities;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\SchoolStudentDetails;
use App\Models\TeacherAcademicQualification;
use App\Models\TeacherDependentFamily;
use App\Models\TeacherProfessionalQualification;
use App\Models\TeacherSalaryAccountDetails;
use App\Models\TeacherServiceDetails;
use App\Models\TeacherStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SchoolStudentDetailsController extends Controller
{
    public function AddSchoolStudentDetailsPage()
    {
        return view('headTeacher/InsertSchoolStudentDetails');
    }
    public function EditSchoolStudentDetailsPage(string $id)
    {
        $schoolStudentDetails = SchoolStudentDetails::where('is_deleted', 0)->where('school_sd_id', $id)->first();

        return view('headTeacher/EditSchoolStudentDetails')->with('schoolStudentDetails', $schoolStudentDetails);
    }

    public function InsertSchoolStudentDetails(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'total_student' => 'required',
            'total_male_student' => 'required',
            'total_female_student' => 'required',
            'general' => 'required',
            'sc' => 'required',
            'st' => 'required',
            'obc' => 'required',
            'minority' => 'required',
            'bpl' => 'required',
            'tea_tribe' => 'required',
            'others' => 'required',
            'students_having_aadhaar_card' => 'required',
            'students_having_bank_account' => 'required',
            'pwd_cwsc' => 'required',
            'average_age' => 'required'
        ]);


        $studentDetailsExisting = SchoolStudentDetails::where('is_deleted', 0)->where('fk_school_id', Auth::guard('headTeacher')->user()->fk_school_id)->where('class', $request->class)->first();

        if(empty($studentDetailsExisting)) {

            $schoolStudentDetails = new SchoolStudentDetails();

            $schoolStudentDetails->school_sd_id = GenerateID::getId();
            $schoolStudentDetails->fk_school_id = Auth::guard('headTeacher')->user()->fk_school_id;
            $schoolStudentDetails->class = $request->class;
            $schoolStudentDetails->total_student = $request->total_student;
            $schoolStudentDetails->total_male_student = $request->total_male_student;
            $schoolStudentDetails->total_female_student = $request->total_female_student;
            $schoolStudentDetails->general = $request->general;
            $schoolStudentDetails->sc = $request->sc;
            $schoolStudentDetails->st = $request->st;
            $schoolStudentDetails->obc = $request->obc;
            $schoolStudentDetails->minority = $request->minority;
            $schoolStudentDetails->bpl = $request->bpl;
            $schoolStudentDetails->tea_tribe = $request->tea_tribe;
            $schoolStudentDetails->others = $request->others;
            $schoolStudentDetails->students_having_aadhaar_card = $request->students_having_aadhaar_card;
            $schoolStudentDetails->students_having_bank_account = $request->students_having_bank_account;
            $schoolStudentDetails->pwd_cwsc = $request->pwd_cwsc;
            $schoolStudentDetails->average_age = $request->average_age;
            $schoolStudentDetails->created_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolStudentDetails->created_on = Carbon::now()->toDateTimeString();
    
            $schoolStudentDetails ->save();
    
            UserActivityLogController::AddUserActivityLogInsert($schoolStudentDetails->created_by, Auth::guard('headTeacher')->user()->teacher_id,  Auth::guard('headTeacher')->user()->teacher_first_name . ' ' . Auth::guard('headTeacher')->user()->teacher_last_name, "Student Details Inserted");
            
            return response()->success('Student Details Successfully Inserted', 'schoolStudentDetails', $schoolStudentDetails);

        } else {
            return response()->errorConflict('Student Details of This class already exists. Please Edit or Delete.');        
        }
    }
    public function UpdateSchoolStudentDetails(Request $request)
    {
        $request->validate([
            'school_sd_id' => 'required',
            'class' => 'required',
            'total_student' => 'required',
            'total_male_student' => 'required',
            'total_female_student' => 'required',
            'general' => 'required',
            'sc' => 'required',
            'st' => 'required',
            'obc' => 'required',
            'minority' => 'required',
            'bpl' => 'required',
            'tea_tribe' => 'required',
            'others' => 'required',
            'students_having_aadhaar_card' => 'required',
            'students_having_bank_account' => 'required',
            'pwd_cwsc' => 'required',
            'average_age' => 'required'
        ]);


        $schoolStudentDetails = SchoolStudentDetails::where('is_deleted', 0)->where('school_sd_id', $request->school_sd_id)->first();

        if(empty($schoolStudentDetails)) {            
            return response()->errorConflict('Student Details not found. Please try again.');
        } else {

            $schoolStudentDetails->class = $request->class;
            $schoolStudentDetails->total_student = $request->total_student;
            $schoolStudentDetails->total_male_student = $request->total_male_student;
            $schoolStudentDetails->total_female_student = $request->total_female_student;
            $schoolStudentDetails->general = $request->general;
            $schoolStudentDetails->sc = $request->sc;
            $schoolStudentDetails->st = $request->st;
            $schoolStudentDetails->obc = $request->obc;
            $schoolStudentDetails->minority = $request->minority;
            $schoolStudentDetails->bpl = $request->bpl;
            $schoolStudentDetails->tea_tribe = $request->tea_tribe;
            $schoolStudentDetails->others = $request->others;
            $schoolStudentDetails->students_having_aadhaar_card = $request->students_having_aadhaar_card;
            $schoolStudentDetails->students_having_bank_account = $request->students_having_bank_account;
            $schoolStudentDetails->pwd_cwsc = $request->pwd_cwsc;
            $schoolStudentDetails->average_age = $request->average_age;
            $schoolStudentDetails->modified_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolStudentDetails->modified_on = Carbon::now()->toDateTimeString();
    
            $schoolStudentDetails ->save();
    
            UserActivityLogController::AddUserActivityLogUpdate($schoolStudentDetails->created_by, Auth::guard('headTeacher')->user()->teacher_id,  Auth::guard('headTeacher')->user()->teacher_first_name . ' ' . Auth::guard('headTeacher')->user()->teacher_last_name, "Student Details Updated");
            
            return response()->success('Student Details Successfully Updated', 'schoolStudentDetails', $schoolStudentDetails);
        }
    }


}
