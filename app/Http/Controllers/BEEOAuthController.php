<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Http\SendUserCredentials;
use App\Models\BEEO;
use Carbon\Carbon;


class BEEOAuthController extends Controller
{

    public function allBEEOList()
    {
        return view('/DEEO/beeo/allBEEOList');
    }
    public function AllBEEOData()
    {
        $beeo = BEEO::where('is_deleted', 0)->get();
        return $beeo;
    }
    public function GetBEEODataForEdit(Request $request)
    {
        //dd($request);
        $beeo = BEEO::where('is_deleted', 0)->where('beeo_id', $request->beeo_id)->first();
        //dd($beeo);
        return $beeo;
    }
    public function InsertBEEO(Request $request)
    {
        $request->validate([
            'beeo_name' => 'required',
            'beeo_phone' => 'required',
            'beeo_email' => 'required',
            'beeo_office_name' => 'required',
            'beeo_office_address' => 'required',
            'beeo_dictrict' => 'required'
            ]);

        $beeo = new BEEO;
        
        if($request->beeo_image_url != null) {
            $fileName = time().'.'.$request->beeo_image_url->extension();  
            $request->beeo_image_url->move(public_path('files/profile/beeo'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/beeo' . $fileName;
    
            $beeo->beeo_image_url = $path;
        }
        $pass = GenerateID::getPassword();

        $beeo->beeo_id = GenerateID::getId();
        $beeo->beeo_no = '7' . rand(1000, 9999);
        $beeo->beeo_name =  $request->beeo_name;
        $beeo->beeo_phone = $request->beeo_phone;
        $beeo->beeo_email = $request->beeo_email;
        $beeo->beeo_password = Hash::make($pass);
        
        $beeo->beeo_office_name =  $request->beeo_office_name;
        $beeo->beeo_office_address =  $request->beeo_office_address;
        $beeo->beeo_dictrict =  $request->beeo_dictrict;
        $beeo->created_by =  Auth::guard('deeo')->user()->deeo_id;
        $beeo->created_on =  Carbon::now()->toDateTimeString();


        $beeo ->save();
        SendPasswordToEmail::SendPasswordToEmailOfficer($request->beeo_email, 'BEEO', $pass);
        SendUserCredentials::SendUserCredentials($request->beeo_name, $request->beeo_phone, $request->beeo_email, $pass);

        UserActivityLogController::AddUserActivityLogInsert($beeo->created_by, $beeo->beeo_id, $beeo->beeo_name, "BEEO Created");

        return response()->success('BEEO inserted successfully', 'beeo', $beeo);

    }
    public function UpdateBEEO(Request $request)
    {
        $request->validate([
            'beeo_name_e' => 'required',
            'beeo_phone_e' => 'required',
            'beeo_email_e' => 'required',
            'beeo_office_name_e' => 'required',
            'beeo_office_address_e' => 'required',
            'beeo_dictrict_e' => 'required'
            ]);

        $beeo = BEEO::where('beeo_id', $request->beeo_id_e)->where('is_deleted', 0)->first();

        if(empty($beeo)) {
            return response()->errorNotFound('BEEO data not found.');
        } else {
            if($request->beeo_image_url_e != null && $request->beeo_image_url_e != "") {
                $fileName = time().'.'.$request->beeo_image_url_e->extension();  
                $request->beeo_image_url_e->move(public_path('files/profile/beeo'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/beeo' . $fileName;
                $beeo->beeo_image_url = $path;
            }

            $beeo->beeo_name =  $request->beeo_name_e;
            $beeo->beeo_phone = $request->beeo_phone_e;
            $beeo->beeo_email = $request->beeo_email_e;
            $beeo->beeo_office_name =  $request->beeo_office_name_e;
            $beeo->beeo_office_address =  $request->beeo_office_address_e;
            $beeo->beeo_dictrict =  $request->beeo_dictrict_e;
            $beeo->modified_on =  Carbon::now()->toDateTimeString();
            $beeo->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            $beeo->save();
            UserActivityLogController::AddUserActivityLogUpdate($beeo->modified_by, $beeo->beeo_id, $beeo->beeo_name, "BEEO Updated");
    
            return response()->success('BEEO updated successfully', 'beeo', $beeo);
        }
    }
    public function BEEODelete(Request $request)
    {
        $beeo = BEEO::where('beeo_id', $request->beeo_id)->first();

        if(empty($beeo)) {
            return response()->errorNotFound('BEEO data not found.');
        } else {  

            $beeo->is_deleted = 1;
            $beeo->deleted_by =  Auth::guard('deeo')->user()->deeo_id;
            $beeo->deleted_on = Carbon::now()->toDateTimeString();
    
            $beeo->save();
            UserActivityLogController::AddUserActivityLogDelete($beeo->deleted_by, $beeo->beeo_id, $beeo->beeo_name, "BEEO Deleted");
            return response()->success('BEEO deleted successfully.', 'beeo', null);
        }
    }



}
