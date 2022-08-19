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
use App\HTTP\GenerateID;
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

    public function TeacherLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // $teacher = User::create([
        //     'name' => "Admin",
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'type' => 1
        // ]);

        $teacher = Teacher::where('teacher_email', $request->email)->where('is_deleted', 0)->first();
        if ($teacher && Hash::check($request->password, $teacher->teacher_password)) 
        {
            Auth::guard('teacher')->login($teacher);
            return response()->success('Teacher Login Successful', 'teacher', $teacher);
        } 
        else
        {
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

        $teacherAcademicQualification = TeacherAcademicQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->get();
        $teacherDependentFamily = TeacherDependentFamily::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherProfessionalQualification = TeacherProfessionalQualification::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherSalaryAccountDetails = TeacherSalaryAccountDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->first();
        $teacherLeave = TeacherLeave::where('is_deleted', 0)->where('fk_teacher_id', $teacher->teacher_id)->get();

        $school = School::where('is_deleted', 0)->where('school_id', $teacher->fk_school_id)->first();

        $teacher['teacherAcademicQualification'] = $teacherAcademicQualification;
        $teacher['teacherDependentFamily'] = $teacherDependentFamily;
        $teacher['teacherProfessionalQualification'] = $teacherProfessionalQualification;
        $teacher['teacherSalaryAccountDetails'] = $teacherSalaryAccountDetails;
        $teacher['teacherServiceDetails'] = $teacherServiceDetails;
        $teacher['school'] = $school;
        $teacher['teacherLeaves'] = $teacherLeave;

        //dd($teacherLeave);
        return view('/teacher/teacherDashboard')->with('teacher', $teacher);
    }


    // Edit 
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
        
        return view("teacher/EditTeacherQualification");
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

        $teacherServiceDetails = TeacherServiceDetails::where('is_deleted', 0)->where('fk_teacher_id', $teacher_id)->first();

        if(empty($teacherServiceDetails)) {
            return response()->errorNotFound('Teacher data not found.');
        } else {
    
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


}
