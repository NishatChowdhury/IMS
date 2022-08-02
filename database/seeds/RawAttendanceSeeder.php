<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Backend\RawAttendance;
use Illuminate\Support\Str;


class RawAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
           $attendance->access_id = rand(10000, 99999);
           $attendance->department = 'Department';
           $attendance->unit_id = Str::random(15);
           $attendance->card = rand(1000000000,9999999999);
           $attendance->unit_name = 'Auto Pilot';
           $attendance->user_name = 'shakil';
           $attendance->access_date = date('Y-m-d');
           //$attendance->access_time = Carbon::now()->format('H:i:s');
           $attendance->access_time = Carbon::createFromTime(array_rand([9,10,11,17,18,19]),rand(0,59),rand(0,59));
           $attendance->save();
       }
    }
}
