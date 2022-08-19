<?php

namespace App\Http\Controllers;

use App\Http\GenerateID;
use App\Models\UserActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivityLogController extends Controller
{
    public static function AddUserActivityLogInsert(string $userId, string $action_taken_user_id, string $action_taken_user_name, string $message)
    {
        $userActivityLog = new UserActivityLog();

        $userActivityLog->user_al_id = GenerateID::getId();
        $userActivityLog->fk_user_id = $userId;
        $userActivityLog->fk_action_taken_user_id = $action_taken_user_id;
        $userActivityLog->action_taken_user_name = $action_taken_user_name;
        $userActivityLog->date_time = Carbon::now()->toDateTimeString();
        $userActivityLog->message = $message;
        $userActivityLog->action = 'INSERT';
        $userActivityLog->is_deleted = 0;

        $userActivityLog->save();
    }

    public static function AddUserActivityLogUpdate(string $userId, string $action_taken_user_id, string $action_taken_user_name, string $message)
    {
        $userActivityLog = new UserActivityLog();

        $userActivityLog->user_al_id = GenerateID::getId();
        $userActivityLog->fk_user_id = $userId;
        $userActivityLog->fk_action_taken_user_id = $action_taken_user_id;
        $userActivityLog->action_taken_user_name = $action_taken_user_name;
        $userActivityLog->date_time = Carbon::now()->toDateTimeString();
        $userActivityLog->message = $message;
        $userActivityLog->action = 'UPDATE';
        $userActivityLog->is_deleted = 0;

        $userActivityLog->save();
    }

    public static function AddUserActivityLogDelete(string $userId, string $action_taken_user_id, string $action_taken_user_name, string $message)
    {
        $userActivityLog = new UserActivityLog();

        $userActivityLog->user_al_id = GenerateID::getId();
        $userActivityLog->fk_user_id = $userId;
        $userActivityLog->fk_action_taken_user_id = $action_taken_user_id;
        $userActivityLog->action_taken_user_name = $action_taken_user_name;
        $userActivityLog->date_time = Carbon::now()->toDateTimeString();
        $userActivityLog->message = $message;
        $userActivityLog->action = 'DELETE';
        $userActivityLog->is_deleted = 0;

        $userActivityLog->save();
    }

    public static function AddUserActivityLog(string $userId, string $action_taken_user_id = null, string $action_taken_user_name = null, string $message, string $action)
    {
        $userActivityLog = new UserActivityLog();

        $userActivityLog->user_al_id = GenerateID::getId();
        $userActivityLog->fk_user_id = $userId;
        $userActivityLog->fk_action_taken_user_id = $action_taken_user_id;
        $userActivityLog->action_taken_user_name = $action_taken_user_name;
        $userActivityLog->date_time = Carbon::now()->toDateTimeString();
        $userActivityLog->message = $message;
        $userActivityLog->action = $action;
        $userActivityLog->is_deleted = 0;

        $userActivityLog->save();
    }

    public function UserActivityData()
    {

        if(Auth::guard('is')->check()){

            $userActivityLog = UserActivityLog::join('i_s', function ($join) {
                $join->on('i_s.is_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('i_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('is')->user()->is_id)
            ->get();

        } else if(Auth::guard('dpc')->check()){
            
            $userActivityLog = UserActivityLog::join('d_p_c_s', function ($join) {
                $join->on('d_p_c_s.dpc_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('d_p_c_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('dpc')->user()->dpc_id)
            ->get();

        } else if(Auth::guard('dmc')->check()){

            $userActivityLog = UserActivityLog::join('d_m_c_s', function ($join) {
                $join->on('d_m_c_s.dmc_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('d_m_c_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('dmc')->user()->dmc_id)
            ->get();

        } else if(Auth::guard('deeo')->check()){

            $userActivityLog = UserActivityLog::join('d_e_e_o_s', function ($join) {
                $join->on('d_e_e_o_s.deeo_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('d_e_e_o_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('deeo')->user()->deeo_id)
            ->get();

        } else if(Auth::guard('di')->check()){

            $userActivityLog = UserActivityLog::join('d_i_s', function ($join) {
                $join->on('d_i_s.di_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('d_i_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('di')->user()->di_id)
            ->get();

        } else if(Auth::guard('beeo')->check()){

            $userActivityLog = UserActivityLog::join('b_e_e_o_s', function ($join) {
                $join->on('b_e_e_o_s.beeo_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('b_e_e_o_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('beeo')->user()->beeo_id)
            ->get();

        } else if(Auth::guard('bmc')->check()){

            $userActivityLog = UserActivityLog::join('b_m_c_s', function ($join) {
                $join->on('b_m_c_s.bmc_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('b_m_c_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('bmc')->user()->bmc_id)
            ->get();

        } else if(Auth::guard('chd')->check()){

            $userActivityLog = UserActivityLog::join('c_h_d_s', function ($join) {
                $join->on('c_h_d_s.chd_id', '=', 'user_activity_logs.fk_user_id');
            })
            ->where('user_activity_logs.is_deleted', 0)
            ->where('c_h_d_s.is_deleted', 0)
            ->where('fk_user_id', Auth::guard('chd')->user()->chd_id)
            ->get();

        } else {
            return response()->errorUnauthorised('Approver type is not valid');
        }

        return $userActivityLog;
    }

}
