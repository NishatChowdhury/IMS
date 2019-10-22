<?php

use Illuminate\Support\Facades\Artisan;

/** Dashboard Routes */
Route::get('dashboard','DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'DashboardController@index')->name('home'); /*Already exist*/

/*
  ==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'FrontController@index')->name('front-home');

    //Institute -> About
Route::get('/introduction','FrontController@introduction');
Route::get('/governing-body','FrontController@governing_body');
Route::get('/founder-n-donor','FrontController@donor');

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
Route::get('/news','FrontController@news');

    //Gallery
Route::get('/gallery','FrontController@gallery');
/*===== Route for Front-End Menu Bar END ====*/

//Attendance Route by Rimon
Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/setting','AttendanceController@setting')->name('attendance.setting');
Route::get('attendance/student','AttendanceController@student')->name('attendance.student');
Route::get('attendance/teacher','AttendanceController@teacher')->name('attendance.teacher');
Route::get('attendance/report','AttendanceController@report')->name('attendance.report');
//End Attendance Route

//Settings Route by Rimon
Route::get('settings/basicInfo','SettingsController@basicInfo')->name('settings.basicInfo');
//Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
Route::get('settings/image','SettingsController@image')->name('settings.image');
Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

//Staff Route by Rimon
Route::get('staff/teacher','StaffController@teacher')->name('staff.teacher');
Route::get('staff/staffadd','StaffController@addstaff')->name('staff.addstaff');
//End Staff Route

//Institution Mgnt Route by Rimon
Route::get('institution/academicyear','InstitutionController@academicyear')->name('institution.academicyear');
Route::get('institution/class','InstitutionController@classes')->name('institution.classes');
Route::get('institution/subjects','InstitutionController@subjects')->name('institution.subjects');
Route::get('institution/subjects/classsubjects','InstitutionController@classsubjects')->name('institution.classsubjects');
Route::get('institution/section','InstitutionController@section')->name('institution.section');
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
// smartrahat end

//Students Route by babu
Route::get('/stu_list','StudentController@index')->name('student.list');
Route::get('/stu_add','StudentController@create')->name('student.add');

//End Students Route

Route::get('migrate',function(){
    Artisan::call('migrate');
    dd('migration complete');
});

Route::get('reboot',function(){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
});