<?php

namespace App\Console\Commands;

use App\Models\Backend\RawAttendance;
use App\Models\Backend\weeklyOff;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TeacherAttendace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'th:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command For Teacher Attendance';

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


//       $todayCount =  Carbon::parse('2022-06-12');
//       $today =  Carbon::parse('2022-06-12')->format('Y-m-d');

        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $todayCount = \Carbon\Carbon::today();


     $staffs = \App\Models\Backend\Staff::query()->where('staff_type_id', 2)->get();

    foreach ($staffs as $key => $staff){

          $rawData = RawAttendance::query()
                ->where('access_date', $today)
                ->where('registration_id', $staff->card_id)
                ->get();

        if ($rawData->isEmpty()) {

                $min = null;
                $max = null;

//                $leave = \App\Models\Backend\StudentLeave::query()
//                    ->where('student_id', $student->id)
//                    ->where('date', '=', $today)
//                    ->exists();
//       return         $weeklyOff = weeklyOff::where('id', 1)->first();
                $leave = null;
                $weeklyOff = weeklyOff::where('show_option', $todayCount->format('N'))->first();
//                return $today;
                $holiday = \App\Models\Backend\Holiday::query()
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
        }else{
                $min = $rawData->min('access_time');
                $max = $rawData->max('access_time');

                $shift = \App\Models\Backend\Shift::find($staff->shift_id);
                $shiftIn =  Carbon::parse($shift->start)->addMinutes($shift->grace);
                $shiftOut = Carbon::parse($shift->end)->subMinutes($shift->grace);

                if($min >= $shiftIn && $max <= $shiftOut){
                    $attendanceStatus = '8'; // Late & Early Leave
                }elseif ($min <= $shiftIn && $max <= $shiftOut) {
                    $attendanceStatus = '4'; // Early Leave
                } elseif ($min <= $shiftIn) {
                    $attendanceStatus = '1';  // Present
                } elseif ($min > $shiftIn) {
                    $attendanceStatus = '3'; // Late
                }


        }

         $data = [
                'staff_id' => $staff->card_id ?? 0,
                'date' => $today,
                'in_time' => $min,
                'out_time' => $max,
                'attendance_status_id' => $attendanceStatus,
            ];


        $attendanceExists = \App\Models\Backend\AttendanceTeacher::query()
                ->where('staff_id', $staff->card_id ?? 0)
                ->where('date', $today)
                ->exists();


        if ($attendanceExists) {
                $attendance = \App\Models\Backend\AttendanceTeacher::query()
                    ->where('staff_id', $staff->card_id ?? 0)
                    ->where('date', $today)
                    ->first();
                $attendance->update($data);
            } else {
                \App\Models\Backend\AttendanceTeacher::create($data);
            }

    }
        $this->info('done');


    }
}
