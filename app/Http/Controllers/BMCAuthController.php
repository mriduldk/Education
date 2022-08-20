<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\BMC;
use Carbon\Carbon;

class BMCAuthController extends Controller
{
    public function allBMCList()
    {
        return view('/DMC/bmc/allBMCList');
    }
    public function AllBMCData()
    {
        $bmc = BMC::where('is_deleted', 0)->get();
        return $bmc;
    }
    public function GetBMCDataForEdit(Request $request)
    {
        //dd($request);
        $bmc = BMC::where('is_deleted', 0)->where('bmc_id', $request->bmc_id)->first();
        //dd($bmc);
        return $bmc;
    }
    public function InsertBMC(Request $request)
    {
        $request->validate([
            'bmc_name' => 'required',
            'bmc_phone' => 'required',
            'bmc_email' => 'required',
            'bmc_office_name' => 'required',
            'bmc_office_address' => 'required',
            'bmc_dictrict' => 'required'
            ]);

        $bmc = new BMC;
        
        if($request->bmc_image_url != null) {
            $fileName = time().'.'.$request->bmc_image_url->extension();  
            $request->bmc_image_url->move(public_path('files/profile/bmc'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/bmc' . $fileName;
    
            $bmc->bmc_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $bmc->bmc_id = GenerateID::getId();
        $bmc->bmc_no = '8' . rand(1000, 9999);
        $bmc->bmc_name =  $request->bmc_name;
        $bmc->bmc_phone = $request->bmc_phone;
        $bmc->bmc_email = $request->bmc_email;
        $bmc->bmc_password = Hash::make($pass);
        
        $bmc->bmc_office_name =  $request->bmc_office_name;
        $bmc->bmc_office_address =  $request->bmc_office_address;
        $bmc->bmc_dictrict =  $request->bmc_dictrict;
        $bmc->created_by =  Auth::guard('dmc')->user()->dmc_id;
        $bmc->created_on =  Carbon::now()->toDateTimeString();


        $bmc ->save();

        //SendPasswordToEmail::SendPasswordToEmailOfficer($request->bmc_email, 'BMC', $pass);

        UserActivityLogController::AddUserActivityLogInsert($bmc->created_by, $bmc->bmc_id, $bmc->bmc_name, "BMC Created");

        return response()->success('BMC inserted successfully', 'bmc', $bmc);

    }
    public function UpdateBMC(Request $request)
    {
        $request->validate([
            'bmc_name_e' => 'required',
            'bmc_phone_e' => 'required',
            'bmc_email_e' => 'required',
            'bmc_office_name_e' => 'required',
            'bmc_office_address_e' => 'required',
            'bmc_dictrict_e' => 'required'
            ]);

        $bmc = BMC::where('bmc_id', $request->bmc_id_e)->where('is_deleted', 0)->first();

        if(empty($bmc)) {
            return response()->errorNotFound('BMC data not found.');
        } else {
            if($request->bmc_image_url_e != null && $request->bmc_image_url_e != "") {
                $fileName = time().'.'.$request->bmc_image_url_e->extension();  
                $request->bmc_image_url_e->move(public_path('files/profile/bmc'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/bmc' . $fileName;
                $bmc->bmc_image_url = $path;
            }

            $bmc->bmc_name =  $request->bmc_name_e;
            $bmc->bmc_phone = $request->bmc_phone_e;
            $bmc->bmc_email = $request->bmc_email_e;
            $bmc->bmc_office_name =  $request->bmc_office_name_e;
            $bmc->bmc_office_address =  $request->bmc_office_address_e;
            $bmc->bmc_dictrict =  $request->bmc_dictrict_e;
            $bmc->modified_on =  Carbon::now()->toDateTimeString();
            $bmc->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    
            $bmc->save();
    
            UserActivityLogController::AddUserActivityLogUpdate($bmc->modified_by, $bmc->bmc_id, $bmc->bmc_name, "BMC Updated");

            return response()->success('BMC updated successfully', 'bmc', $bmc);
        }
    }
    public function BMCDelete(Request $request)
    {
        $bmc = BMC::where('bmc_id', $request->bmc_id)->first();

        if(empty($bmc)) {
            return response()->errorNotFound('BMC data not found.');
        } else {  

            $bmc->is_deleted = 1;
            $bmc->deleted_by =  Auth::guard('dmc')->user()->dmc_id;
            $bmc->deleted_on = Carbon::now()->toDateTimeString();
    
            $bmc->save();

            UserActivityLogController::AddUserActivityLogDelete($bmc->deleted_by, $bmc->bmc_id, $bmc->bmc_name, "BMC Deleted");

            return response()->success('BMC deleted successfully.', 'bmc', null);
        }
    }

}
