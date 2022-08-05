<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        return view('admin/insert/notice-insert');
    }

    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
          'notice_title' => 'required',
          'notice_publish_date' => 'required',
          'entrusted_dept' => 'required',
          'notice_description' => 'required',
          'notice_file' => 'required|mimes:pdf,xlx,xls,csv,txt,jpg,png,jpeg,doc,docs|max:2048'
        ]);
 
        $save = new Notice;
         
        $fileName = time().'.'.$request->notice_file->extension();  
        $request->notice_file->move(public_path('files/notice'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/notice/' . $fileName;

        $save->notice_title = $request->notice_title;
        $save->notice_publish_date = $request->notice_publish_date;
        $save->entrusted_dept = $request->entrusted_dept;
        $save->notice_description = $request->notice_description;
        $save->notice_file = $path;
 
        $save ->save();
         
    }

    public function update(Request $request)
    {
         
        $request->validate([
          'notice_title' => 'required',
          'notice_publish_date' => 'required',
          'entrusted_dept' => 'required',
          'notice_description' => 'required'
        ]);
 

        $notice = Notice::where('id', $request->id)->first();

        //echo $request->id;
        //dd($notice);

        if($request->notice_file != null || $request->notice_file != "") {
            $fileName = time().'.'.$request->notice_file->extension();  
            $request->notice_file->move(public_path('files/notice'), $fileName);
    
            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/notice/' . $fileName;
            $notice->notice_file = $path;
        }
         
        $notice->notice_title = $request->notice_title;
        $notice->notice_publish_date = $request->notice_publish_date;
        $notice->entrusted_dept = $request->entrusted_dept;
        $notice->notice_description = $request->notice_description;
        
        $notice->save();
    }

    public function show()
    {   
        $notices = Notice::all();

        return view('admin/table/notice-table')->with('notices', $notices);
    }

    public function NoticeTableAllData()
    {   
        $notices = Notice::all();

        return $notices;
    }

    public function edit(string $notice_id)
    {
        $notices = Notice::where('id', $notice_id)->get();

        //echo $notice_id;
        //dd($notices);
        return view('admin/edit/notice-edit')->with('notices', $notices);
    }

    public function destroy(Request $request)
    {
        //echo $request->notice_id;
        $notice_id = $request->notice_id;
        $notice = Notice::where('id', $notice_id)->first();

        $notice->delete();

        // $notices = Notice::all();
        // return view('pages/tables/noticeTable')->with('notices', $notices);
        
    }

}
