<?php

namespace App\Http\Controllers;

use App\Models\CHD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;

class CHDController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('chd_email', 'chd_password');

        $chd = CHD::where('chd_email', $request->chd_email)->where('is_deleted', 0)->first();
        if ($chd && Hash::check($request->chd_password, $chd->chd_password)) {

            Auth::guard('chd')->login($chd);
            return response()->success('CHD login successful', 'is', $chd);

        } else {
            return response()->errorUnauthorised('Falied to login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'chd_name' => 'required',
            'chd_phone' => 'required',
            'chd_email' => 'required',
            'chd_password' => 'required'
          ]);
   
          $chd = new CHD;
           
          $fileName = time().'.'.$request->chd_image_url->extension();  
          $request->chd_image_url->move(public_path('files/profile/chd'), $fileName);
  
          $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/chd' . $fileName;
  
          $chd->chd_id = GenerateID::getId();
          $chd->chd_name = $request->chd_name;
          $chd->chd_phone = $request->chd_phone;
          $chd->chd_email = $request->chd_email;
          $chd->chd_password =  Hash::make($request->chd_password);
          $chd->chd_image_url = $path;
   
          $chd ->save();
          return response()->success('CHD inserted successfully', 'chd', $chd);
    }


    public function show(CHD $chd)
    {
        $chd = CHD::where('chd_id', $chd->chd_id)->where('is_deleted', 0)->first();
        return response()->success('Fetched CHD data successfully', 'chd', $chd);
    }

    public function getAllIS()
    {
        $chd = CHD::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all CHD data successfully', 'chd', $chd);
    }


    public function edit(CHD $cHD)
    {
        //
    }


    public function update(Request $request, $chd_id)
    {
        $request->validate([
            'chd_name' => 'required',
            'chd_phone' => 'required',
            'chd_email' => 'required',
            'chd_password' => 'required'
          ]);

        $chd = CHD::where('chd_id', $chd_id)->first();

        if(empty($chd)) {
            return response()->errorNotFound('CHD data not found.');
        } else {
            if($request->chd_image_url != null && $request->chd_image_url != "") {
                $fileName = time().'.'.$request->chd_image_url->extension();  
                $request->chd_image_url->move(public_path('files/profile/chd'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/chd' . $fileName;
                $chd->chd_image_url = $path;
            }
    
            $chd->chd_name = $request->chd_name;
            $chd->chd_phone = $request->chd_phone;
            $chd->chd_email = $request->chd_email;
            $chd->chd_password =  Hash::make($request->chd_password);
    
            $chd->save();

            return response()->success('CHD updated successfully', 'chd', $chd);
        }
    }


    public function destroy($chd_id)
    {
        $chd = CHD::where('chd_id', $chd_id)->first();
        
        if(empty($is)) {
            return response()->errorNotFound('CHD data not found.');
        } else {
            $chd->is_deleted = 1;
            $chd->save();
            return response()->success('CHD deleted successfully.', 'chd', null);
        }
    }


}
