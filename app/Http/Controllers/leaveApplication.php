<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leaveApplication extends Controller
{
    public function leaveApplication()
    {
        return view('teacher/leaveApplication');
    }
}
