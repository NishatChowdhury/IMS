<?php

namespace App\Console\Commands;

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
//            for($i=0;$i<=1;$i++){
                $ifExists = RawAttendance::query()->where('registration_id',$row)->where('access_data',now()->format('Y-m-d'));

                $h = $ifExists ? array_rand([3, 4, 5]) : array_rand([9, 10]);
                $i = rand(0,59);
                $s = rand(0,59);

                $data = [
                    'registration_id' => $row,
                    'access_id' => rand(0,99999),
                    'department' => 'department',
                    'unit_id' => Str::random(15),
                    'card' => dechex(rand(1048576,16777215)),
                    'unit_name' => Str::random(15),
                    'access_date' => now()->format('Y-m-d'),
                    'access_time' => Carbon::createFromTime($h,$i,$s)->format('H:i:s'),
                ];

                RawAttendance::query()->create($data);
//            }
        }
        Artisan::call('generate:diary');
        $this->info('data saved successfully');
    }
}
