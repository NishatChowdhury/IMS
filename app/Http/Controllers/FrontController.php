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
use Illuminate\Support\Facades\Artisan;

class FrontController extends Controller
{

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

    public function land_information()
    {
        $content = Page::query()->where('name','land information')->first();
        return view('front.pages.land-information',compact('content'));
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
    public function diary()
    {
        $content = Page::query()->where('name','diary')->first();
        return view('front.pages.diary',compact('content'));
    }
    public function performance()
    {
        $content = Page::query()->where('name','performance')->first();
        return view('front.pages.performance',compact('content'));
    }
    public function holiday()
    {
        $content = Page::query()->where('name','annual holiday')->first();
        return view('front.pages.annual-holiday',compact('content'));
    }
//Institute -> Academic ---END

//Institute -> Digital Campus --START
    public function multimedia_classroom()
    {
        $content = Page::query()->where('name','multimedia class room')->first();
        return view('front.pages.multimedia-class-room',compact('content'));
    }
    public function computer_lab()
    {
        $content = Page::query()->where('name','computer lab')->first();
        return view('front.pages.computer-lab',compact('content'));
    }
    public function science_lab()
    {
        $content = Page::query()->where('name','science lab')->first();
        return view('front.pages.science-lab',compact('content'));
    }
//Institute -> Digital Campus ---END

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
    public function wapc()
    {
        $content = Page::query()->where('name','wapc')->first();
        return view('front.pages.wapc',compact('content'));
    }
    public function tswt()
    {
        $content = Page::query()->where('name','teacher staff welfare trust')->first();
        return view('front.pages.tswt',compact('content'));
    }
    public function tci()
    {
        $content = Page::query()->where('name','teacher council information')->first();
        return view('front.pages.teacher-council-information',compact('content'));
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
                //->where('session_id',$sessionId)
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

//INFORMATION -> --START
    public function sports_n_culture_program()
    {
        $content = Page::query()->where('name','sports and cultural program')->first();
        return view('front.pages.sports-n-culture-program',compact('content'));
    }
    public function center_information()
    {
        $content = Page::query()->where('name','center information')->first();
        return view('front.pages.center-information',compact('content'));
    }
    public function scholarship_info()
    {
        $content = Page::query()->where('name','scholarship info')->first();
        return view('front.pages.scholarship-info',compact('content'));
    }
    public function bncc()
    {
        $content = Page::query()->where('name','bncc')->first();
        return view('front.pages.bncc',compact('content'));
    }
    public function scout()
    {
        $content = Page::query()->where('name','scouts')->first();
        return view('front.pages.scouts',compact('content'));
    }
    public function tender()
    {
        $content = Page::query()->where('name','tender')->first();
        return view('front.pages.tender',compact('content'));
    }
//INFORMATION -> --END

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
    //Gallery -> END

    // Download Start
    public function download()
    {
        $content = Page::query()->where('name','download')->first();
        return view('front.pages.download',compact('content'));
    }
    // Download ENd

    // Contact Start
    public function contact()
    {
        $content = Page::query()->where('name','contacts')->first();
        return view('front.pages.contacts',compact('content'));
    }
    // Contact ENd
}

