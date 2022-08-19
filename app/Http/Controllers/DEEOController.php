<?php

namespace App\Http\Controllers;

use App\Models\DEEO;
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

class DEEOController extends Controller
{

    public function Dashboard(){

        $dashboard = new Dashboard();

        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 3)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 3)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 3)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();
        $dashboard->teacher = Teacher::where('is_deleted', 0)->get();

        return view('DEEO/Dashboard')->with('dashboard', $dashboard);
    }

    public function BlockSelect(){
        return view('DEEO/blockSelect');
    }

    public function SchoolList(){
        return view('DEEO/schoolList');
    }

    public function allTeacherList()
    {
        return view('/DEEO/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }





}