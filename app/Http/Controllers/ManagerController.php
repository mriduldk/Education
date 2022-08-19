<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class ManagerController extends Controller
{

    public function processLogin(Request $request)
    {
        $credentials = $request->only('manager_email', 'manager_password');

        $manager = Manager::where('manager_email', $request->manager_email)->first();
        if ($manager && Hash::check($request->manager_password, $manager->manager_password)) {
            Auth::guard('manager')->login($manager);
            return response()->success('Manager login successful', 'manager', $manager);
        } else {
            return response()->errorUnauthorised('Falied to login');
        }

    }

    public function store(Request $request)
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
        
        $fileName = time().'.'.$request->manager_image_url->extension();  
        $request->manager_image_url->move(public_path('files/profile/manager'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;

        if($request->manager_type == "IS"){

            $manager->created_by =  Auth::guard('is')->user()->is_id;

        } else if($request->manager_type == "DPC"){
            
            $manager->created_by =  Auth::guard('dpc')->user()->dpc_id;

        }  else if($request->manager_type == "DMC"){

            $manager->created_by =  Auth::guard('dmc')->user()->dmc_id;

        }  else if($request->manager_type == "DEEO"){

            $manager->created_by =  Auth::guard('deeo')->user()->deeo_id;

        } else {
            return response()->errorUnauthorised('Manager type is not valid');
        }


        $manager->manager_id = GenerateID::getId();
        $manager->manager_name =  $request->manager_name;
        $manager->manager_phone = $request->manager_phone;
        $manager->manager_email = $request->manager_email;
        $manager->manager_password = Hash::make($request->manager_password);
        $manager->manager_type =  $request->manager_type;
        $manager->manager_office_name =  $request->manager_office_name;
        $manager->manager_office_address =  $request->manager_office_address;
        $manager->manager_dictrict =  $request->manager_dictrict;
        $manager->manager_image_url = $path;
        $manager->created_on =  Carbon::now()->toDateTimeString();


        $manager ->save();

        return response()->success('Manager inserted successfully', 'manager', $manager);

    }

    public function show(Manager $manager)
    {
        $manager = Manager::where('manager_id', $manager->manager_id)->where('is_deleted', 0)->first();
        
        return response()->success('Fetched Manager data successfully', 'manager', $manager);
    }

    public function getAllManager()
    {
        $manager = Manager::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all Manager data successfully', 'manager', $manager);
    }

    public function update(Request $request, $manager_id)
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

        $manager = Manager::where('manager_id', $manager_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->manager_image_url != null && $request->manager_image_url != "") {
                $fileName = time().'.'.$request->manager_image_url->extension();  
                $request->manager_image_url->move(public_path('files/profile/manager'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;
                $is->is_image_url = $path;
            }

            if($request->manager_type == "IS"){

                $manager->modified_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->manager_type == "DPC"){
                
                $manager->modified_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->manager_type == "DMC"){
    
                $manager->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->manager_type == "DEEO"){
    
                $manager->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else {
                return response()->errorUnauthorised('Manager type is not valid');
            }    
    
            $manager->manager_name =  $request->manager_name;
            $manager->manager_phone = $request->manager_phone;
            $manager->manager_email = $request->manager_email;
            $manager->manager_type =  $request->manager_type;
            $manager->manager_office_name =  $request->manager_office_name;
            $manager->manager_office_address =  $request->manager_office_address;
            $manager->manager_dictrict =  $request->manager_dictrict;
            $manager->modified_by =  Auth::guard('manager')->user()->manager_id;
            $manager->modified_on =  Carbon::now()->toDateTimeString();
    
            $manager->save();
    
            return response()->success('Manager updated successfully', 'manager', $manager);
        }
    }

    public function destroy($manager_id)
    {
        $manager = Manager::where('manager_id', $manager_id)->first();

        if(empty($manager)) {
            return response()->errorNotFound('Manager data not found.');
        } else {
            $manager->is_deleted = 1;
            $manager->deleted_by = Auth::guard('manager')->user()->manager_id;
            $manager->deleted_on = Carbon::now()->toDateTimeString();
    
            $manager->save();
            return response()->success('Manager deleted successfully.', 'manager', null);
        }
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
 
         } else if($request->manager_type == "DI"){

            $manager->created_by =  Auth::guard('di')->user()->di_id;
            $manager->manager_type =  4;

        } else if($request->manager_type == "BEEO"){

            $manager->created_by =  Auth::guard('beeo')->user()->beeo_id;
            $manager->manager_type =  5;

        } else if($request->manager_type == "BMC"){

            $manager->created_by =  Auth::guard('bmc')->user()->bmc_id;
            $manager->manager_type =  6;

        } else if($request->manager_type == "CHD"){

            $manager->created_by =  Auth::guard('chd')->user()->chd_id;
            $manager->manager_type =  7;

        } else {
             return response()->errorUnauthorised('Manager type is not valid');
        }
 
         $pass = GenerateID::getPassword();
 
        $manager->manager_id = GenerateID::getId();
        $manager->manager_name =  $request->manager_name;
        $manager->manager_phone = $request->manager_phone;
        $manager->manager_email = $request->manager_email;
        $manager->manager_password = Hash::make($pass);
        
        $manager->manager_office_name =  $request->manager_office_name;
        $manager->manager_office_address =  $request->manager_office_address;
        $manager->manager_dictrict =  $request->manager_dictrict;
        $manager->created_on =  Carbon::now()->toDateTimeString();


        $manager ->save();

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->manager_email, 'Manager', $pass);

        UserActivityLogController::AddUserActivityLogInsert($manager->created_by, $manager->manager_id, $manager->manager_name, "Manager Created");

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
     
             } else if($request->manager_type_e == "DMC"){
     
                 $manager->modified_by =  Auth::guard('dmc')->user()->dmc_id;
                 $manager->manager_type =  2;
     
             } else if($request->manager_type_e == "DEEO"){
     
                 $manager->modified_by =  Auth::guard('deeo')->user()->deeo_id;
                 $manager->manager_type =  3;
     
             } else if($request->manager_type_e == "DI"){

                $manager->modified_by =  Auth::guard('di')->user()->di_id;
                $manager->manager_type =  4;
    
            } else if($request->manager_type_e == "BEEO"){
    
                $manager->modified_by =  Auth::guard('beeo')->user()->beeo_id;
                $manager->manager_type =  5;
    
            } else if($request->manager_type_e == "BMC"){
    
                $manager->modified_by =  Auth::guard('bmc')->user()->bmc_id;
                $manager->manager_type =  6;
    
            } else if($request->manager_type_e == "CHD"){
    
                $manager->modified_by =  Auth::guard('chd')->user()->chd_id;
                $manager->manager_type =  7;
    
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
    
            UserActivityLogController::AddUserActivityLogUpdate($manager->modified_by, $manager->manager_id, $manager->manager_name, "Manager Updated");

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
     
             } else if($request->manager_type == "DMC"){
     
                 $manager->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
     
             } else if($request->manager_type == "DEEO"){
     
                 $manager->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
     
             } else if($request->manager_type == "DI"){

                $manager->deleted_by =  Auth::guard('di')->user()->di_id;
    
            } else if($request->manager_type == "BEEO"){
    
                $manager->deleted_by =  Auth::guard('beeo')->user()->beeo_id;
    
            } else if($request->manager_type == "BMC"){
    
                $manager->deleted_by =  Auth::guard('bmc')->user()->bmc_id;
    
            } else if($request->manager_type == "CHD"){
    
                $manager->deleted_by =  Auth::guard('chd')->user()->chd_id;
    
            }  else {
                 return response()->errorUnauthorised('Manager type is not valid');
            }   

            $manager->is_deleted = 1;
            //$manager->deleted_by = Auth::guard('manager')->user()->manager_id;
            $manager->deleted_on = Carbon::now()->toDateTimeString();
    
            $manager->save();

            UserActivityLogController::AddUserActivityLogDelete($manager->deleted_by, $manager->manager_id, $manager->manager_name, "Manager Deleted");

            return response()->success('Manager deleted successfully.', 'manager', null);
         }
     }

     

}