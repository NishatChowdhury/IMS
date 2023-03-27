<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventsCollection;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NoticeCollection;
use App\Http\Resources\TeacherCollection;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Attendance;
use App\Models\Backend\ClassSchedule;
use App\Models\Backend\ExamResult;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Father;
use App\Models\Backend\FeeSetupStudent;
use App\Models\Backend\Guardian;
use App\Models\Backend\InstituteMessage;
use App\Models\Backend\Mark;
use App\Models\Backend\Mother;
use App\Models\Backend\Notice;
use App\Models\Backend\NoticeCategory;
use App\Models\Backend\SiteInformation;
use App\Models\Backend\Slider;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\StudentPayment;
use App\Models\Backend\Syllabus;
use App\Models\Backend\UpcomingEvent;
use App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    // To retrieve system information
    public function systemInfo()
    {
        return SiteInformation::query()->findOrFail(1);
    }

    // To retrieve attendance by date
    public function attendance(Request $request)
    {
        $dateFrom = Carbon::parse($request->get('dateFrom'))->startOfDay();
        $dateTo = Carbon::parse($request->get('dateTo'))->endOfDay();
        $user = auth()->user();

        //dd($user->studentAcademic);
        $attendances = Attendance::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->whereBetween('date', [$dateFrom, $dateTo])
            ->get();

        //dd($user->studentAcademic);

        $attendanceToday = Attendance::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->where('date', now()->format('Y-m-d'))
            ->first();

        if ($attendances) {
            $data = [];
            foreach ($attendances as $attendance) {
                $data[] = [
                    'id' => $attendance->id,
                    'date' => date('d-m-Y', strtotime($attendance->date)),
                    'inTime' => $attendance->manual_in_time ?: $attendance->in_time,
                    'outTime' => $attendance->manual_out_time ?: $attendance->out_time,
                    'status' => $attendance->attendanceStatus->code ?? '',
                ];
            }

            return response()->json([
                'status' => true,
                'today' => [
                    'date' => date('d-m-Y', strtotime(now())),
                    'inTime' => $attendanceToday ? ($attendanceToday->manual_in_time ?: $attendanceToday->in_time) : '-',
                    'outTime' => $attendanceToday ? ($attendanceToday->manual_out_time ?: $attendanceToday->out_time) : '-',
                    'status' => $attendanceToday->attendanceStatus->code ?? '',
                ],
                'dateFrom' => date('d-m-Y', strtotime($dateFrom)),
                'dateTo' => date('d-m-Y', strtotime($dateTo)),
                'shiftFrom' => '10:00:00',
                'shiftTo' => '06:00:00',
                'attendances' => $data
            ]);
        }
    }

    // To retrieve about
    public function about()
    {
        $about = InstituteMessage::query()->where('alias', 'about')->first();
        if ($about) {
            return response()->json([
                'status' => true,
                'about' => $about->body,
                'image' => null
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve chairman message
    public function chairmanMessage()
    {
        $chairmanMessage = InstituteMessage::query()->where('alias', 'chairman')->first();
        if ($chairmanMessage) {
            return response()->json([
                'status' => true,
                'message' => [
                    'name' => $chairmanMessage->title,
                    'quote' => $chairmanMessage->body,
                    'designation' => "Chairman",
                    'image' => $chairmanMessage->image ? asset('uploads/message/' . $chairmanMessage->image) : null
                ],
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve Principal Message
    public function principalMessage()
    {
        $principalMessage = InstituteMessage::query()->where('alias', 'principal')->first();
        if ($principalMessage) {
            return response()->json([
                'status' => true,
                'message' => [
                    'name' => $principalMessage->title,
                    'quote' => $principalMessage->body,
                    'designation' => "Principal",
                    'image' => $principalMessage->image ? asset('uploads/message/' . $principalMessage->image) : null
                ],

            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve Student Profile
    public function profile(Request $request)
    {
        $student = $request->user();
        $profile = Student::query()->where('studentId', $student->studentId)->first();
        if ($profile) {
            return response()->json([
                'status' => true,
                'student' => [
                    'personal' => [
                        'name' => $profile->name ?? '',
                        'student_id' => $profile->studentId ?? '',
                        'picture' => $profile->image ? asset('storage/uploads/students') . '/' . $profile->image : null,
                        'class' => $profile->studentAcademic->classes->name ?? '',
                        'rank' => $profile->studentAcademic->rank ?? '',
                        'status' => $profile->status == 1 ? 'Active' : 'Inactive',
                        'dob' => date('d-m-Y', strtotime($profile->dob)) ?? '',
                        'blood' => $profile->bloodGroup->name ?? '',
                        'religion' => $profile->religion->name ?? '',
                        'nationality' => 'Bangladeshi',
                        'mobile' => $profile->mobile ?? '',
                        'email' => $profile->email ?? '',
                    ],
                    'father' => [
                        'name' => $profile->father->f_name ?? '',
                        'mobile' => $profile->father->f_mobile ?? '',
                        'occupation' => $profile->father->f_occupation ?? '',
                    ],
                    'mother' => [
                        'name' => $profile->mother->m_name ?? '',
                        'mobile' => $profile->mother->m_mobile ?? '',
                        'occupation' => $profile->mother->m_occupation ?? '',
                    ],
                    'address' => [
                        'city' => $profile->city->name ?? '',
                        'country' => $profile->country->name ?? '',
                        'postcode' => $profile->zip ?? '',
                        'address' => $profile->address ?? '',
                    ]
                ],

            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve syllabus
    public function syllabus()
    {
        $syllabus = Syllabus::query()->first();
        if ($syllabus) {
            return response()->json([
                'status' => true,
                'file' => asset('assets/syllabus') . '/' . $syllabus->file ?? ''
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all notices
    public function noticeList()
    {
        $notices = Notice::query()->where('notice_type_id', 2)->paginate(8);
        if ($notices) {
            return new NoticeCollection($notices);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve a single notice
    public function noticeDetails(Request $request)
    {
        $notice = Notice::query()
            ->where('id', $request->id)
            ->where('notice_type_id', 2)
            ->first();
        $noticeCategory =  NoticeCategory::find($notice->notice_category_id);
        if ($notice) {
            return [
                'status' => true,
                'notice' => [
                    'title' => $notice->title,
                    'body' => $notice->description,
                    'date' => date('d-m-Y', strtotime($notice->created_at)),
                    'category' => $noticeCategory->name ?? null,
                    'type' => $notice->notice_type_id == 1 ? 'News' : 'Notice',
                    'image' => $notice->file ? asset('storage/uploads/notice/' . $notice->file) : null,
                    'download_link' => null,
                    'facebook_link' => null,
                    'twitter_link' => null,
                    'linkedin_link' => null,
                ]
            ];
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all news
    public function newsList()
    {
        $newsList = Notice::query()->where('notice_type_id', 1)->paginate();
        if ($newsList) {
            return new NewsCollection($newsList);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve a single news
    public function newsDetails(Request $request)
    {
        $news = Notice::query()
            ->where('id', $request->id)
            ->where('notice_type_id', 1)
            ->first();
        if ($news) {
            $noticeCategory =  NoticeCategory::find($news->notice_category_id);
            return [
                'status' => true,
                'news' => [
                    'title' => $news->title,
                    'body' => $news->description,
                    'date' => date('d-m-Y', strtotime($news->created_at)),
                    'category' => $noticeCategory->name,
                    'type' => $news->notice_type_id == 1 ? 'News' : 'Notice',
                    'image' => asset('storage/uploads/notice/' . $news->file),
                    'download_link' => null,
                    'facebook_link' => null,
                    'twitter_link' => null,
                    'linkedin_link' => null,
                ],
            ];
        } else {
            return response(null, 204);
        }
    }

    // To retrieve class routines by class
    public function classRoutine()
    {
        $user = auth()->user(); //get the logged in users data
        $routines = ClassSchedule::query()
            ->where('academic_class_id', $user->studentAcademic->academic_class_id)
            ->get()
            ->groupBy('day');
        $r = [];
        foreach ($routines as $key => $routine) {
            $hours = [];
            foreach ($routine as $rou) {
                $hours[] = [
                    'name' => $rou->name ?? '',
                    'start' => $rou->start ?? '',
                    'end' => $rou->end ?? '',
                    'subject' => $rou->subject->name ?? '',
                    'isBreak' => false
                ];
            }
            $r[] = [
                'id' => 1,
                'weekday' => $key,
                'hours' => $hours
            ];
        }

        return response()->json(['status' => true, 'routine' => $r]);
    }

    // To send sms in mobiles
    public function sms($number, $message)
    {
        $url = "https://a2p.solutionsclan.com/api/sms/send";
        $data = [
            "apiKey" => 'A00003902f236fc-f6ed-463d-ad56-3462c3bd16f3',
            "contactNumbers" => $number,
            "senderId" => 'BULKSMS',
            "textBody" => $message
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        echo "$response";
        curl_close($ch);
    }

    // To retrieve all events
    public function events()
    {
        return new EventsCollection(UpcomingEvent::paginate(10));
    }

    // To retrieve an single Event
    public function eventDetails(Request $request)
    {
        $event = UpcomingEvent::query()
            ->where('id', $request->id)
            ->first();
        if ($event) {
            return [
                'status' => true,
                'event' => [
                    'title' => $event->title,
                    'body' => $event->details,
                    'date' => date('d-m-Y', strtotime($event->date)),
                    'location' => $event->venue,
                    'image' => asset('assets/img/events') . '/' . $event->image
                ],

            ];
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all Teachers
    public function teachers()
    {
        return new TeacherCollection(Staff::query()->where('staff_type_id', 2)->paginate());
    }

    // To retrieve a single Teacher details
    public function teacherDetails(Request $request)
    {
        $teacher = Staff::query()
            ->where('staff_type_id', 2)
            ->where('id', $request->id)
            ->first();
        if ($teacher->count() > 0) {
            return [
                'status' => true,
                'name' => $teacher->name,
                'designation' => $teacher->staff_type_id == 2 ? 'Teacher' : 'Staff',
                'phone' => $teacher->mobile,
                'empNo' => $teacher->card_id,
                'joiningDate' => $teacher->joining,
                'email' => $teacher->email,
                'image' => asset('assets/img/staffs') . '/' . $teacher->image,
                'gender' => $teacher->gender->name,
                'bloodGroup' => $teacher->blood->name,
            ];
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all diaries
    public function diary(Request $request)
    {
        $date = $request->date ?? Carbon::parse()->format('Y-m-d');
        $academicClassId = $request->academic_class_id;

        $day = Carbon::createFromFormat('Y-m-d', $date)->format('l');

        $diaries = Diary::query()
            ->where('academic_class_id',$academicClassId)
            ->where('date', $date)
            ->get();

        if ($diaries->isNotEmpty()) {
            $data = [];
            foreach ($diaries as $d) {
                $data[] = [
                    'id' => $d->id,
                    'subject' => $d->subject->name,
                    'diary' => $d->description,
                ];
            }
            return response()->json([
                'status' => true,
                'date' => $date,
                'weekDay' => $day,
                'diaries' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve exam result of a student
    public function result()
    {
        $user = auth()->user();
        $examResult = ExamResult::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->with('exam', 'studentAcademic')
            ->get();
        if ($examResult) {
            $data = [];
            foreach ($examResult as $result) {
                $TotalNumbers = DB::table('exam_schedules')
                    ->where('exam_id', $result->exam_id)
                    ->where('academic_class_id', $result->studentAcademic->academic_class_id)
                    ->selectRaw('SUM(objective_full) as obj, SUM(written_full) as wri, 
                                SUM(practical_full) as pra, SUM(viva_full) as viva')
                    ->first();

                $obj_full = $TotalNumbers->obj ?? 0;
                $written_full = $TotalNumbers->wri ?? 0;
                $practical_full = $TotalNumbers->pra ?? 0;
                $viva_full = $TotalNumbers->viva ?? 0;
                $total = $obj_full + $written_full + $practical_full + $viva_full;

                $data[] = [
                    'id' => $result->id,
                    'title' => $result->exam->name ?? '',
                    'isPassed' => $result->grade == 'F' ? false : true,
                    'result' => [
                        [
                            'label' => 'GPA',
                            'obtained' => $result->gpa,
                            'total' => '5.00',
                        ], [
                            'label' => 'TOTAL',
                            'obtained' => $result->total_mark,
                            'total' => strval($total),
                        ], [
                            'label' => 'ATTENDANCE',
                            'obtained' => '35',
                            'total' => '98',
                        ],

                    ]
                ];
            }
            return response()->json([
                'status' => true,
                'results' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve home
    public function home()
    {
        $sliders = Slider::query()->get();
        if ($sliders->isNotEmpty()) {
            $data = [];
            foreach ($sliders as $slider) {
                $data[] = [
                    'id' => $slider->id,
                    'image' => $slider->image ? asset('assets/img/sliders/' . $slider->image) : null,
                ];
            }
            return response()->json([
                'status' => true,
                'sliders' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all marks of a exam
    public function marksheet()
    {
        $user = auth()->user();
        $examResult = ExamResult::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->with('exam', 'studentAcademic')
            ->get();
        if ($examResult) {
            $data = [];
            foreach ($examResult as $result) {

                $TotalNumbers = ExamSchedule::query()
                    ->get();

                foreach ($TotalNumbers as $totalNumber) {
                    $obj_full = $totalNumber->objective_full;
                    $obj_pass = $totalNumber->objective_pass;
                    $wri_full = $totalNumber->written_full;
                    $wri_pass = $totalNumber->written_pass;
                    $pra_full = $totalNumber->practical_full;
                    $pra_pass = $totalNumber->practical_pass;
                    $viva_full = $totalNumber->viva_full;
                    $viva_pass = $totalNumber->viva_pass;
                }

                $detailsNumbers = Mark::query()
                    ->where('exam_id', $result->exam_id)
                    ->where('academic_class_id', $result->studentAcademic->academic_class_id)
                    ->with('exam')
                    ->get();

                $mcqHighest = DB::table('marks')->max('objective');
                $wriHighest = DB::table('marks')->max('written');
                $praHighest = DB::table('marks')->max('practical');
                $vivaHighest = DB::table('marks')->max('viva');

                foreach ($detailsNumbers as $number) {
                    $mcq = $number->objective ?? 0;
                    $written = $number->written ?? 0;
                    $practical = $number->practical ?? 0;
                    $viva = $number->viva ?? 0;
                    $totalObtain = $mcq + $written + $practical + $viva;

                    $data[] = [
                        'title' => $number->subject->name,
                        'isPassed' => $number->grade == 'F' ? false : true,
                        'total' => strval($totalObtain),
                        'marks' => [
                            [
                                'label' => 'MCQ',
                                'obtained' => $number->objective ?? '',
                                'total' => $obj_full ?? '',
                                'pass' => $obj_pass ?? '',
                                'highest' => $mcqHighest,
                            ],
                            [
                                'label' => 'WRITTEN',
                                'obtained' => $number->written ?? '',
                                'total' => $wri_full ?? '',
                                'pass' => $wri_pass ?? '',
                                'highest' => $wriHighest ?? '',
                            ],
                            [
                                'label' => 'PRACTICAL',
                                'obtained' => $number->practical ?? '',
                                'total' => $pra_full ?? '',
                                'pass' => $pra_pass ?? '',
                                'highest' => $praHighest ?? '',
                            ],
                            [
                                'label' => 'VIVA',
                                'obtained' => $number->viva ?? '',
                                'total' => $viva_full ?? '',
                                'pass' => $viva_pass ?? '',
                                'highest' => $vivaHighest ?? '',
                            ]

                        ]
                    ];
                }
                return response()->json([
                    'status' => true,
                    'examName' => $result->exam->name,
                    'marksheet' => $data
                ]);
            }
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all calendars
    public function calendar()
    {
        $calendars = DB::table('holidays')
            ->selectRaw('(id) as id,(start) as start, (end) as end, 
                                (name) as name')
            ->selectRaw("MONTHNAME(start) as monthname")
            ->get()
            ->groupBy('monthname');

        if ($calendars->isNotEmpty()) {
            $r = [];
            foreach ($calendars as $day => $calendar) {
                $data = [];
                foreach ($calendar as $cal) {
                    $data[] = [
                        'date' => Carbon::parse($cal->start)->format('d') ?? '',
                        'day' => Carbon::parse($cal->start)->format('D') ?? '',
                        'title' => $cal->name ?? '',
                    ];
                }
                $r[] = [
                    'id' => intval($cal->id),
                    'month' =>  $day,
                    'events' => $data
                ];
            }
            return response()->json(['status' => true, 'calendar' => $r]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all Payment Histories
    public function paymentHistory(Request $request)
    {
        $user = auth()->user();
        $dateFrom = Carbon::parse($request->get('dateFrom'))->startOfDay();
        $dateTo = Carbon::parse($request->get('dateTo'))->endOfDay();

        $payment = StudentPayment::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->whereBetween('date', [$dateFrom, $dateTo])
            ->with('payment_methods')
            ->get();

        $amount = DB::table('student_payments')->whereBetween('date', [$dateFrom, $dateTo])->sum('amount');
        if ($payment->isNotEmpty()) {
            $data = [];
            foreach ($payment as $pay) {
                $data[] = [
                    'date' => date('Y-m-d', strtotime($pay->date)) ?? '',
                    'method' => $pay->payment_methods->name ?? '',
                    'amount' => $pay->amount ?? '',
                ];
            }
            return response()->json([
                'history' => $data,
                'total' => $amount,
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve monthly payment
    public function monthlyPayment(Request $request)
    {
        $user = auth()->user();
        $yr = $request->year ?? Carbon::parse()->format('Y');
        $monthlyPayment = StudentPayment::whereYear('date', $yr)
            ->where('student_academic_id', $user->studentAcademic->id)
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->date)->format('F');
            });

        if ($monthlyPayment->isNotEmpty()) {
            $years = StudentPayment::query()
                ->where('student_academic_id', $user->studentAcademic->id)
                ->get('date')
                ->unique();

            $t = [];
            foreach ($years as $year) {
                $t[] = [
                    'label' => Carbon::parse($year->date)->format('Y') ?? '',
                    'value' => Carbon::parse($year->date)->format('Y') ?? ''
                ];
            }

            $totalAmount = FeeSetupStudent::query()
                ->where('student_id', $user->studentAcademic->student_id)
                ->get()
                ->sum('amount');

            $totalCollection = StudentPayment::query()
                ->where('student_academic_id', $user->studentAcademic->id)
                ->get()
                ->sum('amount');

            $due = $totalAmount - $totalCollection;

            $data = [];
            foreach ($monthlyPayment as $month => $payment) {
                foreach ($payment as $pay) {
                    $data[] = [
                        'month' => $month,
                        'due' => strval($totalAmount)  ?? '',
                        'paid' => $pay->amount ?? '0',
                    ];
                }
            }
            return response()->json(['years' => $t, 'payments' => $data, 'due' => strval($due)]);
        } else {
            return response(null, 204);
        }
    }

    // To store an Event
    public function storeEvent(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);
        $filename = 'File.jpeg';
        $request['title'] = $request->title;
        $request['date'] = $request->date;
        $request['time'] = $request->time;
        $request['venue'] = $request->venue;
        $request['details'] = $request->details;
        $request['image'] = $filename;
        $result = UpcomingEvent::query()->create($request->all());
        if ($result) {
            return response()->json(['success' => true, 'Event' => $result]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
