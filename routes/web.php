<?php

use App\Mark;
use App\Grade;
use App\Student;
use Carbon\Carbon;
use App\ExamResult;
use App\AcademicClass;
use App\RawAttendance;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\FeeSetupController;
use App\Http\Controllers\Backend\OnlineApplyController;

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
Route::get('admission/exams','AdmissionController@admissionExams')->name('admission.exams');
Route::get('admission/applicant','AdmissionController@admissionApplicant')->name('admission.applicant');
Route::get('admission/examResult','AdmissionController@admissionExamResult')->name('admission.examResult');
Route::get('admission/browse-merit-list','AdmissionController@browseMeritList');
Route::get('admission/upload-merit-list','AdmissionController@uploadMeritList');
Route::post('admission/upload','AdmissionController@upload');

Route::post('admission/slip-view','AdmissionController@slipView');
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
Route::post('/indTeacherAttendance','AttendanceController@individualTeacherAttendance')->name('teacher.indAttendance');
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

// Exam Seat Plan Start
Route::get('exam/seat-plan/{examId}','ExamSeatPlanController@seatPlan');
Route::post('exam/check-roll','ExamSeatPlanController@CheckRoll');
Route::post('exam/store-seat-plan','ExamSeatPlanController@storeSeatPlan');
Route::get('exam/pdf-seat-plan/{id}','ExamSeatPlanController@pdfSeatPlan');
Route::delete('exam/destroy-seat-plan/{id}','ExamSeatPlanController@destroy');

// Exam Seat Plan End

Route::get('exam/result-details/{id}','ResultController@resultDetails');
Route::get('exam/final-result-details/{id}','ResultController@finalResultDetails');
Route::get('exam/result-details-all','ResultController@allDetails');
Route::get('exam/examresult','ResultController@index')->name('exam.examresult');
Route::get('exam/tabulation/{examID}','ResultController@tabulation');
Route::get('exam/generate-exam-result/{examID}','ResultController@generateResult');

Route::get('exam/setfinalresultrule','ResultController@setfinalresultrule')->name('exam.setfinalresultrule');
Route::get('exam/getfinalresultrule','ResultController@getfinalresultrule')->name('exam.getfinalresultrule');
Route::post('exam/final-result','ResultController@finalResultNew');

Route::get('exam/marks/{schedule}','MarkController@index');
Route::get('exam/mark/download/{schedule}','MarkController@download');
Route::get('exam/mark/upload/{schedule}','MarkController@upload');
Route::post('exam/mark/up','MarkController@up');
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
Route::delete('attendance/shift/delete/{id}','ShiftController@destroy');




//Settings Route by Rimon
Route::get('settings/basicInfo','SettingsController@basicInfo')->name('settings.basicInfo');
//Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
//Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

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
Route::get('institution/academicyear','Backend\InstitutionController@academicyear')->name('institution.academicyear');
Route::post('institution/store-session', 'Backend\InstitutionController@store_session');
Route::post('institution/edit-session', 'Backend\InstitutionController@edit_session');
Route::post('institution/update-session', 'Backend\InstitutionController@update_session');
Route::get('institution/{id}/delete-session', 'Backend\InstitutionController@delete_session');
Route::patch('institution/status/{id}','Backend\InstitutionController@sessionStatus');

//Academic Classes $ Groups
Route::get('institution/section-groups','Backend\InstitutionController@section_group')->name('section.group');
Route::post('institution/create-section', 'Backend\InstitutionController@create_section');
Route::post('institution/edit-section', 'Backend\InstitutionController@edit_section');
Route::post('institution/update-section', 'Backend\InstitutionController@update_section');
Route::get('institution/{id}/delete-section', 'Backend\InstitutionController@delete_section');

Route::post('institution/create-group', 'Backend\InstitutionController@create_group');
Route::post('institution/edit-group', 'Backend\InstitutionController@edit_group');
Route::post('institution/update-group', 'Backend\InstitutionController@update_group');
Route::get('institution/{id}/delete-group', 'Backend\InstitutionController@delete_grp');

//Session-Class
Route::get('institution/class','Backend\InstitutionController@classes')->name('institution.classes');
Route::post('institution/store-class','Backend\InstitutionController@store_class');
Route::get('institution/academic-class','Backend\InstitutionController@academicClasses')->name('institution.academicClasses');
Route::post('institution/store-academic-class','Backend\InstitutionController@storeAcademicClass');
Route::post('institution/edit-AcademicClass','Backend\InstitutionController@editAcademicClass');
Route::post('institution/update-AcademicClass','Backend\InstitutionController@updateAcademicClass');
Route::post('institution/edit-SessionClass','Backend\InstitutionController@edit_SessionClass');
Route::post('institution/update-SessionClass','Backend\InstitutionController@update_SessionClass');
Route::get('institution/{id}/delete-SessionClass','Backend\InstitutionController@delete_SessionClass');

