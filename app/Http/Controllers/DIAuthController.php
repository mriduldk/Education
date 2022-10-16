<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Http\SendUserCredentials;
use App\Models\DI;
use Carbon\Carbon;


class DIAuthController extends Controller
{

    public function allDIList()
    {
        return view('/DEEO/di/allDIList');
    }
    public function AllDIData()
    {
        $di = DI::where('is_deleted', 0)->get();
        return $di;
    }
    public function GetDIDataForEdit(Request $request)
    {
        //dd($request);
        $di = DI::where('is_deleted', 0)->where('di_id', $request->di_id)->first();
        //dd($di);
        return $di;
    }
    public function InsertDI(Request $request)
    {
        $request->validate([
            'di_name' => 'required',
            'di_phone' => 'required',
            'di_email' => 'required',
            'di_office_name' => 'required',
            'di_office_address' => 'required',
            'di_dictrict' => 'required'
            ]);

        $di = new DI;
        
        if($request->di_image_url != null) {
            $fileName = time().'.'.$request->di_image_url->extension();  
            $request->di_image_url->move(public_path('files/profile/di'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/di' . $fileName;
    
            $di->di_image_url = $path;
        }
        $pass = GenerateID::getPassword();

        $di->di_id = GenerateID::getId();
        $di->di_no = '6' . rand(1000, 9999);
        $di->di_name =  $request->di_name;
        $di->di_phone = $request->di_phone;
        $di->di_email = $request->di_email;
        $di->di_password = Hash::make($pass);
        
        $di->di_office_name =  $request->di_office_name;
        $di->di_office_address =  $request->di_office_address;
        $di->di_dictrict =  $request->di_dictrict;
        $di->created_by =  Auth::guard('deeo')->user()->deeo_id;
        $di->created_on =  Carbon::now()->toDateTimeString();


        $di ->save();
        SendPasswordToEmail::SendPasswordToEmailOfficer($request->di_email, 'DI', $pass);
        SendUserCredentials::SendUserCredentials($request->di_name, $request->di_phone, $request->di_email, $pass);

        UserActivityLogController::AddUserActivityLogInsert($di->created_by, $di->di_id, $di->di_name, "DI Created");

        return response()->success('DI inserted successfully', 'di', $di);

    }
    public function UpdateDI(Request $request)
    {
        $request->validate([
            'di_name_e' => 'required',
            'di_phone_e' => 'required',
            'di_email_e' => 'required',
            'di_office_name_e' => 'required',
            'di_office_address_e' => 'required',
            'di_dictrict_e' => 'required'
            ]);

        $di = DI::where('di_id', $request->di_id_e)->where('is_deleted', 0)->first();

        if(empty($di)) {
            return response()->errorNotFound('DI data not found.');
        } else {
            if($request->di_image_url_e != null && $request->di_image_url_e != "") {
                $fileName = time().'.'.$request->di_image_url_e->extension();  
                $request->di_image_url_e->move(public_path('files/profile/di'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/di' . $fileName;
                $di->di_image_url = $path;
            }

            $di->di_name =  $request->di_name_e;
            $di->di_phone = $request->di_phone_e;
            $di->di_email = $request->di_email_e;
            $di->di_office_name =  $request->di_office_name_e;
            $di->di_office_address =  $request->di_office_address_e;
            $di->di_dictrict =  $request->di_dictrict_e;
            $di->modified_on =  Carbon::now()->toDateTimeString();
            $di->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            $di->save();
    
            UserActivityLogController::AddUserActivityLogUpdate($di->modified_by, $di->di_id, $di->di_name, "DI Updated");
            return response()->success('DI updated successfully', 'di', $di);
        }
    }
    public function DIDelete(Request $request)
    {
        $di = DI::where('di_id', $request->di_id)->first();

        if(empty($di)) {
            return response()->errorNotFound('DI data not found.');
        } else {  

            $di->is_deleted = 1;
            $di->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
            $di->deleted_on = Carbon::now()->toDateTimeString();
    
            $di->save();
            UserActivityLogController::AddUserActivityLogDelete($di->deleted_by, $di->di_id, $di->di_name, "DI Deleted");
            return response()->success('DI deleted successfully.', 'di', null);
        }
    }



}
