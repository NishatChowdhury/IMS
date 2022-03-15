<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CommunicationSetting;
use Illuminate\Http\Request;

class CommunicationSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $apiData = CommunicationSetting::query()->firstOrNew();
        return view('admin.communication.api-settings',compact('apiData'));
    }

    public function update(Request $request)
    {
        $data = CommunicationSetting::query()->firstOrCreate($request->only(['api_key','sender_id']));
        $data->update($request->all());
        return redirect('admin/communication/apiSetting')->with('success','Updated successfully');

    }
}
