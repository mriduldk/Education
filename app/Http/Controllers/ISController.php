<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use Carbon\Carbon;

class ISController extends Controller
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
        $credentials = $request->only('is_email', 'is_password');

        $is = IS::where('is_email', $request->is_email)->first();
        if ($is && Hash::check($request->is_password, $is->is_password)) {
            Auth::guard('is')->login($is);
            return response()->success('IS login successful', 'is', $is);
        } else {
            return response()->errorUnauthorised('Falied to login');
        }

    }

    public function store(Request $request)
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
        
        $fileName = time().'.'.$request->is_image_url->extension();  
        $request->is_image_url->move(public_path('files/profile/is'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/is' . $fileName;

        $is->is_id = GenerateID::getId();
        $is->is_name =  $request->is_name;
        $is->is_phone = $request->is_phone;
        $is->is_email = $request->is_email;
        $is->is_password = Hash::make($request->is_password);
        $is->is_office_name =  $request->is_office_name;
        $is->is_office_address =  $request->is_office_address;
        $is->is_dictrict =  $request->is_dictrict;
        $is->is_image_url = $path;
        $is->created_by =  Auth::guard('chd')->user()->chd_id;
        $is->created_on =  Carbon::now()->toDateTimeString();


        $is ->save();

        return response()->success('IS inserted successfully', 'is', $is);

    }


    public function show(IS $is)
    {
        $is = IS::where('is_id', $is->is_id)->where('is_deleted', 0)->first();
        
        return response()->success('Fetched IS data successfully', 'is', $is);
    }

    public function getAllIS()
    {
        $is = IS::where('is_deleted', 0)->get();
        
        return response()->success('Fetched all IS data successfully', 'is', $is);
    }

    public function edit(IS $cHD)
    {
        //
    }


    public function update(Request $request, $is_id)
    {
        $request->validate([
            'is_name' => 'required',
            'is_phone' => 'required',
            'is_email' => 'required',
            'is_office_name' => 'required',
            'is_office_address' => 'required',
            'is_dictrict' => 'required'
          ]);

        $is = IS::where('is_id', $is_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            if($request->is_image_url != null && $request->is_image_url != "") {
                $fileName = time().'.'.$request->is_image_url->extension();  
                $request->is_image_url->move(public_path('files/profile/is'), $fileName);
    
                $path = 'https://dashboard.edu.bodoland.gov.in/public/files/profile/is' . $fileName;
                $is->is_image_url = $path;
            }
    
            $is->is_name =  $request->is_name;
            $is->is_phone = $request->is_phone;
            $is->is_email = $request->is_email;
            $is->is_office_name =  $request->is_office_name;
            $is->is_office_address =  $request->is_office_address;
            $is->is_dictrict =  $request->is_dictrict;
            $is->modified_by =  Auth::guard('is')->user()->is_id;
            $is->modified_on =  Carbon::now()->toDateTimeString();
    
            $is->save();
    
            return response()->success('IS updated successfully', 'is', $is);
        }
    }


    public function destroy($is_id)
    {
        $is = IS::where('is_id', $is_id)->first();

        if(empty($is)) {
            return response()->errorNotFound('IS data not found.');
        } else {
            $is->is_deleted = 1;
            $is->deleted_by = Auth::guard('is')->user()->is_id;
            $is->deleted_on = Carbon::now()->toDateTimeString();
    
            $is->save();
            return response()->success('IS deleted successfully.', 'is', null);
        }
    }


}
