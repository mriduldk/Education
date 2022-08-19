<?php

namespace App\Http\Controllers;

use App\Http\GenerateID;
use App\Models\LoginActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginActivityLogController extends Controller
{
    public static function AddLoginActivityLogSuccess(string $userId)
    {
        $loginActivity = new LoginActivityLog();

        $loginActivity->login_al_id = GenerateID::getId();
        $loginActivity->fk_user_id = $userId;
        $loginActivity->login_date_time = Carbon::now()->toDateTimeString();
        $loginActivity->login_message = 'Login Successful';
        $loginActivity->is_deleted = 0;

        $loginActivity->save();
    }

    public static function AddLoginActivityLogError(string $userId)
    {
        $loginActivity = new LoginActivityLog();

        $loginActivity->login_al_id = GenerateID::getId();
        $loginActivity->fk_user_id = $userId;
        $loginActivity->login_date_time = Carbon::now()->toDateTimeString();
        $loginActivity->login_message = 'Login Failed.';
        $loginActivity->is_deleted = 0;
        $loginActivity->save();

    }
}
