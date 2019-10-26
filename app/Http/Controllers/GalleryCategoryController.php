<?php

namespace App\Http\Controllers;

use App\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.settings.category');
    }

    public function store(Request $request)
    {
        GalleryCategory::query()->create($request->all());
        return redirect('settings/gallery/category');
    }
}
