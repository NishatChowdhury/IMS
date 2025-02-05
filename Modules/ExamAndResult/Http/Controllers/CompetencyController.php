<?php

namespace Modules\ExamAndResult\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\Competency;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $competencies = Competency::all();
        return view('examandresult::competency.index',compact('competencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        Competency::query()->create($request->all());
        return redirect('admin/competencies');
    }

    public function edit(Request $request)
    {
        $competency = Competency::query()->findOrFail($request->get('id'));
        return view('examandresult::competency._edit',compact('competency'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $data = Competency::query()->find($id);
        $data->update($request->all());
        return redirect('admin/competencies')->with('success','Competency Updated successfully');
    }


    public function destroy($id)
    {
        $competency = Competency::query()->findOrFail($id);
        $competency->delete();
        return redirect('admin/competencies');
    }
}
