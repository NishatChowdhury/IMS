<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ImportantLink;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $links = ImportantLink::all();
        return view('admin.settings.links',compact('links'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        ImportantLink::query()->create($request->all());
        return redirect('admin/settings/links');
    }

    public function destroy($id)
    {
        $link = ImportantLink::query()->findOrFail($id);
        $link->delete();
        return redirect('admin/settings/links');
    }
}
