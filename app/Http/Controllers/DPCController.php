<?php

namespace App\Http\Controllers;

use App\Models\DPC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class DPCController extends Controller
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
    //     $credentials = $request->only('dpc_email', 'dpc_password');

    //     $dpc = DPC::where('dpc_email', $request->dpc_email)->first();
    //     if ($dpc && Hash::check($request->dpc_password, $dpc->dpc_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('dpc')->login($dpc);
    //         return response()->success('DPC login successful', 'dpc', $dpc);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'dpc_name' => 'required',
    //         'dpc_phone' => 'required',
    //         'dpc_email' => 'required',
    //         'dpc_office_name' => 'required',
    //         'dpc_office_address' => 'required',
    //         'dpc_dictrict' => 'required'
    //       ]);

    //     $dpc = new DPC;
        
    //     $fileName = time().'.'.$request->dpc_image_url->extension();  
    //     $request->dpc_image_url->move(public_path('files/profile/dpc'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dpc' . $fileName;

    //     $dpc->dpc_id = GenerateID::getId();
    //     $dpc->dpc_name =  $request->dpc_name;
    //     $dpc->dpc_phone = $request->dpc_phone;
    //     $dpc->dpc_email = $request->dpc_email;
    //     $dpc->dpc_password = Hash::make($request->dpc_password);
    //     $dpc->dpc_office_name =  $request->dpc_office_name;
    //     $dpc->dpc_office_address =  $request->dpc_office_address;
    //     $dpc->dpc_dictrict =  $request->dpc_dictrict;
    //     $dpc->dpc_image_url = $path;
    //     $dpc->created_by =  Auth::guard('chd')->user()->chd_id;
    //     $dpc->created_on =  Carbon::now()->toDateTimeString();


    //     $dpc ->save();

    //     return response()->success('DPC inserted successfully', 'dpc', $dpc);

    // }


    // public function show(DPC $dpc)
    // {
    //     $dpc = DPC::where('dpc_id', $dpc->dpc_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched DPC data successfully', 'dpc', $dpc);
    // }

    // public function getAllDPC()
    // {
    //     $dpc = DPC::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all DPC data successfully', 'dpc', $dpc);
    // }

    // public function edit(DPC $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $dpc_id)
    // {
    //     $request->validate([
    //         'dpc_name' => 'required',
    //         'dpc_phone' => 'required',
    //         'dpc_email' => 'required',
    //         'dpc_office_name' => 'required',
    //         'dpc_office_address' => 'required',
    //         'dpc_dictrict' => 'required'
    //       ]);

    //     $dpc = DPC::where('dpc_id', $dpc_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->dpc_image_url != null && $request->dpc_image_url != "") {
    //             $fileName = time().'.'.$request->dpc_image_url->extension();  
    //             $request->dpc_image_url->move(public_path('files/profile/dpc'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dpc' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $dpc->dpc_name =  $request->dpc_name;
    //         $dpc->dpc_phone = $request->dpc_phone;
    //         $dpc->dpc_email = $request->dpc_email;
    //         $dpc->dpc_office_name =  $request->dpc_office_name;
    //         $dpc->dpc_office_address =  $request->dpc_office_address;
    //         $dpc->dpc_dictrict =  $request->dpc_dictrict;
    //         $dpc->modified_by =  Auth::guard('dpc')->user()->dpc_id;
    //         $dpc->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $dpc->save();
    
    //         return response()->success('DPC updated successfully', 'dpc', $dpc);
    //     }
    // }


    // public function destroy($dpc_id)
    // {
    //     $dpc = DPC::where('dpc_id', $dpc_id)->first();

    //     if(empty($dpc)) {
    //         return response()->errorNotFound('DPC data not found.');
    //     } else {
    //         $dpc->is_deleted = 1;
    //         $dpc->deleted_by = Auth::guard('dpc')->user()->dpc_id;
    //         $dpc->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $dpc->save();
    //         return response()->success('DPC deleted successfully.', 'dpc', null);
    //     }
    // }




    public function Dashboard(){
        return view('DPC/Dashboard');
    }

    public function BlockSelect(){
        return view('DPC/blockSelect');
    }

    public function SchoolList(){
        return view('DPC/schoolList');
    }

    public function allTeacherList()
    {
        return view('/DPC/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


}
