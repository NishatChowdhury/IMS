<?php

namespace App\Http\Controllers;

use App\CommunicationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class apiSettingController extends Controller
{

    public function index()
    {
        return view('admin.communication.apiSetting.apiSetting');
    }

    public function store(Request $request)
    {
        CommunicationSetting::query()->create($request->all());
        return redirect('admin/communication/apiSetting');
    }

    public function edit($id)
    {
        $apiData = CommunicationSetting::find($id);
        return view('admin.Communication.apiSetting.edit_ApiSetting',compact('apiData'));
    }

    public function update(Request $request, $id)
    {
        $data=CommunicationSetting::query()->find($id);
        $data->update($request->all());
        return redirect('admin/communication/apiSetting')->with('success','Updated successfully');

    }

    public function destroy($id)
    {
        $data = CommunicationSetting::query()->findOrFail($id);
        $data->delete();
        return redirect('admin/communication/apiSetting');
    }
}
