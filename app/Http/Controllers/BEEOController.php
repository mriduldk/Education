<?php

namespace App\Http\Controllers;

use App\Models\BEEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class BEEOController extends Controller
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
    //     $credentials = $request->only('beeo_email', 'beeo_password');

    //     $beeo = BEEO::where('beeo_email', $request->beeo_email)->first();
    //     if ($beeo && Hash::check($request->beeo_password, $beeo->beeo_password)) {
    //         //Auth::login($user); Auth IS Login
    //         Auth::guard('beeo')->login($beeo);
    //         return response()->success('BEEO login successful', 'beeo', $beeo);
    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }

    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'beeo_name' => 'required',
    //         'beeo_phone' => 'required',
    //         'beeo_email' => 'required',
    //         'beeo_office_name' => 'required',
    //         'beeo_office_address' => 'required',
    //         'beeo_dictrict' => 'required',
    //         'beeo_block' => 'required'
    //       ]);

    //     $beeo = new BEEO;
        
    //     $fileName = time().'.'.$request->beeo_image_url->extension();  
    //     $request->beeo_image_url->move(public_path('files/profile/beeo'), $fileName);

    //     $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/beeo' . $fileName;

    //     $beeo->beeo_id = GenerateID::getId();
    //     $beeo->beeo_name =  $request->beeo_name;
    //     $beeo->beeo_phone = $request->beeo_phone;
    //     $beeo->beeo_email = $request->beeo_email;
    //     $beeo->beeo_password = Hash::make($request->beeo_password);
    //     $beeo->beeo_office_name =  $request->beeo_office_name;
    //     $beeo->beeo_office_address =  $request->beeo_office_address;
    //     $beeo->beeo_dictrict =  $request->beeo_dictrict;
    //     $beeo->beeo_block =  $request->beeo_block;
    //     $beeo->beeo_image_url = $path;
    //     $beeo->created_by =  Auth::guard('deeo')->user()->deeo_id;
    //     $beeo->created_on =  Carbon::now()->toDateTimeString();


    //     $beeo ->save();

    //     return response()->success('BEEO inserted successfully', 'beeo', $beeo);

    // }


    // public function show(BEEO $beeo)
    // {
    //     $beeo = BEEO::where('beeo_id', $beeo->beeo_id)->where('is_deleted', 0)->first();
        
    //     return response()->success('Fetched BEEO data successfully', 'beeo', $beeo);
    // }

    // public function getAllBEEO()
    // {
    //     $beeo = BEEO::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all BEEO data successfully', 'beeo', $beeo);
    // }

    // public function edit(BEEO $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $beeo_id)
    // {
    //     $request->validate([
    //         'beeo_name' => 'required',
    //         'beeo_phone' => 'required',
    //         'beeo_email' => 'required',
    //         'beeo_office_name' => 'required',
    //         'beeo_office_address' => 'required',
    //         'beeo_dictrict' => 'required'
    //       ]);

    //     $beeo = BEEO::where('beeo_id', $beeo_id)->first();

    //     if(empty($is)) {
    //         return response()->errorNotFound('IS data not found.');
    //     } else {
    //         if($request->beeo_image_url != null && $request->beeo_image_url != "") {
    //             $fileName = time().'.'.$request->beeo_image_url->extension();  
    //             $request->beeo_image_url->move(public_path('files/profile/beeo'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/beeo' . $fileName;
    //             $is->is_image_url = $path;
    //         }
    
    //         $beeo->beeo_name =  $request->beeo_name;
    //         $beeo->beeo_phone = $request->beeo_phone;
    //         $beeo->beeo_email = $request->beeo_email;
    //         $beeo->beeo_office_name =  $request->beeo_office_name;
    //         $beeo->beeo_office_address =  $request->beeo_office_address;
    //         $beeo->beeo_dictrict =  $request->beeo_dictrict;
    //         $beeo->beeo_block =  $request->beeo_block;
    //         $beeo->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    //         $beeo->modified_on =  Carbon::now()->toDateTimeString();
    
    //         $beeo->save();
    
    //         return response()->success('BEEO updated successfully', 'beeo', $beeo);
    //     }
    // }


    // public function destroy($beeo_id)
    // {
    //     $beeo = BEEO::where('beeo_id', $beeo_id)->first();

    //     if(empty($beeo)) {
    //         return response()->errorNotFound('BEEO data not found.');
    //     } else {
    //         $beeo->is_deleted = 1;
    //         $beeo->deleted_by = Auth::guard('beeo')->user()->beeo_id;
    //         $beeo->deleted_on = Carbon::now()->toDateTimeString();
    
    //         $beeo->save();
    //         return response()->success('BEEO deleted successfully.', 'beeo', null);
    //     }
    // }


    public function Dashboard(){
        return view('BEEO/Dashboard');
    }

    public function BlockSelect(){
        return view('BEEO/blockSelect');
    }

    public function SchoolList(){
        return view('BEEO/schoolList');
    }

    public function allTeacherList()
    {
        return view('/BEEO/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


 


}