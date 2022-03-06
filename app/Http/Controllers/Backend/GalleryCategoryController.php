<?php

namespace App\Http\Controllers\Backend;

use App\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.category',compact('categories'));
    }

    public function store(Request $request)
    {
        GalleryCategory::query()->create($request->all());
        return back();
    }

    public function destroy($id)
    {
        $category = GalleryCategory::query()->findOrFail($id);
        $category->delete();
        return back();
    }
}
