<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from menu.json file
        $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);
        $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);

        $verticalMenuDistrictAdminJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuDistrictAdmin.json'));
        $verticalMenuDistrictAdminData = json_decode($verticalMenuDistrictAdminJson);
        
        $verticalMenuHeadTeacherJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuHeadTeacher.json'));
        $verticalMenuHeadTeacherData = json_decode($verticalMenuHeadTeacherJson);
        
        $verticalMenuTeacherJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuTeacher.json'));
        $verticalMenuTeacherData = json_decode($verticalMenuTeacherJson);

        $verticalMenuISJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuIS.json'));
        $verticalMenuISData = json_decode($verticalMenuISJson);

        $verticalMenuDPCJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuDPC.json'));
        $verticalMenuDPCData = json_decode($verticalMenuDPCJson);

        $verticalMenuDMCJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuDMC.json'));
        $verticalMenuDMCData = json_decode($verticalMenuDMCJson);

        $verticalMenuDEEOJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuDEEO.json'));
        $verticalMenuDEEOData = json_decode($verticalMenuDEEOJson);

        $verticalMenuDIJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuDI.json'));
        $verticalMenuDIData = json_decode($verticalMenuDIJson);

        $verticalMenuBEEOJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuBEEO.json'));
        $verticalMenuBEEOData = json_decode($verticalMenuBEEOJson);

        $verticalMenuCHDJson = file_get_contents(base_path('resources/data/menu-data/verticalMenuCHD.json'));
        $verticalMenuCHDData = json_decode($verticalMenuCHDJson);


         // Share all menuData to all the views
        \View::share('menuData',[$verticalMenuData, $horizontalMenuData, $verticalMenuDistrictAdminData, $verticalMenuHeadTeacherData, $verticalMenuTeacherData, $verticalMenuISData, $verticalMenuDPCData, $verticalMenuDMCData, $verticalMenuDEEOData, $verticalMenuDIData, $verticalMenuBEEOData, $verticalMenuCHDData]);
        
    }
}
