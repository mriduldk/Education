<?php

namespace App\Http\Controllers;

// ini_set("SMTP","ssl://smtp.gmail.com");
// ini_set("smtp_port","587");

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\SchoolEntrolmentOfStudent;
use App\Models\SchoolFacilities;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HeadTeacherController extends Controller
{

    
    /** Authentications */
    public function HeadTeacherLoginPage()
    {
        return view('headTeacher/login/headTeacherLogin');
    }

    public function HeadTeacherLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // $teacher = User::create([
        //     'name' => "Admin",
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'type' => 1
        // ]);

        $teacher = Teacher::where('teacher_email', $request->email)->where('is_deleted', 0)->where('is_head_teacher', 1)->first();
        if ($teacher && Hash::check($request->password, $teacher->teacher_password)) 
        {
            Auth::guard('headTeacher')->login($teacher);

            LoginActivityLogController::AddLoginActivityLogSuccess($teacher->teacher_id);

            return response()->success('Head Teacher Login Successful', 'teacher', $teacher);
        } 
        else
        {
            if($teacher != null) {
                LoginActivityLogController::AddLoginActivityLogError($teacher->teacher_id);
            } else {
                LoginActivityLogController::AddLoginActivityLogError($request->email);
            }
            return response()->errorUnauthorised('Wrong Credentials of Head Teacher. Please try again.');
        }
    }

    public function HeadTeacherLogout()
    {
        Auth::guard('headTeacher')->logout();
        return view('headTeacher/login/headTeacherLogin');
        //return redirect()->route('HeadTeacherLoginPage');
    }



    /**Dashboard */
    public function headTeacherDashboard()
    {

        $school_id = Auth::guard('headTeacher')->user()->fk_school_id;

        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();

        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('headTeacher')->user()->teacher_id)->first();

        if(empty($schoolFacility)){
            $schoolFacility = new SchoolFacilities();
        }
        if(empty($schoolEnreolmentOfStudent)){
            $schoolEnreolmentOfStudent = new SchoolEntrolmentOfStudent();
        }
        if(empty($teacher)){
            $teacher = new Teacher();
        }

        $school['schoolFacility'] = $schoolFacility;
        $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        $school['headTeacher'] = $teacher;

        return view('/headTeacher/headTeacherDashboard')->with('school', $school);
    }

    public function allTeacherList()
    {
        return view('/headTeacher/allTeacherList');
    }
    public function LeaveApplicationList()
    {
        return view('/headTeacher/leaveApplicationList');
    }
    public function AllTeacherOfSchool()
    {
        $teachers = Teacher::where('is_deleted', 0)->where('fk_school_id', Auth::guard('headTeacher')->user()->fk_school_id)->get();
        return $teachers;
    }
    public function DeleteTeacher()
    {
        $teacher = Teacher::where('is_deleted', 0)->first();

        if(empty($teacher)) {
            return response()->errorNotFound('Teacher data not found.');
        } else {
            $teacher->is_deleted = 1;
            $teacher->deleted_by = Auth::guard('headTeacher')->user()->teacher_id;
            $teacher->deleted_on = Carbon::now()->toDateTimeString();
    
            $teacher->save();
            UserActivityLogController::AddUserActivityLogDelete($teacher->deleted_by, $teacher->teacher_id,  $teacher->teacher_first_name . ' ' . $teacher->teacher_last_name, "Teacher Deleted");
            return response()->success('Teacher deleted successfully.', 'teacher', null);
        }
    }
    public function AddTeacher(Request $request)
    {
        $request->validate([
            'teacher_employee_code' => 'required',
            'teacher_first_name' => 'required',
            'teacher_last_name' => 'required',
            'teacher_mobile' => 'required',
            'teacher_email' => 'required'
          ]);

        $teacher = new Teacher();

        $pass = GenerateID::getPassword();

        $teacher->teacher_id = GenerateID::getId();
        $teacher->fk_school_id =  Auth::guard('headTeacher')->user()->fk_school_id;
        $teacher->teacher_employee_code = $request->teacher_employee_code;
        $teacher->teacher_first_name = $request->teacher_first_name;
        $teacher->teacher_last_name =$request->teacher_last_name;
        $teacher->teacher_mobile =  $request->teacher_mobile;
        $teacher->teacher_email =  $request->teacher_email;
        $teacher->teacher_password =  Hash::make($pass);
        $teacher->created_by =  Auth::guard('headTeacher')->user()->teacher_id;
        $teacher->created_on =  Carbon::now()->toDateTimeString();
        $teacher ->save();

        SendPasswordToEmail::SendPasswordToEmailTeacher($request->teacher_email, $pass);
        UserActivityLogController::AddUserActivityLogInsert($teacher->created_by, $teacher->teacher_id,  $teacher->teacher_first_name . ' ' . $teacher->teacher_last_name, "Teacher Created");
        
        return response()->success('Teacher added successfully', 'teacher', $teacher);

    }
    public function EditTeacher(string $teacher_id){

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $teacher_id)->first();

        return view ('headTeacher/editTeacher')->with('teacher', $teacher);
    } 
    public function UpdateTeacher(Request $request)
    {
        $request->validate([
            'teacher_employee_code' => 'required',
            'teacher_first_name' => 'required',
            'teacher_last_name' => 'required',
            'teacher_mobile' => 'required',
            'teacher_email' => 'required'
          ]);

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', $request->teacher_id)->first();

        if(empty($teacher)) {
            return response()->errorNotFound('Teacher data not found.');
        } else {

            $teacher->teacher_employee_code =  $request->teacher_employee_code;
            $teacher->teacher_first_name = $request->teacher_first_name;
            $teacher->teacher_last_name = $request->teacher_last_name;
            $teacher->teacher_mobile =  $request->teacher_mobile;
            $teacher->teacher_email =  $request->teacher_email;
            $teacher->modified_by =  Auth::guard('headTeacher')->user()->teacher_id;
            $teacher->modified_on =  Carbon::now()->toDateTimeString();
    
            $teacher->save();
            UserActivityLogController::AddUserActivityLogUpdate($teacher->modified_by, $teacher->teacher_id,  $teacher->teacher_first_name . ' ' . $teacher->teacher_last_name, "Teacher Updated");
    
            return response()->success('Teacher updated successfully', 'teacher', $teacher);
        }
    }




    public function EditSchoolDetails()
    {

        $school_id = Auth::guard('headTeacher')->user()->fk_school_id;

        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();

        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school->school_id)->first();
        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('headTeacher')->user()->teacher_id)->first();

        if(empty($schoolFacility)){
            $schoolFacility = new SchoolFacilities();
        }
        if(empty($schoolEnreolmentOfStudent)){
            $schoolEnreolmentOfStudent = new SchoolEntrolmentOfStudent();
        }
        if(empty($teacher)){
            $teacher = new Teacher();
        }

        $school['schoolFacility'] = $schoolFacility;
        $school['schoolEnreolmentOfStudent'] = $schoolEnreolmentOfStudent;
        $school['headTeacher'] = $teacher;

        return view('/headTeacher/editSchoolDetails')->with('school', $school);
    }
    public function UpdateSchoolDetails(Request $request)
    {

        $school_id = Auth::guard('headTeacher')->user()->fk_school_id;

        $teacher = Teacher::where('is_deleted', 0)->where('teacher_id', Auth::guard('headTeacher')->user()->teacher_id)->first();
        $school = School::where('is_deleted', 0)->where('school_id', $school_id)->first();
        $schoolFacility = SchoolFacilities::where('is_deleted', 0)->where('fk_school_id', $school_id)->first();
        $schoolEnreolmentOfStudent = SchoolEntrolmentOfStudent::where('is_deleted', 0)->where('fk_school_id', $school_id)->first();

        if(empty($teacher)) {

            return response()->errorNotFound('Teacher Data not found.');

        } else if(empty($school)) {

            return response()->errorNotFound('School data not found.');

        } else if(empty($schoolFacility)) {

            return response()->errorNotFound('School Facility data not found.');

        } else if(empty($schoolEnreolmentOfStudent)) {

            return response()->errorNotFound('School Student Entrolment data not found.');

        } else {

            $school->school_name = $request->school_name;
            $school->udice_code = $request->udice_code;
            $school->village = $request->village;
            $school->cluster = $request->cluster;
            $school->block = $request->block;
            $school->district = $request->district;
            $school->state = $request->state;
            $school->pin = $request->pin;
            $school->class_from = $request->class_from;
            $school->class_to = $request->class_to;
            $school->school_type = $request->school_type;
            $school->school_category = $request->school_category;
            $school->school_medium = $request->school_medium;
            $school->state_management = $request->state_management;
            $school->national_management = $request->national_management;
            $school->status = $request->status;
            $school->location = $request->location;
            $school->aff_board_sec = $request->aff_board_sec;
            $school->add_board_h_sec = $request->add_board_h_sec;
            $school->year_of_establishment = $request->year_of_establishment;
            $school->pre_primary = $request->pre_primary;
            $school->class_rooms = $request->class_rooms;
            $school->other_rooms = $request->other_rooms;
            $school->modified_by = Auth::guard('headTeacher')->user()->teacher_id;
            $school->modified_on = Carbon::now()->toDateTimeString();
            $school->save();

            $schoolFacility->building_status = $request->building_status;
            $schoolFacility->coundary_wall = $request->coundary_wall;
            $schoolFacility->no_of_boys_toilets = $request->no_of_boys_toilets;
            $schoolFacility->no_of_girls_toilets = $request->no_of_girls_toilets;
            $schoolFacility->no_of_cwsn_toilets = $request->no_of_cwsn_toilets;
            $schoolFacility->drinking_water_availability = $request->drinking_water_availability;
            $schoolFacility->hand_wash_facility = $request->hand_wash_facility;
            $schoolFacility->functional_generator = $request->functional_generator;
            $schoolFacility->library = $request->library;
            $schoolFacility->reading_corner = $request->reading_corner;
            $schoolFacility->book_bank = $request->book_bank;
            $schoolFacility->functional_laptop = $request->functional_laptop;
            $schoolFacility->functional_desktop = $request->functional_desktop;
            $schoolFacility->functional_tablet = $request->functional_tablet;
            $schoolFacility->functional_scanner = $request->functional_scanner;
            $schoolFacility->functional_printer = $request->functional_printer;
            $schoolFacility->functional_led = $request->functional_led;
            $schoolFacility->functional_digiboard = $request->functional_digiboard;
            $schoolFacility->internet = $request->internet;
            $schoolFacility->dth = $request->dth;
            $schoolFacility->functional_web_cam = $request->functional_web_cam;
            $schoolFacility->modified_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolFacility->modified_on = Carbon::now()->toDateTimeString();
            $schoolFacility->save();

            $schoolEnreolmentOfStudent->pre_primary = $request->pre_primary;
            $schoolEnreolmentOfStudent->class_1 = $request->class_1;
            $schoolEnreolmentOfStudent->class_2 = $request->class_2;
            $schoolEnreolmentOfStudent->class_3 = $request->class_3;
            $schoolEnreolmentOfStudent->class_4 = $request->class_4;
            $schoolEnreolmentOfStudent->class_5 = $request->class_5;
            $schoolEnreolmentOfStudent->class_6 = $request->class_6;
            $schoolEnreolmentOfStudent->class_7 = $request->class_7;
            $schoolEnreolmentOfStudent->class_8 = $request->class_8;
            $schoolEnreolmentOfStudent->class_9 = $request->class_9;
            $schoolEnreolmentOfStudent->class_10 = $request->class_10;
            $schoolEnreolmentOfStudent->class_11 = $request->class_11;
            $schoolEnreolmentOfStudent->class_12 = $request->class_12;
            $schoolEnreolmentOfStudent->class_1_12 = $request->class_1_12;
            $schoolEnreolmentOfStudent->class_1_12_with_pre_primary = $request->class_1_12_with_pre_primary;
            $schoolEnreolmentOfStudent->total_male_students = $request->total_male_students;
            $schoolEnreolmentOfStudent->total_female_students = $request->total_female_students;
            $schoolEnreolmentOfStudent->total_teachers = $request->total_teachers;
            $schoolEnreolmentOfStudent->modified_by = Auth::guard('headTeacher')->user()->teacher_id;
            $schoolEnreolmentOfStudent->modified_on = Carbon::now()->toDateTimeString();
            $schoolEnreolmentOfStudent->save();

    
            return response()->success('School Details updated successfully', 'school', null);
        }
    }



    public function editHeadTeacher()
    {
        return view('/headTeacher/editHeadTeacher');
    }

      
    public function bmcDashboard(){
        return view('bmcDashboard/bmcDashboard');
    }
    public function AccessRoles(){
        return view('accessRoles/AccessRoles');
    }
    public function dataEntryOperator(){
        return view('accessRoles/dataEntryOperator');
    }
    public function  addSchool(){
        return view('bmcDashboard/addSchool');
    }
    public function teacherDatas(){
        return view('headTeacher/teacherDatas');
    }


}