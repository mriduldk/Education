<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class ISController extends Controller
{

    public function IsDashboard(){
        return view('IS/Dashboard');
    }

    public function IsBlockSelect(){
        return view('IS/blockSelect');
    }

    public function SchoolList(){
        return view('IS/schoolList');
    }

    public function allTeacherList()
    {
        return view('/IS/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }


    /** Approver */
    public function allApproverList()
    {
        return view('/IS/approver/allApproverList');
    }
    public function AllApproverData()
    {
        $approver = Approver::where('is_deleted', 0)->get();
        return $approver;
    }
    public function GetApproverDataForEdit(Request $request)
    {
        //dd($request);
        $approver = Approver::where('is_deleted', 0)->where('approver_id', $request->approver_id)->first();
        //dd($approver);
        return $approver;
    }
    public function InsertApprover(Request $request)
    {
        $request->validate([
            'approver_name' => 'required',
            'approver_phone' => 'required',
            'approver_email' => 'required',
            'approver_office_name' => 'required',
            'approver_office_address' => 'required',
            'approver_dictrict' => 'required',
            'approver_type' => 'required'
          ]);

        $approver = new Approver;
        
        if($request->approver_image_url != null) {
            $fileName = time().'.'.$request->approver_image_url->extension();  
            $request->approver_image_url->move(public_path('files/profile/approver'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/approver' . $fileName;
    
            $approver->approver_image_url = $path;
        }

        if($request->approver_type == "IS"){

            $approver->created_by =  Auth::guard('is')->user()->is_id;
            $approver->approver_type =  0;

        } else if($request->approver_type == "DPC"){
            
            $approver->created_by =  Auth::guard('dpc')->user()->dpc_id;
            $approver->approver_type =  1;

        }  else if($request->approver_type == "DMC"){

            $approver->created_by =  Auth::guard('dmc')->user()->dmc_id;
            $approver->approver_type =  2;

        }  else if($request->approver_type == "DEEO"){

            $approver->created_by =  Auth::guard('deeo')->user()->deeo_id;
            $approver->approver_type =  3;

        } else {
            return response()->errorUnauthorised('Approver type is not valid');
        }


        $approver->approver_id = GenerateID::getId();
        $approver->approver_name =  $request->approver_name;
        $approver->approver_phone = $request->approver_phone;
        $approver->approver_email = $request->approver_email;
        $approver->approver_password = Hash::make($request->approver_password);
        
        $approver->approver_office_name =  $request->approver_office_name;
        $approver->approver_office_address =  $request->approver_office_address;
        $approver->approver_dictrict =  $request->approver_dictrict;
        $approver->created_on =  Carbon::now()->toDateTimeString();


        $approver ->save();

        return response()->success('Approver inserted successfully', 'approver', $approver);

    }
    public function UpdateApprover(Request $request)
    {
        $request->validate([
            'approver_name_e' => 'required',
            'approver_phone_e' => 'required',
            'approver_email_e' => 'required',
            'approver_office_name_e' => 'required',
            'approver_office_address_e' => 'required',
            'approver_dictrict_e' => 'required',
            'approver_type_e' => 'required'
          ]);

        $approver = Approver::where('approver_id', $request->approver_id_e)->where('is_deleted', 0)->first();

        if(empty($approver)) {
            return response()->errorNotFound('Approver data not found.');
        } else {
            if($request->approver_image_url_e != null && $request->approver_image_url_e != "") {
                $fileName = time().'.'.$request->approver_image_url_e->extension();  
                $request->approver_image_url_e->move(public_path('files/profile/approver'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/approver' . $fileName;
                $approver->approver_image_url = $path;
            }

            if($request->approver_type_e == "IS"){

                $approver->modified_by =  Auth::guard('is')->user()->is_id;
                $approver->approver_type =  0;
    
            } else if($request->approver_type_e == "DPC"){
                
                $approver->modified_by =  Auth::guard('dpc')->user()->dpc_id;
                $approver->approver_type =  1;
    
            }  else if($request->approver_type_e == "DMC"){
    
                $approver->modified_by =  Auth::guard('dmc')->user()->dmc_id;
                $approver->approver_type =  2;
    
            }  else if($request->approver_type_e == "DEEO"){
    
                $approver->modified_by =  Auth::guard('deeo')->user()->deeo_id;
                $approver->approver_type =  3;
    
            } else {
                return response()->errorUnauthorised('Approver type is not valid');
            }    
    
            $approver->approver_name =  $request->approver_name_e;
            $approver->approver_phone = $request->approver_phone_e;
            $approver->approver_email = $request->approver_email_e;
            $approver->approver_office_name =  $request->approver_office_name_e;
            $approver->approver_office_address =  $request->approver_office_address_e;
            $approver->approver_dictrict =  $request->approver_dictrict_e;
            $approver->modified_on =  Carbon::now()->toDateTimeString();
    
            $approver->save();
    
            return response()->success('Approver updated successfully', 'approver', $approver);
        }
    }
    public function ApproverDelete(Request $request)
    {
        $approver = Approver::where('approver_id', $request->approver_id)->first();

        if(empty($approver)) {
            return response()->errorNotFound('Approver data not found.');
        } else {

            if($request->approver_type == "IS"){

                $approver->deleted_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->approver_type == "DPC"){
                
                $approver->deleted_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->approver_type == "DMC"){
    
                $approver->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->approver_type == "DEEO"){
    
                $approver->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else {
                return response()->errorUnauthorised('Approver type is not valid');
            }   

            $approver->is_deleted = 1;
            //$approver->deleted_by = Auth::guard('approver')->user()->approver_id;
            $approver->deleted_on = Carbon::now()->toDateTimeString();
    
            $approver->save();
            return response()->success('Approver deleted successfully.', 'approver', null);
        }
    }


    /** Manager */
    public function allManagerList()
    {
        return view('/IS/manager/allManagerList');
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
