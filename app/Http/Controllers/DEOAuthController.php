<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\DEO;
use Carbon\Carbon;


class DEOAuthController extends Controller
{

    
    public function AllDEOData()
    {
        $deo = DEO::where('is_deleted', 0)->get();
        return $deo;
    }
    public function GetDEODataForEdit(Request $request)
    {
        //dd($request);
        $deo = DEO::where('is_deleted', 0)->where('deo_id', $request->deo_id)->first();
        //dd($deo);
        return $deo;
    }
    public function InsertDEO(Request $request)
    {
        $request->validate([
            'deo_name' => 'required',
            'deo_phone' => 'required',
            'deo_email' => 'required',
            'deo_office_name' => 'required',
            'deo_office_address' => 'required',
            'deo_dictrict' => 'required',
            'deo_type' => 'required'
            ]);

        $deo = new DEO;
        
        if($request->deo_image_url != null) {
            $fileName = time().'.'.$request->deo_image_url->extension();  
            $request->deo_image_url->move(public_path('files/profile/deo'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deo' . $fileName;
    
            $deo->deo_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $deo->deo_id = GenerateID::getId();
        $deo->deo_name =  $request->deo_name;
        $deo->deo_phone = $request->deo_phone;
        $deo->deo_email = $request->deo_email;
        $deo->deo_password = Hash::make($pass);
        
        $deo->deo_office_name =  $request->deo_office_name;
        $deo->deo_office_address =  $request->deo_office_address;
        $deo->deo_dictrict =  $request->deo_dictrict;
        $deo->created_on =  Carbon::now()->toDateTimeString();

        if ($request->deo_type == "IS") {

            $deo->created_by =  Auth::guard('is')->user()->is_id;
            $deo->deo_type =  0;

        } else if ($request->deo_type == "DPC") {

            $deo->created_by =  Auth::guard('dpc')->user()->dpc_id;
            $deo->deo_type =  1;

        } else if ($request->deo_type == "DMC") {

            $deo->created_by =  Auth::guard('dmc')->user()->dmc_id;
            $deo->deo_type =  2;
            
        } else if ($request->deo_type == "DEEO") {

            $deo->created_by =  Auth::guard('deeo')->user()->deeo_id;
            $deo->deo_type =  3;
            
        } else if ($request->deo_type == "DI") {

            $deo->created_by =  Auth::guard('di')->user()->di_id;
            $deo->deo_type =  4;
            
        } else if ($request->deo_type == "BEEO") {

            $deo->created_by =  Auth::guard('beeo')->user()->beeo_id;
            $deo->deo_type =  5;
            
        } else if ($request->deo_type == "BMC") {

            $deo->created_by =  Auth::guard('bmc')->user()->bmc_id;
            $deo->deo_type =  6;
            
        } else if ($request->deo_type == "CHD") {

            $deo->created_by =  Auth::guard('chd')->user()->chd_id;
            $deo->deo_type =  7;
            
        } else {
            return response()->errorNotFound('User Type is invalid.');
        }

        $deo ->save();

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->deo_email, 'DEO', $pass);

        return response()->success('DEO inserted successfully', 'deo', $deo);

    }
    public function UpdateDEO(Request $request)
    {
        $request->validate([
            'deo_name_e' => 'required',
            'deo_phone_e' => 'required',
            'deo_email_e' => 'required',
            'deo_office_name_e' => 'required',
            'deo_office_address_e' => 'required',
            'deo_dictrict_e' => 'required',
            'deo_type_e' => 'required'
            ]);

        $deo = DEO::where('deo_id', $request->deo_id_e)->where('is_deleted', 0)->first();

        if(empty($deo)) {
            return response()->errorNotFound('DEO data not found.');
        } else {
            if($request->deo_image_url_e != null && $request->deo_image_url_e != "") {
                $fileName = time().'.'.$request->deo_image_url_e->extension();  
                $request->deo_image_url_e->move(public_path('files/profile/deo'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deo' . $fileName;
                $deo->deo_image_url = $path;
            }

            $deo->deo_name =  $request->deo_name_e;
            $deo->deo_phone = $request->deo_phone_e;
            $deo->deo_email = $request->deo_email_e;
            $deo->deo_office_name =  $request->deo_office_name_e;
            $deo->deo_office_address =  $request->deo_office_address_e;
            $deo->deo_dictrict =  $request->deo_dictrict_e;
            $deo->modified_on =  Carbon::now()->toDateTimeString();
    
            if ($request->deo_type_e == "IS") {

                $deo->modified_by =  Auth::guard('is')->user()->is_id;
                $deo->deo_type =  0;
    
            } else if ($request->deo_type_e == "DPC") {
    
                $deo->modified_by =  Auth::guard('dpc')->user()->dpc_id;
                $deo->deo_type =  1;
    
            } else if ($request->deo_type_e == "DMC") {
    
                $deo->modified_by =  Auth::guard('dmc')->user()->dmc_id;
                $deo->deo_type =  2;
                
            } else if ($request->deo_type_e == "DEEO") {
    
                $deo->modified_by =  Auth::guard('deeo')->user()->deeo_id;
                $deo->deo_type =  3;
                
            } else if ($request->deo_type_e == "DI") {
    
                $deo->modified_by =  Auth::guard('di')->user()->di_id;
                $deo->deo_type =  4;
                
            } else if ($request->deo_type_e == "BEEO") {
    
                $deo->modified_by =  Auth::guard('beeo')->user()->beeo_id;
                $deo->deo_type =  5;
                
            } else if ($request->deo_type_e == "BMC") {
    
                $deo->modified_by =  Auth::guard('bmc')->user()->bmc_id;
                $deo->deo_type =  6;
                
            } else if ($request->deo_type_e == "CHD") {
    
                $deo->modified_by =  Auth::guard('chd')->user()->chd_id;
                $deo->deo_type =  7;
                
            } else {
                return response()->errorNotFound('User Type is invalid.');
            }

            $deo->save();
    
            return response()->success('DEO updated successfully', 'deo', $deo);
        }
    }
    public function DEODelete(Request $request)
    {
        $deo = DEO::where('deo_id', $request->deo_id)->first();

        if(empty($deo)) {
            return response()->errorNotFound('DEO data not found.');
        } else {  

            $deo->is_deleted = 1;
            $deo->deleted_on = Carbon::now()->toDateTimeString();
    
            if ($request->deo_type == "IS") {

                $deo->deleted_by =  Auth::guard('is')->user()->is_id;
    
            } else if ($request->deo_type == "DPC") {
    
                $deo->deleted_by =  Auth::guard('dpc')->user()->dpc_id;
    
            } else if ($request->deo_type == "DMC") {
    
                $deo->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
                
            } else if ($request->deo_type == "DEEO") {
    
                $deo->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
                
            } else if ($request->deo_type == "DI") {
    
                $deo->deleted_by =  Auth::guard('di')->user()->di_id;
                
            } else if ($request->deo_type == "BEEO") {
    
                $deo->deleted_by =  Auth::guard('beeo')->user()->beeo_id;
                
            } else if ($request->deo_type == "BMC") {
    
                $deo->deleted_by =  Auth::guard('bmc')->user()->bmc_id;
                
            } else if ($request->deo_type == "CHD") {
    
                $deo->deleted_by =  Auth::guard('chd')->user()->chd_id;
                
            } else {
                return response()->errorNotFound('User Type is invalid.');
            }

            $deo->save();
            return response()->success('DEO deleted successfully.', 'deo', null);
        }
    }



}
