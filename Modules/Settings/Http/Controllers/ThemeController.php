<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\SiteInformation;
use App\Models\Backend\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $themes = Theme::query()->paginate(25);
        return view('settings::theme.index',compact('themes'));
    }

    public function change($id)
    {
        $site = SiteInformation::query()->first();
        $site->update(['theme_id'=>$id]);
        Session::flash('success','Theme has been changed!');
        return redirect()->back();
    }
}
