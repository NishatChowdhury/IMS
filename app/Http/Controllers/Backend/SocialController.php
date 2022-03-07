<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Social;
use Illuminate\Http\Request;

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
