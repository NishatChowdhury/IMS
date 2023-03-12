<?php

namespace Modules\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Staff;
use App\Models\Backend\Subject;
use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        $diaries = Diary::query();
        $academicClass = AcademicClass::active()->get();
        if($request->get('date')){
            $diaries->where('date', $request->get('date'));
        }
        if($request->get('academic_class_id')){
            $diaries->where('academic_class_id', $request->get('academic_class_id'));
        }

        $diaries = $diaries->orderBy('id', 'DESC')->get();
        return view('media::diary.index', compact('academicClass','diaries'));
    }

    public function create()
    {
        $academicClass = AcademicClass::active()->get(); // active() means is show all active sessions
        $subjects = Subject::all();
        $teachers = Staff::where('staff_type_id', 2)->get();
        return view('media::diary.create', compact('academicClass','subjects','teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_class_id' => 'required',
            'date' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'description' => 'required',
        ]);

        Diary::create($validated);
        return back()->with('status', 'Your Diary Create Successfully');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'academic_class_id' => 'required',
            'date' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'description' => 'required',
        ]);

        $diary = Diary::find($id);
        $diary->update($validated);

        return redirect()->route('diary.index')->with('status', 'Your Diary Create Successfully');
    }

    public function edit($id)
    {
        $diary = Diary::find($id);
        return redirect()->route('diary.create')->with(['data' => $diary]);
    }
}
