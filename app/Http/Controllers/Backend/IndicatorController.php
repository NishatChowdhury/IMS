<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Competency;
use App\Models\Backend\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index()
    {
        $competencies = Competency::get()->pluck('name','id'); 
        $indicators = Indicator::all();
        return view('admin.indicator.index',compact('indicators','competencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'competency_id' => 'required',
        ]);
        Indicator::query()->create($request->all());
        return redirect('admin/indicators');
    }

    public function edit(Request $request)
    {
        $competencies = Competency::get()->pluck('name','id'); 
        $indicator = Indicator::query()->findOrFail($request->get('id'));
        return view('admin.indicator._edit',compact('indicator','competencies'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([ 
            'name' => 'required',
            'competency_id' => 'required'
            ]);
            $data = Indicator::query()->find($id);
            $data->update($request->all());
            return redirect('admin/indicators')->with('success','Indicator Updated successfully');
    }


    public function destroy($id)
    {
        $indicator = Indicator::query()->findOrFail($id);
        $indicator->delete();
        return redirect('admin/indicators');
    }
}
