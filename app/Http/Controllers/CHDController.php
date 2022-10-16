<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\BEEO;
use App\Models\CHD;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use App\Models\Approver;
use App\Models\Dashboard;
use App\Models\DEO;
use App\Models\Manager;
use App\Models\School;
use App\Models\TeacherTransfer;
use Carbon\Carbon;

class CHDController extends Controller
{

    public function Dashboard(){

        $dashboard = new Dashboard();

        $dashboard->is = IS::where('is_deleted', 0)->get();
        $dashboard->dpc = DPC::where('is_deleted', 0)->get();
        $dashboard->dmc = DMC::where('is_deleted', 0)->get();
        $dashboard->deeo = DEEO::where('is_deleted', 0)->get();
        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 7)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 7)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 7)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();


        return view('CHD/Dashboard')->with('dashboard', $dashboard);
    }

    public function BlockSelect(){
        return view('CHD/blockSelect');
    }

    public function SchoolList(){
        return view('CHD/schoolList');
    }

    public function allTeacherList()
    {
        return view('/CHD/allTeacherList');
    }
    public function AllTeacherData()
    {
        //$teachers = Teacher::where('is_deleted', 0)->get();

        $teachers = Teacher::select('teachers.id', 'teachers.teacher_id', 'teachers.teacher_first_name', 'teachers.teacher_last_name', 'teachers.teacher_no', 'teachers.teacher_mobile', 'teachers.teacher_email', 'teachers.teacher_employee_code', 'teachers.teacher_category_type', 'teacher_statuses.status', 'teacher_transfers.teacher_t_id')
        ->join('teacher_statuses', 'teacher_statuses.fk_teacher_id', '=', 'teachers.teacher_id')
        ->where('teachers.is_deleted', 0)
        ->where('teacher_statuses.is_deleted', 0)
        ->where('teacher_statuses.is_active', 1)
        ->leftJoin('teacher_transfers', 'teacher_transfers.fk_teacher_id', '=', 'teachers.teacher_id')
        // ->leftJoin('teacher_transfers', function($join)
        // {
        //     $join->on('teacher_transfers.fk_teacher_id', '=', 'teachers.teacher_id');
        //     $join->on('teacher_transfers.fk_teacher_id', '=', 'teacher_statuses.fk_teacher_id');
        // })
        //->where('teachers.fk_school_id', Auth::guard('headTeacher')->user()->fk_school_id)
        ->get();

        return $teachers;
    }


    public function GetTeacherData(string $id)
    {
        //$teacher = Teacher::join('schools', 'schools.school_id', '=', 'teachers.fk_school_id')->where('teachers.is_deleted', 0)->where('schools.is_deleted', 0)->where('teachers.teacher_id', $request->teacher_id)->first();

        //dd($request->teacher_id);

        $teacher = Teacher::join('schools', 'schools.school_id', '=', 'teachers.fk_school_id')
        ->where('teachers.is_deleted', 0)
        ->where('schools.is_deleted', 0)
        //->where('teachers.fk_school_id', Auth::guard('headTeacher')->user()->fk_school_id)
        ->where('teachers.id', $id)
        ->first();

        return $teacher;
    }

    public function GetSchoolListWithSameDistrict(string $id)
    {
        $teacher = Teacher::join('schools', 'schools.school_id', '=', 'teachers.fk_school_id')->where('teachers.is_deleted', 0)->where('schools.is_deleted', 0)->where('teachers.id', $id)->first();
        
        $school = School::where('schools.is_deleted', 0)->where('schools.district', $teacher->district)->get();

        return $school;
    }


    public function TransferTeacher(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'school_id' => 'required',
            'transfer_to_school' => 'required',
            'transfer_date' => 'required'
        ]);

        $teacherTransfer = new TeacherTransfer();

        
        $teacherTransfer->teacher_t_id = GenerateID::getId();
        $teacherTransfer->fk_teacher_id = $request->teacher_id;
        $teacherTransfer->fk_old_school_id = $request->school_id;
        $teacherTransfer->fk_new_school_id = $request->transfer_to_school;
        $teacherTransfer->transfer_date = $request->transfer_date;

        $teacherTransfer->created_by =  Auth::guard('chd')->user()->chd_id;
        $teacherTransfer->created_on =  Carbon::now()->toDateTimeString();
        $teacherTransfer ->save();

        UserActivityLogController::AddUserActivityLogInsert($teacherTransfer->created_by, $teacherTransfer->fk_teacher_id,  '', "Teacher Transfered");


        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $request->teacher_id)->first();

        $teacher->fk_school_id = $request->transfer_to_school;
        $teacher->modified_by =  Auth::guard('chd')->user()->chd_id;
        $teacher->modified_on =  Carbon::now()->toDateTimeString();
        $teacher->save();

        UserActivityLogController::AddUserActivityLogUpdate($teacher->modified_by, $teacher->teacher_id,  '', "Teacher School Updated");

        return response()->success('Teacher Transfered successfully', 'teacherTransfer', $teacherTransfer);
    }





}
