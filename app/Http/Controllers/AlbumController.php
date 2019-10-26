<?php

namespace App\Http\Controllers;

use App\Album;
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
        $repository = $this->repositories;
        return view('admin.settings.album',compact('repository'));
    }

    public function store(Request $request)
    {
        Album::query()->create($request->all());
        return redirect('settings/albums');
    }
}
