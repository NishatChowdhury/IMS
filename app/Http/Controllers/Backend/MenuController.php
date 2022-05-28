<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parents = Menu::all()->pluck('name','id');
        $pages = Page::all()->pluck('name','id');
        $systemPages = [
            'contacts' => 'Contacts',
            'gallery' => 'Gallery',
            'notice' => 'Notice',
            'news' => 'News',
            'internal-result' => 'Internal Result',
            'teacher' => 'Teacher',
            'apply-school' => 'Online Admission (School)',
            'applyCollege' => 'Online Admission (College)'
        ];
        $menus = Menu::query()
            ->where('menu_id',null)
            ->orderBy('order')
            ->get();
        return view('admin.menu.index',compact('parents','menus','pages','systemPages'));
    }

    /**
     * Store menu information in database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
         $validated = $request->validate([
            'menu_id' => 'required',
            'name' => 'required',
            'type' => 'required|integer',
            'order' => 'required|integer',
        ]);
        Menu::query()->create($request->all());
        Session::flash('success','Menu added successfully');
        return redirect()->back();
    }

    public function search(Request $request)
    {
         $query =  $request->searchQuery;
      $parents = Menu::all()->pluck('name','id');
        $pages = Page::all()->pluck('name','id');
        $systemPages = [
            'contacts' => 'Contacts',
            'gallery' => 'Gallery',
            'notice' => 'Notice',
            'news' => 'News',
            'internal-result' => 'Internal Result',
            'teacher' => 'Teacher',
            'apply-school' => 'Online Admission (School)',
            'applyCollege' => 'Online Admission (College)'
        ];
        $menus = Menu::query()
            ->where('name', 'Like', "%$query%")
            ->orderBy('order')
            ->get();
        return view('admin.menu.index',compact('parents','menus','pages','systemPages'));

    }
    
    
    public function edit(Request $request)
    {
        $parents = Menu::all()->pluck('name','id');
        $menu = Menu::query()->findOrFail($request->get('id'));
        $pages = Page::all()->pluck('name','id');
        $systemPages = [
            'contacts' => 'Contacts',
            'gallery' => 'Gallery',
            'notice' => 'Notice',
            'internal-result'=>'Internal Result',
            'teacher' => 'Teacher',
            'apply-school' => 'Online Admission (School)',
            'applyCollege' => 'Online Admission (College)'
        ];
        $menus = Menu::query()
            ->where('menu_id',null)
            ->orderBy('order')
            ->get();
        return view('admin.menu.edit',compact('menu','pages','menus','parents','systemPages'));
    }

    public function update($id,Request $request)
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->update($request->all());
        Session::flash('success','Page modified successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->delete();
        Session::flash('success','Menu has been deleted!');
        return redirect()->back();
    }
}
