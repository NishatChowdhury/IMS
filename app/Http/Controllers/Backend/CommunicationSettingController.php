<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\CommunicationSetting;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class CommunicationSettingController extends Controller
{

//    public function index()
//    {
//        return view('admin.communication.apiSetting.apiSetting');
//    }
//
//    public function store(Request $request)
//    {
//        CommunicationSetting::query()->create($request->all());
//        return redirect('admin/communication/apiSetting');
//    }

    public function index()
    {
        $apiData = CommunicationSetting::query()->first();
        return view('admin.communication.api-settings',compact('apiData'));
    }

    public function update(Request $request)
    {
        $data = CommunicationSetting::query()->first();
        $data->update($request->all());
        return redirect('admin/communication/apiSetting')->with('success','Updated successfully');

    }

//    public function destroy($id)
//    {
//        $data = CommunicationSetting::query()->findOrFail($id);
//        $data->delete();
//        return redirect('admin/communication/apiSetting');
//    }
}
