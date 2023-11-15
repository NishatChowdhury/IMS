<?php

namespace Modules\Settings\Http\Controllers;

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
        return view('settings::page.index',compact('pages'));
    }

    public function create()
    {
//        return Page::all();
        return view('settings::page.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'pageContent' => 'required',
        //'order' => 'required',
    ]);
        Page::query()->create([
            'name' => $request->name,
            'content' => $request->pageContent,
            //'order' => $request->order,
            //'image' => 'jshdfhj'
        ]);
        Session::flash('success','Page created successfully');
        return redirect('admin/pages');
    }

    public function edit($id)
    {
        $page = Page::query()->findOrFail($id);
        $pages = Page::query()->pluck('name','id');
        return view('settings::page.edit',compact('page','pages'));
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'content' => 'required',
            //'order' => 'required',
        ]);

        $page = Page::query()->findOrFail($id);

//        if($request->hasFile('image')){
//            $name = $id.'.'.$request->file('image')->getClientOriginalExtension();
//            $request->file('image')->move(public_path().'/assets/img/pages/', $name);
//            $data = $request->except('image');
//            $data['image'] = $name;
//            $page->update($data);
//        }else{
//            $page->update($request->all());
//        }

        $page->update($request->all());

        Session::flash('success','Page updated successfully');

        return redirect('admin/pages');
    }

    function  destroy($id){
        $page = Page::query()->findOrFail($id);
        $page->delete();
        return back();
    }
}
