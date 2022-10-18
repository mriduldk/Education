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

class TeacherController extends Controller
{
    
    public function TeacherLoginPage()
    {
        return view('teacher/teacherLogin');
    }
    public function LeaveApplicationList()
    {
        return view('teacher/leaveApplicationList');
    }
    public function InsertTeacherDocuments()
    {
        return view('teacher/insert/InsertTeacherDocuments');
    }

    public function TeacherLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // $teacher = User::create([
        //     'name' => "Admin",
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'type' => 1
        // ]);

        if (Auth::guard('teacher')->check())
        { Auth::guard('teacher')->logout(); }

        if (Auth::guard('headTeacher')->check())
        { Auth::guard('headTeacher')->logout(); }

        if (Auth::guard('admin')->check())
        { Auth::guard('admin')->logout(); }

        if (Auth::guard('is')->check())
        { Auth::guard('is')->logout(); }

        if (Auth::guard('dpc')->check())
        { Auth::guard('dpc')->logout(); }

        if (Auth::guard('dmc')->check())
        { Auth::guard('dmc')->logout(); }

        if (Auth::guard('deeo')->check())
        { Auth::guard('deeo')->logout(); }

        if (Auth::guard('di')->check())
        { Auth::guard('di')->logout(); }

        if (Auth::guard('beeo')->check())
        { Auth::guard('beeo')->logout(); }

        if (Auth::guard('chd')->check())
        { Auth::guard('chd')->logout(); }
        
        if (Auth::guard('bmc')->check())
        { Auth::guard('bmc')->logout(); }

