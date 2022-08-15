<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\UserInterfaceController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\PageLayoutController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\LatestUpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BEEOAuthController;
use App\Http\Controllers\BEEOController;
use App\Http\Controllers\BMCAuthController;
use App\Http\Controllers\BMCController;
use App\Http\Controllers\CHDAuthController;
use App\Http\Controllers\CHDController;
use App\Http\Controllers\DEEOAuthController;
use App\Http\Controllers\DEEOController;
use App\Http\Controllers\DEOAuthController;
use App\Http\Controllers\DIAuthController;
use App\Http\Controllers\DIController;
use App\Http\Controllers\DMCAuthController;
use App\Http\Controllers\DMCController;
use App\Http\Controllers\DPCAuthController;
use App\Http\Controllers\DPCController;
use App\Http\Controllers\KnowYourSchoolController;
use App\Http\Controllers\SchoolDetailsController;
use App\Http\Middleware\UserAccess;
use App\Http\Controllers\exampleController;
use App\Http\Controllers\HeadTeacherController;
use App\Http\Controllers\ISAuthController;
use App\Http\Controllers\OfficerAuthController;
use App\Http\Controllers\ISController;
use App\Http\Controllers\leaveApplication;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherLeaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('navigate');
});

Route::group(['prefix' => 'officer'], function () {

    Route::post('login-check', [OfficerAuthController::class, 'ProcessLogin']);
    Route::get('login', [OfficerAuthController::class, 'LoginPage']);
});


