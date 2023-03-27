<?php

namespace App\Console\Commands;

use App\Models\Backend\Attendance;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Student;
use Illuminate\Console\Command;

class FakeSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:FakeSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send attendance sms after card swipe';

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
        //$id = ['S15'];
        $id = [];

        $attendances = RawAttendance::query()
            ->where('access_date',today())
            ->whereIn('registration_id',$id)
            ->where('sms_sent',NULL)
            ->get();

        foreach($attendances as $attn){

            $student = Student::query()->where('studentId',$id)->first();

            $msg = 'Dear Parent, your ward ('.$student->studentId.') entry time is '.$attn->access_time->format('Y-m-d H:i:s');
            $this->send($student,$msg);

//            if($attn->attendance_status_id == 1){ //Present
//                $msg = 'Dear Parent, your ward entry time is '.$attn->access_time->format('Y-m-d H:i:s');
//                $this->send($student,$msg);
//            }elseif($attn->attendance_status_id == 2){ //Absent
//                $msg = 'Dear Parent, you ward is absent without any prior notice.';
//                $this->send($student,$msg);
//            }elseif($attn->attendance_status_id == 3){ // Late
//                $msg = 'Dear Parent, your ward is late, his entry time is '.$attn->access_time->format('Y-m-d H:i:s');
//                $this->send($student,$msg);
//            }elseif($attn->attendance_status_id == 7){ // In Leave
//                $msg = 'Dear Parent, your ward is in leave.';
//                $this->send($student,$msg);
//            }

            $attn->update(['sms_sent'=>1]);

        }

        return 0;
    }

    public function send($student,$msg)
    {
        $url = "https://a2p.solutionsclan.com/api/sms/send";
        $data = [
            "apiKey" => smsConfig('api_key'),
            "contactNumbers" => $student->mobile,
            "senderId" => smsConfig('sender_id'),
            "textBody" => $msg
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
    }
}
