<?php

namespace App\Console\Commands;

use App\Attendance;
use Illuminate\Console\Command;

class DownloadAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:DownloadAttendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download attendance record from cloud';

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
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Dhaka');

        $data2=array(
            "get_log"=>array(
                "user_name" => "akschool",
                //"user_name" => "chakariacambrian",
                "auth"=>"3rfd237cefa924564a362ceafd99633", //akschool
                //"auth"=>"3efd234cefa324567a342deafd32672", //cambrian
                "log"=>array(
                    "date1"=>date('2019-07-23'),
                    "date2"=>date('Y-m-d')
                )
            )
        );

        $url_send ="https://rumytechnologies.com/rams/api";
        $str_data = json_encode($data2);

        $ch = curl_init($url_send);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $str_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($str_data))
        );

        $result = (curl_exec($ch));

        $getvalue = json_decode($result);

        foreach($getvalue->log as $row){

            ini_set('max_execution_time',30);

            $attendance = new Attendance();
            $attendance->registration_id = $row->registration_id;
            $attendance->unit_name = $row->unit_name;
            $attendance->user_name = $row->user_name;
            $attendance->access_date = date('Y-m-d H:i:s', strtotime($row->access_date . $row->access_time));
            $attendance->access_id = $row->access_id;
            $attendance->department = $row->department;
            $attendance->unit_id = $row->unit_id;
            $attendance->card = $row->card;

            $attendance->save();

        }
    }
}
