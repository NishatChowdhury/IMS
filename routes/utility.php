<?php

use App\Models\Backend\AcademicClass;
use App\Models\Backend\AppliedStudent;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Attendance;
use App\Models\Backend\AttendanceTeacher;
use App\Models\Backend\ExamResult;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\FinalMark;
use App\Models\Backend\FinalResult;
use App\Models\Backend\Grade;
use App\Models\Backend\Holiday;
use App\Models\Backend\Mark;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Religion;
use App\Models\Backend\Shift;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\StudentLeave;
use App\Models\Backend\Transport;
use App\Models\Backend\weeklyOff;
use App\Models\Diary;
use App\Models\Frontend\BloodGroup;
use App\Models\Frontend\Gender;
use App\Models\LocationStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\ExamAndResult\Http\Controllers\ExamController;


Route::get('system/migrate',function(){
    Artisan::call('migrate');
    dd('migration complete');
});

Route::get('system/storage-link',function(){
    Artisan::call('storage:link');
    dd('storage complete');
});

Route::get('system/migrate-refresh',function(){
    Artisan::call('migrate:fresh --seed');
    dd('migration refresh complete');
});

Route::get('system/reboot',function(){
    Artisan::call('optimize');
    Artisan::call('optimize:clear');
    dd('all cleared');
});

Route::get('system/symlink',function(){
    Artisan::call('storage:link');
    dd('done');
});

Route::get('process-attendances',function(){
    $start = Carbon::today()->startOfDay();
    $end = Carbon::today()->endOfDay();
    $raw = RawAttendance::query()->whereBetween('access_date',[$start,$end])->get();
    foreach($raw as $attendance){
        dd($attendance);
    }
});

