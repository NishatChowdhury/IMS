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

    public function edit($id)
    {
        $page = Page::query()->findOrFail($id);
        $pages = Page::query()->pluck('name','id');
        return view('admin.page.edit',compact('page','pages'));
    }

    public function update($id,Request $request)
    {
        dd($request->all());
        $page = Page::query()->findOrFail($id);
        $page->update($request->all());
        return redirect('settings/configuredPage');
    }
}
