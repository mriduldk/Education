<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolDetailsController extends Controller
{

    public function knowYourSchool()
    {
        return view('/knowYourSchool');
    }


    //School Details Page
    public function schoolDetails()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/districtAdmin/schoolDetails', ['pageConfigs' => $pageConfigs]);

    }

    public function schoolInsert()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/districtAdmin/schoolInsert', ['pageConfigs' => $pageConfigs]);

    }


    public function schoolList()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/districtAdmin/schoolList', ['pageConfigs' => $pageConfigs]);

    }


    public function allTeacherList()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/headTeacher/allTeacherList', ['pageConfigs' => $pageConfigs]);

    }

    public function editHeadTeacher()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/headTeacher/editHeadTeacher', ['pageConfigs' => $pageConfigs]);

    }

    public function schoolInsertHeadTeacher()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/headTeacher/schoolInsert', ['pageConfigs' => $pageConfigs]);

    }

    public function editTeacher()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/teacher/editTeacher', ['pageConfigs' => $pageConfigs]);

    }




}
