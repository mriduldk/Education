<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class ManagerController extends Controller
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
        $credentials = $request->only('manager_email', 'manager_password');

        $manager = Manager::where('manager_email', $request->manager_email)->first();
        if ($manager && Hash::check($request->manager_password, $manager->manager_password)) {
            Auth::guard('manager')->login($manager);
            return response()->success('Manager login successful', 'manager', $manager);
        } else {
            return response()->errorUnauthorised('Falied to login');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'manager_email' => 'required',
            'manager_office_name' => 'required',
            'manager_office_address' => 'required',
            'manager_dictrict' => 'required',
            'manager_type' => 'required'
          ]);

        $manager = new Manager;
        
        $fileName = time().'.'.$request->manager_image_url->extension();  
        $request->manager_image_url->move(public_path('files/profile/manager'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;

        if($request->manager_type == "IS"){

            $manager->created_by =  Auth::guard('is')->user()->is_id;

        } else if($request->manager_type == "DPC"){
            
            $manager->created_by =  Auth::guard('dpc')->user()->dpc_id;

        }  else if($request->manager_type == "DMC"){

            $manager->created_by =  Auth::guard('dmc')->user()->dmc_id;

        }  else if($request->manager_type == "DEEO"){

            $manager->created_by =  Auth::guard('deeo')->user()->deeo_id;

        } else {
            return response()->errorUnauthorised('Manager type is not valid');
        }


        $manager->manager_id = GenerateID::getId();
        $manager->manager_name =  $request->manager_name;
        $manager->manager_phone = $request->manager_phone;
        $manager->manager_email = $request->manager_email;
        $manager->manager_password = Hash::make($request->manager_password);
        $manager->manager_type =  $request->manager_type;
        $manager->manager_office_name =  $request->manager_office_name;
        $manager->manager_office_address =  $request->manager_office_address;
        $manager->manager_dictrict =  $request->manager_dictrict;
        $manager->manager_image_url = $path;
        $manager->created_on =  Carbon::now()->toDateTimeString();


        $manager ->save();

        return response()->success('Manager inserted successfully', 'manager', $manager);

    }


    public function show(Manager $manager)
    {
        $manager = Manager::where('manager_id', $manager->manager_id)->where('is_deleted', 0)->first();
        
        return response()->success('Fetched Manager data successfully', 'manager', $manager);
    }

    public function getAllManager()
    {
        $manager = Manager::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all Manager data successfully', 'manager', $manager);
    }

    public function edit(Manager $cHD)
    {
        //
    }


    public function update(Request $request, $manager_id)
    {
        $request->validate([
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'manager_email' => 'required',
            'manager_office_name' => 'required',
            'manager_office_address' => 'required',
            'manager_dictrict' => 'required',
            'manager_type' => 'required'
          ]);

        $manager = Manager::where('manager_id', $manager_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->manager_image_url != null && $request->manager_image_url != "") {
                $fileName = time().'.'.$request->manager_image_url->extension();  
                $request->manager_image_url->move(public_path('files/profile/manager'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/manager' . $fileName;
                $is->is_image_url = $path;
            }

            if($request->manager_type == "IS"){

                $manager->modified_by =  Auth::guard('is')->user()->is_id;
    
            } else if($request->manager_type == "DPC"){
                
                $manager->modified_by =  Auth::guard('dpc')->user()->dpc_id;
    
            }  else if($request->manager_type == "DMC"){
    
                $manager->modified_by =  Auth::guard('dmc')->user()->dmc_id;
    
            }  else if($request->manager_type == "DEEO"){
    
                $manager->modified_by =  Auth::guard('deeo')->user()->deeo_id;
    
            } else {
                return response()->errorUnauthorised('Manager type is not valid');
            }    
    
            $manager->manager_name =  $request->manager_name;
            $manager->manager_phone = $request->manager_phone;
            $manager->manager_email = $request->manager_email;
            $manager->manager_type =  $request->manager_type;
            $manager->manager_office_name =  $request->manager_office_name;
            $manager->manager_office_address =  $request->manager_office_address;
            $manager->manager_dictrict =  $request->manager_dictrict;
            $manager->modified_by =  Auth::guard('manager')->user()->manager_id;
            $manager->modified_on =  Carbon::now()->toDateTimeString();
    
            $manager->save();
    
            return response()->success('Manager updated successfully', 'manager', $manager);
        }
    }


    public function destroy($manager_id)
    {
        $manager = Manager::where('manager_id', $manager_id)->first();

        if(empty($manager)) {
            return response()->errorNotFound('Manager data not found.');
        } else {
            $manager->is_deleted = 1;
            $manager->deleted_by = Auth::guard('manager')->user()->manager_id;
            $manager->deleted_on = Carbon::now()->toDateTimeString();
    
            $manager->save();
            return response()->success('Manager deleted successfully.', 'manager', null);
        }
    }


}