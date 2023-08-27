<?php

namespace App\Console\Commands;

use App\Models\Backend\Attendance;
use App\Models\Backend\Holiday;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Shift;
use App\Models\Backend\Student;
use App\Models\Backend\StudentLeave;
use App\Models\Backend\weeklyOff;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:GenerateAttendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate attendances from raw table to real table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->format('Y-m-d');
        $todayCount = Carbon::today();
//        $d = '2022-06-20';
//        $todayCount = Carbon::parse($d);
//        $today = Carbon::parse($d)->format('Y-m-d');

        $students = Student::query()->get();

        foreach ($students as $key => $student) {

            $rawData = RawAttendance::query()
                ->where('access_date', $today)
                ->where('registration_id', $student->studentId)
                ->get();

            if ($rawData->isEmpty()) {

                $min = null;
                $max = null;

                $leave = StudentLeave::query()
                    ->where('student_id', $student->id)
                    ->where('start_date', '<=', $today)
                    ->where('end_date', '>=', $today)
                    ->exists();
//       return         $weeklyOff = weeklyOff::where('id', 1)->first();
                $weeklyOff = weeklyOff::where('show_option', $todayCount->format('N'))->first();
//                return $today;
                $holiday = Holiday::query()
                    ->where('start', '<=', $today)
                    ->where('end', '>=', $today)
                    ->where('is_holiday', 1)
                    ->exists();

                if ($holiday) {
                    $attendanceStatus = '5'; // Holiday
                } elseif ($leave) {
                    $attendanceStatus = '7'; // Leave
                } elseif ($weeklyOff) {
                    $attendanceStatus = '6'; // Weekly Off
                } else {
                    $attendanceStatus = '2'; // Absent
                }
            } else {
                $min = $rawData->min('access_time');
                $max = $rawData->max('access_time');

                $shift = Shift::query()->first();
                $shiftIn = Carbon::parse($shift->start)->addMinutes($shift->grace);
                $shiftOut = Carbon::parse($shift->end)->subMinutes($shift->grace);

                if ($min >= $shiftIn && $max <= $shiftOut) {
                    $attendanceStatus = '8'; // Late & Early Leave
                } elseif ($min <= $shiftIn && $max <= $shiftOut) {
                    $attendanceStatus = '4'; // Early Leave
                } elseif ($min <= $shiftIn) {
                    $attendanceStatus = '1';  // Present
                } elseif ($min > $shiftIn) {
                    $attendanceStatus = '3'; // Late
                }
            }

            $data = [
                'student_academic_id' => $student->studentAcademic->id ?? 0,
                'date' => $today,
                'in_time' => $min,
                'out_time' => $max,
                'attendance_status_id' => $attendanceStatus,
            ];

            $attendanceExists = Attendance::query()
                ->where('student_academic_id', $student->studentAcademic->id ?? 0)
                ->where('date', $today)
                ->exists();

            if ($attendanceExists) {
                $attendance = Attendance::query()
                    ->where('student_academic_id', $student->studentAcademic->id ?? 0)
                    ->where('date', $today)
                    ->first();
                $attendance->update($data);
            } else {
                Attendance::query()->create($data);
            }

        }

        $this->info('done');
    }
}
