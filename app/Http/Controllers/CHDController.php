<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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
use App\Models\Approver;
use App\Models\Dashboard;
use App\Models\DEO;
use App\Models\Manager;
use App\Models\School;
use Carbon\Carbon;

class CHDController extends Controller
{

    public function Dashboard(){

        $dashboard = new Dashboard();

        $dashboard->is = IS::where('is_deleted', 0)->get();
        $dashboard->dpc = DPC::where('is_deleted', 0)->get();
        $dashboard->dmc = DMC::where('is_deleted', 0)->get();
        $dashboard->deeo = DEEO::where('is_deleted', 0)->get();
        $dashboard->approver = Approver::where('is_deleted', 0)->where('approver_type', 7)->get();
        $dashboard->manager = Manager::where('is_deleted', 0)->where('manager_type', 7)->get();
        $dashboard->deo = DEO::where('is_deleted', 0)->where('deo_type', 7)->get();
        $dashboard->school = School::where('is_deleted', 0)->get();


        return view('CHD/Dashboard')->with('dashboard', $dashboard);
    }

    public function BlockSelect(){
        return view('CHD/blockSelect');
    }

    public function SchoolList(){
        return view('CHD/schoolList');
    }

    public function allTeacherList()
    {
        return view('/CHD/allTeacherList');
    }
    public function AllTeacherData()
    {
        $teachers = Teacher::where('is_deleted', 0)->get();
        return $teachers;
    }





}
