<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherAcademicQualification;
use Illuminate\Http\Request;
use App\Models\TeacherDependentFamily;
use App\Models\TeacherProfessionalQualification;
use App\Models\TeacherSalaryAccountDetails;
use App\Models\TeacherServiceDetails;
use App\Models\School;
use App\Models\TeacherLeave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\GenerateID;
use App\Models\TeacherStatus;
use Carbon\Carbon;

class TeacherInformationStoreController extends Controller
{
    

    public function InsertTeacher()
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/insert/insertTeacher')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function StoreTeacher(Request $request)
    {

        $request->validate([
            'teacher_employee_code'  => 'required',
            'teacher_first_name'  => 'required',
            'teacher_last_name'  => 'required',
            'teacher_gender'  => 'required',
            'teacher_dob'  => 'required',
            'teacher_caste'  => 'required',
            'teacher_religion'  => 'required',
            'teacher_nationality'  => 'required',
            'teacher_present_address'  => 'required',
            'teacher_parmanent_address'  => 'required',
            'teacher_aadhaar_no'  => 'required',
            'teacher_mother_name'  => 'required',
            'teacher_father_name'  => 'required',
            'teacher_identification_mark'  => 'required',
            'teacher_blood_group'  => 'required',
            'teacher_differntly_abled'  => 'required',
            'teacher_maritial_status'  => 'required',
            'teacher_spouse_name'  => 'required',
            'teacher_spouse_working_under_govt_serveice'  => 'required',
            'teacher_language'  => 'required',
            'teacher_tet_category'  => 'required',
            'teacher_category_type'  => 'required'
        ]);

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $teacher_id)->first();

        $teacher->teacher_employee_code =  $request->teacher_employee_code;
        $teacher->teacher_first_name =  $request->teacher_first_name;
        $teacher->teacher_last_name =  $request->teacher_last_name;
        $teacher->teacher_gender =  $request->teacher_gender;
        $teacher->teacher_dob =  $request->teacher_dob;
        $teacher->teacher_caste =  $request->teacher_caste;
        $teacher->teacher_religion = $request->teacher_religion;
        $teacher->teacher_nationality = $request->teacher_nationality;
        $teacher->teacher_present_address = $request->teacher_present_address;
        $teacher->teacher_parmanent_address = $request->teacher_parmanent_address;
        $teacher->teacher_aadhaar_no = $request->teacher_aadhaar_no;
        //$teacher->teacher_mobile = $request->teacher_mobile;
        //$teacher->teacher_email = $request->teacher_email;
        $teacher->teacher_mother_name = $request->teacher_mother_name;
        $teacher->teacher_father_name = $request->teacher_father_name;
        $teacher->teacher_identification_mark = $request->teacher_identification_mark;
        $teacher->teacher_blood_group = $request->teacher_blood_group;
        $teacher->teacher_differntly_abled = $request->teacher_differntly_abled;
        $teacher->teacher_maritial_status = $request->teacher_maritial_status;
        $teacher->teacher_spouse_name = $request->teacher_spouse_name;
        $teacher->teacher_spouse_working_under_govt_serveice = $request->teacher_spouse_working_under_govt_serveice;
        $teacher->teacher_language = $request->teacher_language;
        $teacher->teacher_tet_category = $request->teacher_tet_category;
        $teacher->teacher_category_type = $request->teacher_category_type;
        
        $teacher->is_submited = 1;
        $teacher->save();

