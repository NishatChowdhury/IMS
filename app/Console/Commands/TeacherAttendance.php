<?php

namespace App\Console\Commands;

use App\Models\Backend\AttendanceTeacher;
use App\Models\Backend\Holiday;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Shift;
use App\Models\Backend\Staff;
use App\Models\Backend\TeachersLeave;
use App\Models\Backend\weeklyOff;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TeacherAttendance extends Command
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
    protected $description = 'Generate attendance from raw attendance to teacher attendance';

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

        //$todayCount =  Carbon::parse('2023-05-02');
        //$today =  Carbon::parse('2023-05-02')->format('Y-m-d');

        $staffs = Staff::query()->where('staff_type_id', 2)->get();

        foreach ($staffs as $key => $staff){

            $rawData = RawAttendance::query()
                ->where('access_date', $today)
                ->where('registration_id', $staff->card_id)
                ->get();

            if ($rawData->isEmpty()) {

                $min = null;
                $max = null;

                $leave = TeachersLeave::query()
                    ->where('teacher_id', $staff->id)
                    ->where('date', '=', $today)
                    ->exists();
//       return         $weeklyOff = weeklyOff::where('id', 1)->first();
                //$leave = null;
                $weeklyOff = weeklyOff::query()->where('show_option', $todayCount->format('N'))->first();
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
            }else{
                $min = $rawData->min('access_time');
                $max = $rawData->max('access_time');

                $shift = Shift::query()->find($staff->shift_id);
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


            $attendanceExists = AttendanceTeacher::query()
                ->where('staff_id', $staff->card_id ?? 0)
                ->where('date', $today)
                ->exists();


            if ($attendanceExists) {
                $attendance = AttendanceTeacher::query()
                    ->where('staff_id', $staff->card_id ?? 0)
                    ->where('date', $today)
                    ->first();
                $attendance->update($data);
            } else {
                AttendanceTeacher::query()->create($data);
            }

        }
        $this->info('done');


    }
}