        $teacher = Teacher::where('teacher_email', $request->email)->where('is_deleted', 0)->first();
        if ($teacher && Hash::check($request->password, $teacher->teacher_password)) 
        {
            Auth::guard('teacher')->login($teacher);

            LoginActivityLogController::AddLoginActivityLogSuccess($teacher->teacher_id);

            return response()->success('Teacher Login Successful', 'teacher', $teacher);
        } 
        else
        {
            if($teacher != null) {
                LoginActivityLogController::AddLoginActivityLogError($teacher->teacher_id);
            } else {
                LoginActivityLogController::AddLoginActivityLogError($request->email);
            }
            return response()->errorUnauthorised('Wrong Credentials of Teacher. Please try again.');
        }
    }

    public function TeacherLogout()
    {
        Auth::guard('teacher')->logout();
        return view('teacher/teacherLogin');
    }

    public function teacherDashboard()
    {

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $teacher_id)->first();;

        //dd($teacher);

        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherDependentFamily = TeacherDependentFamily::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherLeave = TeacherLeave::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->get();
        $teacherStatus = TeacherStatus::where('is_deleted', 0)->where('is_active', 1)->where('fk_teacher_id', $teacher->teacher_id)->first();

        $school = School::where('is_deleted', 0)->where('school_id', $teacher->fk_school_id)->first();

        if($teacherAcademicQualification->is_submited != 2 || $teacherProfessionalQualification->is_submited != 2 || $teacherSalaryAccountDetails->is_submited != 2 || $teacher->is_submited != 2 || $teacherServiceDetails->is_submited != 2 || $teacher->teacher_image_url == null || $teacher->teacher_image_url == "" )
        {
            return view('teacher/insert/insertTeacher')->with('teacher', $teacher)->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
        } 
        else 
        {
            $teacher['teacherAcademicQualification'] = $teacherAcademicQualification;
            $teacher['teacherDependentFamily'] = $teacherDependentFamily;
            $teacher['teacherProfessionalQualification'] = $teacherProfessionalQualification;
            $teacher['teacherSalaryAccountDetails'] = $teacherSalaryAccountDetails;
            $teacher['teacherServiceDetails'] = $teacherServiceDetails;
            $teacher['school'] = $school;
            $teacher['teacherLeaves'] = $teacherLeave;
            $teacher['teacherStatus'] = $teacherStatus;
    
            return view('/teacher/teacherDashboard')->with('teacher', $teacher);

        }

    }


    // Edit 
    public function editTeacher()
    {
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        return view('teacher/editTeacher')->with('teacher', $teacher);
    }
    public function InsertTeacher(Request $request)
    {
        $teacher = $request->session()->get('teacher');

        $teacher['teacherPersonalDetails'] = new Teacher();

        return view('teacher/insert/insertTeacher', compact('teacher'));
    }
    public function StoreTeacher(Request $request)
    {

        $validatedData = $request->validate([
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
            'teacher_mobile'  => 'required',
            'teacher_email'  => 'required',
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


        if(empty($request->session()->get('teacherPersonalDetails'))){
            $teacherServiceDetails = new Teacher();
            $teacherServiceDetails->fill($validatedData);
            $request->session()->put('teacherPersonalDetails', $teacherServiceDetails);
        }else{
            $teacherServiceDetails = $request->session()->get('teacherPersonalDetails');            
            $teacherServiceDetails->fill($validatedData);
            $request->session()->put('teacherPersonalDetails', $teacherServiceDetails);
        }
        
        //return redirect()->route('InsertEmployeementDetails');
        //return redirect('insertSalaryAccount');

        return response()->success('Teacehr Details Saved', 'teacherPersonalDetails', null);
    }
    public function editTeacherStatus()
    {
        $teacherStatus = TeacherStatus::where('is_deleted', 0)->where('is_active', 1)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        return view('teacher/editTeacherStatus')->with('teacherStatus', $teacherStatus);
    }
    public function UpdateTeacherStatus(Request $request)
    {
        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $request->validate([
            'status' => 'required'
          ]);

        $teacherStatus = TeacherStatus::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->where('is_active', 1)->first();

        if(empty($teacherStatus)) {
            return response()->errorNotFound('Teacher Status data not found.');
        } else {

            $teacherStatus->is_active =  0;
            $teacherStatus->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherStatus->modified_on =  Carbon::now()->toDateTimeString();
    
            $teacherStatus->save();
            UserActivityLogController::AddUserActivityLogUpdate($teacherStatus->modified_by, $teacherStatus->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Status Details Updated");
            
            $teacherStatusNew = new TeacherStatus();
            $teacherStatusNew->teacher_status_id =  GenerateID::getId();
            $teacherStatusNew->fk_teacher_id =  $teacher_id;
            $teacherStatusNew->status =  $request->status;

            if($request->status == 'Attachment') {
                $teacherStatusNew->attachement_date = $request->attachement_date;
                $teacherStatusNew->block_name = $request->block_name;
                $teacherStatusNew->school_name =  $request->school_name;
                $teacherStatusNew->udice_code =  $request->udice_code;
            }
            
            $teacherStatusNew->is_active =  1;
            $teacherStatusNew->created_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherStatusNew->created_on =  Carbon::now()->toDateTimeString();
            $teacherStatusNew->save();

            UserActivityLogController::AddUserActivityLogInsert($teacherStatusNew->created_by, $teacherStatusNew->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Status Details Inserted. Status is " . $request->status);
    
            return response()->success('Teacher Status Details updated successfully', 'teacherStatus', $teacherStatusNew);
        }
    }
    public function UpdateTeacher(Request $request)
    {
        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

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
            'teacher_mobile'  => 'required',
            'teacher_email'  => 'required',
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

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $teacher_id)->first();

        $teacher->teacher_employee_code =  $request->teacher_employee_code;
        $teacher->teacher_first_name =  $request->teacher_first_name;
        $teacher->teacher_last_name =  $request->teacher_last_name;
        $teacher->teacher_gender =  $request->teacher_gender;
        $teacher->teacher_dob =  $request->teacher_dob;
        $teacher->teacher_caste =  $request->teacher_caste;
        $teacher->teacher_religion =  $request->teacher_religion;
        $teacher->teacher_nationality =  $request->teacher_nationality;
        $teacher->teacher_present_address =  $request->teacher_present_address;
        $teacher->teacher_parmanent_address =  $request->teacher_parmanent_address;
        $teacher->teacher_aadhaar_no =  $request->teacher_aadhaar_no;
        //$teacher->teacher_mobile =  $request->teacher_mobile;
        //$teacher->teacher_email =  $request->teacher_email;
        $teacher->teacher_mother_name =  $request->teacher_mother_name;
        $teacher->teacher_father_name =  $request->teacher_father_name;
        $teacher->teacher_identification_mark =  $request->teacher_identification_mark;
        $teacher->teacher_blood_group =  $request->teacher_blood_group;
        $teacher->teacher_differntly_abled =  $request->teacher_differntly_abled;
        $teacher->teacher_maritial_status =  $request->teacher_maritial_status;
        $teacher->teacher_spouse_name =  $request->teacher_spouse_name;
        $teacher->teacher_spouse_working_under_govt_serveice =  $request->teacher_spouse_working_under_govt_serveice;
        $teacher->teacher_language =  $request->teacher_language;
        $teacher->teacher_tet_category =  $request->teacher_tet_category;
        $teacher->teacher_category_type =  $request->teacher_category_type;

        $teacher->modified_by =  Auth::guard('teacher')->user()->teacher_id;
        $teacher->modified_on =  Carbon::now()->toDateTimeString();

        $teacher->save();
        UserActivityLogController::AddUserActivityLogUpdate($teacher->modified_by, $teacher->teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Details Updated");

        return response()->success('Teacher Details updated successfully', 'teacher', $teacher);
    }


    public function EditSalaryAccount(){

        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/EditSalaryAccount')->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails);

    } 
    public function UpdateTeacherSalaryAccount(Request $request)
    {

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

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

        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherSalaryAccountDetails)) {
            return response()->errorNotFound('Teacher data not found.');
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
            $teacherSalaryAccountDetails->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherSalaryAccountDetails->modified_on =  Carbon::now()->toDateTimeString();
    
            $teacherSalaryAccountDetails->save();
            UserActivityLogController::AddUserActivityLogUpdate($teacherSalaryAccountDetails->modified_by, $teacherSalaryAccountDetails->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Salary Account Details Updated");
    
            return response()->success('Teacher Salary Details updated successfully', 'teacherSalaryAccountDetails', $teacherSalaryAccountDetails);
        }
    }
    public function InsertSalaryAccount(Request $request)
    {
        $teacher = $request->session()->get('teacher');

        return view('teacher/insert/InsertSalaryAccount', compact('teacher'));
    }
    public function StoreSalaryAccount(Request $request)
    {
        $validatedData = $request->validate([
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


          if(empty($request->session()->get('teacherSalaryAccountDetails'))){
            $teacherSalaryAccountDetails = new TeacherSalaryAccountDetails();
            $teacherSalaryAccountDetails->fill($validatedData);
            $request->session()->put('teacherSalaryAccountDetails', $teacherSalaryAccountDetails);
        }else{
            $teacherSalaryAccountDetails = $request->session()->get('teacherSalaryAccountDetails');
            $teacherSalaryAccountDetails->fill($validatedData);
            $request->session()->put('teacherSalaryAccountDetails', $teacherSalaryAccountDetails);
        }
        
        //return redirect()->route('InsertEmployeementDetails');
        //return redirect('insertTeacherQualification');
        return response()->success('Teacehr Salary Details Saved', 'teacherSalaryAccountDetails', null);

    }
    


    public function EditTeacherQualification(){
        
        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view("teacher/EditTeacherQualification")->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherProfessionalQualification', $teacherProfessionalQualification);
    }
    public function UpdateTeacherQualification(Request $request)
    {
        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $request->validate([
            'qualification' => 'required',
            'stream_displine' => 'required',
            'subjects_studied' => 'required',
            'board_university' => 'required',
            'school_college' => 'required',
            'passing_year' => 'required',
            'roll_no' => 'required',
            'marks_obtained' => 'required'

          ]);

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
            $teacherAcademicQualification->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherAcademicQualification->modified_on =  Carbon::now()->toDateTimeString();
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
            $teacherProfessionalQualification->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherProfessionalQualification->modified_on =  Carbon::now()->toDateTimeString();
            $teacherProfessionalQualification->save();

            UserActivityLogController::AddUserActivityLogUpdate($teacherAcademicQualification->modified_by, $teacherAcademicQualification->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Academic Qualification Details Updated");
            UserActivityLogController::AddUserActivityLogUpdate($teacherProfessionalQualification->modified_by, $teacherProfessionalQualification->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Professional Qualification Details Updated");
    
            return response()->success('Teacher Qualification Details updated successfully', 'teacherAcademicQualification', $teacherAcademicQualification);
        }
    }
    public function InsertTeacherQualification(){
        
        return view("teacher/insert/InsertTeacherQualification");
    }
    public function StoreTeacherQualification(Request $request)
    {
        $validatedData = $request->validate([
            'qualification' => 'required',
            'stream_displine' => 'required',
            'subjects_studied' => 'required',
            'board_university' => 'required',
            'school_college' => 'required',
            'passing_year' => 'required',
            'roll_no' => 'required',
            'marks_obtained' => 'required'
          ]);


          if(empty($request->session()->get('teacherAcademicQualification'))){

            $teacherAcademicQualification = new TeacherAcademicQualification();
            $teacherAcademicQualification->fill($validatedData);
            $request->session()->put('teacherAcademicQualification', $teacherAcademicQualification);

        }else{

            $teacherAcademicQualification = $request->session()->get('teacherAcademicQualification');
            $teacherAcademicQualification->fill($validatedData);
            $request->session()->put('teacherAcademicQualification', $teacherAcademicQualification);
        }
        
        return response()->success('Teacehr Qualification Details Saved', 'teacherAcademicQualification', null);
    }




    public function EditEmployeementDetails()
    {

        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', Auth::guard('teacher')->user()->teacher_id)->first();

        return view('teacher/EditEmployeementDetails')->with('teacherServiceDetails', $teacherServiceDetails);
    }
    public function UpdateEmployeementDetails(Request $request)
    {
        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $request->validate([
            'post_name' => 'required'
          ]);


        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherServiceDetails)) {
            return response()->errorNotFound('Teacher data not found.');
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
            $teacherServiceDetails->modified_by =  Auth::guard('teacher')->user()->teacher_id;
            $teacherServiceDetails->modified_on =  Carbon::now()->toDateTimeString();
    
            $teacherServiceDetails->save();
            UserActivityLogController::AddUserActivityLogUpdate($teacherServiceDetails->modified_by, $teacherServiceDetails->fk_teacher_id,  Auth::guard('teacher')->user()->teacher_first_name . ' ' . Auth::guard('teacher')->user()->teacher_last_name, "Teacher Service Details Updated");
    
            return response()->success('Teacher Service Details updated successfully', 'teacherServiceDetails', $teacherServiceDetails);
        }
    }
    public function InsertEmployeementDetails(Request $request)
    {
        $teacher = $request->session()->get('teacher');

        $teacher['teacherServiceDetails'] = new TeacherServiceDetails();

        return view('teacher/insert/InsertEmployeementDetails', compact('teacher'));
    }
    public function StoreEmployeementDetails(Request $request)
    {

        $validatedData = $request->validate([
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


        if(empty($request->session()->get('teacherServiceDetails'))){
            $teacherServiceDetails = new TeacherServiceDetails();
            $teacherServiceDetails->fill($validatedData);
            $request->session()->put('teacherServiceDetails', $teacherServiceDetails);
        }else{
            $teacherServiceDetails = $request->session()->get('teacherServiceDetails');            
            $teacherServiceDetails->fill($validatedData);
            $request->session()->put('teacherServiceDetails', $teacherServiceDetails);
        }
        
        //return redirect()->route('InsertEmployeementDetails');
        //return redirect('insertSalaryAccount');

        return response()->success('Teacehr Employeement Details Saved', 'teacherServiceDetails', null);
    }
    

    public function ReviewTeacherDetails(Request $request)
    {

        $teacherServiceDetails = $request->session()->get('teacherServiceDetails');  
        $teacherAcademicQualification = $request->session()->get('teacherAcademicQualification');
        $teacherSalaryAccountDetails = $request->session()->get('teacherSalaryAccountDetails');

        //dd($teacherServiceDetails);

        return view('teacher/ReviewTeacherDetails')->with('teacherServiceDetails', $teacherServiceDetails)->with('teacherAcademicQualification', $teacherAcademicQualification)->with('teacherSalaryAccountDetails', $teacherSalaryAccountDetails);
    }
    public function StoreTeacherDetails(Request $request)
    {
        $teacherServiceDetails = $request->session()->get('teacherServiceDetails');  
        $teacherAcademicQualification = $request->session()->get('teacherAcademicQualification');
        $teacherSalaryAccountDetails = $request->session()->get('teacherSalaryAccountDetails');

        $teacher_id = Auth::guard('teacher')->user()->teacher_id;

        $teacherServiceDetails1 = new TeacherServiceDetails();
        $teacherServiceDetails1->teacehr_s_d_id = GenerateID::getId();
        $teacherServiceDetails1->fk_teacher_id = $teacher_id;

        $teacherServiceDetails1->employeement_type =  $teacherServiceDetails->employeement_type;
        $teacherServiceDetails1->pran_no =  $teacherServiceDetails->pran_no;
        $teacherServiceDetails1->uan_no =  $teacherServiceDetails->uan_no;
        $teacherServiceDetails1->ssa_contactual_appointment_order_no =  $teacherServiceDetails->ssa_contactual_appointment_order_no;
        $teacherServiceDetails1->retention_no =  $teacherServiceDetails->retention_no;
        $teacherServiceDetails1->service_confirmed =  $teacherServiceDetails->service_confirmed;

        $teacherServiceDetails1->post_name = $teacherServiceDetails->post_name;
        $teacherServiceDetails1->medium_of_school = $teacherServiceDetails->medium_of_school;
        $teacherServiceDetails1->subjects = $teacherServiceDetails->subjects;
        $teacherServiceDetails1->category_of_post = $teacherServiceDetails->category_of_post;
        $teacherServiceDetails1->pay_scale = $teacherServiceDetails->pay_scale;
        $teacherServiceDetails1->grade_pay = $teacherServiceDetails->grade_pay;
        $teacherServiceDetails1->appointment_latter_no = $teacherServiceDetails->appointment_latter_no;
        $teacherServiceDetails1->appointment_date = $teacherServiceDetails->appointment_date;
        $teacherServiceDetails1->post_creation_no = $teacherServiceDetails->post_creation_no;
        $teacherServiceDetails1->post_creation_date = $teacherServiceDetails->post_creation_date;
        $teacherServiceDetails1->date_of_effect_of_service_provincialisation = $teacherServiceDetails->date_of_effect_of_service_provincialisation;
        $teacherServiceDetails1->date_of_joining_in_service = $teacherServiceDetails->date_of_joining_in_service;
        $teacherServiceDetails1->date_of_joining_in_present_post = $teacherServiceDetails->date_of_joining_in_present_post;
        $teacherServiceDetails1->date_of_retirement = $teacherServiceDetails->date_of_retirement;
        $teacherServiceDetails1->period_spent_on_non_teaching_assignment = $teacherServiceDetails->period_spent_on_non_teaching_assignment;
        $teacherServiceDetails1->created_on = Carbon::now()->toDateTimeString();
        $teacherServiceDetails1->created_by = $teacher_id;
        $teacherServiceDetails1->save();

        $teacherAcademicQualification1 = new TeacherAcademicQualification();
        $teacherAcademicQualification1->teacehr_a_q_id = GenerateID::getId();
        $teacherAcademicQualification1->fk_teacher_id = $teacher_id;
        $teacherAcademicQualification1->qualification = $teacherAcademicQualification->qualification;
        $teacherAcademicQualification1->stream_displine = $teacherAcademicQualification->stream_displine;
        $teacherAcademicQualification1->subjects_studied = $teacherAcademicQualification->subjects_studied;
        $teacherAcademicQualification1->board_university = $teacherAcademicQualification->board_university;
        $teacherAcademicQualification1->school_college = $teacherAcademicQualification->school_college;
        $teacherAcademicQualification1->passing_year = $teacherAcademicQualification->passing_year;
        $teacherAcademicQualification1->roll_no = $teacherAcademicQualification->roll_no;
        $teacherAcademicQualification1->marks_obtained = $teacherAcademicQualification->marks_obtained;
        $teacherAcademicQualification1->created_on = Carbon::now()->toDateTimeString();
        $teacherAcademicQualification1->created_by = $teacher_id;
        $teacherAcademicQualification1->save();


        $teacherSalaryAccountDetails1 = new TeacherSalaryAccountDetails();
        $teacherSalaryAccountDetails1->teacehr_s_d_id = GenerateID::getId();
        $teacherSalaryAccountDetails1->fk_teacher_id = $teacher_id;
        $teacherSalaryAccountDetails1->pan_no = $teacherSalaryAccountDetails->pan_no;
        $teacherSalaryAccountDetails1->account_no = $teacherSalaryAccountDetails->account_no;
        $teacherSalaryAccountDetails1->account_name = $teacherSalaryAccountDetails->account_name;
        $teacherSalaryAccountDetails1->bank_name = $teacherSalaryAccountDetails->bank_name;
        $teacherSalaryAccountDetails1->branch_name = $teacherSalaryAccountDetails->branch_name;
        $teacherSalaryAccountDetails1->ifsc = $teacherSalaryAccountDetails->ifsc;
        $teacherSalaryAccountDetails1->district_name_of_active_salary_account_no = $teacherSalaryAccountDetails->district_name_of_active_salary_account_no;
        $teacherSalaryAccountDetails1->state_name_of_active_salary_account_no = $teacherSalaryAccountDetails->state_name_of_active_salary_account_no;
        $teacherSalaryAccountDetails1->salary_payment_mode = $teacherSalaryAccountDetails->salary_payment_mode;
        $teacherSalaryAccountDetails1->gross_provoded_fund = $teacherSalaryAccountDetails->gross_provoded_fund;
        $teacherSalaryAccountDetails1->group_insurance_scheme = $teacherSalaryAccountDetails->group_insurance_scheme;
        $teacherSalaryAccountDetails1->created_on = Carbon::now()->toDateTimeString();
        $teacherSalaryAccountDetails1->created_by = $teacher_id;
        $teacherSalaryAccountDetails1->save();


        return response()->success('Teacehr Details Saved Successfully', 'teacher', null);
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



}