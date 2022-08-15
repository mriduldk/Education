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
use Carbon\Carbon;

class DEEOController extends Controller
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
    //     $credentials = $request->only('deeo_email', 'deeo_password');

    //     $deeo = DEEO::where('deeo_email', $request->deeo_email)->first();
    //     if ($deeo && Hash::check($request->deeo_password, $deeo->deeo_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('deeo')->login($deeo);
    //         return response()->success('DEEO login successful', 'deeo', $deeo);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'deeo_name' => 'required',
    //         'deeo_phone' => 'required',
    //         'deeo_email' => 'required',
    //         'deeo_office_name' => 'required',
    //         'deeo_office_address' => 'required',
    //         'deeo_dictrict' => 'required'
    //       ]);

    //     $deeo = new DEEO;
        
    //     $fileName = time().'.'.$request->deeo_image_url->extension();  
    //     $request->deeo_image_url->move(public_path('files/profile/deeo'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deeo' . $fileName;

    //     $deeo->deeo_id = GenerateID::getId();
    //     $deeo->deeo_name =  $request->deeo_name;
    //     $deeo->deeo_phone = $request->deeo_phone;
    //     $deeo->deeo_email = $request->deeo_email;
    //     $deeo->deeo_password = Hash::make($request->deeo_password);
    //     $deeo->deeo_office_name =  $request->deeo_office_name;
    //     $deeo->deeo_office_address =  $request->deeo_office_address;
    //     $deeo->deeo_dictrict =  $request->deeo_dictrict;
    //     $deeo->deeo_image_url = $path;
    //     $deeo->created_by =  Auth::guard('chd')->user()->chd_id;
    //     $deeo->created_on =  Carbon::now()->toDateTimeString();


    //     $deeo ->save();

    //     return response()->success('DEEO inserted successfully', 'deeo', $deeo);

    // }


    // public function show(DEEO $deeo)
    // {
    //     $deeo = DEEO::where('deeo_id', $deeo->deeo_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched DEEO data successfully', 'deeo', $deeo);
    // }

    // public function getAllIS()
    // {
    //     $deeo = DEEO::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all DEEO data successfully', 'deeo', $deeo);
    // }

    // public function edit(DEEO $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $deeo_id)
    // {
    //     $request->validate([
    //         'deeo_name' => 'required',
    //         'deeo_phone' => 'required',
    //         'deeo_email' => 'required',
    //         'deeo_office_name' => 'required',
    //         'deeo_office_address' => 'required',
    //         'deeo_dictrict' => 'required'
    //       ]);

    //     $deeo = DEEO::where('deeo_id', $deeo_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->deeo_image_url != null && $request->deeo_image_url != "") {
    //             $fileName = time().'.'.$request->deeo_image_url->extension();  
    //             $request->deeo_image_url->move(public_path('files/profile/deeo'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deeo' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $deeo->deeo_name =  $request->deeo_name;
    //         $deeo->deeo_phone = $request->deeo_phone;
    //         $deeo->deeo_email = $request->deeo_email;
    //         $deeo->deeo_office_name =  $request->deeo_office_name;
    //         $deeo->deeo_office_address =  $request->deeo_office_address;
    //         $deeo->deeo_dictrict =  $request->deeo_dictrict;
    //         $deeo->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    //         $deeo->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $deeo->save();
    
    //         return response()->success('DEEO updated successfully', 'deeo', $deeo);
    //     }
    // }


    // public function destroy($deeo_id)
    // {
    //     $deeo = DEEO::where('deeo_id', $deeo_id)->first();

    //     if(empty($deeo)) {
    //         return response()->errorNotFound('DEEO data not found.');
    //     } else {
    //         $deeo->is_deleted = 1;
    //         $deeo->deleted_by = Auth::guard('deeo')->user()->deeo_id;
    //         $deeo->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $deeo->save();
    //         return response()->success('DEEO deleted successfully.', 'deeo', null);
    //     }
    // }


    public function Dashboard(){
        return view('DEEO/Dashboard');
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
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }





}