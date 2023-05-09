<?php

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = GalleryCategory::all();
        return view('media::gallery.category',compact('categories'));
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
