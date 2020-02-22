<?php

namespace App\Http\Controllers;

use App\AcademicCalender;
use App\AcademicClass;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class AcademicCalenderController extends Controller
{
    protected $repository;
    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        $calenders = AcademicCalender::query()->orderBy('start','desc')->get();
        return view('admin.settings.academic_calender',compact('repository','calenders'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'session_id' => 'required',
            'name'     =>  'required',
            'start'     =>  'required'
        ],[]);
        AcademicCalender::create($request->all());
    }

    public function edit(Request $request)
    {
        $data = AcademicCalender::findOrFail($request->id);
        return $data;
    }

    public function update(Request $request)
    {
        $data = AcademicCalender::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('academic-calender.index');
    }

    public function destroy($id)
    {
        $data = AcademicCalender::findOrFail($id);
        $data->delete();
        return redirect()->route('academic-calender.index');
    }

    public function status($id)
    {
        $data = AcademicCalender::findOrfail($id);
        if($data->status ==1)
        {
            $data->status =0;
        }else{
            $data->status =1;
        }
        $data->save();

        return redirect()->route('academic-calender.index');
    }
}
