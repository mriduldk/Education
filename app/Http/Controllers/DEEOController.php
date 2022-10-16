<?php

namespace App\Http\Controllers;

use App\Models\DEEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use App\Models\Dashboard;
use App\Models\DEO;
use App\Models\School;
use Carbon\Carbon;

class DEEOController extends Controller
{

    public function Dashboard(){

        $dashboard = new Dashboard();

        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 3)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 3)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 3)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();
        $dashboard->teacher = Teacher::where('is_deleted', 0)->get();

        return view('DEEO/Dashboard')->with('dashboard', $dashboard);
    }

    public function BlockSelect(){
        return view('DEEO/blockSelect');
    }

    public function SchoolList(){
        return view('DEEO/schoolList');
    }

    public function allTeacherList()
    {
        return view('/DEEO/allTeacherList');
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





}