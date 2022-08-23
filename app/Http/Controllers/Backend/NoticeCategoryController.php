<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\NoticeCategory;
use Illuminate\Http\Request;

class NoticeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = NoticeCategory::all();
        return view('admin.notice.category',compact('categories'));
    }

    public function store(Request $request)
    {
        NoticeCategory::query()->create($request->all());
        return redirect('admin/notice/category');
    }

    public function edit($id)
    {
         NoticeCategory::query()->find($id)->delete();

         return back()->with('status', 'Notice Category Has Been Deleted Successfully');
    }
}
