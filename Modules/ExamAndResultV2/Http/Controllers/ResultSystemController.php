<?php

namespace Modules\ExamAndResultV2\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamResult;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Grade;
use App\Models\Backend\Mark;
use App\Models\Backend\SiteInformation;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\Subject;
use App\Models\ResultSystem;
use App\Repository\ExamRepository;
use Illuminate\Http\Request;

class ResultSystemController extends Controller
{

        /**
     * @var ExamRepository
     */
    private $repository;

    public function __construct(ExamRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function gradesystem()
    {   $siteInformation = SiteInformation::query()->first();
        $gradings = Grade::all();
        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.gradesystem', compact('gradings'));
        }
        else{
            return view ('examandresultv2::exam.gradesystem', compact('gradings'));
        }
        
    }

    public function store_grade(Request $request){
        Grade::query()->create($request->all());
        return redirect('admin/exam/gradesystem/v2')->with('success', 'Grading System Added Successfully');
    }

    public function delete_grade($id){
        $grade = Grade::query()->findOrFail($id);
        $grade->delete();
        return redirect('admin/exam/gradesystem/v2')->with('success', 'Grading System Deleted Successfully');
    }

    public function store_exam(Request $request){
        Exam::query()->create($request->all());
        return redirect('admin/exam/examination/v2')->with('success', 'Exam Added Successfully');
    }

    public function destroy($id){
        $exam = Exam::query()->findOrFail($id);
        $exam->delete();
        return redirect('admin/exam/examination/v2')->with('success', 'Exam Deleted Successfully');
    }

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

