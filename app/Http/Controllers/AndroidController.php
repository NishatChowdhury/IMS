<?php

namespace App\Http\Controllers;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AndroidController extends Controller
{
    public function attendance(Request $request)
    {
        $student = $request->get('studentId');
        $start = Carbon::parse($request->get('start'))->startOfDay();
        $end = Carbon::parse($request->get('end'))->endOfDay();

        $attendances = Attendance::query()
            ->whereBetween('access_date',[$start,$end])
            ->where('registration_id',$student)
            ->get()
            ->groupBy('date');

        dd($attendances);

        foreach($attendances as $date => $attendance){
            $entry = $attendances->min('access_date');
            $exit = $attendances->max('access_date');
        }

        dd($attendances->min('access_date'));
    }
}
