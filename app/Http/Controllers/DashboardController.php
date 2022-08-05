<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Tender;
use App\Models\LatestUpdate;

class DashboardController extends Controller
{

    // Dashboard - Analytics
    public function dashboardAnalytics()
    {
      $pageConfigs = ['pageHeader' => false];

      return view('/content/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce()
    {

      $notices = Notice::all();
      $tenders = Tender::all();
      $latestUpdate = LatestUpdate::all();

      //$dashboard = Dashboard::class();
      //$dashboard['notice_count'] = count($notices);
      //$dashboard['tender_count'] = count($tenders);
      //$dashboard['event_count'] = count($latestUpdate);


      $pageConfigs = ['pageHeader' => false];

      return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs])->with('notices', $notices)->with('tenders', $tenders)->with('latestUpdate', $latestUpdate);
    }

    // Admin Dashboard
    public function adminDashboard()
    {
    $notices = Notice::all();
    $tenders = Tender::all();
    $latestUpdate = LatestUpdate::all();

    //$dashboard = Dashboard::class();
    //$dashboard['notice_count'] = count($notices);
    //$dashboard['tender_count'] = count($tenders);
    //$dashboard['event_count'] = count($latestUpdate);


    $pageConfigs = ['pageHeader' => false];

    return view('/admin/adminDashboard', ['pageConfigs' => $pageConfigs])->with('notices', $notices)->with('tenders', $tenders)->with('latestUpdate', $latestUpdate);

    }


    //Disctrict Admin Dashboard
    public function districtAdminDashboard()
    {
      $notices = Notice::all();
      $tenders = Tender::all();
      $latestUpdate = LatestUpdate::all();

      $pageConfigs = ['pageHeader' => false];

      return view('/districtAdmin/districtAdminDashboard', ['pageConfigs' => $pageConfigs])->with('notices', $notices)->with('tenders', $tenders)->with('latestUpdate', $latestUpdate);

    }

    //Head Teacher Dashboard
    public function headTeacherDashboard()
    {
      $notices = Notice::all();
      $tenders = Tender::all();
      $latestUpdate = LatestUpdate::all();

      $pageConfigs = ['pageHeader' => false];

      return view('/headTeacher/headTeacherDashboard', ['pageConfigs' => $pageConfigs])->with('notices', $notices)->with('tenders', $tenders)->with('latestUpdate', $latestUpdate);

    }

    //Head Teacher Dashboard
    public function teacherDashboard()
    {
      $notices = Notice::all();
      $tenders = Tender::all();
      $latestUpdate = LatestUpdate::all();

      $pageConfigs = ['pageHeader' => false];

      return view('/teacher/teacherDashboard', ['pageConfigs' => $pageConfigs])->with('notices', $notices)->with('tenders', $tenders)->with('latestUpdate', $latestUpdate);

    }
     
}