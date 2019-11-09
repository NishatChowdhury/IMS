<?php

use Illuminate\Support\Facades\Artisan;

/** Dashboard Routes */
Route::get('dashboard','DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'DashboardController@index')->name('home');

/*
  ==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'FrontController@index');

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

//Institute -> Academic
Route::get('/class-routine','FrontController@class_routine');
Route::get('/calender','FrontController@calender');
Route::get('/syllabus','FrontController@syllabus');
Route::get('/performance','FrontController@performance');

//TEAM
Route::get('/managing-committee','FrontController@managing_committee');
Route::get('/teacher','FrontController@teacher');
Route::get('/staff','FrontController@staff');

//Result  (Front-End)
Route::get('/internal-exam','FrontController@internal_exam');
Route::get('/public-exam','FrontController@public_exam');
Route::get('/admission','FrontController@admission');

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
/*===== Route for Front-End Menu Bar END ====*/

//Attendance Route by Rimon
Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/setting','AttendanceController@setting')->name('attendance.setting');
Route::get('attendance/student','AttendanceController@student')->name('attendance.student');
Route::get('attendance/teacher','AttendanceController@teacher')->name('attendance.teacher');
Route::get('attendance/report','AttendanceController@report')->name('attendance.report');
Route::post('/get_attendance_monthly', 'AttendanceController@getAttendanceMonthly');
//End Attendance Route

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
Route::patch('staff/update-staff','StaffController@update_staff');
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
Route::post('institution/edit-SessionClass','InstitutionController@edit_SessionClass');
Route::post('institution/update-SessionClass','InstitutionController@update_SessionClass');
Route::get('institution/{id}/delete-SessionClass','InstitutionController@delete_SessionClass');
//Subjects
Route::get('institution/subjects','InstitutionController@subjects')->name('institution.subjects');
Route::post('institution/create-subject','InstitutionController@create_subject');
Route::post('institution/edit-subject','InstitutionController@edit_subject');
Route::post('institution/update-subject','InstitutionController@update_subject');
Route::get('institution/{id}/delete-subject','InstitutionController@delete_subject');

Route::get('institution/subjects/classsubjects','InstitutionController@classsubjects')->name('institution.classsubjects');
Route::get('institution/profile','InstitutionController@profile')->name('institution.profile');
//End Institution Mgnt Route


// smartrahat start
Route::get('siteinfo','SiteInformationController@index');
Route::patch('site-info/update','SiteInformationController@update');
Route::patch('site-info/logo','SiteInformationController@logo');

Route::get('pages','PageController@index');
Route::get('page/edit/{id}','PageController@edit');
Route::patch('pages/{id}/update','PageController@update');

Route::get('notices','NoticeController@index');
Route::post('notice/store','NoticeController@store');
Route::get('notice/edit/{id}','NoticeController@edit');

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
//@MKH
Route::post('student/store', 'StudentController@store');
//End Students Route

//Route::post('get-sectionByclass', 'StudentController@get_section');
Route::get('get-ClassSectionBysession{id}', 'StudentController@get_class_section');

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