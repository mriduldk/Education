<?php

namespace App\Http\Controllers;

use App\Models\IS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\HTTP\GenerateID;
use App\Models\Approver;
use App\Models\Manager;
use App\Models\Teacher;
use Carbon\Carbon;

class ISController extends Controller
{

    public function IsDashboard(){
        return view('IS/Dashboard');
    }

    public function IsBlockSelect(){
        return view('IS/blockSelect');
    }

    public function SchoolList(){
        return view('IS/schoolList');
    }

    public function allTeacherList()
    {
        return view('/IS/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }





}
