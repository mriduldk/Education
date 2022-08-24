<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\GenerateID;
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

        if (Auth::guard('teacher')->check())
        { Auth::guard('teacher')->logout(); }

        if (Auth::guard('headTeacher')->check())
        { Auth::guard('headTeacher')->logout(); }

        if (Auth::guard('admin')->check())
        { Auth::guard('admin')->logout(); }

        if (Auth::guard('is')->check())
        { Auth::guard('is')->logout(); }

        if (Auth::guard('dpc')->check())
        { Auth::guard('dpc')->logout(); }

        if (Auth::guard('dmc')->check())
        { Auth::guard('dmc')->logout(); }

        if (Auth::guard('deeo')->check())
        { Auth::guard('deeo')->logout(); }

        if (Auth::guard('di')->check())
        { Auth::guard('di')->logout(); }

        if (Auth::guard('beeo')->check())
        { Auth::guard('beeo')->logout(); }

        if (Auth::guard('chd')->check())
        { Auth::guard('chd')->logout(); }
        
        if (Auth::guard('bmc')->check())
        { Auth::guard('bmc')->logout(); }

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