    public function examination()
    {  
        $siteInformation = SiteInformation::query()->first();
        $exams = Exam::whereHas('session', function($q){
            return $q->where('active', 1);
        })->get();
        $repository = $this->repository;
        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.examination', compact('exams','repository'));
        }
        else{
            return view ('examandresultv2::exam.examination_v2', compact('exams','repository'));
        }
    }

    public function index(Request $request, ExamResult $examResult)
    {
        $siteInformation = SiteInformation::query()->first();
        if ($request->all()) {
            $r = $examResult->newQuery();

            if ($request->get('studentId')) {
                $r->whereHas('studentAcademic', function ($query) use ($request) {
                    $query->whereHas('student', function ($q) use ($request) {
                        $q->where('studentId', $request->studentId);
                    });
                });
            }

            if ($request->get('exam_id')) {
                $r->where('exam_id', $request->get('exam_id'));
            }

            if ($request->has('academic_class_id')) {
                $r->whereHas('studentAcademic', function ($query) use ($request) {
                    $query->where('academic_class_id', $request->get('academic_class_id'));
                });
            }

            $results = $r->get();
        } else {
            $results = [];
        }

        $repository = $this->repository;

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.examresult', compact('results','repository'));
        }
        else{
            return view ('examandresultv2::exam.examresult_v2', compact('results','repository'));
        }
    }

    public function generateResult($examId)
    {
        $siteInformation = SiteInformation::query()->first();
        $method = 2;

        $sessionId = 1;
        //$examId = 1;
        //$classId = 2;
        //$sectionId = 2;
        //$groupId = null;

        if ($method == 1) {
            $this->normalResult($sessionId, $examId);
        } elseif ($method == 2) {
            $classes = AcademicClass::with('classes')->get();
            foreach ($classes as $class) {
                $subjectCount = ExamSchedule::query()
                    ->where('academic_class_id', $class->id)   //class id means acadimic class id
                    ->where('exam_id', $examId)
                    ->count();

                $marks = Mark::query()
                    ->where('academic_class_id', $class->id)
                    ->where('exam_id', $examId)
                    ->with('subject')
                    ->get()
                    ->groupBy('student_id');

                foreach ($marks as $student => $mark) {
                    $countOptionalSubject = 0;
                    foreach ($mark as $m) {
                        if ($m->subject->type == 3) {
                            $countOptionalSubject++;
                        }
                    }
                    $isFail = Mark::query()
                        ->where('academic_class_id', $class->id)
                        ->where('exam_id', $examId)
                        ->where('student_id', $student)
                        ->where('grade', 'F')
                        ->exists();
                    $data['exam_id'] = $examId;
                    $data['student_academic_id'] = $student;
                    $data['total_mark'] = $mark->sum('total_mark');

                    $stuID = StudentAcademic::query()->findOrFail($student)->student_id;
                    $optional = Student::query()->with('studentSubject')->findOrFail($stuID);

                    $optionalMark = $mark->where('subject_id', 0)->first()->gpa ?? 0;
                    $mainSubjectGpa = $mark->sum('gpa') - $countOptionalSubject * 3;
                    $mainSubject = $subjectCount - $countOptionalSubject;
                    $mainGpa = $mainSubjectGpa / $subjectCount;
                    $data['gpa'] = $isFail ? 0 : number_format($mainGpa, 2);
                    $grade = Grade::query()
                        ->where('system', 1)
                        ->where('point_from', '<=', $data['gpa'])
                        ->where('point_to', '>=', $data['gpa'])
                        ->first();
                    if ($optionalMark >= 2) {
                        $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') - 2) / $subjectCount;

                        $data['total_mark'] = $mark->sum('total_mark') - 40;

                        $grade = Grade::query()
                            ->where('system', 1)
                            ->where('point_from', '<=', $data['gpa'])
                            ->where('point_to', '>=', $data['gpa'])
                            ->first();
                    }

                    if ($grade) {
                        $data['grade'] = $isFail ? 'F' : $grade->grade;
                    } else {
                        $data['grade'] = null;
                    }

                    $data['rank'] = null;
                    $result = ExamResult::query()
                        ->where('exam_id', $examId)
                        ->where('student_academic_id', $data['student_academic_id'])
                        ->first();
                    if ($result != null) {
                        $result->update($data);
                    } else {
                        ExamResult::query()->create($data);
                    }
                }
                /* update exam rank start */
                $results = ExamResult::query()
                    ->where('exam_id', $examId)
                    ->orderByDesc('gpa')
                    ->orderByDesc('total_mark')
                    ->get();

                foreach ($results as $key => $result) {
                    $rank = $key + 1;
                    $result->update(['rank' => $rank]);
                }
                /* update exam rank end */
            }
        }
        if($siteInformation->result_id == 1){
            return redirect('admin/exam/examresult');
        }
        else{
            return redirect('admin/exam/examresult/v2');
        }
    }

    public function allDetails(Request $request, ExamResult $examResult)
    {
        $siteInformation = SiteInformation::query()->first();
        if ($request->all()) {
            $r = $examResult->newQuery();

            if ($request->get('studentId')) {
                $r->whereHas('student', function ($query) use ($request) {
                    $query->where('studentId', $request->get('studentId'));
                });
            }
            if ($request->get('exam_id')) {
                $r->where('exam_id', $request->get('exam_id'));
            }

            if ($request->get('class_id')) {
                $r->where('academic_class_id', $request->get('class_id'));
            }

            $results = $r->get();
        } else {
            $results = [];
        }

        $repository = $this->repository;

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.all-details', compact('results','repository'));
        }
        else{
            return view('examandresultv2::exam.all-details', compact('results', 'repository'));
        }
    }

    public function resultDetails($id)
    {
        $siteInformation = SiteInformation::query()->first();
        $result = ExamResult::query()->with('studentAcademic')->findOrFail($id);
        $marks = Mark::query()
            ->where('student_id', $result->studentAcademic->id) //student_id == student academic id
            ->where('exam_id', $result->exam_id)
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->select('marks.*', 'subjects.level')
            ->orderBy('level')
            ->get();

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.all-details', compact('result','marks'));
        }
        else{
            return view('examandresultv2::exam.all-details', compact('result', 'marks'));
        }
    }

    public function resultDetails_Layout2($id)
    {
        $siteInformation = SiteInformation::query()->first();
        $result = ExamResult::query()->with('studentAcademic')->findOrFail($id);
        $marks = Mark::query()
            ->where('student_id', $result->studentAcademic->id) //student_id == student academic id
            ->where('exam_id', $result->exam_id)
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->select('marks.*', 'subjects.level')
            ->orderBy('level')
            ->get();

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.result-details_layout2', compact('result','marks'));
        }
        else{
            return view('examandresultv2::exam.result-details_layout2', compact('result', 'marks'));
        }
    }

    public function bulkResult()
    {
        $siteInformation = SiteInformation::query()->first();
        $repository = $this->repository;

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.bulkresult', compact('repository'));
        }
        else{
            return view('examandresultv2::exam.bulkresult', compact('repository'));
        }
    }

    public function bulkResultPdf(Request $request, ExamResult $examResult)
    {
        $siteInformation = SiteInformation::query()->first();

        if ($request->all()) {
            $r = $examResult->newQuery();

            if ($request->get('studentId')) {
                $r->whereHas('studentAcademic', function ($query) use ($request) {
                    $query->whereHas('student', function ($q) use ($request) {
                        $q->where('studentId', $request->studentId);
                    });
                });
            }

            if ($request->get('exam_id')) {
                $r->where('exam_id', $request->get('exam_id'));
            }

            if ($request->has('academic_class_id')) {
                $r->whereHas('studentAcademic', function ($query) use ($request) {
                    $query->where('academic_class_id', $request->get('academic_class_id'));
                });
            }

            $results = $r->get();
        } else {
            $results = [];
        }

        $repository = $this->repository;

        if($siteInformation->result_id == 1){
            return view ('examandresult::exam.bulkresult-pdf', compact('repository','results'));
        }
        else{
            return view('examandresultv2::exam.bulkresult-pdf', compact('repository', 'results'));
        }
    }
}
