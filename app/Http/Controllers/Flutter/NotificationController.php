<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function attendance(Request $request)
    {
        $attendanceToday = Attendance::query()
            ->where('student_academic_id', $request->student_academic_id)
            ->whereDate('date', now()->format('Y-m-d'))
            ->first();

        $student = $attendanceToday->studentAcademic->student ?? '';
        $studentName =  $student->name;
        $inTime = $attendanceToday->in_time;

        if ($attendanceToday->count() > 0) {
            return [
                'status' => true,
                'msg' => "Your wand - " . $studentName . ",is arrived at - " . $inTime
            ];
        } else {
            return response(null, 204);
        }
    }
}
