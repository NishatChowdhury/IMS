<?php

namespace App\Http\Controllers\Backend;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Repository\GalleryRepositories;

class AlbumController extends Controller
{
    /**
     * @var GalleryRepositories
     */
    private $repositories;

    public function __construct(GalleryRepositories $repositories)
    {
        $this->middleware('auth');
        $this->repositories = $repositories;
    }

    public function index()
    {
        $albums = Album::all();
        $repository = $this->repositories;
        return view('admin.gallery.album',compact('albums','repository'));
    }

    public function store(Request $request)
    {
        Album::query()->create($request->all());
        return back();
    }

    public function destroy($id)
    {
        $album = Album::query()->findOrFail($id);
        $album->delete();
        return back();
    }
}
