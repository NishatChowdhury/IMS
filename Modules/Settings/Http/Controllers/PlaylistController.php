<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Playlist::query()->paginate(20);
        return view('settings::playlist.index', compact('playlists'));
    }

    public function store(Request $request)
    {
        $request->all();
        Playlist::query()->create($request->all());
        Session::flash('success', 'Playlist has been created');
        return redirect()->back();
    }

    public function show($id)
    {
        $playlist = Playlist::query()->findOrFail($id);
        //$videos = $playlist->videos;
        return view('settings::playlist.videos', compact('playlist'));
    }
}
