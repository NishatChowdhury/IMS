<?php

namespace Modules\Settings\Http\Controllers;

use App\Models\Backend\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmailSettingController extends Controller
{

    public function index()
    {
        $allData = EmailSetting::query()->get();
        return view('settings::settings.email_setting',compact('allData'));
    }

    public function store(Request $request)
    {
        EmailSetting::query()->create($request->all());
        return redirect()->back();
    }

    public function edit(Request $request)
    {
//        dd(EmailSetting::query()->findOrFail($request->id));
        return EmailSetting::query()->findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $data = EmailSetting::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('setting.email');
    }

    public function destroy($id)
    {
        $data = EmailSetting::findOrFail($id);
        $data->delete();
        return redirect()->route('setting.email');
    }
}
