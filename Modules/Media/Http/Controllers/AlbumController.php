<?php

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Album;
use App\Repository\GalleryRepositories;
use Illuminate\Http\Request;

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
        return view('media::gallery.album',compact('albums','repository'));
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
