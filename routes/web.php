<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


use Illuminate\Support\Facades\Artisan;

/** Dashboard Routes */
Route::get('dashboard','DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/', 'FrontController@index');
Route::get('single','FrontController@single');

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