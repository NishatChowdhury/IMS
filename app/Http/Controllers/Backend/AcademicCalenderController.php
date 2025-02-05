<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicCalender;
use App\Repository\StudentRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'session_id' => 'required',
            'name'     =>  'required',
            'start'     =>  'required'
        ],[]);
        AcademicCalender::query()->create([
            'session_id' => $request->session_id,
            'name' => $request->name,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'sms_in' => $request->sms_in,
            'sms_out' => $request->sms_out,
        ]);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        return AcademicCalender::query()->findOrFail($request->id);
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
