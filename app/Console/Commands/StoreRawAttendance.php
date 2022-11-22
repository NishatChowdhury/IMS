<?php

namespace App\Console\Commands;

use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use App\Models\Backend\RawAttendance;


class StoreRawAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:StoreRawAttendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store fake attendance record in cloud';

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
        $students = Student::query()->pluck('studentId');
        $staffs = Staff::query()->pluck('card_id');
        $card_number = $students->concat($staffs);

        foreach ($card_number as $row){
            $ifExists = RawAttendance::query()->where('registration_id',$row)->where('access_date',now()->format('Y-m-d'))->exists();

            $h = $ifExists ? rand(15,17) : rand(9,10);
            $i = rand(0,59);
            $s = rand(0,59);

            $data = [
                'registration_id' => $row,
                'access_id' => rand(0,99999),
                'department' => 'department',
                'unit_id' => Str::random(15),
                'card' => dechex(rand(1048576,16777215)),
                'unit_name' => Str::random(15),
                'user_name' => '',
                'access_date' => now()->format('Y-m-d'),
                'access_time' => Carbon::createFromTime($h,$i,$s)->format('H:i:s'),
            ];

            RawAttendance::query()->create($data);
        }
    }

}
