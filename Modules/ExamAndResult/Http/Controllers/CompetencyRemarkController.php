<?php

namespace Modules\ExamAndResult\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Competency;
use App\Models\Backend\CompetencyRemark;
use App\Models\Backend\Indicator;
use App\Models\Backend\Remark;
use App\Models\Backend\Student;
use App\Models\Backend\Subject;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class CompetencyRemarkController extends Controller
{
        /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index(Request $request,Student $student)
    {
        $repository = $this->repository;

        $s = $student->newQuery()
            ->whereHas('academics', function($query){
            $query->whereHas('sessions', function($query){
            return $query->where('active',1);
            });
        });

        if($request->get('academic_class_id')){
            $academicClassId = $request->get('academic_class_id');
            $s->whereHas('academics', function($query) use($academicClassId){
                $query->where('academic_class_id', $academicClassId);
            });
        }
        $students = $s->orderBy('studentId')->paginate(10);
        $subjects = Subject::query()->get();
        $competencies = Competency::query()->pluck('name','id');
        $indicators = Indicator::query()->pluck('name','id');
        $remarks = Remark::query()->pluck('name','id');

        return view('examandresult::competencyRemark.competency-remark',compact('repository','students','subjects','competencies','indicators','remarks'));
    }

    public function store(Request $request)
    {
        // $competencyResult = $request->all();

        // foreach($competencyResult as $result){
        //     CompetencyRemark::create([
        //         'academic_class_id' => $request->get('academic_class_id'),
        //         'subject_id' => $request->get('subject_id'),
        //         'student_id' => $result['student_id'],
        //         'competency_id' => $result->competency_id,
        //         'indicator_id' => $result->indicator_id,
        //         'remark_id' => $result->remark_id
        //     ]);

        //     // $data['academic_class_id'] = $request->get('academic_class_id');
        //     // $data['subject_id'] = $request->get('subject_id');
        //     // $data['student_id'] = $request->get('student_id')[$key];
        //     // $data['competency_id'] = $request->get('competency_id')[$key];
        //     // $data['indicator_id'] = $request->get('indicator_id')[$key];
        //     // $data['remark_id'] = $request->get('remark_id')[$key];
        // }
        // // CompetencyRemark::query()->create($data);
        // return redirect()->back();








        $data = $request->input('data');
            dd($data);
        $models = [];
    
        foreach ($data as $row) {
            $model = new CompetencyRemark();
            $model->academic_class_id = $row['academic_class_id'];
            $model->subject_id = $row['subject_id'];
            $model->student_id = $row['student_id'];
            $model->competency_id = $row['competency_id'];
            $model->indicator_id = $row['indicator_id'];
            $model->remark_id = $row['remark_id'];
            $models[] = $model;
        }
    
        CompetencyRemark::saveMany($models);
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