Route::get('t', function(){
    $allstudent = LocationStudent::query()
        ->whereNotIn('direction', [0])
        ->get();

    foreach ($allstudent as $key => $stu){

        $endD = $stu->ending_date != null ? Carbon::parse($stu->ending_date) : null;
        $s = Carbon::parse($stu->starting_date);
        $c = Carbon::now();

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

        $checkTransport = Transport::query()
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
                $checkTransport1 = Transport::create([
                    'location_id' => $stu->location_id,
                    'student_academic_id' => $stu->student_academic_id,
                    'student_id' => $stu->studentAcademic->student->id,
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

    return dd('done');
});

Route::get('a-s', function(){
    dd('nothing');
    // the joob is done
//    return AttendanceStatus::all();
//   Schema::table('attendance_statuses', function (Blueprint $table) {
//            $data = [
//                ['name'=>'Present','code'=>'P'],
//                ['name'=>'Absent','code'=>'A'],
//                ['name'=>'Late','code'=>'L'],
//                ['name'=>'Early Leave','code'=>'E'],
//                ['name'=>'Holiday','code'=>'H'],
//                ['name'=>'Weekly Off','code'=>'W'],
//                ['name'=>'Leave','code'=>'Le'],
//                ['name'=>'Late & Early Leave','code'=>'LRE'],
//            ];
//
//            foreach ($data as $d){
//                AttendanceStatus::query()->create($d);
//            }
//        });
});


Route::get('update-attendance/{d}', function ($d){



    $todayCount = Carbon::parse($d);
    $today = Carbon::parse($d)->format('Y-m-d');
////      $today = \Carbon\Carbon::today()->format('Y-m-d');
//        $todayCount = \Carbon\Carbon::today();
//    return $today->format('N');

    $students = Student::query()->get();

    foreach ($students as $key => $student) {

        $rawData = RawAttendance::query()
            ->where('access_date', $today)
            ->where('registration_id', $student->studentId)
            ->get();

        if ($rawData->isEmpty()) {

            $min = null;
            $max = null;

            $leave = StudentLeave::query()
                ->where('student_id', $student->id)
                ->where('date', '=', $today)
                ->exists();
//       return         $weeklyOff = weeklyOff::where('id', 1)->first();
            $weeklyOff = weeklyOff::where('show_option', $todayCount->format('N'))->first();
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
        } else {
            $min = $rawData->min('access_time');
            $max = $rawData->max('access_time');

            $shift = Shift::query()->first();
            $shiftIn = Carbon::parse($shift->start)->addMinutes($shift->grace);
            $shiftOut = Carbon::parse($shift->end)->subMinutes($shift->grace);

            if ($min >= $shiftIn && $max <= $shiftOut) {
                $attendanceStatus = '8'; // Late & Early Leave
            } elseif ($min <= $shiftIn && $max <= $shiftOut) {
                $attendanceStatus = '4'; // Early Leave
            } elseif ($min <= $shiftIn) {
                $attendanceStatus = '1';  // Present
            } elseif ($min > $shiftIn) {
                $attendanceStatus = '3'; // Late
            }


        }

        $data = [
            'student_academic_id' => $student->studentAcademic->id ?? 0,
            'date' => $today,
            'in_time' => $min,
            'out_time' => $max,
            'attendance_status_id' => $attendanceStatus,
        ];


        $attendanceExists = Attendance::query()
            ->where('student_academic_id', $student->studentAcademic->id ?? 0)
            ->where('date', $today)
            ->exists();


        if ($attendanceExists) {
            $attendance = Attendance::query()
                ->where('student_academic_id', $student->studentAcademic->id ?? 0)
                ->where('date', $today)
                ->first();
            $attendance->update($data);
        } else {
            Attendance::create($data);
        }


    }

    dd('done');


//        dd('done');


});

Route::get('u-a-t/{d}', function ($d){


    $todayCount =  Carbon::parse($d);
    $today =  Carbon::parse($d)->format('Y-m-d');
//        $today = \Carbon\Carbon::today()->format('Y-m-d');
//        $todayCount = \Carbon\Carbon::today();
//    return $today->format('N');

    $staffs = Staff::query()->where('staff_type_id', 2)->get();

    foreach ($staffs as $key => $staff){

        $rawData = RawAttendance::query()
            ->where('access_date', $today)
            ->where('registration_id', $staff->card_id)
            ->get();

        if ($rawData->isEmpty()) {
            $min = null;
            $max = null;
        }else{
            $min = $rawData->min('access_time');
            $max = $rawData->max('access_time');
        }

        $shift = Shift::query()->find($staff->shift_id);
        $shiftIn =  Carbon::parse($shift->start)->addMinutes($shift->grace);
        $shiftOut = Carbon::parse($shift->end)->subMinutes($shift->grace);

        $leave = null;
        $weeklyOff = weeklyOff::query()->where('show_option', $todayCount->format('N'))->first();
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
        } elseif ($min >= $shiftIn && $max <= $shiftOut){
            $attendanceStatus = '8'; // Late & Early Leave
        }elseif ($min <= $shiftIn && $max <= $shiftOut) {
            $attendanceStatus = '4'; // Early Leave
        } elseif ($min <= $shiftIn) {
            $attendanceStatus = '1';  // Present
        } elseif ($min > $shiftIn) {
            $attendanceStatus = '3'; // Late
        }else {
            $attendanceStatus = '2'; // Absent
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
            AttendanceTeacher::create($data);
        }



    }
    dd('done');





});


Route::get('r-l', function(){
    $route_name = [];
    foreach (Route::getRoutes()->getRoutes() as $route) {
        $action = $route->getAction();
//           $action = $route->getName();
        if (array_key_exists('as', $action)) {
            $route_name[] = $action['as'];
        }
//                $route_name[] = $action;
    }
    return $route_name;

    return $data = json_encode($route_name);

    return in_array('generated', $route_name);
    $getaName = [];
    foreach ($route_name as $key => $n){
//        return $n;
        if (array_key_exists('journals.index', $route_name)) {
//             $getaName[] = $route_name;
            dd('ace');
        }else{
            dd('ney');
        }
    }

    return $getaName;



});

Route::get('download-raw-attendances',function(){

//   return Attendance::query()->get();

    $startDate=today()->subWeek();
    $startDate=$startDate->format('Y-m-d');
    $endDate = today();
    $endDate = $endDate->format('Y-m-d');
    $accessId = "00000000";

    $data = array(
        "operation" => "fetch_log",
        "auth_user" => "bnsck",
        "auth_code" => "3efd234cefa324567a342deafd32672",
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

//        $isExists = RawAttendance::query()->where('access_id',$row->access_id)->exists();

//        if(!$isExists){
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
        $attendance->save();
//        }
    }

    dd('data saved successfully');
});


Route::get('database-backup', function(){
    $data = Artisan::call('db:backup');

    dd($data);
});

Route::get('getdata-attendance', function(){
    $students = Student::query()->where('status',1)->get();

    $today = Carbon::today()->format('Y-m-d');
    foreach($students as $student){
        $isExist = RawAttendance::query()
            ->where('registration_id',$student->studentId)
            ->where('access_date','like','%'.$today.'%')
            ->get();
//            return $isExist;
        if($isExist){
//                dd('hey');
            $date = RawAttendance::query()
                ->where('registration_id',$student->studentId)
                ->get()
                ->groupBy('access_date');
            foreach($date as $attendances){
                foreach($attendances as $attendance){
                    $min = $attendances->min('access_time');
                    $max = $attendances->max('access_time');
                    $hasAttendance = Attendance::query()->where('student_id',$student->id)->where('date',$attendance->access_date)->first();
                    $data = [
                        'registration_id' => $attendance->registration_id,
                        'access_id' => $attendance->access_id,
                        'card' => $attendance->card,
                        'unit_name' => $attendance->unit_name,
                        'student_id' => $student->id,
                        'staff_id' => null,
                        'date' => $attendance->access_date,
                        'entry' => $min,
                        'exit' => $max,
                        'late' => 0,
                        'early' => 0,
                        'status' => 'P',
//                            'sms_sent' => 0,
                    ];

                    if($hasAttendance == null){
                        Attendance::query()->create($data);
//                            $attendance->update(['processed'=>1]);
                    }else{
                        //$hasAttendance->update($data);// TODO: fixed// it after showing demo. compare edit time with existing time.
//                            $attendance->update(['processed'=>1]);
                    }
                    //dd(!$hasAttendance);
                }
                //dd('$max');
            }
        }else{

            $hasAttendance = Attendance::query()->where('student_id',$student->id)->where('date','like','%'.$today.'%')->first();

            $data = [
                'registration_id' => $student->studentId,
                'access_id' => null,
                'card' => null,
                'unit_name' => 'demo',
                'student_id' => $student->id,
                'staff_id' => null,
                'date' => $today,
                'entry' => 0,
                'exit' => 0,
                'late' => 0,
                'early' => 0,
                'status' => "A",
//                    'sms_sent' => 0,
            ];

            if($hasAttendance == null){
                Attendance::query()->create($data);
                //$attendance->update(['processed'=>1]);
            }else{
                $hasAttendance->update($data);
                //$attendance->update(['processed'=>1]);
            }

            //Attendance::query()->create($data);
        }
    }
    //dd('one');
    return 0;
});

Route::get('c-p/{id}', function ($id){
//    return $id;
    $data = [
        'title' => 'Welcome to IMS',
        'date' => date('m/d/Y')
    ];



    $result = ExamResult::query()->with('studentAcademic')->findOrFail($id);

    $subjectCount = ExamSchedule::query()
        ->where('exam_id', $result->exam_id)
        ->where('academic_class_id', $result->studentAcademic->academic_class_id)
        ->count('subject_id');

    $marks = Mark::query()
        ->where('student_id',$result->studentAcademic->id) //student_id == student academic id
        ->where('exam_id',$result->exam_id)
//            ->where('student_academic_id',$result->studentAcademic->id)
        ->join('subjects','subjects.id','=','marks.subject_id')
        ->select('marks.*','subjects.level')
        ->orderBy('level')
        ->get();
//         $logo = siteConfig('logo');
    $logo = '5.jpg';
    $pdf = PDF::loadView('resultPdf', compact('result','marks','logo','subjectCount'));
    return $pdf->download('invoice.pdf');
    return view('resultPdf',compact('result','marks','logo','subjectCount'));









});

Route::get('download-attendances',function(){

    date_default_timezone_set('Asia/Dhaka');

    $data = [
        "operation" => env('STELLAR_OPERATION','fetch_log'),
        "user_name" => env('STELLAR_USERNAME','cgs'),
        "auth_code" => env('STELLAR_AUTH_CODE','3efd234cefa324567a342deafd32672'),
        "start_date" => Carbon::today()->format('2020-11-01'),
        "end_date" => Carbon::today()->format('2020-11-30'),
        "start_time" => Carbon::createFromTime(00,00,00)->format('H:i:s'),
        "end_time" => Carbon::createFromTime(23,59,59)->format('H:i:s'),
        //"access_id" => env('STELLAR_ACCESS_ID',''),
    ];

    $datapayload = json_encode($data);

    $api_request = curl_init('https://rumytechnologies.com/rams/json_api');
    curl_setopt($api_request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($api_request, CURLINFO_HEADER_OUT, true);
    curl_setopt($api_request, CURLOPT_POST, true);
    curl_setopt($api_request, CURLOPT_POSTFIELDS, $datapayload);
    curl_setopt($api_request, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'Content-Length: ' . strlen($datapayload))
    );
    $result = curl_exec($api_request);
    //$replace_syntax = str_replace('{"log":',"",$result);

    $getvalue = json_decode($result);

    dd($getvalue);
    //dd($result);

    dd($getvalue->log);

    foreach($getvalue->log as $row){

        ini_set('max_execution_time',30);

        $attendance = new RawAttendance();
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
    dd('data saved successfully');

});

Route::get('test-download',function(){
    Artisan::call('CronJob:DownloadAttendances');
});

Route::get('system/test-attendance-sms',function(){
    Artisan::call('CronJob:AttendanceSMS');
});

Route::get('test-absent-sms',function(){
    Artisan::call('CronJob:AbsentSMS');
});

Route::get('test-generate-attendance',function(){
    Artisan::call('CronJob:GenerateAttendances');
});

Route::get('rename-pic',function(){
    $students = Student::query()->where('class_id',3)->get();
    foreach($students as $student){
        $session = $student->session_id;
        $class = $student->class_id;
        $file = $student->studentId;
        $isExist = Storage::disk('local')->exists('Shisu/'.$student->rank.'.jpg');
        if($isExist){
            $isDuplicate = Storage::disk('local')->exists('std/students/'.$session.'/'.$class.'/'.$file.'.jpg');
            if(!$isDuplicate){
                Storage::copy('Shisu/'.$student->rank.'.jpg', 'std/students/'.$session.'/'.$class.'/'.$file.'.jpg');
            }
        }
    }
});

Route::get('sync-image-name',function(){
    $students = Student::query()->get();
    foreach($students as $student){
        $id = $student->studentId;
        $student->update(['image'=>$id.'.jpg']);
    }
    dd('sync complete '.date('ymd'));
});

Route::get('add-zero-to-number',function (){
    $students = Student::query()->get();
    foreach($students as $student){
        $number = $student->mobile;
        $firstLetter = substr($number,0,1);
        if($firstLetter != 0){
            $student->update(['mobile'=>'0'.$number]);
        }
    }
    dd('sync complete '.date('ymd'));
});

Route::get('delete-duplicate',function(){ //delete duplicate student from student database
    $students = Student::all();
    foreach($students as $student){
        $s = Student::query()->where('studentId',$student->studentId)->count();
        if($s > 1){
            $student->delete();
        }
    }
});

Route::get('marks-student_id',function(){ //update student_id in marks table
    $marks = Mark::query()->where('student_id',0)->get();
    foreach($marks as $mark){
        $studentId = $mark->studentId;
        $student = Student::query()->where('studentId',$studentId)->first();
        $id = $student ? $student->id : null;
        $mark->update(['student_id'=>$id]);
    }
    dd('student id updated');
});

Route::get('total-marks',function(){ //addition of all type of exam in total_mark, grade & gpa
    $marks = Mark::query()
        //->where('total_mark',0)
        ->where('exam_id',4)
        ->where('class_id',8)
        ->where('section_id',5)
        //->where('student_id',128)
        //->where('subject_id',27)
        ->get();

    foreach ($marks as $mark){
        $objective = $mark->objective;
        $written = $mark->written;
        $practical = $mark->practical;
        $viva = $mark->viva;
        $totalMark = $objective + $written + $practical + $viva;

        $total = ($totalMark * 100)/$mark->full_mark;

        $grade = Grade::query()
            ->where('system',1)
            ->where('mark_from','<=',(int)$total)
            ->where('mark_to','>=',(int)$total)
            ->first();

        $mark->update(['total_mark'=>$totalMark,'gpa'=>$grade->point_from,'grade'=>$grade->grade]);
    }
    dd('total added');
});

Route::get('generate-exam-result',function(){ //generate exam result from marks table
    $sessionId = 2;
    $examId = 4;
    $classId = 1;

    $subjectCount = Mark::query()
        ->where('session_id',$sessionId)
        ->where('exam_id',$examId)
        ->where('class_id',$classId)
        ->get()
        ->groupBy('subject_id')
        ->count();

    $marks = Mark::query()
        ->where('session_id',$sessionId)
        ->where('exam_id',$examId)
        ->where('class_id',$classId)
        ->get()
        ->groupBy('student_id');

    //dd($marks);
    foreach($marks as $student => $mark){
        $isFail = Mark::query()
            ->where('session_id',$sessionId)
            ->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$student)
            ->where('grade','F')
            ->exists();
        $data['session_id'] = $sessionId;
        $data['exam_id'] = $examId;
        $data['class_id'] = $classId;
        $data['student_id'] = $mark->first()->student_id;
        $data['total_mark'] = $mark->sum('total_mark');
        $data['gpa'] = $isFail ? 0 : $mark->sum('gpa') / $subjectCount;
        $grade = Grade::query()
            ->where('point_from','<=',$mark->sum('gpa') / $subjectCount)
            ->where('point_to','>=',$mark->sum('gpa') / $subjectCount)
            ->first();
        $data['grade'] = $isFail ? 'F' : $grade->grade;
        $data['rank'] = null;

        $result = ExamResult::query()
            ->where('session_id',$sessionId)
            ->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$data['student_id'])
            ->first();

        if($result != null){
            $result->update($data);
        }else{
            ExamResult::query()->create($data);
        }
    }

    /* update exam rank start */
    $results = ExamResult::query()
        ->where('session_id',$sessionId)
        ->where('exam_id',$examId)
        ->where('class_id',$classId)
        ->where('grade','<>','F')
        ->orderByDesc('total_mark')
        ->get();

    foreach($results as $key => $result){
        $rank = $key + 1;
        $result->update(['rank'=>$rank]);
    }
    /* update exam rank end */

    dd('result has been generated!');
});

Route::get('sync-sec',function(){
    $marks = FinalResult::query()->get();

    foreach($marks as $mark){
        $student = Student::query()->findOrFail($mark->student_id);
        $mark->update(['section_id'=>$student->section_id]);
    }
    dd('section id synced');
});

Route::get('sync-group',function(){
    $marks = FinalResult::query()->get();

    foreach($marks as $mark){
        $student = Student::query()->findOrFail($mark->student_id);
        $mark->update(['group_id'=>$student->group_id]);
    }
    dd('group id synced');
});

Route::get('upload-csv',[ExamController::class,'upload']);
Route::get('bulk-upload-csv',[ExamController::class,'bulkUpload']);

Route::post('upload-file',[ExamController::class,'file']);
Route::post('bulk-upload-file',[ExamController::class,'bulkFile']);

Route::get('calc-final-result',function(){
    $sessionId = 2;
    //$examId = 4;
    $classId = 11;
    //$sectionId = 1;
    //$groupId = null;

//    $subjectCount = Mark::query()
//        ->where('session_id',$sessionId)
//        ->where('exam_id',$examId)
//        ->where('class_id',$classId)
//        ->get()
//        ->groupBy('subject_id')
//        ->count();

    if($classId == 1){
        $subjectCount = 5;
    }elseif($classId == 2){
        $subjectCount = 6;
    }elseif($classId == 3){
        $subjectCount = 7;
    }elseif($classId == 4){
        $subjectCount = 7;
    }elseif($classId == 5){
        $subjectCount = 9;
    }elseif($classId == 6){
        $subjectCount = 8;
    }elseif($classId == 7){
        $subjectCount = 6;
    }elseif($classId == 8){
        $subjectCount = 9;
    }elseif($classId == 9){
        $subjectCount = 9;
    }elseif($classId == 10){
        $subjectCount = 7;
    }elseif($classId == 11){
        $subjectCount = 11;
    }else{
        $subjectCount = 11;
    }

    $marks = FinalMark::query()
        ->where('session_id',$sessionId)
        //->where('exam_id',$examId)
        ->where('class_id',$classId)
        //->where('section_id',$sectionId)
        //->where('group_id',$groupId)
        ->get()
        ->groupBy('student_id');

    foreach($marks as $student => $mark){
        $isFail = FinalMark::query()
            ->where('session_id',$sessionId)
            //->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$student)
            ->where('grade','F')
            ->exists();


        $data['session_id'] = $sessionId;
        //$data['exam_id'] = $examId;
        $data['class_id'] = $classId;
        $data['student_id'] = $mark->first()->student_id;
        $data['total_mark'] = $mark->sum('total_mark');

        $optional = Student::query()->findOrFail($student)->subject_id;
        $optionalMark = $mark->where('subject_id',$optional)->first()->gpa ?? 0;

        $data['gpa'] = $isFail ? 0 : $mark->sum('gpa') / $subjectCount;

        $grade = Grade::query()
            ->where('system',2)
            ->where('point_from','<=',$mark->sum('gpa') / $subjectCount)
            ->where('point_to','>=',$mark->sum('gpa') / $subjectCount)
            ->first();

        if($optionalMark >= 2){
            $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') - 2) / $subjectCount;

            $data['total_mark'] = $mark->sum('total_mark') - 40;

            $grade = Grade::query()
                ->where('system',2)
                ->where('point_from','<=',$data['gpa'])
                ->where('point_to','>=',$data['gpa'])
                ->first();
        }

        if($grade){
            $data['grade'] = $isFail ? 'F' : $grade->grade;
        }else{
            $data['grade'] = null;
        }
        $data['rank'] = null;

        $result = FinalResult::query()
            ->where('session_id',$sessionId)
            //->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$data['student_id'])
            ->first();

        if($result != null){
            $result->update($data);
        }else{
            FinalResult::query()->create($data);
        }
    }

    /* update exam rank start */
    $results = FinalResult::query()
        ->where('session_id',$sessionId)
        //->where('exam_id',$examId)
        ->where('class_id',$classId)
        //->where('section_id',$sectionId)
        //->where('group_id',$groupId)
        //->where('grade','<>','F')
        ->orderByDesc('gpa')
        ->orderByDesc('total_mark')
        ->get();

    //dd($results);

    foreach($results as $key => $result){
        $rank = $key + 1;
        $result->update(['rank'=>$rank]);
    }
    /* update exam rank end */

});

Route::get('sync-academic-class-id-marks',function(){
    $students = Mark::query()->get();
    foreach($students as $student){
        $id = Student::query()
            ->findOrFail($student->student_id);
        //->where('session_id',$student->session_id)
        //->where('class_id',$student->class_id)
        //->where('section_id',$student->section_id)
        //->where('group_id',$student->group_id)
        //->first();

        $student->update(['academic_class_id'=>$id->academic_class_id]);
    }
});

Route::get('sync-academic-class-id-results',function(){
    $students = ExamResult::query()->get();
    foreach($students as $student){
        $id = AcademicClass::query()
            ->where('session_id',$student->session_id)
            ->where('class_id',$student->class_id)
            ->where('section_id',$student->section_id)
            ->where('group_id',$student->group_id)
            ->first();

        $student->update(['academic_class_id'=>$id->id]);
    }
});

Route::get('sync-academic-class-id',function(){
    $students = Student::query()->get();
    foreach($students as $student){
        $id = AcademicClass::query()
            ->where('session_id',$student->session_id)
            ->where('class_id',$student->class_id)
            ->where('section_id',$student->section_id)
            ->where('group_id',$student->group_id)
            ->first();

        $student->update(['academic_class_id'=>$id->id]);
    }
});

Route::get('sync-image-name',function(){
    $students = Student::query()->get();
    foreach($students as $student){
        $image = $student->studentId.'.jpg';
        $student->update(['image'=>$image]);
    }
    dd('sync complete');
});

Route::get('sync-exam-full-mark',function(){
    $marks = Mark::query()->get();

    foreach($marks as $mark){
        $schedule = ExamSchedule::query()->where('exam_id',$mark->exam_id)->where('subject_id',$mark->subject_id)->first();
        $full = $schedule->objective_full + $schedule->written_full + $schedule->practical_full + $schedule->viva_full;
        $mark->update(['full_mark'=>$full]);
    }

    dd('data synced successfully!');
});

Route::get('sync-fake-attn',function(){
    $students = Student::query()->where('academic_class_id',5)->get();
    $attendances = RawAttendance::query()->where('access_date','like','%2020-03-16%')->get();
    foreach($students as $key => $student){
        foreach($attendances as $lee => $attendance){
            if($lee == $key){
                $attendance->update(['registration_id'=>$student->studentId]);
            }
        }
    }
    dd('done. please, check');
});

Route::get('change-duplicate-id',function(){
    $studentId = AppliedStudent::query()->get('studentId')->toArray();
    //dd($studentId);
    foreach($studentId as $id){
        $appliedStudent = AppliedStudent::query()->where('studentId',$id)->get();
        if($appliedStudent->count() > 1){
            dd($appliedStudent);
        }
    }
});

Route::get('upload-students',function(){
    return view('utilities.upload-students');
});
Route::post('upload-student-csv',function(Request $request){
    $file = file($request->file('file'));
    $sl = 0;
    //dd($file);
    foreach($file as $row){

        if ($sl!=0){

            $col = explode(',',$row);

            $nextStudentID = Student::query()->max('id')+1;
            $genderId = Gender::query()->where('name',$col[12])->first()->id ?? null;
            $bloodGroupId = BloodGroup::query()->where('name',$col[15])->first()->id ?? null;
            $religionId = Religion::query()->where('name',$col[16])->first()->id ?? null;

            $data['id'] = $col[0];
            $data['name'] = $col[1];
            $data['studentId'] = 'S'.$nextStudentID;
            $data['academic_class_id'] = AcademicClass::query()->where('session_id',$col[4])->where('class_id',$col[5])->first()->id;
            $data['session_id'] = $col[4];
            $data['class_id'] = $col[5];
            $data['section_id'] = null;
            //$data['section_id'] = $col[6];
            $data['group_id'] = $col[7];
            $data['rank'] = $col[8];
            $data['subject_id'] = null;
            $data['father'] = $col[10];
            $data['mother'] = $col[11];
            $data['gender_id'] = $genderId;
            $data['mobile'] = $col[13];
            $data['dob'] = $col[14];
            $data['blood_group_id'] = $bloodGroupId;
            $data['religion_id'] = $religionId;
            $data['image'] = $col[17];
            $data['address'] = $col[18];
            $data['area'] = $col[19];
            $data['zip'] = $col[20];
            $data['city_id'] = null;
            $data['country_id'] = null;
            $data['email'] = $col[23];
            $data['father_mobile'] = '0'.$col[24];
            $data['mother_mobile'] = '0'.(int)$col[25];
            $data['notification_type_id'] = null;
            $data['status'] = 1;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            $isExist = Student::query()
                ->where('session_id',$data['session_id'])
                ->where('class_id',$data['class_id'])
                ->where('section_id',$data['section_id'])
                ->where('rank',$data['rank'])
                ->first();

            if($isExist){
                $isExist->update($data);
            }else{
                Student::query()->create($data);
            }

        }

        $sl++;

    }

    Session::flash('success','Data inserted!');

    return redirect()->back();
});

Route::get('sync-studentId',function(){
    $students = Student::query()->get();
    foreach($students as $student){
        $id = $student->id;
        $student->update(['studentId'=>'S2020'.str_pad($id,5,'0',STR_PAD_LEFT)]);
    }
});

Route::get('system/copy-student-to-student-login',function(){
    $students = Student::query()->get();
    foreach($students as $student){
        $data = [
            'name' => $student->name,
            'student_id' => $student->id,
            'studentId' => $student->studentId,
            'password' => bcrypt('student123'),
        ];

        $isExist = StudentLogin::query()->where('student_id',$student->id)->exists();

        if(!$isExist){
            StudentLogin::query()->create($data);
        }
    }
    dd('data copied');
});

Route::get('system/copy-subjects-to-students-from-applied-students',function(){
    $appliedStudents = AppliedStudent::query()->get();

    foreach ($appliedStudents as $student){
        $s = Student::query()->where('studentId',$student->studentId)->first();
        if($s != null){
            $s->update(['subjects'=>$student->subjects]);
        }
    }

    dd('Subjects Copied!');
});

Route::get('system/copy-ssc-info-to-students-from-applied-students',function(){
    $appliedStudents = AppliedStudent::query()->get();

    foreach ($appliedStudents as $student){
        $s = Student::query()->where('studentId',$student->studentId)->first();
        if($s != null){
            $s->update([
                'ssc_roll' => $student->ssc_roll,
                'ssc_registration' => $student->ssc_registration,
                'ssc_session' => $student->ssc_session,
                'ssc_year' => $student->ssc_year,
                'ssc_board' => $student->ssc_board
            ]);
        }
    }

    dd('Student information copied!');
});

/**
 * Generate random school diaries
 */
Route::get('generate-diary',function(){
    $classes = AcademicClass::query()->with('subjects')->get();
    $today = today();
    foreach ($classes as $class){
        $subjects = $class->subjects;
        foreach ($subjects as $subject){
            $data = [
                'academic_class_id' => $class->id,
                'date' => $today,
                'teacher_id' => rand(1,20),
                'subject_id' => $subject->id,
                'description' => Str::random(100),
            ];
            $diary = Diary::query()
                ->where('subject_id',$subject->id)
                ->where('date',$today)
                ->first();

            if($diary){
                $diary->update($data);
            }else{
                Diary::query()->create($data);
            }
        }
    }

});

/**
 * Store random data in raw_attendances table
 */
Route::get('store-raw-attendance',function(){
    $students = Student::query()->pluck('studentId');
    $staffs = Staff::query()->pluck('card_id');
    $card_number = $students->concat($staffs);

    $period = CarbonPeriod::create('2022-10-01', '2022-10-31');

    foreach ($period as $date){
        foreach ($card_number as $row){
            $ifExists = RawAttendance::query()
                ->where('registration_id',$row)
                ->where('access_date',$date->format('Y-m-d'))
                ->exists();

            $h = $ifExists ? rand(3,5) : rand(9,10);
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
                'access_date' => $date->format('Y-m-d'),
                'access_time' => Carbon::createFromTime($h,$i,$s)->format('H:i:s'),
            ];

            RawAttendance::query()->create($data);
        }
    }
});

