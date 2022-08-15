<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if(Auth::guard($userType)->check()){
            
            return $next($request);

        } else if ($userType == 'teacher') {

            return redirect('teacherLogin');
        }
        else if ($userType == 'headTeacher') {

            return redirect('headTeacherLogin');
        }
        else if ($userType == 'is' || $userType == 'dpc' || $userType == 'deeo' || $userType == 'dmc' || $userType == 'di' || $userType == 'beeo') {

            return redirect('officer/login');
        }
        else if ($userType == 'chd') {

            return redirect('chd/login');
        }
        else {
            return redirect('adminLogin');
        }
    }
}
