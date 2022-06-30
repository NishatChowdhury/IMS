<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TransportFeeGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genarate:transportFee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transport fee genarate';

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
          $allstudent = \App\Models\LocationStudent::query()
                                                ->whereNotIn('direction', [0])
                                                ->get();

    foreach ($allstudent as $key => $stu){

        $endD = $stu->ending_date != null ? \Carbon\Carbon::parse($stu->ending_date) : null;
        $s = \Carbon\Carbon::parse($stu->starting_date);
        $c = \Carbon\Carbon::now();

        $curDate =  date('d-m-y');

        if ($endD == null || $c <= $endD || $s >= $c){
            $stu->update(['is_active' => 1]);
        }else{
            $stu->update(['is_active' => 0]);
        }

        $monthName = date('m-y', strtotime($stu->starting_date));
        $currentMonth = date('m-y', strtotime($curDate));

        if($currentMonth >= $monthName){
            $currentMonthTake =  date('F', strtotime($curDate));
        }else{
            $currentMonthTake = date('F', strtotime($stu->starting_date));
        }
        $monthName = date('M', strtotime($stu->starting_date));
        $year = date('Y', strtotime($stu->starting_date));

        $checkTransport = \App\Models\Backend\Transport::query()
                                                        ->where('month',$currentMonthTake)
                                                        ->where('year',$year)
                                                        ->where('student_academic_id',$stu->student_academic_id)
                                                        ->first();

         if($stu->direction == 1){
             $direction = 'Home To Institute';
             $amount = $stu->location->home_to_institute;
         }elseif ($stu->direction == 2){
             $direction = 'Institute To Home';
             $amount = $stu->location->institute_to_home;
         }elseif ($stu->direction == 3){
             $direction = 'Both';
             $amount = $stu->location->both;
         }else{
             $direction = 'Not taking';
             $amount = 00;
         }

//         return $stu->location->institute_to_home33;
         if (is_null($checkTransport)){
             if ($stu->is_active == 1) {
                 $checkTransport1 = \App\Models\Backend\Transport::create([
                     'location_id' => $stu->location_id,
                     'student_academic_id' => $stu->student_academic_id,
                     'location_name' => $stu->location->name ?? '',
                     'starting_date' => $stu->starting_date,
                     'ending_date' => $stu->ending_date,
                     'month' => $currentMonthTake,
                     'year' => $year,
                     'amount' => $amount,
                     'direction' => $direction,
                     'status' => 1,
                 ]);
             }
         }
    }
       $this->info('Transport Fee Genarate Successfully');
    }
}
