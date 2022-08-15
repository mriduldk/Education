<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\BEEO;
use App\Models\CHD;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use App\Models\Approver;
use App\Models\Manager;
use Carbon\Carbon;

class CHDController extends Controller
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
    //     $credentials = $request->only('chd_email', 'chd_password');

    //     $chd = CHD::where('chd_email', $request->chd_email)->where('is_deleted', 0)->first();
    //     if ($chd && Hash::check($request->chd_password, $chd->chd_password)) {

    //         Auth::guard('chd')->login($chd);
    //         return response()->success('CHD login successful', 'is', $chd);

    //     } else {
    //         return response()->errorUnauthorised('Falied to login');
    //     }
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'chd_name' => 'required',
    //         'chd_phone' => 'required',
    //         'chd_email' => 'required',
    //         'chd_password' => 'required'
    //       ]);
   
    //       $chd = new CHD;
           
    //       $fileName = time().'.'.$request->chd_image_url->extension();  
    //       $request->chd_image_url->move(public_path('files/profile/chd'), $fileName);
  
    //       $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/chd' . $fileName;
  
    //       $chd->chd_id = GenerateID::getId();
    //       $chd->chd_name = $request->chd_name;
    //       $chd->chd_phone = $request->chd_phone;
    //       $chd->chd_email = $request->chd_email;
    //       $chd->chd_password =  Hash::make($request->chd_password);
    //       $chd->chd_image_url = $path;
   
    //       $chd ->save();
    //       return response()->success('CHD inserted successfully', 'chd', $chd);
    // }


    // public function show(CHD $chd)
    // {
    //     $chd = CHD::where('chd_id', $chd->chd_id)->where('is_deleted', 0)->first();
    //     return response()->success('Fetched CHD data successfully', 'chd', $chd);
    // }

    // public function getAllIS()
    // {
    //     $chd = CHD::where('is_deleted', 0)->get();
        
    //     return response()->success('Fetched all CHD data successfully', 'chd', $chd);
    // }


    // public function edit(CHD $cHD)
    // {
    //     //
    // }


    // public function update(Request $request, $chd_id)
    // {
    //     $request->validate([
    //         'chd_name' => 'required',
    //         'chd_phone' => 'required',
    //         'chd_email' => 'required',
    //         'chd_password' => 'required'
    //       ]);

    //     $chd = CHD::where('chd_id', $chd_id)->first();

    //     if(empty($chd)) {
    //         return response()->errorNotFound('CHD data not found.');
    //     } else {
    //         if($request->chd_image_url != null && $request->chd_image_url != "") {
    //             $fileName = time().'.'.$request->chd_image_url->extension();  
    //             $request->chd_image_url->move(public_path('files/profile/chd'), $fileName);
    
    //             $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/chd' . $fileName;
    //             $chd->chd_image_url = $path;
    //         }
    
    //         $chd->chd_name = $request->chd_name;
    //         $chd->chd_phone = $request->chd_phone;
    //         $chd->chd_email = $request->chd_email;
    //         $chd->chd_password =  Hash::make($request->chd_password);
    
    //         $chd->save();

    //         return response()->success('CHD updated successfully', 'chd', $chd);
    //     }
    // }


    // public function destroy($chd_id)
    // {
    //     $chd = CHD::where('chd_id', $chd_id)->first();
        
    //     if(empty($is)) {
    //         return response()->errorNotFound('CHD data not found.');
    //     } else {
    //         $chd->is_deleted = 1;
    //         $chd->save();
    //         return response()->success('CHD deleted successfully.', 'chd', null);
    //     }
    // }

    public function Dashboard(){
        return view('CHD/Dashboard');
    }

    public function BlockSelect(){
        return view('CHD/blockSelect');
    }

    public function SchoolList(){
        return view('CHD/schoolList');
    }

    public function allTeacherList()
    {
        return view('/CHD/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


    /** Manager */
    public function allManagerList()
    {
        return view('/DEEO/manager/allManagerList');
    }
    public function AllManagerData()
    {
        $manager = Manager::where('is_deleted', 0)->get();
        return $manager;
    }
    public function GetManagerDataForEdit(Request $request)
    {
        //dd($request);
        $manager = Manager::where('is_deleted', 0)->where('manager_id', $request->manager_id)->first();
        //dd($manager);
        return $manager;
    }
    public function InsertManager(Request $request)
    {
        $request->validate([
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'manager_email' => 'required',
            'manager_office_name' => 'required',
            'manager_office_address' => 'required',
            'manager_dictrict' => 'required',
            'manager_type' => 'required'
            ]);

        $manager = new Manager;
        
        if($request->manager_image_url != null) {
            $fileName = time().'.'.$request->manager_image_url->extension();  
            $request->manager_image_url->move(public_path('files/profile/manager'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;
    
            $manager->manager_image_url = $path;
        }

        if($request->manager_type == "IS"){

            $manager->created_by =  Auth::guard('is')->user()->is_id;
            $manager->manager_type =  0;

        } else if($request->manager_type == "DPC"){
            
            $manager->created_by =  Auth::guard('dpc')->user()->dpc_id;
            $manager->manager_type =  1;

        }  else if($request->manager_type == "DMC"){

            $manager->created_by =  Auth::guard('dmc')->user()->dmc_id;
            $manager->manager_type =  2;

        }  else if($request->manager_type == "DEEO"){

            $manager->created_by =  Auth::guard('deeo')->user()->deeo_id;
            $manager->manager_type =  3;

        } else {
            return response()->errorUnauthorised('Manager type is not valid');
        }


        $manager->manager_id = GenerateID::getId();
        $manager->manager_name =  $request->manager_name;
        $manager->manager_phone = $request->manager_phone;
        $manager->manager_email = $request->manager_email;
        $manager->manager_password = Hash::make($request->manager_password);
        
        $manager->manager_office_name =  $request->manager_office_name;
        $manager->manager_office_address =  $request->manager_office_address;
        $manager->manager_dictrict =  $request->manager_dictrict;
        $manager->created_on =  Carbon::now()->toDateTimeString();


        $manager ->save();

        return response()->success('Manager inserted successfully', 'manager', $manager);

    }
    public function UpdateManager(Request $request)
    {
        $request->validate([
            'manager_name_e' => 'required',
            'manager_phone_e' => 'required',
            'manager_email_e' => 'required',
            'manager_office_name_e' => 'required',
            'manager_office_address_e' => 'required',
            'manager_dictrict_e' => 'required',
            'manager_type_e' => 'required'
            ]);

        $manager = Manager::where('manager_id', $request->manager_id_e)->where('is_deleted', 0)->first();

        if(empty($manager)) {
            return response()->errorNotFound('Manager data not found.');
        } else {
            if($request->manager_image_url_e != null && $request->manager_image_url_e != "") {
                $fileName = time().'.'.$request->manager_image_url_e->extension();  
                $request->manager_image_url_e->move(public_path('files/profile/manager'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;
                $manager->manager_image_url = $path;
            }

            if($request->manager_type_e == "IS"){

                $manager->modified_by =  Auth::guard('is')->user()->is_id;
                $manager->manager_type =  0;
    
            } else if($request->manager_type_e == "DPC"){
                
                $manager->modified_by =  Auth::guard('dpc')->user()->dpc_id;
                $manager->manager_type =  1;
    
            }  else if($request->manager_type_e == "DMC"){
    
                $manager->modified_by =  Auth::guard('dmc')->user()->dmc_id;
                $manager->manager_type =  2;
    
            }  else if($request->manager_type_e == "DEEO"){
    
                $manager->modified_by =  Auth::guard('deeo')->user()->deeo_id;
                $manager->manager_type =  3;
    
            } else {
                return response()->errorUnauthorised('Manager type is not valid');
            }    
    
            $manager->manager_name =  $request->manager_name_e;
            $manager->manager_phone = $request->manager_phone_e;
            $manager->manager_email = $request->manager_email_e;
            $manager->manager_office_name =  $request->manager_office_name_e;
            $manager->manager_office_address =  $request->manager_office_address_e;
            $manager->manager_dictrict =  $request->manager_dictrict_e;
            $manager->modified_on =  Carbon::now()->toDateTimeString();
    
            $manager->save();
    
            return response()->success('Manager updated successfully', 'manager', $manager);
        }
    }
    public function ManagerDelete(Request $request)
    {
        $manager = Manager::where('manager_id', $request->manager_id)->first();

        if(empty($manager)) {
            return response()->errorNotFound('Manager data not found.');
        } else {

            if($request->manager_type == "IS"){

                $manager->deleted_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->manager_type == "DPC"){
                
                $manager->deleted_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->manager_type == "DMC"){
    
                $manager->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->manager_type == "DEEO"){
    
                $manager->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else {
                return response()->errorUnauthorised('Manager type is not valid');
            }   

            $manager->is_deleted = 1;
            //$manager->deleted_by = Auth::guard('manager')->user()->manager_id;
            $manager->deleted_on = Carbon::now()->toDateTimeString();
    
            $manager->save();
            return response()->success('Manager deleted successfully.', 'manager', null);
        }
    }



}