        return response()->success('Teacehr Details Saved', 'teacher', null);

    }


   
    public function InsertEmployeementDetails()
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/insert/InsertEmployeementDetails')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function StoreEmployeementDetails(Request $request)
    {

        $request->validate([
            'post_name' => 'required',
            'medium_of_school' => 'required',
            'subjects' => 'required',
            'category_of_post' => 'required',
            'pay_scale' => 'required',
            'grade_pay' => 'required',
            'appointment_latter_no' => 'required',
            'appointment_date' => 'required',
            'post_creation_no' => 'required',
            'post_creation_date' => 'required',
            'date_of_effect_of_service_provincialisation' => 'required',
            'date_of_joining_in_service' => 'required',
            'date_of_joining_in_present_post' => 'required',
            'date_of_retirement' => 'required',
            'period_spent_on_non_teaching_assignment' => 'required'
        ]);

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherServiceDetails)) {
            return response()->errorNotFound('Teacher data not found. Try Again.');
        } else {
    
            $teacherServiceDetails->employeement_type =  $request->employeement_type;
            $teacherServiceDetails->pran_no =  $request->pran_no;
            $teacherServiceDetails->uan_no =  $request->uan_no;
            $teacherServiceDetails->ssa_contactual_appointment_order_no =  $request->ssa_contactual_appointment_order_no;
            $teacherServiceDetails->retention_no =  $request->retention_no;
            $teacherServiceDetails->service_confirmed =  $request->service_confirmed;

            $teacherServiceDetails->post_name =  $request->post_name;
            $teacherServiceDetails->medium_of_school = $request->medium_of_school;
            $teacherServiceDetails->subjects = $request->subjects;
            $teacherServiceDetails->category_of_post =  $request->category_of_post;
            $teacherServiceDetails->pay_scale =  $request->pay_scale;
            $teacherServiceDetails->grade_pay =  $request->grade_pay;
            $teacherServiceDetails->appointment_latter_no =  $request->appointment_latter_no;
            $teacherServiceDetails->appointment_date =  $request->appointment_date;
            $teacherServiceDetails->post_creation_no =  $request->post_creation_no;
            $teacherServiceDetails->post_creation_date =  $request->post_creation_date;
            $teacherServiceDetails->date_of_effect_of_service_provincialisation =  $request->date_of_effect_of_service_provincialisation;
            $teacherServiceDetails->date_of_joining_in_service =  $request->date_of_joining_in_service;
            $teacherServiceDetails->date_of_joining_in_present_post =  $request->date_of_joining_in_present_post;
            $teacherServiceDetails->date_of_retirement =  $request->date_of_retirement;
            $teacherServiceDetails->period_spent_on_non_teaching_assignment =  $request->period_spent_on_non_teaching_assignment;

            $teacherServiceDetails->is_submited = 1;
            $teacherServiceDetails->save();

            return response()->success('Teacehr Employeement Details Saved', 'teacherServiceDetails', null);
        }

        
    }
    

    
    public function InsertSalaryAccount(Request $request)
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/insert/InsertSalaryAccount')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function StoreSalaryAccount(Request $request)
    {
        $request->validate([
            'pan_no' => 'required',
            'account_no' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc' => 'required',
            'district_name_of_active_salary_account_no' => 'required',
            'state_name_of_active_salary_account_no' => 'required',
            'salary_payment_mode' => 'required',
            'gross_provoded_fund' => 'required',
            'group_insurance_scheme' => 'required'
        ]);

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherSalaryAccountDetails)) {
            return response()->errorNotFound('Teacher data not found. Try Again.');
        } else {
    
            $teacherSalaryAccountDetails->pan_no =  $request->pan_no;
            $teacherSalaryAccountDetails->account_no = $request->account_no;
            $teacherSalaryAccountDetails->account_name = $request->account_name;
            $teacherSalaryAccountDetails->bank_name =  $request->bank_name;
            $teacherSalaryAccountDetails->branch_name =  $request->branch_name;
            $teacherSalaryAccountDetails->ifsc =  $request->ifsc;
            $teacherSalaryAccountDetails->district_name_of_active_salary_account_no =  $request->district_name_of_active_salary_account_no;
            $teacherSalaryAccountDetails->state_name_of_active_salary_account_no =  $request->state_name_of_active_salary_account_no;
            $teacherSalaryAccountDetails->salary_payment_mode =  $request->salary_payment_mode;
            $teacherSalaryAccountDetails->gross_provoded_fund =  $request->gross_provoded_fund;
            $teacherSalaryAccountDetails->group_insurance_scheme =  $request->group_insurance_scheme;

            $teacherSalaryAccountDetails->is_submited = 1;
    
            $teacherSalaryAccountDetails->save();
    
            return response()->success('Teacehr Salary Details Saved', 'teacherSalaryAccountDetails', null);
        }

    }
    

    
    public function InsertTeacherQualification(){
        
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view("teacher/insert/InsertTeacherQualification")->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function StoreTeacherQualification(Request $request)
    {
        $request->validate([
            'qualification' => 'required',
            'subjects_studied' => 'required',
            'board_university' => 'required',
            'school_college' => 'required',
            'passing_year' => 'required',
            'roll_no' => 'required',
            'marks_obtained' => 'required'
          ]);


        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherAcademicQualification)) {
            return response()->errorNotFound('Teacher Academic Qualification data not found.');
        } else if(empty($teacherProfessionalQualification)) {
            return response()->errorNotFound('Teacher Professional Qualification data not found.');
        } else {
    
            $teacherAcademicQualification->qualification = $request->qualification;
            $teacherAcademicQualification->stream_displine = $request->stream_displine;
            $teacherAcademicQualification->subjects_studied = $request->subjects_studied;
            $teacherAcademicQualification->board_university = $request->board_university;
            $teacherAcademicQualification->school_college = $request->school_college;
            $teacherAcademicQualification->passing_year = $request->passing_year;
            $teacherAcademicQualification->roll_no = $request->roll_no;
            $teacherAcademicQualification->marks_obtained = $request->marks_obtained;

            $teacherAcademicQualification->is_submited = 1;
            $teacherAcademicQualification->save();

            $teacherProfessionalQualification->qualification = $request->qualification_p;
            $teacherProfessionalQualification->mode = $request->mode_p;
            $teacherProfessionalQualification->status = $request->status_p;
            $teacherProfessionalQualification->subjects_studied = $request->subjects_studied_p;
            $teacherProfessionalQualification->board_university = $request->board_university_p;
            $teacherProfessionalQualification->school_college = $request->school_college_p;
            $teacherProfessionalQualification->passing_year = $request->passing_year_p;
            $teacherProfessionalQualification->roll_no = $request->roll_no_p;
            $teacherProfessionalQualification->marks_obtained = $request->marks_obtained_p;

            $teacherProfessionalQualification->is_submited = 1;
            $teacherProfessionalQualification->save();

            return response()->success('Teacehr Qualification Details Saved', 'teacherAcademicQualification', null);
        }
        
    }


 
    public function InsertTeacherDocuments()
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/insert/InsertTeacherDocuments')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function AddTeacherDocuments(Request $request)
    {
        $request->validate([
            'teacherPhoto' => 'required',
            'teacherSignature' => 'required',
            'panCard' => 'required'
            ]);

        $teacher = Teacher::where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->where('is_deleted', 0)->first();
        
        if(empty($teacher)) {
            return response()->errorNotFound('Teacher data not found. Please Login and try again.');
        } else {
        
            if($request->teacherPhoto != null && $request->teacherPhoto != "") {

                $fileName = time().'.'.$request->teacherPhoto->extension();  
                $request->teacherPhoto->move(public_path('files/teacher/photo'), $fileName);
        
                $path = 'https://education.bodoland.gov.in/Dashboard/public/files/teacher/photo/' . $fileName;
        
                $teacher->teacher_image_url = $path;
            } else {
                return response()->errorNotFound('Teacher Photo not provided.');
            }
    
            if($request->teacherSignature != null && $request->teacherSignature != "") {
    
                $fileName = time().'.'.$request->teacherSignature->extension();  
                $request->teacherSignature->move(public_path('files/teacher/signature'), $fileName);
        
                $path = 'https://education.bodoland.gov.in/Dashboard/public/files/teacher/signature/' . $fileName;
        
                $teacher->teacher_signature_url = $path;
            } else {
                return response()->errorNotFound('Teacher Signature not provided.');
            }
    
            if($request->panCard != null) {
    
                $fileName = time().'.'.$request->panCard->extension();  
                $request->panCard->move(public_path('files/teacher/pan'), $fileName);
        
                $path = 'https://education.bodoland.gov.in/Dashboard/public/files/teacher/pan/' . $fileName;
        
                $teacher->teacher_pan_url = $path;
            } else {
                return response()->errorNotFound('Teacher PAN Card not provided.');
            }
    
            if($request->aadhaarCard != null) {
    
                $fileName = time().'.'.$request->aadhaarCard->extension();  
                $request->aadhaarCard->move(public_path('files/teacher/aadhaar'), $fileName);
        
                $path = 'https://education.bodoland.gov.in/Dashboard/public/files/teacher/aadhaar/' . $fileName;
        
                $teacher->teacher_aadhaar_url = $path;
            }
    
            $teacher->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacher->modified_on =  Carbon::now()->toDateTimeString();

            $teacher ->save();
            UserActivityLogController::AddUserActivityLogInsert($teacher->modified_by, $teacher->teacher_id, $teacher->teacher_first_name . ' ' . $teacher->teacher_last_name, "Teacher document uploaded");
    
            return response()->success('Teacher document uploaded succesfully', 'teacher', $teacher);

        }
    }

    

    public function ReviewTeacherDetails(Request $request)
    {

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/ReviewTeacherDetails')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function StoreTeacherDetails(Request $request)
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacher->is_submited = 2;
        $teacherServiceDetails->is_submited = 2;
        $teacherSalaryAccountDetails->is_submited = 2;
        $teacherAcademicQualification->is_submited = 2;
        $teacherProfessionalQualification->is_submited = 2;


        $teacher->save();
        $teacherServiceDetails->save();
        $teacherSalaryAccountDetails->save();
        $teacherAcademicQualification->save();
        $teacherProfessionalQualification->save();

        return response()->success('Teacehr Details Saved Successfully', 'teacher', null);
    }


}