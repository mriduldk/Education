<?php

namespace App\Http\Controllers;

use App\Http\GenerateID;
use App\Models\Gallery;
use App\Models\ImageCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{

    public function InsertImageCategoryPage()
    {
        return view('/admin/insert/category-insert');
    }
    public function InsertImagePage()
    {
        $imageCategories = ImageCategory::where('is_deleted', 0)->get();
        return view('/admin/insert/gallery-insert')->with('imageCategories', $imageCategories);
    }
    public function ImageCategoryTable()
    {
        return view('/admin/table/image-category-table');
    }
    public function GalleryImages()
    {
        return view('/admin/table/image-table');
    }

    public function InsertImageCategory(Request $request)
    {
        $request->validate([
            'category_title' => 'required',
            ]);

        $imageCategory = new ImageCategory();
        
        $imageCategory->category_id = GenerateID::getId();
        $imageCategory->category_title =  $request->category_title;

        $imageCategory->created_by =  Auth::guard('admin')->user()->id;
        $imageCategory->created_on =  Carbon::now()->toDateTimeString();


        $imageCategory ->save();

        UserActivityLogController::AddUserActivityLogInsert($imageCategory->created_by, $imageCategory->created_by,  Auth::guard('admin')->user()->name, "ImageCategory Created");

        return response()->success('Category inserted successfully', 'imageCategory', $imageCategory);
    }

    public function InsertImage(Request $request)
    {
        $request->validate([
        'category_title' => 'required',
        'document' => 'required',
        ]);

        $gallery = new Gallery();

        if($request->document != null) {
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('files/gallery'), $fileName);
    
            $path = 'https://education.bodoland.gov.in/Dashboard/public/files/gallery/' . $fileName;
    
            $gallery->gallery_image = $path;
        }
        
        $gallery->gallery_id = GenerateID::getId();
        $gallery->category_id =  $request->category_title;

        $gallery->created_by =  Auth::guard('admin')->user()->id;
        $gallery->created_on =  Carbon::now()->toDateTimeString();

        $gallery ->save();

        UserActivityLogController::AddUserActivityLogInsert($gallery->created_by, $gallery->created_by,  Auth::guard('admin')->user()->name, "Gallery Image Created");

        return response()->success('Gallery Image inserted successfully', 'gallery', $gallery);
    }

    public function GetAllImageCategory(){

        $imageCategory = ImageCategory::where('is_deleted', 0)->get();
        return $imageCategory;
    }
    public function GetAllGalleryImages(){

        $gallery = Gallery::leftJoin('image_categories', 'image_categories.category_id', '=', 'galleries.category_id')
        ->where('image_categories.is_deleted', 0)
        ->where('galleries.is_deleted', 0)
        ->get();
        
        
        return $gallery;
    }

    public function destroyCategory(Request $request)
    {
        //echo $request->notice_id;
        $latestUpdate_id = $request->latestUpdate_id;
        $latestUpdate = ImageCategory::where('category_id', $latestUpdate_id)->first();

        $latestUpdate->delete();

        // $notices = Notice::all();
        // return view('pages/tables/noticeTable')->with('notices', $notices);
        
    }

    public function destroyImage(Request $request)
    {
        //echo $request->notice_id;
        $latestUpdate_id = $request->latestUpdate_id;
        $latestUpdate = Gallery::where('gallery_id', $latestUpdate_id)->first();

        $latestUpdate->delete();

        // $notices = Notice::all();
        // return view('pages/tables/noticeTable')->with('notices', $notices);
        
    }




}
