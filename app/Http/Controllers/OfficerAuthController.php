<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\BEEO;
use App\Models\BMC;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use Carbon\Carbon;

class OfficerAuthController extends Controller
{

    public function LoginPage()
    {
        return view('Officer/auth/login');
    }

    public function ProcessLogin(Request $request)
    {
        $credentials = $request->only('email', 'password', 'officer_type');

        if($request->officer_type == "IS") {

            $is = IS::where('is_email', $request->email)->where('is_deleted', 0)->first();

            if ($is && Hash::check($request->password, $is->is_password)) {
                Auth::guard('is')->login($is);

                LoginActivityLogController::AddLoginActivityLogSuccess($is->is_id);

                return response()->success('IS Officer login successful', 'officer', $is);
            } else {

                if($is != null) {
                    LoginActivityLogController::AddLoginActivityLogError($is->is_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }

        } else if($request->officer_type == "DMC") {
            
            $dmc = DMC::where('dmc_email', $request->email)->where('is_deleted', 0)->first();

            if ($dmc && Hash::check($request->password, $dmc->dmc_password)) {
                Auth::guard('dmc')->login($dmc);

                LoginActivityLogController::AddLoginActivityLogSuccess($dmc->dmc_id);

                return response()->success('DMC Officer login successful', 'officer', $dmc);
            } else {

                if($dmc != null) {
                    LoginActivityLogController::AddLoginActivityLogError($dmc->dmc_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }

        } else if($request->officer_type == "DPC") {
            
            $dpc = DPC::where('dpc_email', $request->email)->where('is_deleted', 0)->first();

            if ($dpc && Hash::check($request->password, $dpc->dpc_password)) {
                Auth::guard('dpc')->login($dpc);

                LoginActivityLogController::AddLoginActivityLogSuccess($dpc->dpc_id);

                return response()->success('DPC Officer login successful', 'officer', $dpc);
            } else {

                if($dpc != null) {
                    LoginActivityLogController::AddLoginActivityLogError($dpc->dpc_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }

        } else if($request->officer_type == "DI") {
            
            $di = DI::where('di_email', $request->email)->where('is_deleted', 0)->first();

            if ($di && Hash::check($request->password, $di->di_password)) {
                Auth::guard('di')->login($di);

                LoginActivityLogController::AddLoginActivityLogSuccess($di->di_id);

                return response()->success('DI Officer login successful', 'officer', $di);
            } else {

                if($di != null) {
                    LoginActivityLogController::AddLoginActivityLogError($di->di_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }


        } else if($request->officer_type == "DEEO") {
            
            $deeo = DEEO::where('deeo_email', $request->email)->where('is_deleted', 0)->first();

            if ($deeo && Hash::check($request->password, $deeo->deeo_password)) {
                Auth::guard('deeo')->login($deeo);

                LoginActivityLogController::AddLoginActivityLogSuccess($deeo->deeo_id);

                return response()->success('DEEO Officer login successful', 'officer', $deeo);
            } else {

                if($deeo != null) {
                    LoginActivityLogController::AddLoginActivityLogError($deeo->deeo_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }


        } else if($request->officer_type == "BEEO") {
            
            $beeo = BEEO::where('beeo_email', $request->email)->where('is_deleted', 0)->first();

            if ($beeo && Hash::check($request->password, $beeo->beeo_password)) {
                Auth::guard('beeo')->login($beeo);

                LoginActivityLogController::AddLoginActivityLogSuccess($beeo->beeo_id);

                return response()->success('BEEO Officer login successful', 'officer', $beeo);
            } else {

                if($beeo != null) {
                    LoginActivityLogController::AddLoginActivityLogError($beeo->beeo_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }


        } else if($request->officer_type == "BMC") {
            
            $bmc = BMC::where('bmc_email', $request->email)->where('is_deleted', 0)->first();

            if ($bmc && Hash::check($request->password, $bmc->bmc_password)) {
                Auth::guard('bmc')->login($bmc);

                LoginActivityLogController::AddLoginActivityLogSuccess($bmc->bmc_id);

                return response()->success('BMC Officer login successful', 'officer', $bmc);
            } else {

                if($bmc != null) {
                    LoginActivityLogController::AddLoginActivityLogError($bmc->bmc_id);
                } else {
                    LoginActivityLogController::AddLoginActivityLogError($request->email);
                }
                return response()->errorUnauthorised('Falied to login');
            }


        } else {
            return response()->errorNotFound('Please Select a valid Officer Type.');
        }
    }

    public function ISLogout()
    {
        Auth::guard('is')->logout();
        return view('Officer/auth/login');
    }
    public function DPCLogout()
    {
        Auth::guard('dpc')->logout();
        return view('Officer/auth/login');
    }
    public function DEEOLogout()
    {
        Auth::guard('deeo')->logout();
        return view('Officer/auth/login');
    }
    public function DMCLogout()
    {
        Auth::guard('dmc')->logout();
        return view('Officer/auth/login');
    }
    public function DILogout()
    {
        Auth::guard('di')->logout();
        return view('Officer/auth/login');
    }
    public function BEEOLogout()
    {
        Auth::guard('beeo')->logout();
        return view('Officer/auth/login');
    }
    public function BMCLogout()
    {
        Auth::guard('bmc')->logout();
        return view('Officer/auth/login');
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
