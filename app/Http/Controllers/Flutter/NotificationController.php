<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;
use App\Models\Backend\Holiday;
use App\Models\Backend\Notice;
use App\Models\Backend\StudentPayment;
use App\Models\Backend\UpcomingEvent;
use App\Models\Diary;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function attendanceNotification()
    {
        $user = auth()->user();
        $attendanceToday = Attendance::query()
            ->where('student_academic_id', $user->studentAcademic->id)
            ->whereDate('date', now()->format('Y-m-d'))
            ->first();

        $student = $attendanceToday->studentAcademic->student ?? '';
        $studentName =  $student->name ?? '';
        $inTime = $attendanceToday->in_time ?? '';

        if ($attendanceToday) {
            return [
                'attendanceId' => $attendanceToday->id,
                'status' => true,
                'msg' => "Your wand - " . $studentName . ",is arrived at - " . $inTime
            ];
        } elseif (!$attendanceToday) {
            return [
                'status' => false,
            ];
        }
    }

    public function upcomingEventsNotification()
    {
        $upcomingEvents = UpcomingEvent::query()->get();
        if ($upcomingEvents->isNotEmpty()) {
            $data = [];
            foreach ($upcomingEvents as $upcomingEvent) {
                $data[] = [
                    'eventsId' => $upcomingEvent->id,
                    'title' => $upcomingEvent->title,
                    'body' => $upcomingEvent->details,
                ];
            }
            return response()->json([
                'status' => true,
                'upcomingEvents' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    public function noticeNotification()
    {
        $notices = Notice::query()->where('notice_type_id', 2)->paginate(8);
        if ($notices->isNotEmpty()) {
            $data = [];
            foreach ($notices as $notice) {
                $data[] = [
                    'noticeId' => $notice->id,
                    'title' => $notice->title,
                    'body' => $notice->description,
                ];
            }
            return response()->json([
                'status' => true,
                'notices' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    public function newsNotification()
    {
        $newsList = Notice::query()->where('notice_type_id', 1)->paginate(8);
        if ($newsList->isNotEmpty()) {
            $data = [];
            foreach ($newsList as $news) {
                $data[] = [
                    'newsId' => $news->id,
                    'title' => $news->title,
                    'body' => $news->description,
                ];
            }
            return response()->json([
                'status' => true,
                'news' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    public function diaryNotification()
    {
        $diary = Diary::query()->get();
        if ($diary->isNotEmpty()) {
            $data = [];
            foreach ($diary as $d) {
                $data[] = [
                    'id' => $d->id,
                    'date' => $d->date ?? '',
                    'subject' => $d->subject->name ?? '',
                    'teacher' => $d->teacher->name ?? '',
                    'diary' => $d->description ?? '',
                ];
            }
            return response()->json([
                'status' => true,
                'diaries' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    public function holidayNotification()
    {
        $holidays = Holiday::query()->get();
        if ($holidays->isNotEmpty()) {
            $data = [];
            foreach ($holidays as $holiday) {
                $data[] = [
                    'id' => $holiday->id,
                    'name' => $holiday->name ?? ''
                ];
            }
            return response()->json([
                'status' => true,
                'holidays' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    public function paymentNotification()
    {
        $payment = StudentPayment::query()
            ->with('payment_methods')
            ->get();
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
                'status' => true,
                'payments' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }
}
