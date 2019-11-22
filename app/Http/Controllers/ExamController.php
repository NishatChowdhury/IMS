<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Gender;
use App\Grade;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function gradesystem()
    {
        $gradings = Grade::all();
       return view ('admin.exam.gradesystem', compact('gradings'));
    }

    public function store_grade(Request $request){
        //dd($request->all());
        Grade::query()->create($request->all());
        return redirect('exam/gradesystem')->with('success', 'Grading System Added Successfully');
    }

    public function delete_grade($id){
        $grade = Grade::query()->findOrFail($id);
        $grade->delete();
        return redirect('exam/gradesystem')->with('success', 'Grading System Deleted Successfully');
    }

    public function examination()
    {
        $exams = Exam::all();
        return view ('admin.exam.examination', compact('exams'));
    }

    public function store_exam(Request $request){
        if ($request->has('combined_exam_id')){
            $data = [
                'name' => $request->name,
                'combined_exam_id1' => $request->combined_exam_id[0],
                'notify' => $request->notify
            ];
            if(count($request->combined_exam_id)==2){
                $data['combined_exam_id2'] = $request->combined_exam_id[1];
            }
            Exam::query()->create($data);
        }else{
            Exam::query()->create($request->all());
        }
        return redirect('exam/examination')->with('success', 'Exam Added Successfully');

    }

    public function delete_exam($id){
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect('exam/examination')->with('success', 'Exam Deleted Successfully');
    }

    public function examitems()
    {
        return view ('admin.exam.examitems');
    }

    public function examresult()
    {
        return view ('admin.exam.examresult');
    }

    public function setfinalresultrule()
    {
        return view ('admin.exam.setfinalresultrule');
    }

    /**
     * @param Request $request
     * Created by smartrahat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admitCard(Request $request)
    {
        return view('admin.exam.admit-card');
    }

    public function seatAllocate(Request $request)
    {
        return view('admin.exam.seat-allocate');
    }

}
