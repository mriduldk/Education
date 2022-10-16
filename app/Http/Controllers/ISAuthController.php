<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Http\SendUserCredentials;
use App\Models\BEEO;
use App\Models\CHD;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use Carbon\Carbon;


class ISAuthController extends Controller
{

    public function allISList()
    {
        return view('/CHD/is/allISList');
    }
    public function AllISData()
    {
        $is = IS::where('is_deleted', 0)->get();
        return $is;
    }
    public function GetISDataForEdit(Request $request)
    {
        //dd($request);
        $is = IS::where('is_deleted', 0)->where('is_id', $request->is_id)->first();
        //dd($is);
        return $is;
    }
    public function InsertIS(Request $request)
    {
        $request->validate([
            'is_name' => 'required',
            'is_phone' => 'required',
            'is_email' => 'required',
            'is_office_name' => 'required',
            'is_office_address' => 'required',
            'is_dictrict' => 'required'
            ]);

        $is = new IS;
        
        if($request->is_image_url != null) {
            $fileName = time().'.'.$request->is_image_url->extension();  
            $request->is_image_url->move(public_path('files/profile/is'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/is' . $fileName;
    
            $is->is_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $is->is_id = GenerateID::getId();
        $is->is_no =  '2' . rand(1000, 9999);
        $is->is_name =  $request->is_name;
        $is->is_phone = $request->is_phone;
        $is->is_email = $request->is_email;
        $is->is_password = Hash::make($pass);
        
        $is->is_office_name =  $request->is_office_name;
        $is->is_office_address =  $request->is_office_address;
        $is->is_dictrict =  $request->is_dictrict;
        $is->created_by =  Auth::guard('chd')->user()->chd_id;
        $is->created_on =  Carbon::now()->toDateTimeString();


        $is ->save();

        UserActivityLogController::AddUserActivityLogInsert($is->created_by, $is->is_id,  $is->is_name, "IS Created");

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->is_email, 'IS', $pass);
        SendUserCredentials::SendUserCredentials($request->is_name, $request->is_phone, $request->is_email, $pass);

        return response()->success('IS inserted successfully', 'is', $is);

    }
    public function UpdateIS(Request $request)
    {
        $request->validate([
            'is_name_e' => 'required',
            'is_phone_e' => 'required',
            'is_email_e' => 'required',
            'is_office_name_e' => 'required',
            'is_office_address_e' => 'required',
            'is_dictrict_e' => 'required'
            ]);

        $is = IS::where('is_id', $request->is_id_e)->where('is_deleted', 0)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->is_image_url_e != null && $request->is_image_url_e != "") {
                $fileName = time().'.'.$request->is_image_url_e->extension();  
                $request->is_image_url_e->move(public_path('files/profile/is'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/is' . $fileName;
                $is->is_image_url = $path;
            }

            $is->is_name =  $request->is_name_e;
            $is->is_phone = $request->is_phone_e;
            $is->is_email = $request->is_email_e;
            $is->is_office_name =  $request->is_office_name_e;
            $is->is_office_address =  $request->is_office_address_e;
            $is->is_dictrict =  $request->is_dictrict_e;
            $is->modified_on =  Carbon::now()->toDateTimeString();
            $is->modified_by =  Auth::guard('chd')->user()->chd_id;
    
            $is->save();
            UserActivityLogController::AddUserActivityLogUpdate($is->modified_by, $is->is_id,  $is->is_name, "IS Updated");
    
            return response()->success('IS updated successfully', 'is', $is);
        }
    }
    public function ISDelete(Request $request)
    {
        $is = IS::where('is_id', $request->is_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {  

            $is->is_deleted = 1;
            $is->deleted_by =  Auth::guard('chd')->user()->chd_id;
            $is->deleted_on = Carbon::now()->toDateTimeString();
    
            $is->save();
            UserActivityLogController::AddUserActivityLogDelete($is->deleted_by, $is->is_id,  $is->is_name, "IS Deleted");
            return response()->success('IS deleted successfully.', 'is', null);
        }
    }



}
