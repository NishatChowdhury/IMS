<?php

use App\AcademicClass;
use App\Grade;
use App\Student;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/** Dashboard Routes */
Route::get('dashboard','DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'DashboardController@index')->name('home');

/** User Routes start */
Route::get('user/profile','UserController@profile');
Route::patch('user/update','UserController@update');
Route::patch('user/password','UserController@password');
/** User Routes end */

/*
  ==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'FrontController@index');
//Route::get('/', 'IdCardController@custom_staffPdf');

//Institute -> About
Route::get('/introduction','FrontController@introduction');
Route::get('/governing-body','FrontController@governing_body');
Route::get('/founder-n-donor','FrontController@donor');

//Institute -> Administrative message
Route::get('/president','FrontController@president');
Route::get('/principal','FrontController@principal');

//Institute-> Infrastructure
Route::get('/building-room','FrontController@building_room');
Route::get('/library','FrontController@library');
Route::get('/transport','FrontController@transport');
Route::get('/hostel','FrontController@hostel');
Route::get('/land-information','FrontController@land_information');

//Institute -> Academic
Route::get('/class-routine','FrontController@class_routine');
Route::get('/calender','FrontController@calender');
Route::get('/syllabus','FrontController@syllabus');
Route::get('/diary','FrontController@diary');
Route::get('/performance','FrontController@performance');
Route::get('/holiday','FrontController@holiday');

//Institute -> Digital Campus
Route::get('/multimedia-classroom','FrontController@multimedia_classroom');
Route::get('/computer-lab','FrontController@computer_lab');
Route::get('/science-lab','FrontController@science_lab');

//TEAM
Route::get('/managing-committee','FrontController@managing_committee');
Route::get('/teacher','FrontController@teacher');
Route::get('/staff','FrontController@staff');
Route::get('/wapc','FrontController@wapc');
Route::get('/tswt','FrontController@tswt');
Route::get('/tci','FrontController@tci');

//Result  (Front-End)
Route::get('/internal-exam','FrontController@internal_exam');
Route::get('/public-exam','FrontController@public_exam');
Route::get('/admission','FrontController@admission');

//INFORMATION
Route::get('/sports-n-culture-program','FrontController@sports_n_culture_program');
Route::get('/center-information','FrontController@center_information');
Route::get('/scholarship-info','FrontController@scholarship_info');
Route::get('/bncc','FrontController@bncc');
Route::get('/scout','FrontController@scout');
Route::get('/tender','FrontController@tender');

//Attendance
Route::get('/attendance-summery','FrontController@attendance_summery');
Route::get('/student-attendance','FrontController@student_attendance');
Route::get('/teacher-attendance','FrontController@teacher_attendance');

//News & Notice
Route::get('/notice','FrontController@notice');
Route::get('/notice-details/{id}','FrontController@noticeDetails');
Route::get('/news','FrontController@news');
Route::get('/news-details/{id}','FrontController@newsDetails');

//Gallery
Route::get('/gallery','FrontController@gallery');
Route::get('/album/{name}','FrontController@album');

//Download
Route::get('/download','FrontController@download');

//Contact
Route::get('/contact','FrontController@contact');
/*===== Route for Front-End Menu Bar END ====*/

//Admission Route by Rimon
Route::get('admission/exams','AdmissionController@admissionExams')->name('admission.exams');
Route::get('admission/applicant','AdmissionController@admissionApplicant')->name('admission.applicant');
Route::get('admission/examResult','AdmissionController@admissionExamResult')->name('admission.examResult');
//End Admission Route

//Attendance Route by Rimon
Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/student','AttendanceController@student')->name('attendance.student');
Route::get('attendance/teacher','AttendanceController@teacher')->name('attendance.teacher');
Route::get('attendance/report','AttendanceController@report')->name('attendance.report');
Route::post('/get_attendance_monthly', 'AttendanceController@getAttendanceMonthly');
Route::post('/indStudentAttendance','AttendanceController@individulAttendance')->name('student.indAttendance');
Route::post('/classStudentAttendance','AttendanceController@classAttendance')->name('student.classAttendance');
Route::post('/indTeacherAttendance','AttendanceController@individulTeacherAttendance')->name('teacher.indAttendance');
//End Attendance Route

//Exam Route Start  by Rimon
Route::get('exam/gradesystem','ExamController@gradesystem')->name('exam.gradesystem');
//Grading System @MKH
Route::post('exam/store-grade', 'ExamController@store_grade');
Route::get('exam/delete-grade/{id}', 'ExamController@delete_grade');
Route::get('exam/examination','ExamController@examination')->name('exam.examination');
Route::post('exam/sotre-exam', 'ExamController@store_exam')->name('store.exam');
Route::delete('exam/destroy/{id}', 'ExamController@destroy');
Route::get('exam/examitems','ExamController@examitems')->name('exam.examitems');
Route::get('exam/schedule/create/{exam}','ExamScheduleController@create');
Route::post('exam/schedule/store','ExamScheduleController@store');
Route::get('exam/schedule/{examId}', 'ExamController@schedule');
Route::post('exam/store-schedule', 'ExamController@store_schedule');
Route::get('exam/admit-card','ExamController@admitCard');
Route::get('exam/seat-allocate','ExamController@seatAllocate');

Route::get('exam/result-details/{id}','ResultController@resultDetails');
Route::get('exam/final-result-details/{id}','ResultController@finalResultDetails');
Route::get('exam/result-details-all','ResultController@allDetails');
Route::get('exam/examresult','ResultController@index')->name('exam.examresult');
Route::get('exam/generate-exam-result','ResultController@generateResult');

Route::get('exam/setfinalresultrule','ResultController@setfinalresultrule')->name('exam.setfinalresultrule');
Route::get('exam/getfinalresultrule','ResultController@getfinalresultrule')->name('exam.getfinalresultrule');
Route::post('exam/final-result','ResultController@finalResultNew');

Route::get('exam/marks/{schedule}','MarkController@index');
Route::get('exam/mark/download/{schedule}','MarkController@download');
Route::post('exam/mark/store','MarkController@store');

Route::get('exam/tabulationSheet','ExamController@tabulationSheet')->name('exam.tabulationSheet');
//Exam management End

//Communication Route by Rimon
Route::get('communication/quick','CommunicationController@quick')->name('communication.quick');
Route::get('communication/student','CommunicationController@student')->name('communication.student');
Route::get('communication/staff','CommunicationController@staff')->name('communication.staff');
Route::get('communication/history','CommunicationController@history')->name('communication.history');

Route::post('communication/send','CommunicationController@send');
Route::post('communication/quick/send','CommunicationController@quickSend');
//End Communication Route

Route::get('attendance/setting','ShiftController@index');
Route::post('attendance/shift/store','ShiftController@store');

//Settings Route by Rimon
Route::get('settings/basicInfo','SettingsController@basicInfo')->name('settings.basicInfo');
//Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
//Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

// Gallery Routes start
Route::get('gallery/image','GalleryController@index')->name('settings.image');
Route::post('gallery/image/store','GalleryController@store');
Route::delete('gallery/image/destroy/{id}','GalleryController@destroy');

Route::get('gallery/category','GalleryCategoryController@index');
Route::post('gallery/category/store','GalleryCategoryController@store');
Route::delete('gallery/category/destroy/{id}','GalleryCategoryController@destroy');

Route::get('gallery/albums','AlbumController@index');
Route::post('gallery/album/store','AlbumController@store');
Route::delete('gallery/album/delete/{id}','AlbumController@destroy');
// Gallery Routes ends

//Staff Route by Rimon
Route::get('staff/teacher','StaffController@teacher')->name('staff.teacher');
Route::get('staff/staffadd','StaffController@addstaff')->name('staff.addstaff');
Route::post('staff/store-staff','StaffController@store_staff');
Route::get('staff/edit-staff/{id}','StaffController@edit_staff');
Route::patch('staff/{id}/update-staff','StaffController@update_staff');
Route::get('staff/delete-staff/{id}','StaffController@delete_staff');
Route::get('staff/threshold','StaffController@threshold')->name('staff.threshold');
Route::get('staff/kpi','StaffController@kpi')->name('staff.kpi');
Route::get('staff/payslip','StaffController@payslip')->name('staff.payslip');

//End Staff Route

//Institution Mgnt Route by Rimon
//Session @MKH
Route::get('institution/academicyear','InstitutionController@academicyear')->name('institution.academicyear');
Route::post('institution/store-session', 'InstitutionController@store_session');
Route::post('institution/edit-session', 'InstitutionController@edit_session');
Route::post('institution/update-session', 'InstitutionController@update_session');
Route::get('institution/{id}/delete-session', 'InstitutionController@delete_session');
Route::patch('institution/status/{id}','InstitutionController@sessionStatus');

//Academic Classes $ Groups
Route::get('institution/section-groups','InstitutionController@section_group')->name('section.group');
Route::post('institution/create-section', 'InstitutionController@create_section');
Route::post('institution/edit-section', 'InstitutionController@edit_section');
Route::post('institution/update-section', 'InstitutionController@update_section');
Route::get('institution/{id}/delete-section', 'InstitutionController@delete_section');

Route::post('institution/create-group', 'InstitutionController@create_group');
Route::post('institution/edit-group', 'InstitutionController@edit_group');
Route::post('institution/update-group', 'InstitutionController@update_group');
Route::get('institution/{id}/delete-group', 'InstitutionController@delete_grp');

//Session-Class
Route::get('institution/class','InstitutionController@classes')->name('institution.classes');
Route::post('institution/store-class','InstitutionController@store_class');
Route::get('institution/academic-class','InstitutionController@academicClasses')->name('institution.academicClasses');
Route::post('institution/store-academic-class','InstitutionController@storeAcademicClass');
Route::post('institution/edit-SessionClass','InstitutionController@edit_SessionClass');
Route::post('institution/update-SessionClass','InstitutionController@update_SessionClass');
Route::get('institution/{id}/delete-SessionClass','InstitutionController@delete_SessionClass');

Route::get('institution/class/subject/{class}','InstitutionController@classSubjects');
Route::delete('institution/class/subject/destroy/{id}','InstitutionController@unAssignSubject');

//Class Schedule
Route::get('institution/class/schedule/{class}','ScheduleController@index');
Route::post('institution/class/schedule/store','ScheduleController@store');

//Subjects
Route::get('institution/subjects','InstitutionController@subjects')->name('institution.subjects');
Route::post('institution/create-subject','InstitutionController@create_subject');
Route::post('institution/edit-subject','InstitutionController@edit_subject');
Route::post('institution/update-subject','InstitutionController@update_subject');
Route::get('institution/{id}/delete-subject','InstitutionController@delete_subject');

//Route::get('institution/classsubjects','InstitutionController@classsubjects')->name('institution.classsubjects');
Route::post('institution/assign-subject','InstitutionController@assign_subject')->name('assign.subject');
//Route::post('institution/assign-subject','InstitutionController@assign_subject')->name('assign.subject');
Route::post('institution/edit-assigned-subject','InstitutionController@edit_assigned')->name('edit.assign');
Route::get('institution/{id}/delete-assigned-subject','InstitutionController@delete_assigned');
Route::get('institution/profile','InstitutionController@profile')->name('institution.profile');

Route::get('institution/signature','InstitutionController@signature');
Route::post('institution/sig','InstitutionController@sig');

// smartrahat start
Route::get('siteinfo','SiteInformationController@index');
Route::patch('site-info/update','SiteInformationController@update');
Route::patch('site-info/logo','SiteInformationController@logo');

Route::get('pages','PageController@index');
Route::get('page/edit/{id}','PageController@edit');
Route::patch('pages/{id}/update','PageController@update');

Route::get('notices','NoticeController@index');
Route::post('notice/store','NoticeController@store');
Route::post('notice/edit-notice','NoticeController@edit');
Route::patch('notice/update','NoticeController@update');

Route::get('notice/category','NoticeCategoryController@index');
Route::post('notice/category/store','NoticeCategoryController@store');
Route::get('notice/category/edit/{id}','NoticeCategoryController@edit');

Route::get('notice/type','NoticeTypeController@index');
Route::post('notice/type/store','NoticeTypeController@store');
Route::get('notice/type/edit/{id}','NoticeTypeController@edit');

Route::get('sliders','SliderController@index');
Route::post('slider/store','SliderController@store');
Route::delete('slider/destroy/{id}','SliderController@destroy');
// smartrahat end

//Students Route by babu
Route::get('students','StudentController@index')->name('student.list');
Route::get('student/create','StudentController@create')->name('student.add');
Route::get('student/edit/{id}','StudentController@edit');
Route::patch('student/{id}/update','StudentController@update');
Route::get('student/drop/{id}','StudentController@dropOut');
Route::get('/load_student_id','StudentController@loadStudentId');

//Students Route by Rimon
Route::get('student/designStudentCard','IdCardController@index');
Route::get('student/testimonial','StudentController@testimonial')->name('student.testimonial');
Route::get('student/promotion','StudentController@promotion')->name('student.promotion');
Route::post('student/promote','StudentController@promote')->name('student.promote');

Route::get('student/download-blank-csv/{academicClassId}','StudentController@downloadBlank');
Route::get('student/upload-student/{academicClassId}','StudentController@uploadStudent');
Route::post('student/up','StudentController@up');

Route::get('staff/idCard','IdCardController@staff');
Route::post('staff/idCard/pdf','IdCardController@staffPdf');

//@MKH
Route::post('student/store', 'StudentController@store');
Route::get('student/optional','StudentController@optional');
Route::post('student/optional/assign','StudentController@assignOptional');
//End Students Route

// ID Card Routes
Route::post('student/card/pdf','IdCardController@pdf');
// ID Card Routes

// Important Links
Route::get('settings/links','LinkController@index');
Route::post('settings/link/store','LinkController@store');
Route::delete('settings/link/delete/{id}','LinkController@destroy');
// End Important Links

//Account Section Star AR Babu
//  Fee Category Start
    Route::get('/fee-category/index','FeeCategoryController@index')->name('fee-category.index');
    Route::post('fee-category/store','FeeCategoryController@store_fee_category')->name('fee-category.store');
    Route::post('fee-category/edit','FeeCategoryController@edit_fee_category')->name('fee-category.edit');
    Route::post('fee-category/update','FeeCategoryController@update_fee_category')->name('fee-category.update');
    Route::get('fee-category/{id}/delete','FeeCategoryController@delete_fee_category')->name('fee-category.delete');
    Route::put('fee-category/status/{id}','FeeCategoryController@status')->name('fee-category.status');
//    Fee Category End

//  Fee Setup Start
    Route::get('fee-category/fee_setup','FeeCategoryController@fee_setup')->name('fee-setup.fee_setup');
    Route::post('fee_setup/store','FeeCategoryController@store_fee_setup')->name('fee-setup.store');
    Route::get('fee_setup/list','FeeCategoryController@list_fee_setup')->name('fee-setup.list');
    Route::get('fee_setup/show/{id}', 'FeeCategoryController@show_fee_setup')->name('fee-setup.show');
    Route::patch('fee_setup/{id}/update','FeeCategoryController@update_fee_setup')->name('fee-setup.update');
//  Fee Setup End

// Student Transport management Start
    Route::get('fee-category/transport','TransportController@index')->name('transport.index');
    Route::post('fee-category/transport','TransportController@store')->name('transport.store');
    Route::post('fee-category/transport','TransportController@store')->name('transport.store');
    Route::get('transport/edit/{id}','TransportController@edit')->name('transport.edit');
    Route::patch('transport/update/{id}','TransportController@update')->name('transport.update');
    Route::get('transport/student-list','TransportController@student_list')->name('transport.student-list');
    Route::post('transport/assign','TransportController@transport_assign')->name('transport.assign');
// Student Transport management End

// Student Fee Collection start
    Route::get('student/fee','FinanceController@index')->name('student.fee');
    Route::post('student/fee-store','financeController@store_payment')->name('student.fee-store');
    Route::get('student/fee-invoice/{id}','financeController@fee_invoice')->name('student.fee-invoice');
// Student Fee Collection End

// Student Fee Collection Report Start
    Route::get('report/student-fee-report','ReportController@student_fee_report')->name('report.student-fee');
// Student Fee Collection Report End

//Account Section End

//Syllabus Section Start A R Babu
    Route::get('syllabus','SyllabusController@index')->name('syllabus.index');
    Route::post('syllabus/store','SyllabusController@store')->name('syllabus.store');
    Route::get('syllabus/delete/{id}','SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End


/** Route for Apps start */
Route::post('api/login','AndroidController@login');

Route::post('api/attendance','AndroidController@attendance');
Route::post('api/about','AndroidController@about');
Route::post('api/president','AndroidController@president');
/** Route for Apps end */

Route::get('migrate',function(){
    Artisan::call('migrate');
    dd('migration complete');
});
Route::get('reboot',function(){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
});

Route::get('download-attendances',function(){

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

        $attendance = new \App\Attendance();
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
    $students = \App\Student::query()->where('class_id',3)->get();
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
    $students = \App\Student::query()->get();
    foreach($students as $student){
        $id = $student->studentId;
        $student->update(['image'=>$id.'.jpg']);
    }
    dd('sync complete '.date('ymd'));
});

Route::get('add-zero-to-number',function (){
    $students = \App\Student::query()->get();
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
    $students = \App\Student::all();
    foreach($students as $student){
        $s = \App\Student::query()->where('studentId',$student->studentId)->count();
        if($s > 1){
            $student->delete();
        }
    }
});

Route::get('marks-student_id',function(){ //update student_id in marks table
    $marks = \App\Mark::query()->where('student_id',0)->get();
    foreach($marks as $mark){
        $studentId = $mark->studentId;
        $student = \App\Student::query()->where('studentId',$studentId)->first();
        $id = $student ? $student->id : null;
        $mark->update(['student_id'=>$id]);
    }
    dd('student id updated');
});

Route::get('total-marks',function(){ //addition of all type of exam in total_mark, grade & gpa
    $marks = \App\Mark::query()
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

    $subjectCount = \App\Mark::query()
        ->where('session_id',$sessionId)
        ->where('exam_id',$examId)
        ->where('class_id',$classId)
        ->get()
        ->groupBy('subject_id')
        ->count();

    $marks = \App\Mark::query()
        ->where('session_id',$sessionId)
        ->where('exam_id',$examId)
        ->where('class_id',$classId)
        ->get()
        ->groupBy('student_id');

    //dd($marks);
    foreach($marks as $student => $mark){
        $isFail = \App\Mark::query()
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

        $result = \App\ExamResult::query()
            ->where('session_id',$sessionId)
            ->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('student_id',$data['student_id'])
            ->first();

        if($result != null){
            $result->update($data);
        }else{
            \App\ExamResult::query()->create($data);
        }
    }

    /* update exam rank start */
    $results = \App\ExamResult::query()
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
        $student = \App\Student::query()->findOrFail($mark->student_id);
        $mark->update(['section_id'=>$student->section_id]);
    }
    dd('section id synced');
});

Route::get('sync-group',function(){
    $marks = \App\FinalResult::query()->get();

    foreach($marks as $mark){
        $student = \App\Student::query()->findOrFail($mark->student_id);
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

