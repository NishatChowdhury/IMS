<?php

namespace App\Http\Controllers\Front;

use App\Models\Backend\InstituteMessage;
use App\Models\Backend\Subscriber;
use App\Models\Frontend\Alumni;
use App\Models\Frontend\Language;
use Carbon\Carbon;
use App\Models\Backend\Bank;
use App\Models\Backend\City;
use App\Models\Backend\Mark;
use App\Models\Backend\Menu;
use App\Models\Backend\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Backend\Album;
use App\Models\Backend\Group;
use App\Models\Backend\Staff;
use App\Models\Backend\Gender;
use App\Models\Backend\Notice;
use App\Models\Backend\Slider;
use App\Models\Backend\Classes;
use App\Models\Backend\Country;
use App\Models\Backend\Feature;
use App\Models\Backend\Gallery;
use App\Models\Backend\Session;
use App\Models\Backend\Student;
use App\Models\Backend\Division;
use App\Models\Backend\Playlist;
use App\Models\Backend\Religion;
use App\Models\Backend\MeritList;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\ExamResult;
use App\Repository\FrontRepository;
use App\Http\Controllers\Controller;
use App\Models\Backend\AdmissionFee;
use Illuminate\Support\Facades\Cookie;
use App\Models\Backend\ImportantLink;
use App\Models\Backend\UpcomingEvent;
use App\Models\Backend\AppliedStudent;
use App\Models\Backend\NoticeCategory;
use App\Models\Backend\GalleryCategory;
use App\Models\Backend\OnlineAdmission;
use App\Models\Backend\GalleryCorner;

class FrontController extends Controller
{
    protected $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $sliders = Slider::query()
            //->where('start','<',Carbon::StudentControllertoday())
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
        $galleryCorner = GalleryCorner::all();
        $principal = InstituteMessage::query()->where('alias','principal')->first();
        $chairman = InstituteMessage::query()->where('alias','chairman')->first();
        $about = InstituteMessage::query()->where('alias','about')->first();

        $teachers = Staff::all();
        $links = ImportantLink::all();
        $notices = Notice::all()->sortByDesc('start')->take(5);
        $events = UpcomingEvent::query()
            ->where('date','>',Carbon::yesterday())
            ->orderBy('date')
            ->take(3)
            ->get();
        $newses = Notice::query()->where('notice_type_id',1)->orderByDesc('start')->skip(1)->take(3)->get();
        $latestNews = Notice::query()->where('notice_type_id',1)->orderByDesc('start')->first();
        $features = Feature::query()->where('active',1)->take(6)->get();

        //return view('front.index-navy');
        return view('front.index',compact('galleryCorner','about','principal','chairman','sliders','content','teachers','links','notices','events','newses','latestNews','features'));
    }

    public function StoreSubscriber(Request $request){

        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);
        Subscriber::create(['email'=>  $request->email, 'unsubscribed'=>0]);
        return back();
    }



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
                ->latest()->first();

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

//News & Notice Start...
    public function notice()
    {
        $notices = Notice::query()
            ->where('notice_type_id',2)
            ->orderByDesc('start')
            ->paginate(25);

        $categories = NoticeCategory::all();

        return view('front.notice.index',compact('notices','categories'));
    }
    public function noticeDetails($id)
    {
        $notice = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.notice.notice-details',compact('notice','categories'));
    }

    public function news()
    {
        $newses = Notice::query()
            ->where('notice_type_id',1)
            ->orderByDesc('start')
            ->paginate(5);
        $categories = NoticeCategory::all();
        return view('front.news.index',compact('newses','categories'));
    }

    public function newsDetails($id)
    {
        $news = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.news.news-details',compact('news','categories'));
    }

//News & Notice END...

