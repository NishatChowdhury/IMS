<?php

namespace App\Console\Commands;

use App\Models\Backend\RawAttendance;
use Carbon\Carbon;
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
        $startDate = today()->subWeek();
        $startDate = $startDate->format('Y-m-d');
        $endDate = today();
        $endDate = $endDate->format('Y-m-d');
        $accessId = "00000000";

        $data = array(
            "operation" => env("STELLAR_OPERATION"),
            "auth_user" => env("STELLAR_USERNAME"),
            "auth_code" => env("STELLAR_AUTH_CODE"),
            "start_date" => "$startDate",
            "end_date" => "$endDate",
            "start_time" => "00:00:00",
            "end_time" => "23:59:59",
            "access_id" => "$accessId"
        );

        $url_send ="https://rumytechnologies.com/rams/json_api";
        $str_data = json_encode($data);

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
        $replace_syntax = str_replace('{"log":', "", $result);
        $replace_syntax = substr($replace_syntax, 0, -1);
        $responseBody = json_decode($replace_syntax);

        foreach($responseBody as $row){

            ini_set('max_execution_time',30);

            $isExists = RawAttendance::query()->where('access_id',$row->access_id)->exists();

            if(!$isExists){
                $attendance = new RawAttendance();
                $attendance->registration_id = $row->registration_id;
                $attendance->access_id = $row->access_id;
                $attendance->department = $row->department;
                $attendance->unit_id = $row->unit_id;
                $attendance->card = $row->card;
                $attendance->unit_name = $row->unit_name;
                $attendance->user_name = $row->user_name;
                $attendance->access_date = date('Y-m-d H:i:s', strtotime($row->access_date . $row->access_time));
                $attendance->access_time = date('Y-m-d H:i:s', strtotime($row->access_date . $row->access_time));
                $attendance->sms_sent = NULL;
                $attendance->save();
            }
        }

    $this->info('data saved successfully');

        //dd('data saved successfully');
    }
}
