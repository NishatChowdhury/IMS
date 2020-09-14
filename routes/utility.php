<?php

use App\AcademicClass;
use App\ExamResult;
use App\Grade;
use App\Mark;
use App\RawAttendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

Route::get('migrate',function(){
    Artisan::call('migrate');
    dd('migration complete');
});
Route::get('reboot',function(){
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    dd('all cleared');
});

Route::get('process-attendances',function(){
    $start = Carbon::today()->startOfDay();
    $end = Carbon::today()->endOfDay();
    $raw = RawAttendance::query()->whereBetween('access_date',[$start,$end])->get();
    foreach($raw as $attendance){
        dd($attendance);
    }
});

Route::get('download-raw-attendances',function(){
    date_default_timezone_set('Asia/Dhaka');

    $data2=array(
        "get_log"=>array(
//            "user_name" => "akschool",
            "operation" => env('STELLAR_OPERATION',''),
            "user_name" => env('STELLAR_USERNAME',''),
//            "auth"=>"3rfd237cefa924564a362ceafd99633", //akschool
            "auth" => env('STELLAR_AUTH',''), //cambrian
            "access_id" => env('STELLAR_ACCESS_ID',''),
            "log" => array(
                "date1"=>date('Y-m-d'),
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

        $isExists = RawAttendance::query()->where('access_id',$row->access_id)->exists();

        if(!$isExists){
            $attendance = new \App\RawAttendance();
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

    dd('data saved successfully');
});

Route::get('download-attendances',function(){

    date_default_timezone_set('Asia/Dhaka');

    $data = [
        "operation" => env('STELLAR_OPERATION',''),
        "user_name" => env('STELLAR_USERNAME',''),
        "auth_code" => env('STELLAR_AUTH_CODE',''),
        "start_date" => Carbon::today()->format('Y-m-d'),
        "end_date" => Carbon::today()->format('Y-m-d'),
        "start_time" => Carbon::createFromTime(00,00,00)->format('H:i:s'),
        "end_time" => Carbon::createFromTime(23,59,59)->format('H:i:s'),
        "access_id" => env('STELLAR_ACCESS_ID',''),
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

    //dd($data);
    //dd($result);

    dd($getvalue->log);

    foreach($getvalue->log as $row){

        ini_set('max_execution_time',30);

        $attendance = new \App\RawAttendance();
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
    $marks = \App\FinalResult::query()->get();

    foreach($marks as $mark){
        $student = Student::query()->findOrFail($mark->student_id);
        $mark->update(['section_id'=>$student->section_id]);
    }
    dd('section id synced');
});

Route::get('sync-group',function(){
    $marks = \App\FinalResult::query()->get();

    foreach($marks as $mark){
        $student = Student::query()->findOrFail($mark->student_id);
        $mark->update(['group_id'=>$student->group_id]);
    }
    dd('group id synced');
});

Route::get('upload-csv','ExamController@upload');
Route::get('bulk-upload-csv','ExamController@bulkUpload');

Route::post('upload-file','ExamController@file');
Route::post('bulk-upload-file','ExamController@bulkFile');

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

    $marks = \App\FinalMark::query()
        ->where('session_id',$sessionId)
        //->where('exam_id',$examId)
        ->where('class_id',$classId)
        //->where('section_id',$sectionId)
        //->where('group_id',$groupId)
        ->get()
        ->groupBy('student_id');

    foreach($marks as $student => $mark){
        $isFail = \App\FinalMark::query()
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

        $result = \App\FinalResult::query()
            ->where('session_id',$sessionId)
            //->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$data['student_id'])
            ->first();

        if($result != null){
            $result->update($data);
        }else{
            \App\FinalResult::query()->create($data);
        }
    }

    /* update exam rank start */
    $results = \App\FinalResult::query()
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
        $schedule = \App\ExamSchedule::query()->where('exam_id',$mark->exam_id)->where('subject_id',$mark->subject_id)->first();
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
