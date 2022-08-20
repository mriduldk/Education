<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Http\SendPasswordToEmail;
use App\Models\DEEO;
use Carbon\Carbon;


class DEEOAuthController extends Controller
{

    public function allDEEOList()
    {
        return view('/CHD/deeo/allDEEOList');
    }
    public function AllDEEOData()
    {
        $deeo = DEEO::where('is_deleted', 0)->get();
        return $deeo;
    }
    public function GetDEEODataForEdit(Request $request)
    {
        //dd($request);
        $deeo = DEEO::where('is_deleted', 0)->where('deeo_id', $request->deeo_id)->first();
        //dd($deeo);
        return $deeo;
    }
    public function InsertDEEO(Request $request)
    {
        $request->validate([
            'deeo_name' => 'required',
            'deeo_phone' => 'required',
            'deeo_email' => 'required',
            'deeo_office_name' => 'required',
            'deeo_office_address' => 'required',
            'deeo_dictrict' => 'required'
            ]);

        $deeo = new DEEO;
        
        if($request->deeo_image_url != null) {
            $fileName = time().'.'.$request->deeo_image_url->extension();  
            $request->deeo_image_url->move(public_path('files/profile/deeo'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deeo' . $fileName;
    
            $deeo->deeo_image_url = $path;
        }

        $pass = GenerateID::getPassword();

        $deeo->deeo_id = GenerateID::getId();
        $deeo->deeo_no = '5' . rand(1000, 9999);
        $deeo->deeo_name =  $request->deeo_name;
        $deeo->deeo_phone = $request->deeo_phone;
        $deeo->deeo_email = $request->deeo_email;
        $deeo->deeo_password = Hash::make($pass);
        
        $deeo->deeo_office_name =  $request->deeo_office_name;
        $deeo->deeo_office_address =  $request->deeo_office_address;
        $deeo->deeo_dictrict =  $request->deeo_dictrict;
        $deeo->created_by =  Auth::guard('chd')->user()->chd_id;
        $deeo->created_on =  Carbon::now()->toDateTimeString();

        $deeo ->save();
        UserActivityLogController::AddUserActivityLogInsert($deeo->created_by, $deeo->deeo_id, $deeo->deeo_name, "DEEO Created");

        SendPasswordToEmail::SendPasswordToEmailOfficer($request->deeo_email, 'DEEO', $pass);

        return response()->success('DEEO inserted successfully', 'deeo', $deeo,);

    }
    public function UpdateDEEO(Request $request)
    {
        $request->validate([
            'deeo_name_e' => 'required',
            'deeo_phone_e' => 'required',
            'deeo_email_e' => 'required',
            'deeo_office_name_e' => 'required',
            'deeo_office_address_e' => 'required',
            'deeo_dictrict_e' => 'required'
            ]);

        $deeo = DEEO::where('deeo_id', $request->deeo_id_e)->where('is_deleted', 0)->first();

        if(empty($deeo)) {
            return response()->errorNotFound('DEEO data not found.');
        } else {
            if($request->deeo_image_url_e != null && $request->deeo_image_url_e != "") {
                $fileName = time().'.'.$request->deeo_image_url_e->extension();  
                $request->deeo_image_url_e->move(public_path('files/profile/deeo'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deeo' . $fileName;
                $deeo->deeo_image_url = $path;
            }

            $deeo->deeo_name =  $request->deeo_name_e;
            $deeo->deeo_phone = $request->deeo_phone_e;
            $deeo->deeo_email = $request->deeo_email_e;
            $deeo->deeo_office_name =  $request->deeo_office_name_e;
            $deeo->deeo_office_address =  $request->deeo_office_address_e;
            $deeo->deeo_dictrict =  $request->deeo_dictrict_e;
            $deeo->modified_on =  Carbon::now()->toDateTimeString();
            $deeo->modified_by =  Auth::guard('chd')->user()->chd_id;
    
            $deeo->save();
            UserActivityLogController::AddUserActivityLogUpdate($deeo->modified_by, $deeo->deeo_id, $deeo->deeo_name, "DEEO Updated");
    
            return response()->success('DEEO updated successfully', 'deeo', $deeo);
        }
    }
    public function DEEODelete(Request $request)
    {
        $deeo = DEEO::where('deeo_id', $request->deeo_id)->first();

        if(empty($deeo)) {
            return response()->errorNotFound('DEEO data not found.');
        } else {  

            $deeo->is_deleted = 1;
            $deeo->deleted_by =  Auth::guard('chd')->user()->chd_id;
            $deeo->deleted_on = Carbon::now()->toDateTimeString();
    
            $deeo->save();
            UserActivityLogController::AddUserActivityLogDelete($deeo->deleted_by, $deeo->deeo_id, $deeo->deeo_name, "DEEO Deleted");
            return response()->success('DEEO deleted successfully.', 'deeo', null);
        }
    }



}
