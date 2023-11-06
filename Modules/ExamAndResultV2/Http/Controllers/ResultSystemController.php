<?php

namespace Modules\ExamAndResultV2\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Subject;
use App\Models\ResultSystem;
use Illuminate\Http\Request;

class ResultSystemController extends Controller
{
    public function resultSystem($examId){
        $academicClass = AcademicClass::with('classes', 'sessions', 'section', 'group')->get();
        $subjects = Subject::query()->get();
        $resultSystem = ResultSystem::query()->with('subject','combinedSubject')->get();
        return view ('examandresultv2::exam.result-system',compact('subjects','resultSystem','examId','academicClass'));
    }

    public function resultSystemStore(Request $request){
        ResultSystem::query()->create($request->all());
        return back();
    }

    public function resultSystemEdit($id)
    {
        $academicClass = AcademicClass::with('classes', 'sessions', 'section', 'group')->get();
        $resultSystem =  ResultSystem::find($id);
        $subjects = Subject::query()->get();
        return view ('examandresultv2::exam.edit-result-system',compact('resultSystem','subjects','academicClass'));
    }

    public function resultSystemUpdate($id,Request $request)
    {
        $resultSystem = ResultSystem::query()->findOrFail($id);
        $resultSystem->update($request->all());
        return back();
    }

    function  resultSystemDestroy($id){
        $resultSystem = ResultSystem::query()->findOrFail($id);
        $resultSystem->delete();
        return back();
    }
}
