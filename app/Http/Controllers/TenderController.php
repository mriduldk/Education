<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{

    
    public function index()
    {
        return view('admin/insert/tender-insert');
    }

    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
          'tender_name' => 'required',
          'published_date' => 'required',
          'department' => 'required',
          'tender_description' => 'required',
          'ref_no' => 'required',
          'document' => 'required|mimes:pdf,xlx,xls,csv,txt,jpg,png,jpeg,doc,docs|max:2048'
        ]);
 
        $save = new Tender;
         
        $fileName = time().'.'.$request->document->extension();  
        $request->document->move(public_path('files/tender'), $fileName);

        $path = 'https://dashboard.edu.bodoland.gov.in/public/files/tender/' . $fileName;

        $save->tender_name = $request->tender_name;
        $save->published_date = $request->published_date;
        $save->department = $request->department;
        $save->tender_description = $request->tender_description;
        $save->ref_no = $request->ref_no;
        $save->document = $path;
 
        $save ->save();
         
    }

    public function update(Request $request)
    {
         
        $request->validate([
            'tender_name' => 'required',
            'published_date' => 'required',
            'department' => 'required',
            'tender_description' => 'required',
            'ref_no' => 'required'
          ]);
 
        $tender = Tender::where('id', $request->id)->first();

        if($request->document != null || $request->document != "") {
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('files/tender'), $fileName);

            $path = 'https://dashboard.edu.bodoland.gov.in/public/files/tender/' . $fileName;
            $tender->document = $path;
        }
        
        $tender->tender_name = $request->tender_name;
        $tender->published_date = $request->published_date;
        $tender->department = $request->department;
        $tender->tender_description = $request->tender_description;
        $tender->ref_no = $request->ref_no;

        $tender->save();
    }

    public function TenderTableAllData()
    {   
        $tenders = Tender::all();

        return $tenders;
    }

    public function show()
    {   
        $tenders = Tender::all();

        return view('admin/table/tender-table')->with('tenders', $tenders);
    }

    public function edit(string $tender_id)
    {
        $tenders = Tender::where('id', $tender_id)->get();

        //echo $notice_id;
        //dd($notices);
        return view('admin/edit/tender-edit')->with('tenders', $tenders);
    }

    public function destroy(Request $request)
    {
        //echo $request->notice_id;
        $tender_id = $request->tender_id;
        $tender = Tender::where('id', $tender_id)->first();

        $tender->delete();

        // $notices = Notice::all();
        // return view('pages/tables/noticeTable')->with('notices', $notices);
        
    }

}
