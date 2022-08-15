<?php

namespace App\Http\Controllers;

use App\Models\DMC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class DMCController extends Controller
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
    //     $credentials = $request->only('dmc_email', 'dmc_password');

    //     $dmc = DMC::where('dmc_email', $request->dmc_email)->first();
    //     if ($dmc && Hash::check($request->dmc_password, $dmc->dmc_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('dmc')->login($dmc);
    //         return response()->success('DMC login successful', 'dmc', $dmc);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'dmc_name' => 'required',
    //         'dmc_phone' => 'required',
    //         'dmc_email' => 'required',
    //         'dmc_office_name' => 'required',
    //         'dmc_office_address' => 'required',
    //         'dmc_dictrict' => 'required'
    //       ]);

    //     $dmc = new DMC;
        
    //     $fileName = time().'.'.$request->dmc_image_url->extension();  
    //     $request->dmc_image_url->move(public_path('files/profile/dmc'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dmc' . $fileName;

    //     $dmc->dmc_id = GenerateID::getId();
    //     $dmc->dmc_name =  $request->dmc_name;
    //     $dmc->dmc_phone = $request->dmc_phone;
    //     $dmc->dmc_email = $request->dmc_email;
    //     $dmc->dmc_password = Hash::make($request->dmc_password);
    //     $dmc->dmc_office_name =  $request->dmc_office_name;
    //     $dmc->dmc_office_address =  $request->dmc_office_address;
    //     $dmc->dmc_dictrict =  $request->dmc_dictrict;
    //     $dmc->dmc_image_url = $path;
    //     $dmc->created_by =  Auth::guard('chd')->user()->chd_id;
    //     $dmc->created_on =  Carbon::now()->toDateTimeString();


    //     $dmc ->save();

    //     return response()->success('DMC inserted successfully', 'dmc', $dmc);

    // }


    // public function show(DMC $dmc)
    // {
    //     $dmc = DMC::where('dmc_id', $dmc->dmc_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched DMC data successfully', 'dmc', $dmc);
    // }

    // public function getAllIS()
    // {
    //     $dmc = DMC::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all DMC data successfully', 'dmc', $dmc);
    // }

    // public function edit(DMC $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $dmc_id)
    // {
    //     $request->validate([
    //         'dmc_name' => 'required',
    //         'dmc_phone' => 'required',
    //         'dmc_email' => 'required',
    //         'dmc_office_name' => 'required',
    //         'dmc_office_address' => 'required',
    //         'dmc_dictrict' => 'required'
    //       ]);

    //     $dmc = DMC::where('dmc_id', $dmc_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->dmc_image_url != null && $request->dmc_image_url != "") {
    //             $fileName = time().'.'.$request->dmc_image_url->extension();  
    //             $request->dmc_image_url->move(public_path('files/profile/dmc'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dmc' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $dmc->dmc_name =  $request->dmc_name;
    //         $dmc->dmc_phone = $request->dmc_phone;
    //         $dmc->dmc_email = $request->dmc_email;
    //         $dmc->dmc_office_name =  $request->dmc_office_name;
    //         $dmc->dmc_office_address =  $request->dmc_office_address;
    //         $dmc->dmc_dictrict =  $request->dmc_dictrict;
    //         $dmc->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    //         $dmc->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $dmc->save();
    
    //         return response()->success('DMC updated successfully', 'dmc', $dmc);
    //     }
    // }


    // public function destroy($dmc_id)
    // {
    //     $dmc = DMC::where('dmc_id', $dmc_id)->first();

    //     if(empty($dmc)) {
    //         return response()->errorNotFound('DMC data not found.');
    //     } else {
    //         $dmc->is_deleted = 1;
    //         $dmc->deleted_by = Auth::guard('dmc')->user()->dmc_id;
    //         $dmc->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $dmc->save();
    //         return response()->success('DMC deleted successfully.', 'dmc', null);
    //     }
    // }


    
    public function Dashboard(){
        return view('DMC/Dashboard');
    }

    public function BlockSelect(){
        return view('DMC/blockSelect');
    }

    public function SchoolList(){
        return view('DMC/schoolList');
    }

    public function allTeacherList()
    {
        return view('/DMC/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


    


}