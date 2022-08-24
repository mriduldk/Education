<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Models\SchoolResult;
use Carbon\Carbon;

class SchoolResultController extends Controller
{
    public function AddSchoolResultPage()
    {
        return view('headTeacher/InsertSchoolResult');
    }
    public function EditSchoolResultPage(string $id)
    {
        $schoolResult = SchoolResult::where('is_deleted', 0)->where('school_r_id', $id)->first();

        return view('headTeacher/EditSchoolResult')->with('schoolResult', $schoolResult);
    }

    public function InsertSchoolResult(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'stream' => 'required',
            'year' => 'required',
            'fst_division' => 'required',
            'snd_division' => 'required',
            'trd_visision' => 'required',
            'fail' => 'required',
            'total_appeared' => 'required',
            'distinction' => 'required',
            'star' => 'required',
        ]);


        $schoolResultExisting = SchoolResult::where('is_deleted', 0)->where('fk_school_id', Auth::guard('headTeacher')->user()->fk_school_id)->where('class', $request->class)->where('stream', $request->stream)->where('year', $request->year)->first();

        //dd($schoolResultExisting);

        if(empty($schoolResultExisting)) {

            $schoolResult = new SchoolResult();

            $schoolResult->school_r_id = GenerateID::getId();
            $schoolResult->fk_school_id = Auth::guard('headTeacher')->user()->fk_school_id;
            $schoolResult->class = $request->class;
            $schoolResult->stream = $request->stream;
            $schoolResult->year = $request->year;
            $schoolResult->fst_division = $request->fst_division;
            $schoolResult->snd_division = $request->snd_division;
            $schoolResult->trd_visision = $request->trd_visision;
            $schoolResult->fail = $request->fail;
            $schoolResult->total_appeared = $request->total_appeared;
            $schoolResult->distinction = $request->distinction;
            $schoolResult->star = $request->star;
            $schoolResult->created_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolResult->created_on = Carbon::now()->toDateTimeString();
    
            $schoolResult ->save();
    
            UserActivityLogController::AddUserActivityLogInsert($schoolResult->created_by, Auth::guard('headTeacher')->user()->teacher_id,  Auth::guard('headTeacher')->user()->teacher_first_name . ' ' . Auth::guard('headTeacher')->user()->teacher_last_name, "School Result Inserted");
            
            return response()->success('Student Result Successfully Inserted', 'schoolResult', $schoolResult);

        } else {
            return response()->errorConflict('Result of This class already exists. Please Edit or Delete.');        
        }
    }
    public function UpdateSchoolResult(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'stream' => 'required',
            'year' => 'required',
            'fst_division' => 'required',
            'snd_division' => 'required',
            'trd_visision' => 'required',
            'fail' => 'required',
            'total_appeared' => 'required',
            'distinction' => 'required',
            'star' => 'required',
        ]);


        $schoolResult = SchoolResult::where('is_deleted', 0)->where('school_r_id', $request->school_r_id)->first();

        if(empty($schoolResult)) {            
            return response()->errorConflict('Result not found. Please try again.');
        } else {

            $schoolResult->class = $request->class;
            $schoolResult->stream = $request->stream;
            $schoolResult->year = $request->year;
            $schoolResult->fst_division = $request->fst_division;
            $schoolResult->snd_division = $request->snd_division;
            $schoolResult->trd_visision = $request->trd_visision;
            $schoolResult->fail = $request->fail;
            $schoolResult->total_appeared = $request->total_appeared;
            $schoolResult->distinction = $request->distinction;
            $schoolResult->star = $request->star;
            $schoolResult->modified_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolResult->modified_on = Carbon::now()->toDateTimeString();
    
            $schoolResult ->save();
    
            UserActivityLogController::AddUserActivityLogUpdate($schoolResult->created_by, Auth::guard('headTeacher')->user()->teacher_id,  Auth::guard('headTeacher')->user()->teacher_first_name . ' ' . Auth::guard('headTeacher')->user()->teacher_last_name, "School result Updated");
            
            return response()->success('Result Successfully Updated', 'schoolResult', $schoolResult);
        }
    }

}