<?php

use App\Mark;
use App\Grade;
use App\Student;
use Carbon\Carbon;
use App\ExamResult;
use App\AcademicClass;
use App\RawAttendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\FeeSetupController;
use App\Http\Controllers\Backend\OnlineApplyController;

/** Dashboard Routes */
Route::get('dashboard','Backend\DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'Backend\DashboardController@index')->name('home');

/** User Routes start */
Route::get('user/profile','UserController@profile');
Route::patch('user/update','UserController@update');
Route::patch('user/password','UserController@password');
/** User Routes end */

/*
==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'Front\FrontController@index');
//Route::get('/', 'IdCardController@custom_staffPdf');
Route::get('/online-apply-step','Front\FrontController@onlineApplyStep');
Route::get('/online-apply/{id}',[OnlineApplyController::class,'onlineApply']);
//Route::get('{uri}','Front\FrontController@page');

//Institute -> About
Route::get('/introduction','Front\FrontController@introduction');
Route::get('/governing-body','Front\FrontController@governing_body');
Route::get('/founder-n-donor','Front\FrontController@donor');

//Institute -> Administrative message
Route::get('/president','Front\FrontController@president');
Route::get('/principal','Front\FrontController@principal');

//Institute-> Infrastructure
Route::get('/building-room','Front\FrontController@building_room');
Route::get('/library','Front\FrontController@library');
Route::get('/transport','Front\FrontController@transport');
Route::get('/hostel','Front\FrontController@hostel');
Route::get('/land-information','Front\FrontController@land_information');

//Institute -> Academic
Route::get('/class-routine','Front\FrontController@class_routine');
Route::get('/calender','Front\FrontController@calender');
Route::get('/syllabus','Front\FrontController@syllabus');
Route::get('/diary','Front\FrontController@diary');
Route::get('/performance','Front\FrontController@performance');
Route::get('/holiday','Front\FrontController@holiday');

//Institute -> Digital Campus
Route::get('/multimedia-classroom','Front\FrontController@multimedia_classroom');
Route::get('/computer-lab','Front\FrontController@computer_lab');
Route::get('/science-lab','Front\FrontController@science_lab');

//TEAM
Route::get('/managing-committee','Front\FrontController@managing_committee');
Route::get('/teacher','Front\FrontController@teacher');
Route::get('/staff','Front\FrontController@staff');
Route::get('/wapc','Front\FrontController@wapc');
Route::get('/tswt','Front\FrontController@tswt');
Route::get('/tci','Front\FrontController@tci');

//Result  (Front-End)
Route::get('/internal-exam','Front\FrontController@internal_exam');
Route::get('/public-exam','Front\FrontController@public_exam');
// Route::get('/admission','Front\FrontController@admission');
Route::get('/admission','Front\FrontController@admission');


//online apply (Front-End)
// Route::get('/online-apply', function(){
//     return "df";
// });



Route::post('/online-apply-save',[OnlineApplyController::class,'store']);
Route::post('/online-apply-move',[OnlineApplyController::class,'moveToStudent']);

//INFORMATION
Route::get('/sports-n-culture-program','Front\FrontController@sports_n_culture_program');
Route::get('/center-information','Front\FrontController@center_information');
Route::get('/scholarship-info','Front\FrontController@scholarship_info');
Route::get('/bncc','Front\FrontController@bncc');
Route::get('/scout','Front\FrontController@scout');
Route::get('/tender','Front\FrontController@tender');

//Attendance
Route::get('/attendance-summery','Front\FrontController@attendance_summery');
Route::get('/student-attendance','Front\FrontController@student_attendance');
Route::get('/teacher-attendance','Front\FrontController@teacher_attendance');

//News & Notice
Route::get('/notice','Front\FrontController@notice');
Route::get('/notice-details/{id}','Front\FrontController@noticeDetails');
Route::get('/news','Front\FrontController@news');
Route::get('/news-details/{id}','Front\FrontController@newsDetails');

//Gallery
Route::get('/gallery','Front\FrontController@gallery');
Route::get('/album/{name}','Front\FrontController@album');

//Download
Route::get('/download','Front\FrontController@download');

//Contact
Route::get('/contact','Front\FrontController@contact');
/*===== Route for Front-End Menu Bar END ====*/

//Admission Route by Rimon
Route::get('admission/exams','Backend\AdmissionController@admissionExams')->name('admission.exams');
Route::get('admission/applicant','Backend\AdmissionController@admissionApplicant')->name('admission.applicant');
Route::get('admission/examResult','Backend\AdmissionController@admissionExamResult')->name('admission.examResult');
Route::get('admission/browse-merit-list','Backend\AdmissionController@browseMeritList');
Route::get('admission/upload-merit-list','Backend\AdmissionController@uploadMeritList');
Route::post('admission/upload','Backend\AdmissionController@upload');

Route::post('admission/slip-view','Backend\AdmissionController@slipView');
//End Admission Route


Route::get('exam/marks/{schedule}','MarkController@index');
Route::get('exam/mark/download/{schedule}','MarkController@download');
Route::get('exam/mark/upload/{schedule}','MarkController@upload');
Route::post('exam/mark/up','MarkController@up');
Route::post('exam/mark/store','MarkController@store');

Route::get('exam/tabulationSheet','Backend\ExamController@tabulationSheet')->name('exam.tabulationSheet');
//Exam management End



Route::get('attendance/setting','ShiftController@index');
Route::post('attendance/shift/store','ShiftController@store');
Route::delete('attendance/shift/delete/{id}','ShiftController@destroy');




//Settings Route by Rimon
Route::get('settings/basicInfo','SettingsController@basicInfo')->name('settings.basicInfo');
//Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
//Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route




//Class Schedule
Route::get('institution/class/schedule/{class}','ScheduleController@index');
Route::post('institution/class/schedule/store','ScheduleController@store');





//Students Route by babu


//Students Route by Rimon
    Route::get('student/designStudentCard','IdCardController@index');
    Route::get('student/testimonial','StudentController@testimonial')->name('student.testimonial');

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


//Account Section Star AR Babu





//Account Section End

//Syllabus Section Start A R Babu
//    Route::get('syllabuses','SyllabusController@index')->name('syllabus.index');
//    Route::post('syllabus/store','SyllabusController@store')->name('syllabus.store');
//    Route::get('syllabus/delete/{id}','SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End

//Contact page start
    Route::get('message-index','MessagesController@index')->name('message.index');
    Route::delete('message-delete/{id}','MessagesController@destroy')->name('message.destroy');
    Route::post('message-view','MessagesController@view')->name('message.view');
    Route::post('message-store','MessagesController@store')->name('message.store');
//Contact Page end
//Academic Calender Start
   
//Academic Calender End






/** Route for Apps start */
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
Route::get('admission-form','Front\AdmissionController@admissionForm');

// Route::get('admission-form','Front\FrontController@admissionForm');
// Route::get('validate-admission','Front\FrontController@validateAdmission');

//Route::post('admission-form-submit','Front\FrontController@admissionFormSubmit');
Route::get('student-form','Front\FrontController@studentForm');
Route::get('admission-invoice','Front\FrontController@invoice');
Route::get('admission-bank-slip','Front\FrontController@bankSlip');
Route::get('admission-success','Front\FrontController@admissionSuccess');
Route::get('admission-success-school', 'Front\FrontController@admissionSuccessSchool');
// Route::get('admission-success-school', [Front\Front\FrontController::class, 'admissionSuccessSchool']);
/** Online Admission Ends */

/** Event Start */
Route::get('events','Front\FrontController@events');
Route::get('event/{id}','Front\FrontController@event');
/** Event Ends */

/** Playlist Start */
Route::get('playlists','Front\FrontController@playlists');
Route::get('playlist/{id}','Front\FrontController@playlist');
/** Playlist Ends */

/** Applied Student */
// Route::post('admission-form-submit','AppliedStudentController@store');
// Route::post('load_applied_student_id','AppliedStudentController@loadStudentId');

Route::post('admission-form-submit','Front\AdmissionController@store');
Route::post('load_applied_student_id','Front\AdmissionController@loadStudentId');

Route::get('/load_online_student_info','Front\FrontController@loadStudentInfo');
/** Applied Student */



Route::get('page/{uri}','Front\FrontController@page');

//if(isMenu()){
//    Route::get('{uri}','FrontController@page');
//}
