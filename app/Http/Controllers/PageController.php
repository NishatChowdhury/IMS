<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Page::query()->paginate(15);
        return view('admin.settings.configuredPage',compact('pages'));
    }

    public function update($id,Request $request)
    {
        $page = Page::query()->findOrFail($id);
        $page->update($request->all());
        return redirect('settings/configuredPage');
    }
}
