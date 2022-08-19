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
use App\Models\Dashboard;
use App\Models\DEO;
use App\Models\School;
use Carbon\Carbon;

class ISController extends Controller
{

    public function IsDashboard(){

        $dashboard = new Dashboard();

        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 0)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 0)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 0)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();
        $dashboard->teacher = Teacher::where('is_deleted', 0)->get();

        return view('IS/Dashboard')->with('dashboard', $dashboard);
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
