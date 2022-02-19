<?php

namespace App\Http\Controllers\Backend;

use App\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::query()->first();
        return view('admin.settings.socials',compact('socials'));
    }

    public function update(Request $request,$id)
    {
        $data = Social::query()->findOrFail($id);
        $data->update($request->all());
        return redirect()->route('social.index');
    }
}
