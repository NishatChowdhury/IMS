<?php

namespace App\Http\Controllers;

use App\Album;
use App\ExamResult;
use App\Gallery;
use App\GalleryCategory;
use App\ImportantLink;
use App\Mark;
use App\Notice;
use App\NoticeCategory;
use App\Page;
use App\Repository\FrontRepository;
use App\Slider;
use App\Staff;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Result;

class FrontController extends Controller
{
    /**
     * @var FrontRepository
     */
    private $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $sliders = Slider::query()
            //->where('start','<',Carbon::today())
            ->where(function($query){
                $query->where('start','<',Carbon::today())->orWhere('start',null);
            })
            //->where('end','>',Carbon::today())
            ->where(function($query){
                $query->where('end','>',Carbon::today())->orWhere('end',null);
            })
            ->where('active',1)
            ->get();
        $content = Page::all();
        $teachers = Staff::all();
        $links = ImportantLink::all();
        return view('front.index',compact('sliders','content','teachers','links'));
    }

    public function introduction()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.introduction',compact('content'));
    }

    public function governing_body()
    {
        $content = Page::query()->where('name','governing body')->first();
        return view('front.pages.governing-body',compact('content'));
    }

    public function donor()
    {
        $content = Page::query()->where('name','founder & donor')->first();
        return view('front.pages.founder-n-donor',compact('content'));
    }

    public function principal()
    {
        $content = Page::query()->where('name','principal message')->first();
        return view('front.pages.principal',compact('content'));
    }
    public function president()
    {
        $content = Page::query()->where('name','president message')->first();
        return view('front.pages.president',compact('content'));
    }
//Institute -> infrastructure ---Start
    public function building_room()
    {
        $content = Page::query()->where('name','building & rooms')->first();
        return view('front.pages.building-n-room',compact('content'));
    }

    public function library()
    {
        $content = Page::query()->where('name','library')->first();
        return view('front.pages.library',compact('content'));
    }

    public function transport()
    {
        $content = Page::query()->where('name','transport')->first();
        return view('front.pages.transport',compact('content'));
    }

    public function hostel()
    {
        $content = Page::query()->where('name','hotel')->first();
        return view('front.pages.hostel',compact('content'));
    }
//Institute -> infrastructure ---Start

//Institute -> Academic ---START
    public function class_routine()
    {
        $content = Page::query()->where('name','class routine')->first();
        return view('front.pages.class-routine',compact('content'));
    }
    public function calender()
    {
        $content = Page::query()->where('name','calendar')->first();
        return view('front.pages.calender',compact('content'));
    }
    public function syllabus()
    {
        $content = Page::query()->where('name','syllabus')->first();
        return view('front.pages.syllabus',compact('content'));
    }
    public function performance()
    {
        $content = Page::query()->where('name','performance')->first();
        return view('front.pages.performance',compact('content'));
    }
//Institute -> Academic ---END

//TEAM -> --START
    public function managing_committee()
    {
        $content = Page::query()->where('name','managing committee')->first();
        return view('front.pages.managing-committee',compact('content'));
    }
    public function teacher()
    {
        $content = Page::query()->where('name','teachers')->first();
        $teachers = Staff::query()->where('staff_type_id',2)->orderBy('code')->get();
        return view('front.pages.teacher',compact('content','teachers'));
    }
    public function staff()
    {
        $content = Page::query()->where('name','staff')->first();
        $staffs = Staff::query()->where('staff_type_id',1)->get();
        return view('front.pages.staff',compact('content','staffs'));
    }
//TEAM -> --END


//RESULT -> --START
    public function internal_exam(Request $request)
    {
        if($request->all()){
            $sessionId = $request->get('session_id');
            $examId = $request->get('exam_id');
            $studentId = Student::query()
                ->where('studentId',$request->get('student'))
                ->pluck('id');

            if($studentId->count() == 0){
                return redirect()->back()->with('msg','NO STUDENT FOUND!');
            }

            $result = ExamResult::query()
                ->where('session_id',$sessionId)
                ->where('exam_id',$examId)
                ->where('student_id',$studentId)
                ->first();

            $marks = Mark::query()
                ->where('session_id',$sessionId)
                ->where('exam_id',$examId)
                ->where('student_id',$studentId)
                ->join('subjects','subjects.id','=','marks.subject_id')
                ->select('marks.*','subjects.level')
                ->orderBy('level')
                ->get();
        }else{
            $result = null;
            $marks = null;
        }

        $repository = $this->repository;
        return view('front.pages.internal-exam',compact('result','marks','repository'));
    }
    public function public_exam()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.public-exam',compact('content'));
    }
    public function admission()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.admission',compact('content'));
    }
//RESULT -> --END

//ATTENDANCE -> --START
    public function attendance_summery()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.attendance-summery',compact('content'));
    }
    public function student_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.student-attendance',compact('content'));
    }
    public function teacher_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.teacher-attendance',compact('content'));
    }
//ATTENDANCE -> --END

//News & Notice Start...
    public function notice()
    {
        $notices = Notice::query()
            ->where('notice_type_id',2)
            ->where('start','<',Carbon::today())
            ->where('end','>',Carbon::today())
            ->orderByDesc('start')
            ->get();
            //->paginate(5);

        $categories = NoticeCategory::all();
        return view('front.pages.notice',compact('notices','categories'));
    }
    public function noticeDetails($id)
    {
        $notice = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.pages.notice-details',compact('notice','categories'));
    }

    public function news()
    {
        $newses = Notice::query()
            ->where('notice_type_id',1)
            ->where('start','<',Carbon::today())
            ->where('end','>',Carbon::today())
            ->orderByDesc('start')
            ->paginate(5);
        $categories = NoticeCategory::all();
        return view('front.pages.news',compact('newses','categories'));
    }

    public function newsDetails($id)
    {
        $news = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.pages.news-details',compact('news','categories'));
    }

//News & Notice END...

//Gallery
    public function gallery()
    {
        $categories = GalleryCategory::all();
        $albums = Album::all();
        return view('front.pages.gallery',compact('categories','albums'));
    }

    public function album($id)
    {
        $album = Album::query()->findOrFail($id);
        $images = Gallery::query()->where('album_id',$id)->get();
        return view('front.pages.album',compact('images','album'));
    }
}
