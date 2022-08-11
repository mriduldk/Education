<?php

namespace App\Http\Controllers;

use App\Models\TeacherLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\School;
use App\Models\Teacher;
use Carbon\Carbon;
use App\Providers\ResponseServiceProvider;

class TeacherLeaveController extends Controller
{
    
    public function index()
    {

        return view('teacher/leaveApplication');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'subject' => 'required',
            'message' => 'required'
          ]);

        $teacherLeave = new TeacherLeave();
        
        // $fileName = time().'.'.$request->deeo_image_url->extension();  
        // $request->deeo_image_url->move(public_path('files/profile/deeo'), $fileName);

        // $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deeo' . $fileName;


        $teacher = Teacher::where('is_deleted', 0)->where('id', Auth::user()->id)->first(); // shold be teacher_id
        $headTeacher = Teacher::where('is_deleted', 0)->where('fk_school_id', $teacher->fk_school_id)->where('is_head_teacher', 1)->first(); 


        $teacherLeave->teacher_leave_id = GenerateID::getId();
        $teacherLeave->fk_teacher_id =  $teacher->teacher_id;
        $teacherLeave->fk_school_id = $teacher->fk_school_id;
        $teacherLeave->fk_head_teacher_id = $headTeacher->teacher_id;
        $teacherLeave->leave_date_from = $request->date;
        $teacherLeave->leave_date_to =  $request->date;
        $teacherLeave->leave_subject =  $request->subject;
        $teacherLeave->leave_message =  $request->message;
        $teacherLeave->is_only_uploaded_application = false;
        $teacherLeave->created_by =  Auth::user()->id;
        $teacherLeave->created_on =  Carbon::now()->toDateTimeString();


        $teacherLeave ->save();

        return response()->success('Teacher leave inserted successfully', 'teacherLeave', $teacherLeave);
          
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherLeave  $teacherLeave
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherLeave $teacherLeave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherLeave  $teacherLeave
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherLeave $teacherLeave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherLeave  $teacherLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherLeave $teacherLeave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherLeave  $teacherLeave
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherLeave $teacherLeave)
    {
        //
    }
}
