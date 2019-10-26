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
Route::get('/notice-details','FrontController@noticedetails');
Route::get('/news','FrontController@news');
Route::get('/news-details','FrontController@newsdetails');

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
//Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

//Staff Route by Rimon
Route::get('staff/teacher','StaffController@teacher')->name('staff.teacher');
Route::get('staff/staffadd','StaffController@addstaff')->name('staff.addstaff');
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

Route::get('institution/class','InstitutionController@classes')->name('institution.classes');
Route::post('institution/store-class','InstitutionController@store_class');
Route::post('institution/subjects','InstitutionController@subjects')->name('institution.subjects');
Route::get('institution/subjects/classsubjects','InstitutionController@classsubjects')->name('institution.classsubjects');
    //Academic Classes $ Groups
Route::get('institution/class&groups','InstitutionController@class_group')->name('class.group');
Route::post('institution/create-class', 'InstitutionController@create_class');
Route::get('institution/{id}/delete-class', 'InstitutionController@delete_class');
Route::post('institution/create-group', 'InstitutionController@create_group');
Route::get('institution/{id}/delete-group', 'InstitutionController@delete_grp');
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

Route::get('sliders','SliderController@index');
Route::post('slider/store','SliderController@store');
Route::delete('slider/destroy/{id}','SliderController@destroy');
// smartrahat end

//Students Route by babu
Route::get('/stu_list','StudentController@index')->name('student.list');
Route::get('/stu_add','StudentController@create')->name('student.add');
    //@MKH
Route::post('store-std', 'StudentController@store');
Route::post('add-std', 'StudentController@store');
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