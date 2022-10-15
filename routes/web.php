<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Front\AlumniController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AdmissionController;
use App\Http\Controllers\Front\OnlineApplyController;

/** Dashboard Routes */
Route::get('dashboard','Backend\DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', [DashboardController::class, 'index'])->name('home');

/*
==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'Front\FrontController@index');
//Route::get('/', 'IdCardController@custom_staffPdf');
Route::get('/online-apply-step','Front\FrontController@onlineApplyStep');
Route::get('/online-apply/{id}',[OnlineApplyController::class,'onlineApply']);
Route::get('/online-apply-college',[OnlineApplyController::class,'onlineApplyCollege']);

//Result  (Front-End)
Route::get('/internal-exam','Front\FrontController@internal_exam');



Route::post('/online-apply-save',[OnlineApplyController::class,'store']);



Route::get('download-school-pdf/{id}', [AdmissionController::class,'downloadSchoolPdf'])->name('download.school.form');


//News & Notice

Route::get('/notice-details/{id}','Front\FrontController@noticeDetails')->name('front.notice.details');
Route::get('/news-details/{id}','Front\FrontController@newsDetails');

//Gallery
Route::get('/gallery','Front\FrontController@gallery');
Route::get('/album/{name}','Front\FrontController@album');

//Download
Route::get('/download','Front\FrontController@download');
Route::get('/contacts','Front\FrontController@contact');

Route::post('api/login','AndroidController@login');

Route::post('api/system-info','AndroidController@systemInfo');
Route::post('api/attendance','AndroidController@attendance');
Route::post('api/about','AndroidController@about');
Route::post('api/president','AndroidController@president');
Route::post('api/profile','AndroidController@profile');
Route::post('api/teachers','AndroidController@teachers');
Route::post('api/syllabus','AndroidController@syllabus');
Route::post('api/notices','AndroidController@notices');
Route::post('api/class-routines','AndroidController@classRoutine');
/** Route for Apps end */

/** Online Admission Starts */
Route::get('validate-admission','Front\AdmissionController@validateAdmission');
Route::get('admission-form',[OnlineApplyController::class, 'admissionForm']);


Route::get('student-form','Front\FrontController@studentForm');
Route::get('admission-invoice','Front\FrontController@invoice');
Route::get('admission-bank-slip','Front\FrontController@bankSlip');

Route::get('admission-success','Front\AdmissionController@admissionSuccess');
Route::get('admission-success-school', 'Front\AdmissionController@admissionSuccessSchool');
// Route::get('admission-success-school', [Front\Front\FrontController::class, 'admissionSuccessSchool']);
/** Online Admission Ends */

/** Event Start */
Route::get('events','Front\FrontController@events');
Route::get('event/{id}','Front\FrontController@event');
/** Event Ends */

/** Playlist Start */
Route::get('playlists','Front\FrontController@playlists');
Route::get('playlist/{id}','Front\FrontController@playlist');
Route::get('notice','Front\FrontController@notice');
/** Playlist Ends */

Route::post('message-store','Front\MessagesController@store')->name('message.store');


Route::post('admission-form-submit',[OnlineApplyController::class,'storeCollege']);

Route::post('load_applied_student_id','Front\AdmissionController@loadStudentId');

Route::get('/load_online_student_info','Front\FrontController@loadStudentInfo');
/** Applied Student */

Route::get('lang/{id}',[FrontController::class,'lang'])->name('lang');

Route::post('alumni/store',[AlumniController::class,'store'])->name('alumni.store');
Route::get('alumni/success',[AlumniController::class,'success'])->name('alumni.success');
Route::get('alumni/login',[AlumniController::class,'index'])->name('alumni.login');
Route::post('alumni/show/',[AlumniController::class,'show'])->name('alumni.show');

Route::get('page/{uri}','Front\FrontController@page');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
