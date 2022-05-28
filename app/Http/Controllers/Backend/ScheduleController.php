<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\ClassSchedule;
use App\Models\Backend\Staff;
use App\Repository\ScheduleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    /**
     * @var ScheduleRepository
     */
    private $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index($classId)
    {

           $schedules = ClassSchedule::query()
            ->where('academic_class_id',$classId)
            ->get()
            ->groupBy('day')
            ->sortBy('day');

             $academicClass = AcademicClass::query()->findOrFail($classId);
             $subjects = $academicClass->subjects;
         $teachers = Staff::query()->where('staff_type_id',2)->get();

        $repository = $this->repository;
        return view('admin.institution.schedule',compact('academicClass','subjects','teachers','schedules','repository'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        ClassSchedule::query()->create($request->all());
        Session::flash('success','Routine has been added');
        return redirect()->back();
    }

    public function update(Request $request)
    {
//        return $request->all();
        ClassSchedule::find($request->id)->update([
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
//            'onlineId' => $request->onlineId,
            'academic_class_id' => $request->academic_class_id,
        ]);
        return back();
    }
    function delete($id){
         $del = ClassSchedule::find($id);
         $del->delete();
         return back();
    }
}
