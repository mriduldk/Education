<?php

namespace App\Http\Controllers;

use App\Models\BMC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\School;
use App\Models\Teacher;
use Carbon\Carbon;

class BMCController extends Controller
{
    // public function index()
    // {
    //     //
    // }


    // public function create()
    // {
    //     //
    // }

    // public function processLogin(Request $request)
    // {
    //     $credentials = $request->only('bmc_email', 'bmc_password');

    //     $bmc = BMC::where('bmc_email', $request->bmc_email)->first();
    //     if ($bmc && Hash::check($request->bmc_password, $bmc->bmc_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('bmc')->login($bmc);
    //         return response()->success('BMC login successful', 'bmc', $bmc);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'bmc_name' => 'required',
    //         'bmc_phone' => 'required',
    //         'bmc_email' => 'required',
    //         'bmc_office_name' => 'required',
    //         'bmc_office_address' => 'required',
    //         'bmc_dictrict' => 'required',
    //         'bmc_block' => 'required'
    //       ]);

    //     $bmc = new BMC;
        
    //     $fileName = time().'.'.$request->bmc_image_url->extension();  
    //     $request->bmc_image_url->move(public_path('files/profile/bmc'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/bmc' . $fileName;

    //     $bmc->bmc_id = GenerateID::getId();
    //     $bmc->bmc_name =  $request->bmc_name;
    //     $bmc->bmc_phone = $request->bmc_phone;
    //     $bmc->bmc_email = $request->bmc_email;
    //     $bmc->bmc_password = Hash::make($request->bmc_password);
    //     $bmc->bmc_office_name =  $request->bmc_office_name;
    //     $bmc->bmc_office_address =  $request->bmc_office_address;
    //     $bmc->bmc_dictrict =  $request->bmc_dictrict;
    //     $bmc->bmc_block =  $request->bmc_block;
    //     $bmc->bmc_image_url = $path;
    //     $bmc->created_by =  Auth::guard('dmc')->user()->dmc_id;
    //     $bmc->created_on =  Carbon::now()->toDateTimeString();


    //     $bmc ->save();

    //     return response()->success('BMC inserted successfully', 'bmc', $bmc);

    // }


    // public function show(BMC $bmc)
    // {
    //     $bmc = BMC::where('bmc_id', $bmc->bmc_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched BMC data successfully', 'bmc', $bmc);
    // }

    // public function getAllBMC()
    // {
    //     $bmc = BMC::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all BMC data successfully', 'bmc', $bmc);
    // }

    // public function edit(BMC $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $bmc_id)
    // {
    //     $request->validate([
    //         'bmc_name' => 'required',
    //         'bmc_phone' => 'required',
    //         'bmc_email' => 'required',
    //         'bmc_office_name' => 'required',
    //         'bmc_office_address' => 'required',
    //         'bmc_dictrict' => 'required'
    //       ]);

    //     $bmc = BMC::where('bmc_id', $bmc_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->bmc_image_url != null && $request->bmc_image_url != "") {
    //             $fileName = time().'.'.$request->bmc_image_url->extension();  
    //             $request->bmc_image_url->move(public_path('files/profile/bmc'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/bmc' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $bmc->bmc_name =  $request->bmc_name;
    //         $bmc->bmc_phone = $request->bmc_phone;
    //         $bmc->bmc_email = $request->bmc_email;
    //         $bmc->bmc_office_name =  $request->bmc_office_name;
    //         $bmc->bmc_office_address =  $request->bmc_office_address;
    //         $bmc->bmc_dictrict =  $request->bmc_dictrict;
    //         $bmc->bmc_block =  $request->bmc_block;
    //         $bmc->modified_by =  Auth::guard('bmc')->user()->bmc_id;
    //         $bmc->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $bmc->save();
    
    //         return response()->success('BMC updated successfully', 'bmc', $bmc);
    //     }
    // }


    // public function destroy($bmc_id)
    // {
    //     $bmc = BMC::where('bmc_id', $bmc_id)->first();

    //     if(empty($bmc)) {
    //         return response()->errorNotFound('BMC data not found.');
    //     } else {
    //         $bmc->is_deleted = 1;
    //         $bmc->deleted_by = Auth::guard('bmc')->user()->bmc_id;
    //         $bmc->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $bmc->save();
    //         return response()->success('BMC deleted successfully.', 'bmc', null);
    //     }
    // }


    public function Dashboard(){
        return view('BMC/Dashboard');
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
            $school['headTeacher'] = $teacher;
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

        $school->school_id = GenerateID::getId();
        $school->school_name = $request->school_name;
        $school->udice_code =$request->udice_code;
        $school->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $school->created_on =  Carbon::now()->toDateTimeString();
        $school ->save();

        $teacher->teacher_id = GenerateID::getId();
        $teacher->fk_school_id = $school->school_id;
        $teacher->teacher_first_name = $request->head_teacher_first_name;
        $teacher->teacher_last_name =$request->head_teacher_last_name;
        $teacher->teacher_mobile =  $request->head_teacher_number;
        $teacher->teacher_email =  $request->head_teacher_email;
        $teacher->teacher_password =  Hash::make('123456');
        $teacher->is_head_teacher =  1;
        $teacher->created_by =  Auth::guard('bmc')->user()->bmc_id;
        $teacher->created_on =  Carbon::now()->toDateTimeString();
        $teacher ->save();


        return response()->success('School added successfully', 'school', $school);


    }


}