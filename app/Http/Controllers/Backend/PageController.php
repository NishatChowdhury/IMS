<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $pages = Page::query()->paginate(15);
        return view('admin.page.index',compact('pages'));
    }

    public function create()
    {
//        return Page::all();
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required',
        'pageContent' => 'required',
        'order' => 'required',
    ]);
        Page::create([
            'name' => $request->name,
            'content' => $request->pageContent,
            'order' => $request->order,
            'image' => 'jshdfhj'
        ]);
        Session::flash('success','Page created successfully');
        return redirect('admin/pages');
    }

    public function edit($id)
    {
        $page = Page::query()->findOrFail($id);
        $pages = Page::query()->pluck('name','id');
        return view('admin.page.edit',compact('page','pages'));
    }

    public function update($id,Request $request)
    {
        $page = Page::query()->findOrFail($id);

        if($request->hasFile('image')){
            $name = $id.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/pages/', $name);
            $data = $request->except('image');
            $data['image'] = $name;
            $page->update($data);
        }else{
            $page->update($request->all());
        }

        return redirect('admin/pages');
    }

    function  destroy($id){
        $page = Page::query()->findOrFail($id);
        $page->delete();
        return back();
    }
}
