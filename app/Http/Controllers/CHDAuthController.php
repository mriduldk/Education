<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\BEEO;
use App\Models\CHD;
use App\Models\DEEO;
use App\Models\DI;
use App\Models\DMC;
use App\Models\DPC;
use Carbon\Carbon;

class CHDAuthController extends Controller
{
    public function LoginPage()
    {
        return view('CHD/auth/login');
    }
    public function Logout()
    {
        Auth::guard('chd')->logout();
        return view('CHD/auth/login');
    }

    public function ProcessLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $chd = CHD::where('chd_email', $request->email)->where('is_deleted', 0)->first();

        if ($chd && Hash::check($request->password, $chd->chd_password)) {
            Auth::guard('chd')->login($chd);

            LoginActivityLogController::AddLoginActivityLogSuccess($chd->chd_id);

            return response()->success('CHD login successful', 'chd', $chd);
        } else {

            if($chd != null) {
                LoginActivityLogController::AddLoginActivityLogError($chd->chd_id);
            } else {
                LoginActivityLogController::AddLoginActivityLogError($request->email);
            }
            return response()->errorUnauthorised('Falied to login');
        }

    }






}
