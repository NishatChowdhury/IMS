<?php

namespace App\Console\Commands;

use App\Models\Backend\Attendance;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use function Symfony\Component\String\b;

class AttendanceSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:AttendanceSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send attendance SMS after download attendances';

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
        //1866177444 number of S202000001
        //1918815613 number of S202000002
        //1710420854 number of S202000003
        //1556570714 number of S202000004
        //$students = Student::query()->where('status',1)->get();
        $attendances = Attendance::query() //FAKE for urkirchar
        ->where('student_academic_id',58)
            ->where('sms_sent',NULL)
            ->get();

        foreach($attendances as $attn){

            $student = $attn->studentAcademic->student;

            if($attn->attendance_status_id == 1){ //Present
                $msg = 'Dear Parent, your ward entry time is '.$attn->in_time->format('H:i:s');
                $this->send($student,$msg);
            }elseif($attn->attendance_status_id == 2){ //Absent
                $msg = 'Dear Parent, you ward is absent without any prior notice.';
                $this->send($student,$msg);
            }elseif($attn->attendance_status_id == 3){ // Late
                $msg = 'Dear Parent, your ward is late, his entry time is '.$attn->in_time->format('H:i:s');
                $this->send($student,$msg);
            }elseif($attn->attendance_status_id == 7){ // In Leave
                $msg = 'Dear Parent, your ward is in leave.';
                $this->send($student,$msg);
            }

            $attn->update(['sms_sent'=>1]);

//            $isPresent = RawAttendance::query()
//                ->where('registration_id',$student->studentId)
//                ->where('access_date','like','%'.Carbon::today()->format('Y-m-d').'%')
//                ->where('sms_sent',0)
//                ->first();
//
//            if($isPresent){
//                $msg = 'Dear Parent, your ward entry time is '.$isPresent->access_time->format('H:i:s');
//                $this->send($student,$msg);
//            }else{
//                $msg = 'Dear Parent, you ward is absent without any prior notice.';
//            }

            //$this->send($student,$msg);

        }

        return 0;
    }

    public function send($student,$msg)
    {
        $url = "https://a2p.solutionsclan.com/api/sms/send";
        $data = [
            "apiKey"=> smsConfig('api_key'),
            "contactNumbers"=> $student->mobile,
            "senderId"=> smsConfig('sender_id'),
            "textBody"=> $msg
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        //echo "$response";
        curl_close($ch);

//        $api_key = smsConfig('api_key');
//        $contacts = $student->mobile;
//        $senderid = smsConfig('sender_id');
//        $sms = $msg;
//        $URL = "https://sms.solutionsclan.com/smsapi?apiKey=".urlencode($api_key)."&contactNumbers=".$contacts."&senderId=".urlencode($senderid)."&textBody=".urlencode($sms);
//
//        $ch = curl_init();
//        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
//        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt ($ch, CURLOPT_URL, $URL);
//        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
//        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_exec($ch);
//
//        try {
//            $output = $content=curl_exec($ch);
//            print_r($output);
//        }catch (Exception $ex){
//            $output = "-100";
//        }

//        try{
//            $output = $content=curl_exec($ch);
//            print_r($output);
//
//            $allAttendances = Attendance::query()
//                ->where('registration_id',$student->studentId)
//                ->where('date','like','%'.Carbon::today()->format('Y-m-d').'%')
//                ->where('sms_sent',0)
//                ->get();
//
//            foreach($allAttendances as $attendance){
//                $attendance->update(['sms_sent'=>1]);
//            }
//
//        }catch(Exception $ex){
//            $output = "-100";
//        }
    }
}
