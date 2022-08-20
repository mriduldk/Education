<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\BEEO;
use App\Models\CHD;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use Carbon\Carbon;


class DPCAuthController extends Controller
{

    public function allDPCList()
    {
        return view('/CHD/dpc/allDPCList');
    }
    public function AllDPCData()
    {
        $dpc = DPC::where('is_deleted', 0)->get();
        return $dpc;
    }
    public function GetDPCDataForEdit(Request $request)
    {
        //dd($request);
        $dpc = DPC::where('is_deleted', 0)->where('dpc_id', $request->dpc_id)->first();
        //dd($dpc);
        return $dpc;
    }
    public function InsertDPC(Request $request)
    {
        $request->validate([
            'dpc_name' => 'required',
            'dpc_phone' => 'required',
            'dpc_email' => 'required',
            'dpc_office_name' => 'required',
            'dpc_office_address' => 'required',
            'dpc_dictrict' => 'required'
            ]);

        $dpc = new DPC;
        
        if($request->dpc_image_url != null) {
            $fileName = time().'.'.$request->dpc_image_url->extension();  
            $request->dpc_image_url->move(public_path('files/profile/dpc'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dpc' . $fileName;
    
            $dpc->dpc_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $dpc->dpc_id = GenerateID::getId();
        $dpc->dpc_no =  '3' . rand(1000, 9999);
        $dpc->dpc_name =  $request->dpc_name;
        $dpc->dpc_phone = $request->dpc_phone;
        $dpc->dpc_email = $request->dpc_email;
        $dpc->dpc_password = Hash::make($pass);
        
        $dpc->dpc_office_name =  $request->dpc_office_name;
        $dpc->dpc_office_address =  $request->dpc_office_address;
        $dpc->dpc_dictrict =  $request->dpc_dictrict;
        $dpc->created_by =  Auth::guard('chd')->user()->chd_id;
        $dpc->created_on =  Carbon::now()->toDateTimeString();


        $dpc ->save();
        UserActivityLogController::AddUserActivityLogInsert($dpc->created_by, $dpc->dpc_id, $dpc->dpc_name, "DPC Created");

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->dpc_email, 'DPC', $pass);

        return response()->success('DPC inserted successfully', 'dpc', $dpc);

    }
    public function UpdateDPC(Request $request)
    {
        $request->validate([
            'dpc_name_e' => 'required',
            'dpc_phone_e' => 'required',
            'dpc_email_e' => 'required',
            'dpc_office_name_e' => 'required',
            'dpc_office_address_e' => 'required',
            'dpc_dictrict_e' => 'required'
            ]);

        $dpc = DPC::where('dpc_id', $request->dpc_id_e)->where('is_deleted', 0)->first();

        if(empty($dpc)) {
            return response()->errorNotFound('DPC data not found.');
        } else {
            if($request->dpc_image_url_e != null && $request->dpc_image_url_e != "") {
                $fileName = time().'.'.$request->dpc_image_url_e->extension();  
                $request->dpc_image_url_e->move(public_path('files/profile/dpc'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dpc' . $fileName;
                $dpc->dpc_image_url = $path;
            }

            $dpc->dpc_name =  $request->dpc_name_e;
            $dpc->dpc_phone = $request->dpc_phone_e;
            $dpc->dpc_email = $request->dpc_email_e;
            $dpc->dpc_office_name =  $request->dpc_office_name_e;
            $dpc->dpc_office_address =  $request->dpc_office_address_e;
            $dpc->dpc_dictrict =  $request->dpc_dictrict_e;
            $dpc->modified_on =  Carbon::now()->toDateTimeString();
            $dpc->modified_by =  Auth::guard('chd')->user()->chd_id;
    
            $dpc->save();
            UserActivityLogController::AddUserActivityLogUpdate($dpc->modified_by, $dpc->dpc_id, $dpc->dpc_name, "DPC Updated");
    
            return response()->success('DPC updated successfully', 'dpc', $dpc);
        }
    }
    public function DPCDelete(Request $request)
    {
        $dpc = DPC::where('dpc_id', $request->dpc_id)->first();

        if(empty($dpc)) {
            return response()->errorNotFound('DPC data not found.');
        } else {  

            $dpc->is_deleted = 1;
            $dpc->deleted_by =  Auth::guard('chd')->user()->chd_id;
            $dpc->deleted_on = Carbon::now()->toDateTimeString();
    
            $dpc->save();
            UserActivityLogController::AddUserActivityLogDelete($dpc->deleted_by, $dpc->dpc_id, $dpc->dpc_name, "DPC Deleted");
            return response()->success('DPC deleted successfully.', 'dpc', null);
        }
    }



}
