<?php

namespace App\Http\Controllers;

use App\Models\DI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class DIController extends Controller
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
    //     $credentials = $request->only('di_email', 'di_password');

    //     $di = DI::where('di_email', $request->di_email)->first();
    //     if ($di && Hash::check($request->di_password, $di->di_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('di')->login($di);
    //         return response()->success('DI login successful', 'di', $di);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'di_name' => 'required',
    //         'di_phone' => 'required',
    //         'di_email' => 'required',
    //         'di_office_name' => 'required',
    //         'di_office_address' => 'required',
    //         'di_dictrict' => 'required',
    //         'di_block' => 'required'
    //       ]);

    //     $di = new DI;
        
    //     $fileName = time().'.'.$request->di_image_url->extension();  
    //     $request->di_image_url->move(public_path('files/profile/di'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/di' . $fileName;

    //     $di->di_id = GenerateID::getId();
    //     $di->di_name =  $request->di_name;
    //     $di->di_phone = $request->di_phone;
    //     $di->di_email = $request->di_email;
    //     $di->di_password = Hash::make($request->di_password);
    //     $di->di_office_name =  $request->di_office_name;
    //     $di->di_office_address =  $request->di_office_address;
    //     $di->di_dictrict =  $request->di_dictrict;
    //     $di->di_block =  $request->di_block;
    //     $di->di_image_url = $path;
    //     $di->created_by =  Auth::guard('deeo')->user()->deeo_id;
    //     $di->created_on =  Carbon::now()->toDateTimeString();


    //     $di ->save();

    //     return response()->success('DI inserted successfully', 'di', $di);

    // }


    // public function show(DI $di)
    // {
    //     $di = DI::where('di_id', $di->di_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched DI data successfully', 'di', $di);
    // }

    // public function getAllDI()
    // {
    //     $di = DI::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all DI data successfully', 'di', $di);
    // }

    // public function edit(DI $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $di_id)
    // {
    //     $request->validate([
    //         'di_name' => 'required',
    //         'di_phone' => 'required',
    //         'di_email' => 'required',
    //         'di_office_name' => 'required',
    //         'di_office_address' => 'required',
    //         'di_dictrict' => 'required'
    //       ]);

    //     $di = DI::where('di_id', $di_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->di_image_url != null && $request->di_image_url != "") {
    //             $fileName = time().'.'.$request->di_image_url->extension();  
    //             $request->di_image_url->move(public_path('files/profile/di'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/di' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $di->di_name =  $request->di_name;
    //         $di->di_phone = $request->di_phone;
    //         $di->di_email = $request->di_email;
    //         $di->di_office_name =  $request->di_office_name;
    //         $di->di_office_address =  $request->di_office_address;
    //         $di->di_dictrict =  $request->di_dictrict;
    //         $di->di_block =  $request->di_block;
    //         $di->modified_by =  Auth::guard('di')->user()->di_id;
    //         $di->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $di->save();
    
    //         return response()->success('DI updated successfully', 'di', $di);
    //     }
    // }


    // public function destroy($di_id)
    // {
    //     $di = DI::where('di_id', $di_id)->first();

    //     if(empty($di)) {
    //         return response()->errorNotFound('DI data not found.');
    //     } else {
    //         $di->is_deleted = 1;
    //         $di->deleted_by = Auth::guard('di')->user()->di_id;
    //         $di->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $di->save();
    //         return response()->success('DI deleted successfully.', 'di', null);
    //     }
    // }


     
    public function Dashboard(){
        return view('DI/Dashboard');
    }

    public function BlockSelect(){
        return view('DI/blockSelect');
    }

    public function SchoolList(){
        return view('DI/schoolList');
    }

    public function allTeacherList()
    {
        return view('/DI/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


    


}