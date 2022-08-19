<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use Carbon\Carbon;

class ApproverController extends Controller
{


    public function processLogin(Request $request)
    {
        $credentials = $request->only('approver_email', 'approver_password');

        $approver = Approver::where('approver_email', $request->approver_email)->first();
        if ($approver && Hash::check($request->approver_password, $approver->approver_password)) {
            Auth::guard('approver')->login($approver);
            return response()->success('Approver login successful', 'approver', $approver);
        } else {
            return response()->errorUnauthorised('Falied to login');
        }

    }

    public function store(Request $request)
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
        
        $fileName = time().'.'.$request->approver_image_url->extension();  
        $request->approver_image_url->move(public_path('files/profile/approver'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/approver' . $fileName;

        if($request->approver_type == "IS"){

            $approver->created_by =  Auth::guard('is')->user()->is_id;

        } else if($request->approver_type == "DPC"){
            
            $approver->created_by =  Auth::guard('dpc')->user()->dpc_id;

        }  else if($request->approver_type == "DMC"){

            $approver->created_by =  Auth::guard('dmc')->user()->dmc_id;

        }  else if($request->approver_type == "DEEO"){

            $approver->created_by =  Auth::guard('deeo')->user()->deeo_id;

        } else {
            return response()->errorUnauthorised('Approver type is not valid');
        }


        $approver->approver_id = GenerateID::getId();
        $approver->approver_name =  $request->approver_name;
        $approver->approver_phone = $request->approver_phone;
        $approver->approver_email = $request->approver_email;
        $approver->approver_password = Hash::make($request->approver_password);
        $approver->approver_type =  $request->approver_type;
        $approver->approver_office_name =  $request->approver_office_name;
        $approver->approver_office_address =  $request->approver_office_address;
        $approver->approver_dictrict =  $request->approver_dictrict;
        $approver->approver_image_url = $path;
        $approver->created_on =  Carbon::now()->toDateTimeString();


        $approver ->save();

        return response()->success('Approver inserted successfully', 'approver', $approver);

    }

    public function show(Approver $approver)
    {
        $approver = Approver::where('approver_id', $approver->approver_id)->where('is_deleted', 0)->first();
        
        return response()->success('Fetched Approver data successfully', 'approver', $approver);
    }

    public function getAllApprover()
    {
        $approver = Approver::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all Approver data successfully', 'approver', $approver);
    }

    public function update(Request $request, $approver_id)
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

        $approver = Approver::where('approver_id', $approver_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->approver_image_url != null && $request->approver_image_url != "") {
                $fileName = time().'.'.$request->approver_image_url->extension();  
                $request->approver_image_url->move(public_path('files/profile/approver'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/approver' . $fileName;
                $is->is_image_url = $path;
            }

            if($request->approver_type == "IS"){

                $approver->modified_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->approver_type == "DPC"){
                
                $approver->modified_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->approver_type == "DMC"){
    
                $approver->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->approver_type == "DEEO"){
    
                $approver->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else {
                return response()->errorUnauthorised('Approver type is not valid');
            }    
    
            $approver->approver_name =  $request->approver_name;
            $approver->approver_phone = $request->approver_phone;
            $approver->approver_email = $request->approver_email;
            $approver->approver_type =  $request->approver_type;
            $approver->approver_office_name =  $request->approver_office_name;
            $approver->approver_office_address =  $request->approver_office_address;
            $approver->approver_dictrict =  $request->approver_dictrict;
            $approver->modified_by =  Auth::guard('approver')->user()->approver_id;
            $approver->modified_on =  Carbon::now()->toDateTimeString();
    
            $approver->save();
    
            return response()->success('Approver updated successfully', 'approver', $approver);
        }
    }

    public function destroy($approver_id)
    {
        $approver = Approver::where('approver_id', $approver_id)->first();

        if(empty($approver)) {
            return response()->errorNotFound('Approver data not found.');
        } else {
            $approver->is_deleted = 1;
            $approver->deleted_by = Auth::guard('approver')->user()->approver_id;
            $approver->deleted_on = Carbon::now()->toDateTimeString();
    
            $approver->save();
            return response()->success('Approver deleted successfully.', 'approver', null);
        }
    }



    /** Approver */
    public function allApproverList()
    {
        return view('/DEEO/approver/allApproverList');
    }
    public function AllApproverData()
    {
        $approver = Approver::where('is_deleted', 0)->get();
        return $approver;
    }
    public function GetApproverDataForEdit(Request $request)
    {
        $approver = Approver::where('is_deleted', 0)->where('approver_id', $request->approver_id)->first();
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

        } else if($request->approver_type == "DMC"){

            $approver->created_by =  Auth::guard('dmc')->user()->dmc_id;
            $approver->approver_type =  2;

        } else if($request->approver_type == "DEEO"){

            $approver->created_by =  Auth::guard('deeo')->user()->deeo_id;
            $approver->approver_type =  3;

        } else if($request->approver_type == "DI"){

            $approver->created_by =  Auth::guard('di')->user()->di_id;
            $approver->approver_type =  4;

        } else if($request->approver_type == "BEEO"){

            $approver->created_by =  Auth::guard('beeo')->user()->beeo_id;
            $approver->approver_type =  5;

        } else if($request->approver_type == "BMC"){

            $approver->created_by =  Auth::guard('bmc')->user()->bmc_id;
            $approver->approver_type =  6;

        } else if($request->approver_type == "CHD"){

            $approver->created_by =  Auth::guard('chd')->user()->chd_id;
            $approver->approver_type =  7;

        } else {
            return response()->errorUnauthorised('Approver type is not valid');
        }

        $pass = GenerateID::getPassword();

        $approver->approver_id = GenerateID::getId();
        $approver->approver_name =  $request->approver_name;
        $approver->approver_phone = $request->approver_phone;
        $approver->approver_email = $request->approver_email;
        $approver->approver_password = Hash::make($pass);
        
        $approver->approver_office_name =  $request->approver_office_name;
        $approver->approver_office_address =  $request->approver_office_address;
        $approver->approver_dictrict =  $request->approver_dictrict;
        $approver->created_on =  Carbon::now()->toDateTimeString();

        $approver ->save();

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->approver_email, 'Approver', $pass);

        UserActivityLogController::AddUserActivityLogInsert($approver->created_by, $approver->approver_id, $approver->approver_name, "Approver Created");

        return response()->success('Approver inserted successfully..!!', 'approver', $approver);

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
    
            } else if($request->approver_type_e == "DMC"){
    
                $approver->modified_by =  Auth::guard('dmc')->user()->dmc_id;
                $approver->approver_type =  2;
    
            } else if($request->approver_type_e == "DEEO"){
    
                $approver->modified_by =  Auth::guard('deeo')->user()->deeo_id;
                $approver->approver_type =  3;
    
            } else if($request->approver_type_e == "DI"){

                $approver->modified_by =  Auth::guard('di')->user()->di_id;
                $approver->approver_type =  4;
    
            } else if($request->approver_type_e == "BEEO"){
    
                $approver->modified_by =  Auth::guard('beeo')->user()->beeo_id;
                $approver->approver_type =  5;
    
            } else if($request->approver_type_e == "BMC"){
    
                $approver->modified_by =  Auth::guard('bmc')->user()->bmc_id;
                $approver->approver_type =  6;
    
            } else if($request->approver_type_e == "CHD"){
    
                $approver->modified_by =  Auth::guard('chd')->user()->chd_id;
                $approver->approver_type =  7;
    
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
    
            UserActivityLogController::AddUserActivityLogUpdate($approver->modified_by, $approver->approver_id, $approver->approver_name, "Approver Updated");

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
    
            } else if($request->approver_type == "DMC"){
    
                $approver->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
    
            } else if($request->approver_type == "DEEO"){
    
                $approver->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else if($request->approver_type == "DI"){

                $approver->deleted_by =  Auth::guard('di')->user()->di_id;
    
            } else if($request->approver_type == "BEEO"){
    
                $approver->deleted_by =  Auth::guard('beeo')->user()->beeo_id;
    
            } else if($request->approver_type == "BMC"){
    
                $approver->deleted_by =  Auth::guard('bmc')->user()->bmc_id;
    
            } else if($request->approver_type == "CHD"){
    
                $approver->deleted_by =  Auth::guard('chd')->user()->chd_id;
    
            } else {
                return response()->errorUnauthorised('Approver type is not valid');
            }   

            $approver->is_deleted = 1;
            //$approver->deleted_by = Auth::guard('approver')->user()->approver_id;
            $approver->deleted_on = Carbon::now()->toDateTimeString();
    
            $approver->save();

            UserActivityLogController::AddUserActivityLogDelete($approver->deleted_by, $approver->approver_id, $approver->approver_name, "Approver Deleted");

            return response()->success('Approver deleted successfully.', 'approver', null);
        }
    }


}