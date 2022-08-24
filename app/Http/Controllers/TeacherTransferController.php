<?php

namespace App\Http\Controllers;

use App\Http\GenerateID;
use App\Models\School;
use App\Models\Teacher;
use App\Models\TeacherTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeacherTransferController extends Controller
{
    
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

        $teacherTransfer->created_by =  Auth::guard('deeo')->user()->deeo_id;
        $teacherTransfer->created_on =  Carbon::now()->toDateTimeString();
        $teacherTransfer ->save();

        UserActivityLogController::AddUserActivityLogInsert($teacherTransfer->created_by, $teacherTransfer->fk_teacher_id,  '', "Teacher Transfered");


        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $request->teacher_id)->first();

        $teacher->fk_school_id = $request->transfer_to_school;
        $teacher->modified_by =  Auth::guard('deeo')->user()->deeo_id;
        $teacher->modified_on =  Carbon::now()->toDateTimeString();
        $teacher->save();

        UserActivityLogController::AddUserActivityLogUpdate($teacher->modified_by, $teacher->teacher_id,  '', "Teacher School Updated");

        return response()->success('Teacher Transfered successfully', 'teacherTransfer', $teacherTransfer);
    }

}
