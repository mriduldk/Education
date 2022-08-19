<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\DMC;
use Carbon\Carbon;


class DMCAuthController extends Controller
{

    public function allDMCList()
    {
        return view('/CHD/dmc/allDMCList');
    }
    public function AllDMCData()
    {
        $dmc = DMC::where('is_deleted', 0)->get();
        return $dmc;
    }
    public function GetDMCDataForEdit(Request $request)
    {
        //dd($request);
        $dmc = DMC::where('is_deleted', 0)->where('dmc_id', $request->dmc_id)->first();
        //dd($dmc);
        return $dmc;
    }
    public function InsertDMC(Request $request)
    {
        $request->validate([
            'dmc_name' => 'required',
            'dmc_phone' => 'required',
            'dmc_email' => 'required',
            'dmc_office_name' => 'required',
            'dmc_office_address' => 'required',
            'dmc_dictrict' => 'required'
            ]);

        $dmc = new DMC;
        
        if($request->dmc_image_url != null) {
            $fileName = time().'.'.$request->dmc_image_url->extension();  
            $request->dmc_image_url->move(public_path('files/profile/dmc'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dmc' . $fileName;
    
            $dmc->dmc_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $dmc->dmc_id = GenerateID::getId();
        $dmc->dmc_name =  $request->dmc_name;
        $dmc->dmc_phone = $request->dmc_phone;
        $dmc->dmc_email = $request->dmc_email;
        $dmc->dmc_password = Hash::make($pass);
        
        $dmc->dmc_office_name =  $request->dmc_office_name;
        $dmc->dmc_office_address =  $request->dmc_office_address;
        $dmc->dmc_dictrict =  $request->dmc_dictrict;
        $dmc->created_by =  Auth::guard('chd')->user()->chd_id;
        $dmc->created_on =  Carbon::now()->toDateTimeString();


        $dmc ->save();
        UserActivityLogController::AddUserActivityLogInsert($dmc->created_by, $dmc->dmc_id, $dmc->dmc_name, "DMC Created");

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->dmc_email, 'DMC', $pass);

        return response()->success('DMC inserted successfully', 'dmc', $dmc);

    }
    public function UpdateDMC(Request $request)
    {
        $request->validate([
            'dmc_name_e' => 'required',
            'dmc_phone_e' => 'required',
            'dmc_email_e' => 'required',
            'dmc_office_name_e' => 'required',
            'dmc_office_address_e' => 'required',
            'dmc_dictrict_e' => 'required'
            ]);

        $dmc = DMC::where('dmc_id', $request->dmc_id_e)->where('is_deleted', 0)->first();

        if(empty($dmc)) {
            return response()->errorNotFound('DMC data not found.');
        } else {
            if($request->dmc_image_url_e != null && $request->dmc_image_url_e != "") {
                $fileName = time().'.'.$request->dmc_image_url_e->extension();  
                $request->dmc_image_url_e->move(public_path('files/profile/dmc'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/dmc' . $fileName;
                $dmc->dmc_image_url = $path;
            }

            $dmc->dmc_name =  $request->dmc_name_e;
            $dmc->dmc_phone = $request->dmc_phone_e;
            $dmc->dmc_email = $request->dmc_email_e;
            $dmc->dmc_office_name =  $request->dmc_office_name_e;
            $dmc->dmc_office_address =  $request->dmc_office_address_e;
            $dmc->dmc_dictrict =  $request->dmc_dictrict_e;
            $dmc->modified_on =  Carbon::now()->toDateTimeString();
            $dmc->modified_by =  Auth::guard('chd')->user()->chd_id;
    
            $dmc->save();
            UserActivityLogController::AddUserActivityLogUpdate($dmc->modified_by, $dmc->dmc_id, $dmc->dmc_name, "DMC Updated");
    
            return response()->success('DMC updated successfully', 'dmc', $dmc);
        }
    }
    public function DMCDelete(Request $request)
    {
        $dmc = DMC::where('dmc_id', $request->dmc_id)->first();

        if(empty($dmc)) {
            return response()->errorNotFound('DMC data not found.');
        } else {  

            $dmc->is_deleted = 1;
            $dmc->deleted_by =  Auth::guard('chd')->user()->chd_id;
            $dmc->deleted_on = Carbon::now()->toDateTimeString();
    
            $dmc->save();
            UserActivityLogController::AddUserActivityLogDelete($dmc->deleted_by, $dmc->dmc_id, $dmc->dmc_name, "DMC Deleted");
            return response()->success('DMC deleted successfully.', 'dmc', null);
        }
    }



}
