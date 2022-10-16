<?php

namespace App\Http\Controllers;

use App\Models\DEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
use Carbon\Carbon;

class DEOController extends Controller
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
        $credentials = $request->only('deo_email', 'deo_password');

        $deo = DEO::where('deo_email', $request->deo_email)->first();
        if ($deo && Hash::check($request->deo_password, $deo->deo_password)) {
            Auth::guard('deo')->login($deo);
            return response()->success('DEO login successful', 'deo', $deo);
        } else {
            return response()->errorUnauthorised('Falied to login');
        }

    }

    public function store(Request $request)
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
        
        $fileName = time().'.'.$request->deo_image_url->extension();  
        $request->deo_image_url->move(public_path('files/profile/deo'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deo' . $fileName;

        if($request->deo_type == "IS"){

            $deo->created_by =  Auth::guard('is')->user()->is_id;

        } else if($request->deo_type == "DPC"){
            
            $deo->created_by =  Auth::guard('dpc')->user()->dpc_id;

        } else if($request->deo_type == "DMC"){

            $deo->created_by =  Auth::guard('dmc')->user()->dmc_id;

        } else if($request->deo_type == "DEEO"){

            $deo->created_by =  Auth::guard('deeo')->user()->defo_id;

        } else if($request->deo_type == "BEEO"){

            $deo->created_by =  Auth::guard('beeo')->user()->beeo_id;

        } else if($request->deo_type == "DI"){

            $deo->created_by =  Auth::guard('di')->user()->di_id;

        } else if($request->deo_type == "BMC"){

            $deo->created_by =  Auth::guard('bmc')->user()->bmc_id;

        } else if($request->deo_type == "CHD"){

            $deo->created_by =  Auth::guard('chd')->user()->chd_id;

        } else {
            return response()->errorUnauthorised('DEO type is not valid');
        }


        $deo->deo_id = GenerateID::getId();
        $deo->deo_name =  $request->deo_name;
        $deo->deo_phone = $request->deo_phone;
        $deo->deo_email = $request->deo_email;
        $deo->deo_password = Hash::make($request->deo_password);
        $deo->deo_type =  $request->deo_type;
        $deo->deo_office_name =  $request->deo_office_name;
        $deo->deo_office_address =  $request->deo_office_address;
        $deo->deo_dictrict =  $request->deo_dictrict;
        $deo->deo_image_url = $path;
        $deo->created_on =  Carbon::now()->toDateTimeString();


        $deo ->save();

        return response()->success('DEO inserted successfully', 'deo', $deo);

    }


    public function show(DEO $deo)
    {
        $deo = DEO::where('deo_id', $deo->deo_id)->where('is_deleted', 0)->first();
        
        return response()->success('Fetched DEO data successfully', 'deo', $deo);
    }

    public function getAllDEO()
    {
        $deo = DEO::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all DEO data successfully', 'deo', $deo);
    }

    public function edit(DEO $cHD)
    {
        //
    }


    public function update(Request $request, $deo_id)
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

        $deo = DEO::where('deo_id', $deo_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->deo_image_url != null && $request->deo_image_url != "") {
                $fileName = time().'.'.$request->deo_image_url->extension();  
                $request->deo_image_url->move(public_path('files/profile/deo'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/deo' . $fileName;
                $is->is_image_url = $path;
            }

            if($request->deo_type == "IS"){

                $deo->modified_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->deo_type == "DPC"){
                
                $deo->modified_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->deo_type == "DMC"){
    
                $deo->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->deo_type == "DEEO"){
    
                $deo->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else if($request->deo_type == "BMC"){

                $deo->created_by =  Auth::guard('bmc')->user()->bmc_id;
    
            } else if($request->deo_type == "BEEO"){
    
                $deo->created_by =  Auth::guard('beeo')->user()->beeo_id;
    
            } else if($request->deo_type == "DI"){
    
                $deo->created_by =  Auth::guard('di')->user()->di_id;
    
            } else {
                return response()->errorUnauthorised('DEO type is not valid');
            }   
    
            $deo->deo_name =  $request->deo_name;
            $deo->deo_phone = $request->deo_phone;
            $deo->deo_email = $request->deo_email;
            $deo->deo_type =  $request->deo_type;
            $deo->deo_office_name =  $request->deo_office_name;
            $deo->deo_office_address =  $request->deo_office_address;
            $deo->deo_dictrict =  $request->deo_dictrict;
            $deo->modified_by =  Auth::guard('deo')->user()->deo_id;
            $deo->modified_on =  Carbon::now()->toDateTimeString();
    
            $deo->save();
    
            return response()->success('DEO updated successfully', 'deo', $deo);
        }
    }


    public function destroy($deo_id)
    {
        $deo = DEO::where('deo_id', $deo_id)->first();

        if(empty($deo)) {
            return response()->errorNotFound('DEO data not found.');
        } else {
            $deo->is_deleted = 1;
            $deo->deleted_by = Auth::guard('deo')->user()->deo_id;
            $deo->deleted_on = Carbon::now()->toDateTimeString();
    
            $deo->save();
            return response()->success('DEO deleted successfully.', 'deo', null);
        }
    }


}