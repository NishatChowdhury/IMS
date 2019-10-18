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
Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
Route::get('settings/image','SettingsController@image')->name('settings.image');
Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

// smartrahat start
Route::get('siteinfo','SiteInformationController@index');
Route::patch('site-info/update','SiteInformationController@update');
Route::patch('site-info/logo','SiteInformationController@logo');

Route::get('pages','PageController@index');
Route::get('page/edit/{id}','PageController@edit');
Route::patch('pages/{id}/update','PageController@update');
// smartrahat end

//Students Route by babu
Route::get('/stu_list','StudentController@index')->name('student.list');
Route::get('/stu_add','StudentController@create')->name('student.add');

//End Students Route

Route::get('migrate',function(){
    Artisan::call('migrate');
});