<?php

namespace App\Http\Controllers;

use App\Models\BMC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use App\Models\Dashboard;
use App\Models\DEO;
use App\Models\School;
use App\Models\SchoolEntrolmentOfStudent;
use App\Models\SchoolFacilities;
use App\Models\TeacherAcademicQualification;
use App\Models\TeacherDependentFamily;
use App\Models\TeacherProfessionalQualification;
use App\Models\TeacherSalaryAccountDetails;
use App\Models\TeacherServiceDetails;
use App\Models\TeacherStatus;
use Carbon\Carbon;

class BMCController extends Controller
{

    public function Dashboard(){
        
        $dashboard = new Dashboard();

        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 6)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 6)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 6)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();
        $dashboard->teacher = Teacher::where('is_deleted', 0)->get();

        return view('BMC/Dashboard')->with('dashboard', $dashboard);
    }

    public function BlockSelect(){
        return view('BMC/blockSelect');
    }

    public function SchoolList(){
        return view('BMC/school/schoolList');
    }

    public function allTeacherList()
    {
        return view('/BMC/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


    public function SchoolData(Request $request)
    {
         
        $schools = School::where('is_deleted', 0)->get();

        foreach($schools as $school){
            $teacher = Teacher::where('is_deleted', 0)->where('is_head_teacher', 1)->where('fk_school_id', $school->school_id)->first();

            if(empty($teacher)) {
                $school['headTeacher'] = new Teacher();
            } else {
                $school['headTeacher'] = $teacher;
            }
        }
        return $schools;
    }
    
    public function schoolInsertPage()
    {
        return view('/BMC/school/schoolInsert');
    }
    public function schoolInsertProcess(Request $request)
    {
        
        $request->validate([
            'school_name' => 'required',
            'udice_code' => 'required',
            'head_teacher_first_name' => 'required',
            'head_teacher_last_name' => 'required',
            'head_teacher_number' => 'required',
            'head_teacher_email' => 'required'
          ]);

        $teacher = new Teacher();
        $school = new School();

        $pass = GenerateID::getPassword();

        $school->school_id = GenerateID::getId();
        $school->school_name = $request->school_name;
        $school->udice_code =$request->udice_code;
        $school->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $school->created_on =  Carbon::now()->toDateTimeString();
        $school ->save();

        $schoolFacility = new SchoolFacilities();
        $schoolFacility->school_f_id = GenerateID::getId();
        $schoolFacility->fk_school_id = $school->school_id;
        $schoolFacility->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $schoolFacility->created_on =  Carbon::now()->toDateTimeString();
        $schoolFacility ->save();

        $schoolEntrolmentOfStudent = new SchoolEntrolmentOfStudent();
        $schoolEntrolmentOfStudent->school_e_o_s_id = GenerateID::getId();
        $schoolEntrolmentOfStudent->fk_school_id = $school->school_id;
        $schoolEntrolmentOfStudent->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $schoolEntrolmentOfStudent->created_on =  Carbon::now()->toDateTimeString();
        $schoolEntrolmentOfStudent ->save();

        $teacher->teacher_id = GenerateID::getId();
        $teacher->teacher_no = '9' . rand(100000, 999999);
        $teacher->fk_school_id = $school->school_id;
        $teacher->teacher_first_name = $request->head_teacher_first_name;
        $teacher->teacher_last_name =$request->head_teacher_last_name;
        $teacher->teacher_mobile =  $request->head_teacher_number;
        $teacher->teacher_email =  $request->head_teacher_email;
        $teacher->teacher_password =  Hash::make($pass);
        $teacher->is_head_teacher =  1;
        $teacher->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacher->created_on =  Carbon::now()->toDateTimeString();
        $teacher ->save();

        $teacherDependentFamily = new TeacherDependentFamily();
        $teacherDependentFamily->teacher_d_f_id = GenerateID::getId();
        $teacherDependentFamily->fk_teacher_id = $teacher->teacher_id;
        $teacherDependentFamily->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacherDependentFamily->created_on =  Carbon::now()->toDateTimeString();
        $teacherDependentFamily->save();

        $teacherProfessionalQualification = new TeacherProfessionalQualification();
        $teacherProfessionalQualification->teacehr_p_q_id = GenerateID::getId();
        $teacherProfessionalQualification->fk_teacher_id = $teacher->teacher_id;
        $teacherProfessionalQualification->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacherProfessionalQualification->created_on =  Carbon::now()->toDateTimeString();
        $teacherProfessionalQualification->save();

        $teacherAcademicQualification = new TeacherAcademicQualification();
        $teacherAcademicQualification->teacehr_a_q_id = GenerateID::getId();
        $teacherAcademicQualification->fk_teacher_id = $teacher->teacher_id;
        $teacherAcademicQualification->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacherAcademicQualification->created_on =  Carbon::now()->toDateTimeString();
        $teacherAcademicQualification->save();

        $teacherSalaryAccountDetails = new TeacherSalaryAccountDetails();
        $teacherSalaryAccountDetails->teacehr_s_d_id = GenerateID::getId();
        $teacherSalaryAccountDetails->fk_teacher_id = $teacher->teacher_id;
        $teacherSalaryAccountDetails->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacherSalaryAccountDetails->created_on =  Carbon::now()->toDateTimeString();
        $teacherSalaryAccountDetails->save();

        $teacherServiceDetails = new TeacherServiceDetails();
        $teacherServiceDetails->teacehr_s_d_id = GenerateID::getId();
        $teacherServiceDetails->fk_teacher_id = $teacher->teacher_id;
        $teacherServiceDetails->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacherServiceDetails->created_on =  Carbon::now()->toDateTimeString();
        $teacherServiceDetails->save();

        $teacherStatus = new TeacherStatus();
        $teacherStatus->teacher_status_id =  GenerateID::getId();
        $teacherStatus->fk_teacher_id =  $teacher->teacher_id;
        $teacherStatus->status = 'Working';
        $teacherStatus->is_active =  1;
        $teacherStatus->created_by =  Auth::guard('bmc')->user()->teacher_id;
        $teacherStatus->created_on =  Carbon::now()->toDateTimeString();
        $teacherStatus->save();

        //SendPasswordToEmail::SendPasswordToEmailHeadTeacher($request->head_teacher_email, $pass);

        UserActivityLogController::AddUserActivityLogInsert($teacher->created_by, $teacher->teacher_id,  $teacher->teacher_first_name . ' ' . $teacher->teacher_last_name, "Head Teacher Created");
        UserActivityLogController::AddUserActivityLogInsert($school->created_by, $school->school_id,  $school->school_name, "School Created");

        return response()->success('School added successfully', 'school', $school);


    }


}