Route::get('generate-attendance',function(){
    //$today = Carbon::today()->format('Y-m-d');
    $today = Carbon::createFromDate(2022,10,01);
    $todayCount = Carbon::today();
//        $d = '2022-06-20';
//        $todayCount = Carbon::parse($d);
//        $today = Carbon::parse($d)->format('Y-m-d');

    $students = Student::query()->where('studentId','S114')->get();

    foreach ($students as $key => $student) {

        $rawData = RawAttendance::query()
            ->where('access_date', $today->format('Y-m-d'))
            ->where('registration_id', $student->studentId)
//            ->where('registration_id', 'S114')
            ->get();

        if ($rawData->isEmpty()) {

            $min = null;
            $max = null;

            $leave = StudentLeave::query()
                ->where('student_id', $student->id)
                ->where('date', '=', $today)
                ->exists();
//       return         $weeklyOff = weeklyOff::where('id', 1)->first();
            $weeklyOff = weeklyOff::where('show_option', $todayCount->format('N'))->first();
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
        } else {
            $min = $rawData->min('access_time');
            $max = $rawData->max('access_time');

            $shift = Shift::query()->first();
            $shiftIn = Carbon::parse($shift->start)->addMinutes($shift->grace);
            $shiftOut = Carbon::parse($shift->end)->subMinutes($shift->grace);

            if ($min >= $shiftIn && $max <= $shiftOut) {
                $attendanceStatus = '8'; // Late & Early Leave
            } elseif ($min <= $shiftIn && $max <= $shiftOut) {
                $attendanceStatus = '4'; // Early Leave
            } elseif ($min <= $shiftIn) {
                $attendanceStatus = '1';  // Present
            } elseif ($min > $shiftIn) {
                $attendanceStatus = '3'; // Late
            }
        }

        $data = [
            'student_academic_id' => $student->studentAcademic->id ?? 0,
            'date' => $today,
            'in_time' => $min,
            'out_time' => $max,
            'attendance_status_id' => $attendanceStatus,
        ];

        $attendanceExists = Attendance::query()
            ->where('student_academic_id', $student->studentAcademic->id ?? 0)
            ->where('date', $today->format('Y-m-d'))
            ->exists();

        if ($attendanceExists) {
            $attendance = Attendance::query()
                ->where('student_academic_id', $student->studentAcademic->id ?? 0)
                ->where('date', $today->format('Y-m-d'))
                ->first();
            $attendance->update($data);
        } else {
            Attendance::query()->create($data);
        }

    }

});
