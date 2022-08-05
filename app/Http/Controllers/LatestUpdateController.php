<?php

namespace App\Http\Controllers;

use App\Models\LatestUpdate;
use Illuminate\Http\Request;

class LatestUpdateController extends Controller
{
    public function index()
    {
        return view('admin/insert/latest-update-insert');
    }

    public function store(Request $request)
    {
         
        $request->validate([
          'update_title' => 'required',
          'update_desc' => 'required',
          'date' => 'required',
          'entrusted_dept' => 'required',
          'doc' => 'required|mimes:pdf,xlx,xls,csv,txt,jpg,png,jpeg,doc,docs|max:2048'
        ]);
 
        $save = new LatestUpdate;
         
        $fileName = time().'.'.$request->doc->extension();  
        $request->doc->move(public_path('files/latestUpdate'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/latestUpdate/' . $fileName;

        $save->update_title = $request->update_title;
        $save->update_desc = $request->update_desc;
        $save->date = $request->date;
        $save->entrusted_dept = $request->entrusted_dept;
        $save->doc = $path;
 
        $save ->save();
         
    }

    public function update(Request $request)
    {
         
        $request->validate([
            'update_title' => 'required',
            'update_desc' => 'required',
            'date' => 'required',
            'entrusted_dept' => 'required'
        ]);

        $latestUpdate = LatestUpdate::where('id', $request->id)->first();

        if($request->doc != null || $request->doc != "") {
            $fileName = time().'.'.$request->doc->extension();  
            $request->doc->move(public_path('files/latestUpdate'), $fileName);

            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/latestUpdate/' . $fileName;
            $latestUpdate->doc = $path;
        }
         
        $latestUpdate->update_title = $request->update_title;
        $latestUpdate->update_desc = $request->update_desc;
        $latestUpdate->date = $request->date;
        $latestUpdate->entrusted_dept = $request->entrusted_dept;
        
        $latestUpdate->save();
    }

    public function show()
    {   
        $latestUpdates = LatestUpdate::all();

        return view('admin/table/latest-update-table')->with('latestUpdates', $latestUpdates);
    }

    public function LatestTableAllData()
    {   
        $latestUpdates = LatestUpdate::all();

        return $latestUpdates;
    }

    public function edit(string $latestUpdate_id)
    {
        $latestUpdates = LatestUpdate::where('id', $latestUpdate_id)->get();

        //echo $notice_id;
        //dd($notices);
        return view('admin/edit/latest-update-edit')->with('latestUpdates', $latestUpdates);
    }

    public function destroy(Request $request)
    {
        //echo $request->notice_id;
        $latestUpdate_id = $request->latestUpdate_id;
        $latestUpdate = LatestUpdate::where('id', $latestUpdate_id)->first();

        $latestUpdate->delete();

        // $notices = Notice::all();
        // return view('pages/tables/noticeTable')->with('notices', $notices);
        
    }

}