//Gallery
    public function gallery()
    {
        dd('gallery');
        $categories = GalleryCategory::all();
        $albums = Album::all();
        return view('front.pages.gallery',compact('categories','albums'));
    }

    public function album($id)
    {
        $album = Album::query()->findOrFail($id);
        $images = Gallery::query()->where('album_id',$id)->get();
        return view('front.gallery.album',compact('images','album'));
    }
    //Gallery -> END


    public function galleryCategory($id)
    {
        $data = Gallery::query()->where('gallery_category_id',$id)->get();
//        $data ?  $catImages = $data : $catImages = null;
        if (!$data){
            $catImages = null;
        }else{
            $catImages = $data;
        }
        return view('front.gallery.category-image',compact('catImages'));
    }

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
        return view('front.contact.index',compact('content'));
    }
    // Contact End



    public function studentForm(Request $request)
    {
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        $subjects = json_decode($student->subjects);

        return view('front.admission.student-form',compact('student','subjects'));
    }

    public function invoice(Request $request)
    {
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        $categories = AdmissionFee::query()->where('group_id',$student->group_id)->get();

        $banks = Bank::all();

        $bank = Bank::query()->first();

        return view('front.admission.invoice',compact('categories','student','banks','bank'));
    }

    public function bankSlip(Request $request)
    {
        $student = Student::query()
            ->where('ssc_roll',$request->get('ssc_roll'))
            ->first();

        return view('front.admission.bank-slip',compact('student'));
    }

    public function loadStudentInfo(Request $request){
        //$academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);
        $academicYear = 2021;
        $incrementId = Student::query()->max('id');
        $increment = $incrementId + 1;
        $studentId = 'S'.$academicYear.$increment;

        $ssc_roll = $request->get('ssc_roll');

        $student = MeritList::query()->where('ssc_roll',$ssc_roll)->first();
        $name = $student->name;
        $session_id = $student->session_id;
        $class_id = $student->class_id;
        $group_id = $student->group_id;

        $session = Session::query()->findOrFail($session_id)->year;
        $classes = Classes::query()->findOrFail($class_id)->name;
        $groups = Group::query()->findOrFail($group_id)->name;

        return response([
            'studentId' => $studentId,
            'ssc_roll' => $ssc_roll,
            'name' => $name,
            'session_id' => $session_id,
            'class_id' => $class_id,
            'group_id' => $group_id,
            'session' => $session,
            'classes' => $classes,
            'groups' => $groups,
            'ssc_year' => $student->passing_year,
            'ssc_board' => $student->board,
        ]);
    }

    public function events()
    {
        $event = UpcomingEvent::query()->latest('date')->first();
        $events = UpcomingEvent::query()->latest('date')->get()->skip(1);
        return view('front.pages.events',compact('event','events'));
    }

    public function event($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        return view('front.pages.event',compact('event'));
    }

    public function playlists()
    {
        $playlists = Playlist::query()->paginate(25);
        return view('front.pages.playlists',compact('playlists'));
    }

    public function playlist($id)
    {
        $playlist = Playlist::query()->findOrFail($id);
        return view('front.pages.playlist',compact('playlist'));
    }

    public function onlineApplyStep()
    {
        $admissionStep = OnlineAdmission::query()->where('status', 1)->get();

        return view('front.pages.onlineApplyStep', compact('admissionStep'));
        // return view('front.pages.onlineApplyStep');
    }

    public function page($uri,Request $request)
    {

        $content = Menu::query()->where('uri',$uri)->firstOr(function (){abort(404);});

        if($content->type == 3){

            $notices = null;
            $categories = null;
            $teachers = null;
            $staffs = null;
            $albums = null;

            $repository = $this->repository;


            if($content->system_page === 'notice'){
                $notices = Notice::query()
                    ->orderByDesc('start')
                    ->paginate(3);
                $articles = '';
                if ($request->ajax()) {
                    foreach($notices as $key => $notice){
                        if($notice->start != null){
                            $date = $notice->start->format('d');
                        }
                        if($notice->start != null){
                            $mm = $notice->start->format('M, Y');
                        }
                        if($notice->notice_type_id == 1){
                            $typeN = 'Notice';
                            $types = 'badge-danger';
                        }else{
                            $typeN = 'News';
                            $types = 'badge-info';
                        }

                        if($notice->file){
                            $noticeFile = '<a href="'. asset('assets/files/notice').'/'.$notice->file .'" class="btn btn-outline-primary" target="_blank"><i class="fas fa-download"></i></a>';
                        }else{
                            $noticeFile = '';
                        }
                    }
                    return $articles;
                }
                $categories = NoticeCategory::with('notices')->get();
                return view('front.'.$uri.'.index',compact('categories','teachers','notices','staffs','repository'));
            }

            if($content->uri === 'teacher'){
                $teachers = Staff::query()
                    ->where('staff_type_id',2)
                    ->get();
                return view('front.pages.teacher',compact('teachers'));
            }
            
            if($content->uri === 'staff'){
                $staffs = Staff::query()
                    ->where('staff_type_id',1)
                    ->get();
                return view('front.pages.staff',compact('staffs'));
            }
         
        
            if($content->uri === 'news'){
                $newses = Notice::query()
                    ->where('notice_type_id',1)
                    ->orderByDesc('start')
                    ->paginate(5);
                $categories = NoticeCategory::all();
                return view('front.'.$uri.'.index',compact('newses','categories'));
            }

            if($content->system_page === 'playlists'){
                $playlists = Playlist::query()->get();
                return view('front.pages.'.$content->system_page,compact('playlists'));
            }

            if($content->system_page === 'apply-school'){
                // $playlists = Playlist::query()->get();
                // return $content;
                $data = [];
                $admissionStep = OnlineAdmission::query()->where('status',1)->get();
                $data['gender'] = Gender::all()->pluck('name', 'id');
                $data['blood'] = BloodGroup::all()->pluck('name', 'id');
                $data['divi'] = Division::all()->pluck('name', 'id');
                $data['class'] = Classes::all()->pluck('name', 'id');
                $data['group'] = Group::all()->pluck('name', 'id');
                $data['city'] = City::all()->pluck('name', 'id');
                $data['country'] = Country::all()->pluck('name', 'id');
                $data['religion'] = Religion::all()->pluck('name','id');
                return view('front.pages.'.$content->system_page,compact('content','data','admissionStep'));
            }

            if($content->system_page === 'applyCollege'){
                // $playlists = Playlist::query()->get();
                return view('front.admission.validate-admission');
            }

            if($content->system_page === 'onlineApplyStep'){

                $admissionStep = OnlineAdmission::query()->where('status', 1)->get();
                return view('front.pages.onlineApplyStep', compact('admissionStep'));
            }

            if($content->system_page === 'internal-result'){
                $this->internal_exam($request);
            }

            if($content->system_page === 'gallery'){

                $categories = GalleryCategory::all();
                $albums = Album::all();
                return view('front.pages.gallery',compact('categories','albums'));

            }

            if($content->system_page === 'contacts' ){
                $this->contact();
            }

            return view('front.pages.'.$content->system_page,compact('categories','albums','teachers','notices','staffs','repository'));
        }
        $page = $content->page;

        $page = $page ?? new Page;
        return view('front.pages.page',compact('page'));
    }

    // API for Vue
    public function infoBar()
    {
        $info = [
            'email' => siteConfig('email'),
            'phone' => siteConfig('phone'),
            'eiin' => siteConfig('eiin'),
            'code' => siteConfig('institute_code')
        ];

        return response($info);
    }
    public function titleBar()
    {
        $info = [
            'bg_color' => themeConfig('header_background'),
            'name' => siteConfig('name'),
            'name_size' => siteConfig('name_size'),
            'name_font' => siteConfig('name_font'),
            'name_color' => siteConfig('name_color'),
            'bn' => siteConfig('bn'),
            'bn_size' => siteConfig('bn_size'),
            'bn_font' => siteConfig('bn_font'),
            'bn_color' => siteConfig('bn_color'),
            'logo' => siteConfig('logo'),
            'logo_height' => siteConfig('logo_height')
        ];

        return response($info);
    }

    public function menuBar()
    {
        $info = [
            'bg_color' => themeConfig('header_background'),
            'name' => siteConfig('name'),
            'name_size' => siteConfig('name_size'),
            'name_font' => siteConfig('name_font'),
            'name_color' => siteConfig('name_color'),
            'bn' => siteConfig('bn'),
            'bn_size' => siteConfig('bn_size'),
            'bn_font' => siteConfig('bn_font'),
            'bn_color' => siteConfig('bn_color'),
            'logo' => siteConfig('logo'),
            'logo_height' => siteConfig('logo_height')
        ];

        return response($info);
    }

    /**
     * Change website language
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function lang($id): RedirectResponse
    {
        $language = Language::query()->findOrFail($id);

        $data = [
            'id' => $id,
            'name' => $language->name,
            'alias' => $language->alias,
            'direction' => $language->direction,
        ];

        //Cookie::queue(Cookie::make('language',json_encode($data)));
        Cookie::queue('language',json_encode($data));
//        cookie('language',json_encode($data));
        session()->put('locale',$language->alias);

        //return response($data);
        return redirect()->back();
    }


}