Route::get('institution/class/subject/{class}','Backend\InstitutionController@classSubjects');
Route::delete('institution/class/subject/destroy/{id}','Backend\InstitutionController@unAssignSubject');

//Class Schedule
Route::get('institution/class/schedule/{class}','ScheduleController@index');
Route::post('institution/class/schedule/store','ScheduleController@store');

//Subjects
Route::get('institution/subjects','Backend\InstitutionController@subjects')->name('institution.subjects');
Route::post('institution/create-subject','Backend\InstitutionController@create_subject');
Route::post('institution/edit-subject','Backend\InstitutionController@edit_subject');
Route::post('institution/update-subject','Backend\InstitutionController@update_subject');
Route::get('institution/{id}/delete-subject','Backend\InstitutionController@delete_subject');

//Route::get('institution/classsubjects','Backend\InstitutionController@classsubjects')->name('institution.classsubjects');
Route::post('institution/assign-subject','Backend\InstitutionController@assign_subject')->name('assign.subject');
//Route::post('institution/assign-subject','Backend\InstitutionController@assign_subject')->name('assign.subject');
Route::post('institution/edit-assigned-subject','Backend\InstitutionController@edit_assigned')->name('edit.assign');
Route::get('institution/{id}/delete-assigned-subject','Backend\InstitutionController@delete_assigned');
Route::get('institution/profile','Backend\InstitutionController@profile')->name('institution.profile');

Route::get('institution/signature','Backend\InstitutionController@signature');
Route::post('institution/sig','Backend\InstitutionController@sig');



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

// Important Links
    Route::get('settings/links','LinkController@index');
    Route::post('settings/link/store','LinkController@store');
    Route::delete('settings/link/delete/{id}','LinkController@destroy');
// End Important Links

//Account Section Star AR Babu
//  Fee Category Start
    Route::get('/fee-category/index','Backend\FeeCategoryController@index')->name('fee-category.index');
    Route::post('fee-category/store','Backend\FeeCategoryController@store_fee_category')->name('fee-category.store');
    Route::post('fee-category/edit','Backend\FeeCategoryController@edit_fee_category')->name('fee-category.edit');
    Route::post('fee-category/update','Backend\FeeCategoryController@update_fee_category')->name('fee-category.update');
    Route::get('fee-category/{id}/delete','Backend\FeeCategoryController@delete_fee_category')->name('fee-category.delete');
    Route::put('fee-category/status/{id}','Backend\FeeCategoryController@status')->name('fee-category.status');
//    Fee Category End

//  Fee Setup Start
    Route::get('fee-category/fee_setup/{classId}','Backend\FeeCategoryController@fee_setup')->name('fee-setup.fee_setup');
    Route::post('fee_setup/store/{classId}','Backend\FeeCategoryController@store_fee_setup')->name('fee-setup.store');
    Route::get('fee_setup/list/{classId}','Backend\FeeCategoryController@list_fee_setup')->name('fee-setup.list');
    Route::get('fee_setup/show/{id}', 'Backend\FeeCategoryController@show_fee_setup')->name('fee-setup.show');
    Route::patch('fee_setup/{id}/update','Backend\FeeCategoryController@update_fee_setup')->name('fee-setup.update');
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
    Route::post('student/fee-store','FinanceController@store_payment')->name('student.fee-store');
    Route::get('student/fee-invoice/{id}','FinanceController@fee_invoice')->name('student.fee-invoice');
// Student Fee Collection End

// Student Fee Collection Report Start
    Route::get('report/student-fee-report','ReportController@student_fee_report')->name('report.student-fee');
    Route::get('report/student-monthly-fee-report','ReportController@student_monthly_fee_report')->name('report.student-monthly-fee');
// Student Fee Collection Report End

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
    Route::get('academic-calender/index','AcademicCalenderController@index')->name('academic-calender.index');
    Route::post('academic-calender/store','AcademicCalenderController@store')->name('academic-calender.store');
    Route::post('academic-calender/edit','AcademicCalenderController@edit')->name('academic-calender.edit');
    Route::post('academic-calender/update','AcademicCalenderController@update')->name('academic-calender.update');
    Route::delete('academic-calender/{id}','AcademicCalenderController@destroy')->name('academic-calender.delete');
    Route::put('academic-calender/status/{id}','AcademicCalenderController@status')->name('academic-calender.status');
//Academic Calender End

//Student profile start
    Route::get('admin/student-profile/{studentId}','StudentController@studentProfile')->name('admin.student.profile');
    Route::get('staff-profile/{staffId}','StaffController@staffProfile')->name('staff.profile');
//Student profile end




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
