<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
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
    protected $description = 'Store attendance record in cloud';

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
        $card_number = [
            'S181121403',
            'S2043',
            '978336',
            'S24562016',
            '1662622',
            's24562011',
            '816586',
            '180558',
            'S11806417',
            'S181121403',
            '1662622',
            '524562016',
            '816585',
            'S1806418',
            '0032',
            'S1806422',
            '816438',
            'S2043',
            '1802712'
        ];
        foreach ($card_number as $row){
            $attendance = new RawAttendance();
            $attendance->registration_id = $row;
            $attendance->access_id = rand(0, 99999);;
            $attendance->department = 'deparment';
            $attendance->unit_id = Str::random(15);
            $attendance->card = Str::random(15);
            $attendance->unit_name = Str::random(15);
            $attendance->user_name = 'shakil';
            $attendance->access_date = date('Y-m-d');
            $attendance->access_time = Carbon::now()->format('H:i:s');
            $attendance->save();
        }
        $this->info('data saved successfully');
    }
}