Route::middleware('user-access:is')->group(function () {

    Route::group(['prefix' => 'is'], function () {

        Route::post('logout', [OfficerAuthController::class, 'ISLogout']);

        Route::get('dashboard', [ISController::class, 'IsDashboard']);
        Route::get('blockSelect', [ISController::class, 'IsBlockSelect']);

        Route::get('schoolList', [ISController::class, 'SchoolList']);

        Route::get('teacherList', [ISController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [ISController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/IS/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);

        /** Manager */
        Route::get('managerList', function () {
            return view('/IS/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/IS/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


    });

});

Route::middleware('user-access:dpc')->group(function () {

    Route::group(['prefix' => 'dpc'], function () {

        Route::post('logout', [OfficerAuthController::class, 'DPCLogout']);

        Route::get('dashboard', [DPCController::class, 'Dashboard']);
        Route::get('blockSelect', [DPCController::class, 'BlockSelect']);

        Route::get('schoolList', [DPCController::class, 'SchoolList']);

        Route::get('teacherList', [DPCController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [DPCController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/DPC/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


        /** Manager */
        Route::get('managerList', function () {
            return view('/DPC/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/DPC/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


    });

});

Route::middleware('user-access:deeo')->group(function () {

    Route::group(['prefix' => 'deeo'], function () {

        Route::post('logout', [OfficerAuthController::class, 'DEEOLogout']);

        Route::get('dashboard', [DEEOController::class, 'Dashboard']);
        Route::get('blockSelect', [DEEOController::class, 'BlockSelect']);

        Route::get('schoolList', [DEEOController::class, 'SchoolList']);

        /** Teacher */
        Route::get('teacherList', [DEEOController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [DEEOController::class, 'AllTeacherData']);


        /** Approver */
        Route::get('approverList', function () {
            return view('/DEEO/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


        /** Manager */
        Route::get('managerList', function () {
            return view('/DEEO/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);



        /** DEO **/
        Route::get('deoList', function () {
            return view('/DEEO/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


        /** DI */
        Route::get('diList', [DIAuthController::class, 'allDIList']);
        Route::get('all-di-data', [DIAuthController::class, 'AllDIData']);
        Route::post('insert-di', [DIAuthController::class, 'InsertDI']);
        Route::post('update-di', [DIAuthController::class, 'UpdateDI']);
        Route::get('di-data-for-edit', [DIAuthController::class, 'GetDIDataForEdit']);
        Route::post('di-delete', [DIAuthController::class, 'DIDelete']);

        /** BEEO */
        Route::get('beeoList', [BEEOAuthController::class, 'allBEEOList']);
        Route::get('all-beeo-data', [BEEOAuthController::class, 'AllBEEOData']);
        Route::post('insert-beeo', [BEEOAuthController::class, 'InsertBEEO']);
        Route::post('update-beeo', [BEEOAuthController::class, 'UpdateBEEO']);
        Route::get('beeo-data-for-edit', [BEEOAuthController::class, 'GetBEEODataForEdit']);
        Route::post('beeo-delete', [BEEOAuthController::class, 'BEEODelete']);


    });

});

Route::middleware('user-access:dmc')->group(function () {

    Route::group(['prefix' => 'dmc'], function () {

        Route::post('logout', [OfficerAuthController::class, 'DMCLogout']);

        Route::get('dashboard', [DMCController::class, 'Dashboard']);
        Route::get('blockSelect', [DMCController::class, 'BlockSelect']);

        Route::get('schoolList', [DMCController::class, 'SchoolList']);

        Route::get('teacherList', [DMCController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [DMCController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/DMC/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


        /** Manager */
        Route::get('managerList', function () {
            return view('/DMC/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/DMC/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);

        /** BMC */
        Route::get('bmcList', [BMCAuthController::class, 'allBMCList']);
        Route::get('all-bmc-data', [BMCAuthController::class, 'AllBMCData']);
        Route::post('insert-bmc', [BMCAuthController::class, 'InsertBMC']);
        Route::post('update-bmc', [BMCAuthController::class, 'UpdateBMC']);
        Route::get('bmc-data-for-edit', [BMCAuthController::class, 'GetBMCDataForEdit']);
        Route::post('bmc-delete', [BMCAuthController::class, 'BMCDelete']);


    });

});

Route::middleware('user-access:di')->group(function () {

    Route::group(['prefix' => 'di'], function () {

        Route::post('logout', [OfficerAuthController::class, 'DILogout']);

        Route::get('dashboard', [DIController::class, 'Dashboard']);
        Route::get('blockSelect', [DIController::class, 'BlockSelect']);

        Route::get('schoolList', [DIController::class, 'SchoolList']);

        Route::get('teacherList', [DIController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [DIController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/DI/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


         /** Manager */
         Route::get('managerList', function () {
            return view('/DI/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/DI/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


    });

});

Route::middleware('user-access:beeo')->group(function () {

    Route::group(['prefix' => 'beeo'], function () {

        Route::post('logout', [OfficerAuthController::class, 'BEEOLogout']);

        Route::get('dashboard', [BEEOController::class, 'Dashboard']);
        Route::get('blockSelect', [BEEOController::class, 'BlockSelect']);

        Route::get('schoolList', [BEEOController::class, 'SchoolList']);

        Route::get('teacherList', [BEEOController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [BEEOController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/BEEO/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


        /** Manager */
        Route::get('managerList', function () {
            return view('/BEEO/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/BEEO/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


    });

});

Route::middleware('user-access:bmc')->group(function () {

    Route::group(['prefix' => 'bmc'], function () {

        Route::post('logout', [OfficerAuthController::class, 'BMCLogout']);

        Route::get('dashboard', [BMCController::class, 'Dashboard']);
        Route::get('blockSelect', [BMCController::class, 'BlockSelect']);

        Route::get('schoolList', [BMCController::class, 'SchoolList']);

        Route::get('teacherList', [BMCController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [BMCController::class, 'AllTeacherData']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/BMC/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);


        /** Manager */
        Route::get('managerList', function () {
            return view('/BMC/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/BMC/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);


    });

});

Route::group(['prefix' => 'chd'], function () {

    Route::post('login-check', [CHDAuthController::class, 'ProcessLogin']);
    Route::get('login', [CHDAuthController::class, 'LoginPage']);
});

Route::middleware('user-access:chd')->group(function () {

    Route::group(['prefix' => 'chd'], function () {

        Route::post('logout', [CHDAuthController::class, 'Logout']);

        Route::get('dashboard', [CHDController::class, 'Dashboard']);
        Route::get('blockSelect', [CHDController::class, 'BlockSelect']);

        Route::get('schoolList', [CHDController::class, 'SchoolList']);

        Route::get('teacherList', [CHDController::class, 'allTeacherList']);
        Route::get('all-teachers-data', [CHDController::class, 'AllTeacherData']);

        /** IS */
        Route::get('isList', [ISAuthController::class, 'allISList']);
        Route::get('all-is-data', [ISAuthController::class, 'AllISData']);
        Route::post('insert-is', [ISAuthController::class, 'InsertIS']);
        Route::post('update-is', [ISAuthController::class, 'UpdateIS']);
        Route::get('is-data-for-edit', [ISAuthController::class, 'GetISDataForEdit']);
        Route::post('is-delete', [ISAuthController::class, 'ISDelete']);

        /** DPC */
        Route::get('dpcList', [DPCAuthController::class, 'allDPCList']);
        Route::get('all-dpc-data', [DPCAuthController::class, 'AllDPCData']);
        Route::post('insert-dpc', [DPCAuthController::class, 'InsertDPC']);
        Route::post('update-dpc', [DPCAuthController::class, 'UpdateDPC']);
        Route::get('dpc-data-for-edit', [DPCAuthController::class, 'GetDPCDataForEdit']);
        Route::post('dpc-delete', [DPCAuthController::class, 'DPCDelete']);

        /** DMC */
        Route::get('dmcList', [DMCAuthController::class, 'allDMCList']);
        Route::get('all-dmc-data', [DMCAuthController::class, 'AllDMCData']);
        Route::post('insert-dmc', [DMCAuthController::class, 'InsertDMC']);
        Route::post('update-dmc', [DMCAuthController::class, 'UpdateDMC']);
        Route::get('dmc-data-for-edit', [DMCAuthController::class, 'GetDMCDataForEdit']);
        Route::post('dmc-delete', [DMCAuthController::class, 'DMCDelete']);

        /** DEEO */
        Route::get('deeoList', [DEEOAuthController::class, 'allDEEOList']);
        Route::get('all-deeo-data', [DEEOAuthController::class, 'AllDEEOData']);
        Route::post('insert-deeo', [DEEOAuthController::class, 'InsertDEEO']);
        Route::post('update-deeo', [DEEOAuthController::class, 'UpdateDEEO']);
        Route::get('deeo-data-for-edit', [DEEOAuthController::class, 'GetDEEODataForEdit']);
        Route::post('deeo-delete', [DEEOAuthController::class, 'DEEODelete']);


        /** DEO **/
        Route::get('deoList', function () {
            return view('/CHD/deo/allDEOList');
        });
        Route::get('all-deo-data', [DEOAuthController::class, 'AllDEOData']);
        Route::post('insert-deo', [DEOAuthController::class, 'InsertDEO']);
        Route::post('update-deo', [DEOAuthController::class, 'UpdateDEO']);
        Route::get('deo-data-for-edit', [DEOAuthController::class, 'GetDEODataForEdit']);
        Route::post('deo-delete', [DEOAuthController::class, 'DEODelete']);

        /** Approver */
        Route::get('approverList', function () {
            return view('/CHD/approver/allApproverList');
        });
        Route::get('all-approvers-data', [ApproverController::class, 'AllApproverData']);
        Route::post('insert-approver', [ApproverController::class, 'InsertApprover']);
        Route::post('update-approver', [ApproverController::class, 'UpdateApprover']);
        Route::get('approver-data-for-edit', [ApproverController::class, 'GetApproverDataForEdit']);
        Route::post('approver-delete', [ApproverController::class, 'ApproverDelete']);

        /** Manager */
        Route::get('managerList', function () {
            return view('/CHD/manager/allManagerList');
        });
        Route::get('all-manager-data', [ManagerController::class, 'AllManagerData']);
        Route::post('insert-manager', [ManagerController::class, 'InsertManager']);
        Route::post('update-manager', [ManagerController::class, 'UpdateManager']);
        Route::get('manager-data-for-edit', [ManagerController::class, 'GetManagerDataForEdit']);
        Route::post('manager-delete', [ManagerController::class, 'ManagerDelete']);



    });

});



Route::get('searchedSchoolData', [KnowYourSchoolController::class, 'searchedSchoolData'])->name('searchedSchoolData');

Route::get('knowYourSchool', [KnowYourSchoolController::class, 'knowYourSchool']);
Route::get('searchSchoolTable', [KnowYourSchoolController::class, 'show']);
Route::get('searchSchoolTableList', [KnowYourSchoolController::class, 'show2']);
Route::get('searchSchoolDetails/{id}', [KnowYourSchoolController::class, 'searchSchoolDetails'])->name('searchSchoolDetails');
Route::get('allSchoolData', [KnowYourSchoolController::class, 'allSchoolData'])->name('allSchoolData');

Route::get('kharithiHome', [KnowYourSchoolController::class, 'kharithiHome'])->name('kharithiHome');

Route::get('example', [exampleController::class, 'example']);

Route::get('leaveApplication', [TeacherLeaveController::class, 'index']);
Route::post('leave-insert', [TeacherLeaveController::class, 'store']);


Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('notice-index', [NoticeController::class, 'index']);
    Route::get('notice-insert', [NoticeController::class, 'index']);
    Route::get('notice-edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::get('notice-table', [NoticeController::class, 'show']);
    Route::post('store-data', [NoticeController::class, 'store']);
    Route::post('notice-update', [NoticeController::class, 'update']);
    Route::post('notice-delete', [NoticeController::class, 'destroy']);
    Route::get('notice-table-all-data', [NoticeController::class, 'NoticeTableAllData'])->name('notice.allData');

    Route::get('tender-index', [TenderController::class, 'index']);
    Route::get('tender-insert', [TenderController::class, 'index']);
    Route::get('tender-edit/{id}', [TenderController::class, 'edit'])->name('tender.edit');
    Route::get('tender-table', [TenderController::class, 'show']);
    Route::post('tender-store', [TenderController::class, 'store']);
    Route::post('tender-update', [TenderController::class, 'update']);
    Route::post('tender-delete', [TenderController::class, 'destroy']);
    Route::get('tender-table-all-data', [TenderController::class, 'TenderTableAllData'])->name('tender.allData');


    Route::get('latest-update-index', [LatestUpdateController::class, 'index']);
    Route::get('latest-update-insert', [LatestUpdateController::class, 'index']);
    Route::get('latest-update-edit/{id}', [LatestUpdateController::class, 'edit'])->name('latest-update.edit');
    Route::get('latest-update-table', [LatestUpdateController::class, 'show']);
    Route::post('latest-update-store', [LatestUpdateController::class, 'store']);
    Route::post('latest-update-update', [LatestUpdateController::class, 'update']);
    Route::post('latest-update-delete', [LatestUpdateController::class, 'destroy']);
    Route::get('latest-update-table-all-data', [LatestUpdateController::class, 'LatestTableAllData'])->name('latest-update.allData');

    //Route::get('/', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
});


Route::middleware(['auth', 'user-access:districtAdmin'])->group(function () {

    Route::get('/districtAdminDashboard', [DashboardController::class, 'districtAdminDashboard'])->name('districtAdminDashboard');

    Route::get('/schoolDetails', [SchoolDetailsController::class, 'schoolDetails'])->name('schoolDetails');
    Route::get('/schoolInsert', [SchoolDetailsController::class, 'schoolInsert'])->name('schoolInsert');
    Route::get('/schoolList', [SchoolDetailsController::class, 'schoolList'])->name('schoolList');

});



Route::get('headTeacherLogin', [HeadTeacherController::class, 'HeadTeacherLoginPage'])->name('HeadTeacherLoginPage');
Route::post('headTeacherLogin-check', [HeadTeacherController::class, 'HeadTeacherLoginCheck']);
Route::post('headTeacher-logout', [HeadTeacherController::class, 'HeadTeacherLogout'])->name('HeadTeacherLogout');


Route::middleware('user-access:headTeacher')->group(function () {

    Route::get('headTeacherDashboard', [HeadTeacherController::class, 'headTeacherDashboard'])->name('headTeacherDashboard');

    Route::get('leaveApplicationList', [HeadTeacherController::class, 'LeaveApplicationList'])->name('LeaveApplicationList');
    Route::get('get-all-leave-application', [TeacherLeaveController::class, 'showAll']);
    Route::get('get-one-leave-application/{id}', [TeacherLeaveController::class, 'GetLeaveApplicationDetails'])->name('GetLeaveApplicationDetails');


    Route::get('allTeacherList', [HeadTeacherController::class, 'allTeacherList'])->name('allTeacherList');
    Route::get('all-teachers-of-school', [HeadTeacherController::class, 'AllTeacherOfSchool']);
    Route::post('teacher-delete', [HeadTeacherController::class, 'DeleteTeacher']);
    Route::post('teacher-add', [HeadTeacherController::class, 'AddTeacher']);
    Route::get('editTeacher/{id}', [HeadTeacherController::class, 'EditTeacher'])->name('editTeacher');
    Route::post('teacher-edit', [HeadTeacherController::class, 'UpdateTeacher']);

    Route::get('editSchoolDetails', [HeadTeacherController::class, 'EditSchoolDetails'])->name('EditSchoolDetails');
    Route::post('edit-school-details', [HeadTeacherController::class, 'UpdateSchoolDetails']);

    Route::get('editHeadTeacher', [HeadTeacherController::class, 'editHeadTeacher'])->name('editHeadTeacher');
    Route::get('teacherDatas', [HeadTeacherController::class, 'teacherDatas']);
    Route::get('bmcDashboard', [HeadTeacherController::class, 'bmcDashboard']);
    Route::get('AccessRoles', [HeadTeacherController::class, 'AccessRoles']);
    Route::get('dataEntry', [HeadTeacherController::class, 'dataEntryOperator']);
    Route::get('addSchool', [HeadTeacherController::class, 'addSchool']);

});




Route::get('teacherLogin', [TeacherController::class, 'TeacherLoginPage'])->name('TeacherLoginPage');
Route::post('teacherLogin-check', [TeacherController::class, 'TeacherLoginCheck']);
Route::post('teacher-logout', [TeacherController::class, 'TeacherLogout']);

Route::middleware('user-access:teacher')->group(function () {

    Route::get('teacherDashboard', [TeacherController::class, 'teacherDashboard'])->name('teacherDashboard');

    Route::get('editEmployeementDetails', [TeacherController::class, 'EditEmployeementDetails'])->name('EditEmployeementDetails');
    Route::post('update-employeement-details', [TeacherController::class, 'UpdateEmployeementDetails']);
    Route::get('insertEmployeementDetails', [TeacherController::class, 'InsertEmployeementDetails'])->name('InsertEmployeementDetails');;
    Route::post('insert-employeement-details', [TeacherController::class, 'StoreEmployeementDetails']);
        
    Route::get('editSalaryAccount', [TeacherController::class, 'EditSalaryAccount']);
    Route::post('update-salary-account', [TeacherController::class, 'UpdateTeacherSalaryAccount']);
    Route::get('insertSalaryAccount', [TeacherController::class, 'InsertSalaryAccount'])->name('InsertSalaryAccount');
    Route::post('insert-salary-account', [TeacherController::class, 'StoreSalaryAccount']);

    Route::get('editTeacherQualification', [TeacherController::class, 'EditTeacherQualification']);
    Route::get('insertTeacherQualification', [TeacherController::class, 'InsertTeacherQualification']);
    Route::post('insert-teacher-qualification', [TeacherController::class, 'StoreTeacherQualification']);

    Route::get('reviewTeacherDetails', [TeacherController::class, 'ReviewTeacherDetails']);
    Route::post('store-teacher-details', [TeacherController::class, 'StoreTeacherDetails']);

});




//Login Page and Logout
Route::get('adminLogin', [AdminController::class, 'index'])->name('adminLogin');
Route::post('login-check', [AdminController::class, 'authenticate']);
Route::post('admin-logout', [AdminController::class, 'logout'])->name('admin-logout');

Route::get('districtAdminLogin', [AdminController::class, 'index'])->name('districtAdminLogin');
Route::post('districtAdmin-login-check', [AdminController::class, 'authenticate']);
Route::post('districtAdmin-logout', [AdminController::class, 'logout'])->name('districtAdmin-logout');

//Route::get('headTeacherLogin', [AdminController::class, 'index'])->name('headTeacherLogin');
//Route::post('headTeacher-login-check', [AdminController::class, 'authenticate']);
//Route::post('headTeacher-logout', [AdminController::class, 'logout'])->name('headTeacher-logout');

//Route::get('teacherLogin', [AdminController::class, 'index'])->name('teacher');
//Route::post('teacher-login-check', [AdminController::class, 'authenticate']);
//Route::post('teacher-logout', [AdminController::class, 'logout'])->name('teacher-logout');












// Main Page Route



/* Route Dashboards */
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('analytics', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard-analytics');
    Route::get('ecommerce', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');
});
/* Route Dashboards */

/* Route Apps */
Route::group(['prefix' => 'app'], function () {
    Route::get('email', [AppsController::class, 'emailApp'])->name('app-email');
    Route::get('chat', [AppsController::class, 'chatApp'])->name('app-chat');
    Route::get('todo', [AppsController::class, 'todoApp'])->name('app-todo');
    Route::get('calendar', [AppsController::class, 'calendarApp'])->name('app-calendar');
    Route::get('kanban', [AppsController::class, 'kanbanApp'])->name('app-kanban');
    Route::get('invoice/list', [AppsController::class, 'invoice_list'])->name('app-invoice-list');
    Route::get('invoice/preview', [AppsController::class, 'invoice_preview'])->name('app-invoice-preview');
    Route::get('invoice/edit', [AppsController::class, 'invoice_edit'])->name('app-invoice-edit');
    Route::get('invoice/add', [AppsController::class, 'invoice_add'])->name('app-invoice-add');
    Route::get('invoice/print', [AppsController::class, 'invoice_print'])->name('app-invoice-print');
    Route::get('ecommerce/shop', [AppsController::class, 'ecommerce_shop'])->name('app-ecommerce-shop');
    Route::get('ecommerce/details', [AppsController::class, 'ecommerce_details'])->name('app-ecommerce-details');
    Route::get('ecommerce/wishlist', [AppsController::class, 'ecommerce_wishlist'])->name('app-ecommerce-wishlist');
    Route::get('ecommerce/checkout', [AppsController::class, 'ecommerce_checkout'])->name('app-ecommerce-checkout');
    Route::get('file-manager', [AppsController::class, 'file_manager'])->name('app-file-manager');
    Route::get('access-roles', [AppsController::class, 'access_roles'])->name('app-access-roles');
    Route::get('access-permission', [AppsController::class, 'access_permission'])->name('app-access-permission');
    Route::get('user/list', [AppsController::class, 'user_list'])->name('app-user-list');
    Route::get('user/view/account', [AppsController::class, 'user_view_account'])->name('app-user-view-account');
    Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app-user-view-security');
    Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app-user-view-billing');
    Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app-user-view-notifications');
    Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections');
});
/* Route Apps */

/* Route UI */
Route::group(['prefix' => 'ui'], function () {
    Route::get('typography', [UserInterfaceController::class, 'typography'])->name('ui-typography');
});
/* Route UI */

/* Route Icons */
Route::group(['prefix' => 'icons'], function () {
    Route::get('feather', [UserInterfaceController::class, 'icons_feather'])->name('icons-feather');
});
/* Route Icons */

/* Route Cards */
Route::group(['prefix' => 'card'], function () {
    Route::get('basic', [CardsController::class, 'card_basic'])->name('card-basic');
    Route::get('advance', [CardsController::class, 'card_advance'])->name('card-advance');
    Route::get('statistics', [CardsController::class, 'card_statistics'])->name('card-statistics');
    Route::get('analytics', [CardsController::class, 'card_analytics'])->name('card-analytics');
    Route::get('actions', [CardsController::class, 'card_actions'])->name('card-actions');
});
/* Route Cards */

/* Route Components */
Route::group(['prefix' => 'component'], function () {
    Route::get('accordion', [ComponentsController::class, 'accordion'])->name('component-accordion');
    Route::get('alert', [ComponentsController::class, 'alert'])->name('component-alert');
    Route::get('avatar', [ComponentsController::class, 'avatar'])->name('component-avatar');
    Route::get('badges', [ComponentsController::class, 'badges'])->name('component-badges');
    Route::get('breadcrumbs', [ComponentsController::class, 'breadcrumbs'])->name('component-breadcrumbs');
    Route::get('buttons', [ComponentsController::class, 'buttons'])->name('component-buttons');
    Route::get('carousel', [ComponentsController::class, 'carousel'])->name('component-carousel');
    Route::get('collapse', [ComponentsController::class, 'collapse'])->name('component-collapse');
    Route::get('divider', [ComponentsController::class, 'divider'])->name('component-divider');
    Route::get('dropdowns', [ComponentsController::class, 'dropdowns'])->name('component-dropdowns');
    Route::get('list-group', [ComponentsController::class, 'list_group'])->name('component-list-group');
    Route::get('modals', [ComponentsController::class, 'modals'])->name('component-modals');
    Route::get('pagination', [ComponentsController::class, 'pagination'])->name('component-pagination');
    Route::get('navs', [ComponentsController::class, 'navs'])->name('component-navs');
    Route::get('offcanvas', [ComponentsController::class, 'offcanvas'])->name('component-offcanvas');
    Route::get('tabs', [ComponentsController::class, 'tabs'])->name('component-tabs');
    Route::get('timeline', [ComponentsController::class, 'timeline'])->name('component-timeline');
    Route::get('pills', [ComponentsController::class, 'pills'])->name('component-pills');
    Route::get('tooltips', [ComponentsController::class, 'tooltips'])->name('component-tooltips');
    Route::get('popovers', [ComponentsController::class, 'popovers'])->name('component-popovers');
    Route::get('pill-badges', [ComponentsController::class, 'pill_badges'])->name('component-pill-badges');
    Route::get('progress', [ComponentsController::class, 'progress'])->name('component-progress');
    Route::get('spinner', [ComponentsController::class, 'spinner'])->name('component-spinner');
    Route::get('toast', [ComponentsController::class, 'toast'])->name('component-bs-toast');
});
/* Route Components */

/* Route Extensions */
Route::group(['prefix' => 'ext-component'], function () {
    Route::get('sweet-alerts', [ExtensionController::class, 'sweet_alert'])->name('ext-component-sweet-alerts');
    Route::get('block-ui', [ExtensionController::class, 'block_ui'])->name('ext-component-block-ui');
    Route::get('toastr', [ExtensionController::class, 'toastr'])->name('ext-component-toastr');
    Route::get('sliders', [ExtensionController::class, 'sliders'])->name('ext-component-sliders');
    Route::get('drag-drop', [ExtensionController::class, 'drag_drop'])->name('ext-component-drag-drop');
    Route::get('tour', [ExtensionController::class, 'tour'])->name('ext-component-tour');
    Route::get('clipboard', [ExtensionController::class, 'clipboard'])->name('ext-component-clipboard');
    Route::get('plyr', [ExtensionController::class, 'plyr'])->name('ext-component-plyr');
    Route::get('context-menu', [ExtensionController::class, 'context_menu'])->name('ext-component-context-menu');
    Route::get('swiper', [ExtensionController::class, 'swiper'])->name('ext-component-swiper');
    Route::get('tree', [ExtensionController::class, 'tree'])->name('ext-component-tree');
    Route::get('ratings', [ExtensionController::class, 'ratings'])->name('ext-component-ratings');
    Route::get('locale', [ExtensionController::class, 'locale'])->name('ext-component-locale');
});
/* Route Extensions */

/* Route Page Layouts */
Route::group(['prefix' => 'page-layouts'], function () {
    Route::get('collapsed-menu', [PageLayoutController::class, 'layout_collapsed_menu'])->name('layout-collapsed-menu');
    Route::get('full', [PageLayoutController::class, 'layout_full'])->name('layout-full');
    Route::get('without-menu', [PageLayoutController::class, 'layout_without_menu'])->name('layout-without-menu');
    Route::get('empty', [PageLayoutController::class, 'layout_empty'])->name('layout-empty');
    Route::get('blank', [PageLayoutController::class, 'layout_blank'])->name('layout-blank');
});
/* Route Page Layouts */

/* Route Forms */
Route::group(['prefix' => 'form'], function () {
    Route::get('input', [FormsController::class, 'input'])->name('form-input');
    Route::get('input-groups', [FormsController::class, 'input_groups'])->name('form-input-groups');
    Route::get('input-mask', [FormsController::class, 'input_mask'])->name('form-input-mask');
    Route::get('textarea', [FormsController::class, 'textarea'])->name('form-textarea');
    Route::get('checkbox', [FormsController::class, 'checkbox'])->name('form-checkbox');
    Route::get('radio', [FormsController::class, 'radio'])->name('form-radio');
    Route::get('custom-options', [FormsController::class, 'custom_options'])->name('form-custom-options');
    Route::get('switch', [FormsController::class, 'switch'])->name('form-switch');
    Route::get('select', [FormsController::class, 'select'])->name('form-select');
    Route::get('number-input', [FormsController::class, 'number_input'])->name('form-number-input');
    Route::get('file-uploader', [FormsController::class, 'file_uploader'])->name('form-file-uploader');
    Route::get('quill-editor', [FormsController::class, 'quill_editor'])->name('form-quill-editor');
    Route::get('date-time-picker', [FormsController::class, 'date_time_picker'])->name('form-date-time-picker');
    Route::get('layout', [FormsController::class, 'layouts'])->name('form-layout');
    Route::get('wizard', [FormsController::class, 'wizard'])->name('form-wizard');
    Route::get('validation', [FormsController::class, 'validation'])->name('form-validation');
    Route::get('repeater', [FormsController::class, 'form_repeater'])->name('form-repeater');
});
/* Route Forms */

/* Route Tables */
Route::group(['prefix' => 'table'], function () {
    Route::get('', [TableController::class, 'table'])->name('table');
    Route::get('datatable/basic', [TableController::class, 'datatable_basic'])->name('datatable-basic');
    Route::get('datatable/advance', [TableController::class, 'datatable_advance'])->name('datatable-advance');
});
/* Route Tables */

/* Route Pages */
Route::group(['prefix' => 'page'], function () {
    Route::get('account-settings-account', [PagesController::class, 'account_settings_account'])->name('page-account-settings-account');
    Route::get('account-settings-security', [PagesController::class, 'account_settings_security'])->name('page-account-settings-security');
    Route::get('account-settings-billing', [PagesController::class, 'account_settings_billing'])->name('page-account-settings-billing');
    Route::get('account-settings-notifications', [PagesController::class, 'account_settings_notifications'])->name('page-account-settings-notifications');
    Route::get('account-settings-connections', [PagesController::class, 'account_settings_connections'])->name('page-account-settings-connections');
    Route::get('profile', [PagesController::class, 'profile'])->name('page-profile');
    Route::get('faq', [PagesController::class, 'faq'])->name('page-faq');
    Route::get('knowledge-base', [PagesController::class, 'knowledge_base'])->name('page-knowledge-base');
    Route::get('knowledge-base/category', [PagesController::class, 'kb_category'])->name('page-knowledge-base');
    Route::get('knowledge-base/category/question', [PagesController::class, 'kb_question'])->name('page-knowledge-base');
    Route::get('pricing', [PagesController::class, 'pricing'])->name('page-pricing');
    Route::get('api-key', [PagesController::class, 'api_key'])->name('page-api-key');
    Route::get('blog/list', [PagesController::class, 'blog_list'])->name('page-blog-list');
    Route::get('blog/detail', [PagesController::class, 'blog_detail'])->name('page-blog-detail');
    Route::get('blog/edit', [PagesController::class, 'blog_edit'])->name('page-blog-edit');

    // Miscellaneous Pages With Page Prefix
    Route::get('coming-soon', [MiscellaneousController::class, 'coming_soon'])->name('misc-coming-soon');
    Route::get('not-authorized', [MiscellaneousController::class, 'not_authorized'])->name('misc-not-authorized');
    Route::get('maintenance', [MiscellaneousController::class, 'maintenance'])->name('misc-maintenance');
    Route::get('license', [PagesController::class, 'license'])->name('page-license');
});

/* Modal Examples */
Route::get('/modal-examples', [PagesController::class, 'modal_examples'])->name('modal-examples');

/* Route Pages */
Route::get('/error', [MiscellaneousController::class, 'error'])->name('error');

/* Route Authentication Pages */
Route::group(['prefix' => 'auth'], function () {
    Route::get('login-basic', [AuthenticationController::class, 'login_basic'])->name('auth-login-basic');
    Route::get('login-cover', [AuthenticationController::class, 'login_cover'])->name('auth-login-cover');
    Route::get('register-basic', [AuthenticationController::class, 'register_basic'])->name('auth-register-basic');
    Route::get('register-cover', [AuthenticationController::class, 'register_cover'])->name('auth-register-cover');
    Route::get('forgot-password-basic', [AuthenticationController::class, 'forgot_password_basic'])->name('auth-forgot-password-basic');
    Route::get('forgot-password-cover', [AuthenticationController::class, 'forgot_password_cover'])->name('auth-forgot-password-cover');
    Route::get('reset-password-basic', [AuthenticationController::class, 'reset_password_basic'])->name('auth-reset-password-basic');
    Route::get('reset-password-cover', [AuthenticationController::class, 'reset_password_cover'])->name('auth-reset-password-cover');
    Route::get('verify-email-basic', [AuthenticationController::class, 'verify_email_basic'])->name('auth-verify-email-basic');
    Route::get('verify-email-cover', [AuthenticationController::class, 'verify_email_cover'])->name('auth-verify-email-cover');
    Route::get('two-steps-basic', [AuthenticationController::class, 'two_steps_basic'])->name('auth-two-steps-basic');
    Route::get('two-steps-cover', [AuthenticationController::class, 'two_steps_cover'])->name('auth-two-steps-cover');
    Route::get('register-multisteps', [AuthenticationController::class, 'register_multi_steps'])->name('auth-register-multisteps');
    Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('auth-lock_screen');
});
/* Route Authentication Pages */

/* Route Charts */
Route::group(['prefix' => 'chart'], function () {
    Route::get('apex', [ChartsController::class, 'apex'])->name('chart-apex');
    Route::get('chartjs', [ChartsController::class, 'chartjs'])->name('chart-chartjs');
    Route::get('echarts', [ChartsController::class, 'echarts'])->name('chart-echarts');
});
/* Route Charts */

// map leaflet
Route::get('/maps/leaflet', [ChartsController::class, 'maps_leaflet'])->name('map-leaflet');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});