<?php

use App\Http\Controllers\Backend\AlumniController;
use App\Http\Controllers\Backend\CompetencyController;
use App\Http\Controllers\Backend\CompetencyRemarkController;
//use App\Http\Controllers\Backend\DiaryController;
//use App\Http\Controllers\Backend\GalleryController;
//use App\Http\Controllers\Backend\LinkController;
//use App\Http\Controllers\Backend\MessageController;
//use App\Http\Controllers\Backend\RolePermissionController;
//use App\Http\Controllers\Backend\StudentReportController;
//use App\Http\Controllers\Backend\SubscriberController;
//use App\Http\Controllers\Backend\ThemeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Backend\FeeCartController;
//use App\Http\Controllers\Backend\FeeSetupController;
use App\Http\Controllers\Backend\DashboardController;
//use App\Http\Controllers\Backend\DbBackupController;
//use App\Http\Controllers\Backend\FeeCollectionController;
//use App\Http\Controllers\Backend\OnlineApplyController;
//use App\Http\Controllers\Backend\ExamController;
//use App\Http\Controllers\Backend\ExamScheduleController;
use App\Http\Controllers\Backend\IndicatorController;
use App\Http\Controllers\Backend\RemarkController;
//use App\Http\Controllers\PrivacyPolicyController;
use App\Models\Backend\Competency;
use Illuminate\Support\Str;

//use App\Http\Controllers\Front\PrincipalController;

Route::group(['prefix' => 'admin', 'middleware' => 'checkPermission'], function () {

    //Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    //Student Routes
    /*
    Route::get('student/tod','Backend\StudentController@tod')->name('student.tod');
    Route::get('student/esif','Backend\StudentController@esif')->name('student.esif');
    Route::get('student/images','Backend\StudentController@images')->name('student.images');
    */
    //Student Routes End

    //Accounts
    /*
    Route::get('coa', 'Backend\ChartOfAccountController@index')->name('coa.name');
    Route::get('coa/create', 'Backend\ChartOfAccountController@create')->name('coa.create');
    Route::post('coa/store', 'Backend\ChartOfAccountController@store')->name('coa.store');
    Route::get('coa/edit/{id}', 'Backend\ChartOfAccountController@edit')->name('coa.edit');
    Route::patch('coa/{id}/update', 'Backend\ChartOfAccountController@update')->name('coa.update');
    Route::delete('coa/destroy/{id}', 'Backend\ChartOfAccountController@destroy')->name('coa.destroy');
    Route::post('coa/status', 'Backend\ChartOfAccountController@isEnabled')->name('coa.isEnabled');
    */
    //Accounts End

    //Admission Routes
    /*
    Route::post('admission/store','Backend\AdmissionController@store')->name('admission.store');
    Route::post('admission/unapprove/{roll}','Backend\AdmissionController@unapprove')->name('admission.unapprove');
    */
    //Admission Routes Ends

//Upcoming Events
    /*
    Route::get('events','Backend\UpcomingEventController@index')->name('event.index');
    Route::get('event/create','Backend\UpcomingEventController@create')->name('event.create');
    Route::post('event/store','Backend\UpcomingEventController@store')->name('event.store');
    Route::get('event/show/{id}','Backend\UpcomingEventController@show')->name('event.show');
    Route::get('event/edit/{id}','Backend\UpcomingEventController@edit')->name('event.edit');
    Route::patch('event/{id}/update','Backend\UpcomingEventController@update')->name('event.update');
    Route::delete('event/destroy/{id}','Backend\UpcomingEventController@destroy')->name('event.destroy');
    */
//Upcoming Events Ends

    //Playlists
    /*
    Route::get('playlists','Backend\PlaylistController@index')->name('playlist.index');
    Route::post('playlist/store','Backend\PlaylistController@store')->name('playlist.store');
    Route::get('playlist/show/{id}','Backend\PlaylistController@show')->name('playlist.show');
    Route::delete('playlist/destroy/{id}','Backend\PlaylistController@destroy')->name('playlist.destroy');
    */
    //Playlists Ends

    //Videos
        /*
    Route::get('videos','Backend\VideoController@index')->name('video.index');
    Route::post('video/store','Backend\VideoController@store')->name('video.store');
    Route::get('video/edit','Backend\VideoController@edit')->name('video.edit');
    Route::patch('video/{id}/update','Backend\VideoController@update')->name('video.update');
    Route::delete('video/destroy/{id}','Backend\VideoController@destroy')->name('video.destroy');
        */
    //Videos End

    //Applied Student
    Route::post('applied-student/view','Backend\AppliedStudentController@studentView')->name('student.applied-student.view');
    //Applied Student Ends

    //Holiday Setup
    /*
    Route::get('holidays','Backend\HolidayController@index')->name('attendance.holiday');
    Route::post('holiday/store','Backend\HolidayController@store')->name('holiday.store');
    Route::get('holiday/edit/{id}','Backend\HolidayController@edit')->name('holiday.edit');
    Route::patch('holiday/{id}/update','Backend\HolidayController@update')->name('holiday.update');
    Route::delete('holiday/delete/{id}','Backend\HolidayController@destroy')->name('holiday.destroy');
    */
    //Holiday Setup


    // Imam Hasan Journal Routes
    /*
    Route::resource('journals', "Backend\JournalController")->middleware('auth');
    Route::get('journal/classic','Backend\JournalController@classic')->name('journal.classic');
    Route::get('cash-book','Backend\AccountingController@cashBook')->name('journal.cashBook');
    Route::post('cash-book-settings','Backend\AccountingController@cashBookSetting')->name('journal.cashBookSetting');
    Route::get('ledger','Backend\AccountingController@ledger')->name('journal.ledger');
    Route::get('trial-balance','Backend\AccountingController@trialBalance')->name('journal.trialBalance');
    Route::get('profit-n-loss','Backend\AccountingController@profitNLoss')->name('journal.profitNLoss');
    Route::get('balance-sheet','Backend\AccountingController@balanceSheet')->name('journal.balanceSheet');
    */
    // Imam Hasan Journal Routes
    // Imam Hasan Journal Routes
    //Route::resource('journals', "JournalController")->middleware('auth');
    // Imam Hasan Journal Routes

    // accounting Reports by Imam Hasan\
    //Route::get('balance-sheet', "Backend\AccountingController@balance_sheet")->name('balance_sheet');
    // accounting Reports by Imam Hasan

    // Route for test
    Route::view('bl', 'admin.reports.balance_sheet');
    // Route for test
    /** Menu Routes Starts */
    /*
    Route::get('menus','Backend\MenuController@index')->name('menu.index');
    Route::post('menus-search','Backend\MenuController@search')->name('menus.search');
    Route::post('menu/store','Backend\MenuController@store')->name('menu.store');
    Route::get('menu/edit','Backend\MenuController@edit')->name('menu.edit');
    Route::patch('menu/{id}/update','Backend\MenuController@update')->name('menu.update');
    Route::delete('menu/destroy/{id}','Backend\MenuController@destroy')->name('menu.destroy');
     *
    /** Menu Routes Ends */

    /*
    Route::get('pages','Backend\PageController@index')->name('page.index');
    Route::get('page/create','Backend\PageController@create')->name('page.create');
    Route::post('page/store','Backend\PageController@store')->name('page.store');
    Route::get('page/edit/{id}','Backend\PageController@edit')->name('page.edit');
    Route::patch('pages/{id}/update','Backend\PageController@update')->name('page.update');
    Route::delete('pages/destroy/{id}','Backend\PageController@destroy')->name('page.destroy');
    Route::delete('pages/remove/{id}','Backend\PageController@remove')->name('page.remove');

    Route::get('siteinfo','Backend\SiteInformationController@index')->name('siteinfo');
    Route::patch('site-info/update','Backend\SiteInformationController@update')->name('site-info.update');
    Route::patch('site-info/google_map','Backend\SiteInformationController@update_google_map')->name('site-info.update_google_map');
    Route::patch('site-info/logo','Backend\SiteInformationController@logo')->name('site-info.logo');

    Route::get('sliders','Backend\SliderController@index')->name('slider.index');
    Route::post('slider/store','Backend\SliderController@store')->name('slider.store');
    Route::delete('slider/destroy/{id}','Backend\SliderController@destroy')->name('slider.destroy');
    */

    /*
    Route::get('students','Backend\StudentController@index')->name('student.list');
    Route::get('student/create','Backend\StudentController@create')->name('student.add');
    Route::get('student/edit/{id}','Backend\StudentController@edit')->name('student.edit');
    Route::patch('student/{id}/update','Backend\StudentController@update')->name('student.update');
    Route::get('student/drop/{id}','Backend\StudentController@dropOut')->name('student.dropOut');
    Route::get('student/subjects/{id}','Backend\StudentController@subjects')->name('student.subjects');
    Route::patch('student/{id}/assign','Backend\StudentController@assignSubject')->name('student.assignSubject');
    Route::get('/load_student_id/{id}','Backend\StudentController@loadStudentId')->name('student.load_student_id');

    Route::get('student/promotion','Backend\StudentController@promotion')->name('student.promotion');
    Route::post('student/promote','Backend\StudentController@promote')->name('student.promote');
    */
    /*
    Route::get('features','Backend\FeatureController@index')->name('features.index');
    Route::get('feature/create','Backend\FeatureController@create')->name('features.create');
    Route::post('feature/store','Backend\FeatureController@store')->name('features.store');
    Route::get('feature/edit/{id}','Backend\FeatureController@edit')->name('features.edit');
    Route::patch('feature/{id}/update','Backend\FeatureController@update')->name('features.update');
    Route::delete('feature/destroy/{id}','Backend\FeatureController@destroy')->name('features.destroy');

    Route::get('languages','Backend\LanguageController@index')->name('language.index');
    Route::post('add-languages','Backend\LanguageController@store')->name('languages.add');
    Route::post('change-status','Backend\LanguageController@status')->name('change.status');
    Route::patch('default-update','Backend\LanguageController@defaultUpdate')->name('default.update');
    Route::post('lang-delete/{id}','Backend\LanguageController@delete')->name('lang.delete');
    Route::get('lang-edit/{id}','Backend\LanguageController@edit')->name('lang.edit');
    Route::post('lang-update','Backend\LanguageController@update')->name('lang.update');
    Route::get('lang/translation/{id}','Backend\LanguageController@translation')->name('lang.translation');
    Route::post('lang/translate/{id}','Backend\LanguageController@translate')->name('lang.translate');
    /*
    Route::get('themes','Backend\ThemeController@index')->name('theme.index');
    Route::get('theme/edit/{id}','Backend\ThemeController@edit')->name('theme.edit');
    Route::delete('theme/destroy/{id}','Backend\ThemeController@destroy')->name('theme.destroy');
    Route::get('theme/change/{id}',[ThemeController::class,'change'])->name('admin.theme.change');
    */

    // smartrahat start
    /*
    Route::get('notices','Backend\NoticeController@index')->name('notice.index');
    Route::post('notice/store','Backend\NoticeController@store')->name('notice.store');
    Route::get('notice/edit/{id}','Backend\NoticeController@edit')->name('notice.edit');
    Route::patch('notice/{id}/update','Backend\NoticeController@update')->name('notice.update');
    Route::delete('notice/destroy/{id}','Backend\NoticeController@destroy')->name('notice.destroy');

    Route::get('notice/category','Backend\NoticeCategoryController@index')->name('notice-category.index');
    Route::post('notice/category/store','Backend\NoticeCategoryController@store')->name('notice-category.store');
    Route::get('notice/category/edit/{id}','Backend\NoticeCategoryController@edit')->name('notice-category.edit');

    Route::get('notice/type','Backend\NoticeTypeController@index')->name('notice-type.index');
    Route::post('notice/type/store','Backend\NoticeTypeController@store')->name('notice-type.store');
    Route::get('notice/type/edit/{id}','Backend\NoticeTypeController@edit')->name('notice-type.edit');
    */
    // smartrahat end

    //Weekly Off Setting starts by Nishat
    /*
    Route::get('attendance/weeklyOff','Backend\WeeklyOffController@index')->name('weeklyOff.index');
    Route::post('attendance/weeklyOff/store','Backend\WeeklyOffController@store')->name('weeklyOff.store');
    Route::get('attendance/weeklyOff/edit/{id}','Backend\WeeklyOffController@edit')->name('weeklyOff.edit');
    Route::get('attendance/weeklyOff/delete/{id}','Backend\WeeklyOffController@destroy')->name('weeklyOff.destroy');
    */
    //Weekly Off Setting ends by Nishat


    /** User Routes */
    /*
    Route::get('users','Backend\UserController@index')->name('user.index');
    Route::get('user/create','Backend\UserController@create')->name('user.add');
    Route::post('user/store','Backend\UserController@store')->name('user.store');
    Route::get('user/edit/{id}','Backend\UserController@edit')->name('user.edit');
    Route::post('user/assign-role-update','Backend\UserController@assignRoleUpdate')->name('user.assign.role.update');
    Route::delete('user/destroy/{id}','Backend\UserController@destroy')->name('user.destroy');

    Route::get('user/profile','Backend\UserController@profile')->name('user.profile');
    Route::patch('user/update','Backend\UserController@update')->name('user.update');
    Route::patch('user/password','Backend\UserController@password')->name('user.password');
    */
    /** User Routes End */

    //Syllabus Section Start A R Babu
    /*
    Route::get('syllabuses','Backend\SyllabusController@index')->name('syllabus.index');
    Route::post('syllabus/store','Backend\SyllabusController@store')->name('syllabus.store');
    Route::delete('syllabus/delete/{id}','Backend\SyllabusController@destroy')->name('syllabus.delete');
    */
//Syllabus Section End

    //leave purpose starts by Nishat
    /*
    Route::get('attendance/leavePurpose','Backend\LeavePurposeController@index')->name('leavePurpose.index');
    Route::get('attendance/leavePurpose/add','Backend\LeavePurposeController@add')->name('leavePurpose.add');
    Route::post('attendance/leavePurpose/store','Backend\LeavePurposeController@store')->name('leavePurpose.store');
    Route::get('attendance/leavePurpose/edit/{id}','Backend\LeavePurposeController@edit')->name('leavePurpose.edit');
    Route::patch('attendance/leavePurpose/{id}/update','Backend\LeavePurposeController@update')->name('leavePurpose.update');
    Route::post('attendance/leavePurpose/delete/{id}','Backend\LeavePurposeController@destroy')->name('leavePurpose.delete');
    */
    //leave purpose ends by Nishat

    //leave management starts by Nishat
    /*
    Route::get('attendance/leaveManagement','Backend\LeaveManagementController@index')->name('leaveManagement.index');
    Route::get('attendance/leaveManagement/add','Backend\LeaveManagementController@add')->name('leaveManagement.add');
    Route::post('attendance/leaveManagement/store','Backend\LeaveManagementController@store')->name('leaveManagement.store');
    Route::get('attendance/leaveManagement/edit/{id}','Backend\LeaveManagementController@edit')->name('leaveManagement.edit');
    Route::delete('attendance/leaveManagement/delete/{id}','Backend\LeaveManagementController@destroy')->name('leaveManagement.destroy');
    */
    //leave management ends by Nishat

    //Book Category starts by Nishat
    /*
Route::get('library/bookCategory','Backend\BookCategoryController@index')->name('bookCategory.index');
Route::get('library/bookCategory/add','Backend\BookCategoryController@add')->name('bookCategory.add');
Route::post('library/bookCategory/store','Backend\BookCategoryController@store')->name('bookCategory.store');
Route::get('library/bookCategory/edit','Backend\BookCategoryController@edit')->name('book-category.edit');
//    Route::get('library/bookCategory/edit/{id}','Backend\BookCategoryController@edit')->name('bookCategory.edit');
Route::patch('library/bookCategory/{id}/update','Backend\BookCategoryController@update')->name('bookCategory.update');
Route::post('library/bookCategory/delete/{id}','Backend\BookCategoryController@destroy')->name('bookCategory.delete');
    */
    //Book Category ends by Nishat

    //Admission Route by Rimon
    //Route::get('admission/exams','Backend\AdmissionController@admissionExams')->name('admission.exams');
    //Route::get('admission/examResult','Backend\AdmissionController@admissionExamResult')->name('admission.examResult');
    /*
    Route::get('admission/browse-merit-list','Backend\AdmissionController@browseMeritList')->name('admission.browseMeritList');
    Route::get('admission/upload-merit-list','Backend\AdmissionController@uploadMeritList')->name('admission.uploadMeritList');

    Route::post('admission/upload','Backend\AdmissionController@upload')->name('admission.upload');

    Route::post('admission/slip-view','Backend\AdmissionController@slipView');
    */

    /*
    Route::get('attendance/setting','Backend\ShiftController@index')->name('shift.index');
    Route::post('attendance/shift/store','Backend\ShiftController@store')->name('shift.store');
    Route::get('attendance/shift/edit/{id}','Backend\ShiftController@edit')->name('shift.edit');
    Route::post('attendance/shift/update','Backend\ShiftController@update')->name('shift.update');
    Route::delete('attendance/shift/delete/{id}','Backend\ShiftController@destroy')->name('shift.destroy');

    Route::get('exam/marks/{schedule}','Backend\MarkController@index')->name('exam-marks.index');
    Route::get('exam/mark/download/{schedule}','Backend\MarkController@download')->name('exam-marks.download');
    Route::get('exam/mark/upload/{schedule}','Backend\MarkController@upload')->name('exam-marks.upload');
    Route::post('exam/mark/up','Backend\MarkController@up')->name('exam-marks.up');
    Route::post('exam/mark/store','Backend\MarkController@store')->name('exam-marks.store');

    Route::get('exam/tabulationSheet',[ExamController::class,'tabulationSheet'])->name('exam.tabulationSheet');
        */
    //Book Category starts by Nishat
    /*
    Route::get('library/bookCategory','Backend\BookCategoryController@index')->name('bookCategory.index');
    Route::get('library/bookCategory/add','Backend\BookCategoryController@add')->name('bookCategory.add');
    Route::post('library/bookCategory/store','Backend\BookCategoryController@store')->name('bookCategory.store');
    Route::get('library/bookCategory/edit','Backend\BookCategoryController@edit')->name('book-category.edit');
//    Route::get('library/bookCategory/edit/{id}','Backend\BookCategoryController@edit')->name('bookCategory.edit');
    Route::patch('library/bookCategory/{id}/update','Backend\BookCategoryController@update')->name('bookCategory.update');
    Route::post('library/bookCategory/delete/{id}','Backend\BookCategoryController@destroy')->name('bookCategory.delete');
    */
    //Exam management End



    //Students Route by Rimon
    /*
    Route::get('student/designStudentCard','Backend\IdCardController@index')->name('student.designStudentCard');
    Route::get('student/generateStudentCard_v1','Backend\IdCardController@generateStudentCard_v1')->name('student.generateStudentCard_v1');
    Route::get('student/generateStudentCard_v2','Backend\IdCardController@generateStudentCard_v2')->name('student.generateStudentCard_v2');
    Route::get('student/generateStudentCard_v3','Backend\IdCardController@generateStudentCard_v3')->name('student.generateStudentCard_v3');
    Route::get('student/generateStudentCard_v4','Backend\IdCardController@generateStudentCard_v4')->name('student.generateStudentCard_v4');
    Route::get('student/generateStudentCard_v5','Backend\IdCardController@generateStudentCard_v5')->name('student.generateStudentCard_v5');
    Route::get('student/generateStudentCard_v6','Backend\IdCardController@generateStudentCard_v6')->name('student.generateStudentCard_v6');
    
    Route::get('student/testimonial','Backend\StudentController@testimonial')->name('student.testimonial');
    // Route::get('student/tc','Backend\StudentController@tc')->name('student.tc');
    Route::get('student/assign-transport','Backend\StudentController@assignTransport')->name('student.transport');
    Route::post('student/assign-transport-ending','Backend\StudentController@assignTransportEnd')->name('assign.transport.end');
    Route::post('student/storeAssignTransport','Backend\StudentController@storeAssignTransport')->name('storeAssignTransport');


    Route::get('student/download-blank-csv/{academicClassId}','Backend\StudentController@downloadBlank')->name('student.downloadBlank');
    Route::get('student/upload-student/{academicClassId}','Backend\StudentController@uploadStudent')->name('student.uploadStudent');
    Route::post('student/up','Backend\StudentController@up')->name('student.up');
    */
    /*
    Route::get('staff/idCard','Backend\IdCardController@staff')->name('staff.staff');
    Route::post('staff/idCard/pdf','Backend\IdCardController@staffPdf')->name('staff.staffPdf');
    */
    //@MKH
    /*
    Route::post('student/store', 'Backend\StudentController@store')->name('student.store');
    Route::get('student/optional','Backend\StudentController@optional')->name('student.optional');
    Route::get('student/optional/assign','Backend\StudentController@assignOptional')->name('student.assignOptional');
    Route::post('student/optional/subjectStudent','Backend\StudentController@subjectStudent')->name('subject.student');
    */
    //End Students Route

    // ID Card Routes
    /*
    Route::post('student/card/pdf','Backend\IdCardController@pdf')->name('student.pdf');

    Route::post('student/card/pdf-v2','Backend\IdCardController@pdf_V2')->name('student.pdf_V2');
    Route::post('student/card/pdf-v3','Backend\IdCardController@pdf_V3')->name('student.pdf_V3');
    Route::post('student/card/pdf-v4','Backend\IdCardController@pdf_V4')->name('student.pdf_V4');
    Route::post('student/card/pdf-v5','Backend\IdCardController@pdf_V5')->name('student.pdf_V5');
    Route::post('student/card/pdf-v6','Backend\IdCardController@pdf_V6')->name('student.pdf_V6');
    // ID Card Routes
        */

//Contact page start
//Route::get('message-index','Backend\MessagesController@index')->name('message.index');
//Route::delete('message-delete/{id}','Backend\MessagesController@destroy')->name('message.destroy');
//Route::post('message-view','Backend\MessagesController@view')->name('message.view');
//Route::post('message-store','Backend\MessagesController@store')->name('message.store');
//Contact Page end

    //library Management Starts By Nishat
    //Add New Book
    /*
Route::get('library/books','Backend\BookController@index')->name('allBooks.index');
Route::get('library/allBooks','Backend\BookController@show')->name('allBooks.show');
Route::get('library/SearchBook','Backend\BookController@search')->name('allBooks.search');
Route::get('library/books/add','Backend\BookController@add')->name('newBook.add');
Route::post('library/books/store','Backend\BookController@store')->name('newBook.store');
Route::get('library/books/edit/{id}','Backend\BookController@edit')->name('newBook.edit');
Route::patch('library/books/{id}/update','Backend\BookController@update')->name('newBook.update');
Route::post('library/books/delete/{id}','Backend\BookController@destroy')->name('newBook.delete');

//issue/return books
Route::get('library/issue_books','Backend\BookController@issueBook')->name('issueBook.index');
Route::post('library/issue-books/store','Backend\BookController@issueBookStore')->name('issueBook.store');
Route::get('library/return_books','Backend\BookController@returnBook')->name('returnBook.index');
Route::get('library/return_books-search','Backend\BookController@returnBookSearch')->name('returnBook.search');
Route::get('library/return_books','Backend\BookController@returnBook')->name('returnBook.index');
Route::post('library/return-books/store','Backend\BookController@returnBookStore')->name('returnBook.store');


//    report
Route::get('library/report','Backend\BookController@report')->name('report');
    */
    //library management ends by Nishat

//    route for api setting starts here
    /*
    Route::get('communication/apiSetting','Backend\CommunicationSettingController@index')->name('communication.apiSetting');
    Route::patch('communication/apiSetting/update','Backend\CommunicationSettingController@update')->name('apiSetting.update');
    */
//    route for api setting ends here

    //    route for email setting starts here
    /*
    Route::get('setting/email', 'Backend\EmailSettingController@index')->name('setting.email');
    Route::post('setting/email/store', 'Backend\EmailSettingController@store')->name('email.store');
    Route::post('setting/email/edit', 'Backend\EmailSettingController@edit')->name('email.edit');
    Route::post('setting/email/update', 'Backend\EmailSettingController@update')->name('email.update');
    Route::delete('setting/email/delete/{id}', 'Backend\EmailSettingController@destroy')->name('email.delete');
    */
    //    route for email setting ends here

    //    route for google map setting starts here
    Route::get('setting/map','Backend\MapSettingController@index')->name('setting.map');
    Route::get('setting/map/store','Backend\MapSettingController@store')->name('map.store');
//    route for google map setting ends here

    //Social Links start
    /*
    Route::get('socials','Backend\SocialController@index')->name('social.index');
    Route::post('socials/update/{id}','Backend\SocialController@update')->name('social.store');
    */
//Social Links End

    //Route::get('settings/links',[LinkController::class,'index'])->name('settings.link.index');

//    Route::get('page-media/destroy/{id}','PageMediaController@destroy');



//Class Schedule
    /*
Route::get('institution/class/schedule/{class}','Backend\ScheduleController@index')->name('class.schedule.index');
Route::post('institution/class/schedule/store','Backend\ScheduleController@store')->name('class.schedule.store');
Route::post('institution/class/schedule/update','Backend\ScheduleController@update')->name('class.schedule.update');
Route::get('institution/class/schedule/delete/{id}','Backend\ScheduleController@delete')->name('class.schedule.delete');
*/
    //Route::get('page-media/destroy/{id}', 'PageMediaController@destroy');

//Route for fee setup starts here
    /*
    Route::get('fee/fee-setup',[FeeSetupController::class,'create'])->name('fee-setup.create');
    Route::post('fee/fee-setup/store',[FeeSetupController::class,'store'])->name('fee-setup.store');
    Route::get('fee/fee-setup/view',[FeeSetupController::class,'index'])->name('fee-setup.index');
    Route::get('fee/fee-setup/fee-students/{id}',[FeeSetupController::class,'feeStudents'])->name('fee-setup.feeStudents');
    Route::get('fee/fee-setup/feeSetupDetails/{id}',[FeeSetupController::class,'feeSetupDetails'])->name('fee-setup.feeSetupDetails');
    Route::get('fee/fee-setup/search',[FeeSetupController::class,'search'])->name('fee-setup.search');
    Route::get('fee/fee-setup/edit/{id}',[FeeSetupController::class,'edit'])->name('fee-setup.edit');

    Route::get('fee/fee-setup/edit-by-student/{id}',[FeeSetupController::class,'editByStudent'])->name('fee-setup.editByStudent');
    Route::patch('fee/fee-setup/update-by-student/{id}',[FeeSetupController::class,'updateByStudent'])->name('fee-setup.updateByStudent');

    Route::patch('fee/fee-setup/update/{id}',[FeeSetupController::class,'update'])->name('fee.fee-setup.update');
    Route::post('fee/fee-setup/delete/{id}',[FeeSetupController::class,'destroy'])->name('fee.fee-setup.delete');

    Route::post('fee/fee-cart/store',[FeeCartController::class,'store'])->name('fee-cart.store');
    Route::post('fee/fee-cart/destroy',[FeeCartController::class,'destroy'])->name('fee-cart.destroy');
    Route::post('fee/fee-cart/flush',[FeeCartController::class,'flush'])->name('fee-cart.flush');

    Route::post('fee/edit-fee-cart/destroy',[FeeCartController::class,'EditFeeCartDestroy'])->name('fee.EditFeeCartDestroy');
        */
    //Route for fee setup ends here

    //Route for fee collection starts here
    /*
    Route::get('fee/fee-collection', [FeeCollectionController::class, 'index'])->name('fee-collection.index');
    Route::get('fee/fee-collection/view', [FeeCollectionController::class, 'view'])->name('fee-collection.view');
    Route::post('fee/fee-collection/store', [FeeCollectionController::class, 'store'])->name('fee-collection.store');
    Route::get('fee/all-collections', [FeeCollectionController::class, 'allCollections'])->name('fee-collection.allCollections');
    Route::get('fee/all-collection/report/{id}', [FeeCollectionController::class, 'report'])->name('fee-collection.report');
    Route::get('fee/collections/report/generate', [FeeCollectionController::class, 'reportGenerate'])->name('report.generate');
    Route::get('fee/collections/report/academic_class', [FeeCollectionController::class, 'academicClassReport'])->name('report.academic_class');
    Route::get('fee/collections/pdf/classReport', [FeeCollectionController::class, 'pdfClassReport'])->name('pdf.classReport');
    Route::get('fee/collections/pdf/dateWiseReport', [FeeCollectionController::class, 'pdfDateReport'])->name('pdf.dateWiseReport');
    */
    //Route for fee collection ends here


    // Gallery Routes start
    /*
    Route::get('gallery/image','Backend\GalleryController@index')->name('settings.image');
    Route::post('gallery/image/store','Backend\GalleryController@store')->name('gallery.store');
    Route::delete('gallery/image/destroy/{id}','Backend\GalleryController@destroy')->name('gallery.destroy');

    Route::get('gallery/category','Backend\GalleryCategoryController@index')->name('gallery-category.index');
    Route::post('gallery/category/store','Backend\GalleryCategoryController@store')->name('gallery-category.store');
    Route::delete('gallery/category/destroy/{id}','Backend\GalleryCategoryController@destroy')->name('gallery-category.destroy');

    Route::get('gallery/albums','Backend\AlbumController@index')->name('gallery-albums.index');
    Route::post('gallery/album/store','Backend\AlbumController@store')->name('gallery-albums.store');
    Route::delete('gallery/album/delete/{id}','Backend\AlbumController@destroy')->name('gallery-albums.destroy');

    Route::get('GalleryCornerCreate',[GalleryController::class,'galleryCornerCreate'])->name('galleryCorner.create');
    Route::post('GalleryCornerStore',[GalleryController::class,'galleryCornerStore'])->name('GalleryCornerStore');
    Route::get('GalleryImageDestroy/{id}',[GalleryController::class,'GalleryImageDestroy'])->name('GalleryImage.destroy');
    */
// Gallery Routes ends

    //Route::get('database-backup', [HomeController::class, 'database']);
    //Route::get('download-database', [HomeController::class, 'downloadDatabase']);
    //Route::get('download-database1', [HomeController::class, 'downloadDatabase1']);

    /*
    Route::get('admission/applicant', 'Backend\OnlineApplyController@index')->name('online-admission.index');
    Route::get('online-application-view/{id}', 'Backend\OnlineApplyController@applyStudentProfile')->name('online-admission.applyStudentProfile');
    Route::get('get-apply-info', 'Backend\OnlineApplyController@getApplyInfo')->name('online-admission.getApplyInfo');
    Route::get('get-apply-info-session', 'Backend\OnlineApplyController@getApplyInfoSession')->name('online-admission.getApplyInfoSession');

    Route::get('admission/create', 'Backend\OnlineApplyController@onlineApplyIndex')->name('online.onlineApplyIndex');
    Route::post('get-apply-set-store', 'Backend\OnlineApplyController@onlineApplySetStore')->name('online.typeSave');
    Route::get('load_online_adminsion_id/{id}', 'Backend\OnlineApplyController@load_online_adminsion_id')->name('onlineStepEdit');
    Route::post('onlineApplySetUpdate', 'Backend\OnlineApplyController@onlineApplySetUpdate')->name('online.typeUpdate');
    Route::post('/online-apply-move',[OnlineApplyController::class,'moveToStudent'])->name('online.moveToStudent');
    */
    Route::get('academic-calender/index','Backend\AcademicCalenderController@index')->name('academic-calender.index');
    Route::post('academic-calender/store','Backend\AcademicCalenderController@store')->name('academic-calender.store');
    Route::post('academic-calender/edit','Backend\AcademicCalenderController@edit')->name('academic-calender.edit');
    Route::post('academic-calender/update','Backend\AcademicCalenderController@update')->name('academic-calender.update');
    Route::delete('academic-calender/{id}','Backend\AcademicCalenderController@destroy')->name('academic-calender.delete');
    Route::put('academic-calender/status/{id}','Backend\AcademicCalenderController@status')->name('academic-calender.status');


    // Student Transport management Start
    /*
    Route::get('fee-category/transport','Backend\TransportController@index')->name('transport.index');
    Route::post('fee-category/transport','Backend\TransportController@store')->name('transport.store');
    Route::post('fee-category/transport','Backend\TransportController@store')->name('transport.store');
    Route::get('transport/edit/{id}','Backend\TransportController@edit')->name('transport.edit');
    Route::patch('transport/update/{id}','Backend\TransportController@update')->name('transport.update');
    Route::get('transport/student-list','Backend\TransportController@student_list')->name('transport.student-list');
    Route::post('transport/assign','Backend\TransportController@transport_assign')->name('transport.assign');
    */
    // Student Transport management End
//  Fee Category Start
    /*
    Route::get('/fee-category/index','Backend\FeeCategoryController@index')->name('fee-category.index');
    Route::post('/fee-category/search','Backend\FeeCategoryController@search')->name('fee_categories.search');
    Route::post('fee-category/store','Backend\FeeCategoryController@store_fee_category')->name('fee-category.store');
    Route::post('fee-category/edit','Backend\FeeCategoryController@edit_fee_category')->name('fee-category.edit');
    Route::post('fee-category/update','Backend\FeeCategoryController@update_fee_category')->name('fee-category.update');
    Route::get('fee-category/{id}/delete','Backend\FeeCategoryController@delete_fee_category')->name('fee-category.delete');
    Route::put('fee-category/status/{id}','Backend\FeeCategoryController@status')->name('fee-category.status');
//    Fee Category End
//  Fee Setup Start
    Route::get('fee-category/fee_setup/{classId}','Backend\FeeCategoryController@fee_setup')->name('fee-setup.fee_setup');
// Route::post('fee_setup/store/{classId}','Backend\FeeCategoryController@store_fee_setup')->name('fee-setup.store');
    Route::get('fee_setup/list/{classId}','Backend\FeeCategoryController@list_fee_setup')->name('fee-setup.list');
    Route::get('fee_setup/show/{id}', 'Backend\FeeCategoryController@show_fee_setup')->name('fee-setup.show');
    Route::patch('fee_setup/{id}/update','Backend\FeeCategoryController@update_fee_setup')->name('fee-setup.update');
    */
    //  Fee Setup End

    // Dairy Management Here
    /*
    Route::get('diary-list', [DiaryController::class, 'index'])->name('diary.index');
    Route::get('diary-create', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('diary-store', [DiaryController::class, 'store'])->name('diary.store');
    Route::get('diary-edit/{diary}', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::post('diary-update/{diary}', [DiaryController::class, 'update'])->name('diary.update');
    */
//Student profile start
    /*
    Route::get('student-profile/{studentId}','Backend\StudentController@studentProfile')->name('admin.student.profile');
    Route::post('student-password-reset','Backend\StudentController@studentPasswordReset')->name('student.resetPassword');
    Route::get('csv','Backend\StudentController@csvDownload')->name('csv');
    */
//Staff Route
    /*
    Route::get('staff-profile/{staffId}','Backend\StaffController@staffProfile')->name('staff.profile');
    Route::get('staff/teacher','Backend\StaffController@teacher')->name('staff.teacher');
    Route::get('staff/staffadd','Backend\StaffController@addstaff')->name('staff.addstaff');
    Route::post('staff/store-staff','Backend\StaffController@store_staff')->name('staff.store_staff');
    Route::get('staff/edit-staff/{id}','Backend\StaffController@edit_staff')->name('staff.edit_staff');
    Route::patch('staff/{id}/update-staff','Backend\StaffController@update_staff')->name('staff.update_staff');
    Route::get('staff/delete-staff/{id}','Backend\StaffController@delete_staff')->name('staff.delete_staff');
    Route::get('staff/threshold','Backend\StaffController@threshold')->name('staff.threshold');
    Route::get('staff/kpi','Backend\StaffController@kpi')->name('staff.kpi');
    Route::get('staff/payslip','Backend\StaffController@payslip')->name('staff.payslip');

Route::get('staff/staff_training/{id}','Backend\StaffController@staff_training')->name('staff.staff_training');
Route::get('staff/staff_course/{id}','Backend\StaffController@staff_course')->name('staff.staff_course');
Route::get('staff/staff_experience/{id}','Backend\StaffController@staff_experience')->name('staff.staff_experience');
Route::get('staff/staff_academic/{id}','Backend\StaffController@staff_academic')->name('staff.staff_academic');

Route::post('staff/store-academic','Backend\StaffController@store_academic')->name('staff.store_academic');
Route::post('staff/update-academic','Backend\StaffController@update_academic')->name('staff.update_academic');
Route::post('staff/store-experience','Backend\StaffController@store_experience')->name('staff.store_experience');
Route::post('staff/update-experience','Backend\StaffController@update_experience')->name('staff.update_experience');
Route::post('staff/store-training','Backend\StaffController@store_training')->name('staff.store_training');
Route::post('staff/update-training','Backend\StaffController@update_training')->name('staff.update_training');
Route::post('staff/store-course','Backend\StaffController@store_course')->name('staff.store_course');
Route::post('staff/update-course','Backend\StaffController@update_course')->name('staff.update_course');
*/
    //End Staff Route


// Teacher assign

//    Route::get('institution/assign-teacher/{id}', 'Backend\InstitutionController@assignTeacher')
//        ->name('institution.assignTeacher');
//
//
//    Route::post('institution/assign-teacher-store', 'Backend\InstitutionController@assignTeacherStore')
//        ->name('institution.assignTeacher.store');



// Student Fee Collection start
//Route::get('student/fee','Backend\FinanceController@index')->name('student.fee');
//Route::post('student/fee-store','Backend\FinanceController@store_payment')->name('student.fee-store');
//Route::get('student/fee-invoice/{id}','Backend\FinanceController@fee_invoice')->name('student.fee-invoice');
// Student Fee Collection End

// Student Fee Collection Report Start
    Route::get('report/student-fee-report','Backend\ReportController@student_fee_report')->name('report.student-fee');
    Route::get('report/student-monthly-fee-report','Backend\ReportController@student_monthly_fee_report')->name('report.student-monthly-fee');
// Student Fee Collection Report End




//Communication Route by Rimon
    /*
    Route::get('communication/quick','Backend\CommunicationController@quick')->name('communication.quick');
    Route::get('communication/student','Backend\CommunicationController@student')->name('communication.student');
    Route::get('communication/staff','Backend\CommunicationController@staff')->name('communication.staff');
    Route::get('communication/history','Backend\CommunicationController@history')->name('communication.history');

    Route::post('communication/send','Backend\CommunicationController@send')->name('communication.send');
    Route::post('communication/quick/send','Backend\CommunicationController@quickSend')->name('communication.quickSend');
    */
//End Communication Route




//Attendance Route by Rimon
    /*
    Route::get('attendance','Backend\AttendanceController@index')->name('custom.view');
    Route::get('attendance/dashboard','Backend\AttendanceController@dashboard')->name('attendance.dashboard');
    Route::get('attendance/student','Backend\AttendanceController@student')->name('attendance.student');
    Route::get('attendance/teacher','Backend\AttendanceController@teacher')->name('attendance.teacher');
    Route::get('attendance/report','Backend\AttendanceController@report')->name('attendance.report');
    Route::post('/get_attendance_monthly', 'Backend\AttendanceController@getAttendanceMonthly')->name('attendance.getAttendanceMonthly');
    Route::post('/indStudentAttendance','Backend\AttendanceController@individulAttendance')->name('student.indAttendance');
    Route::post('/classStudentAttendance','Backend\AttendanceController@classAttendance')->name('student.classAttendance');
    Route::post('/indTeacherAttendance','Backend\AttendanceController@individualTeacherAttendance')->name('teacher.indAttendance');
    */
//End Attendance Route


//Exam Route Start  by Rimon
    /*
Route::get('exam/gradesystem',[ExamController::class,'gradesystem'])->name('exam.gradesystem');
//Grading System @MKH
Route::post('exam/store-grade', [ExamController::class,'store_grade'])->name('exam.store_grade');
Route::get('exam/delete-grade/{id}', [ExamController::class,'delete_grade'])->name('exam.delete_grade');
Route::get('exam/examination',[ExamController::class,'examination'])->name('exam.examination');
Route::post('exam/sotre-exam', [ExamController::class,'store_exam'])->name('store.exam');
Route::delete('exam/destroy/{id}', [ExamController::class,'destroy'])->name('exam.destroy');
Route::get('exam/examitems',[ExamController::class,'examitems'])->name('exam.examitems');
Route::get('exam/schedule/create/{exam}',[ExamScheduleController::class,'create'])->name('exam.schedule.create');
Route::post('exam/schedule/store',[ExamScheduleController::class,'store'])->name('exam.schedule.store');
Route::get('exam/schedule/{examId}', [ExamScheduleController::class,'index'])->name('exam.schedule.index');
Route::post('exam/store-schedule', [ExamController::class,'store_schedule'])->name('exam.store_schedule');
Route::get('exam/admit-card/{exam_id}',[ExamController::class,'admitCard'])->name('exam.admitCard');
Route::get('exam/seat-allocate',[ExamController::class,'seatAllocate'])->name('exam.seatAllocate');
*/

// Exam Seat Plan Start
    /*
Route::get('exam/seat-plan/{examId}','Backend\ExamSeatPlanController@seatPlan')->name('exam-seat-plan.seatPlan');
Route::post('exam/check-roll','Backend\ExamSeatPlanController@CheckRoll')->name('exam-seat-plan.CheckRoll');
Route::post('exam/store-seat-plan','Backend\ExamSeatPlanController@storeSeatPlan')->name('exam-seat-plan.storeSeatPlan');
Route::get('exam/pdf-seat-plan/{id}','Backend\ExamSeatPlanController@pdfSeatPlan')->name('exam-seat-plan.pdfSeatPlan');
Route::delete('exam/destroy-seat-plan/{id}','Backend\ExamSeatPlanController@destroy')->name('exam-seat-plan.destroy');
*/
// Exam Seat Plan End

////Admission Route by Rimon
//    Route::get('admission/exams','Backend\AdmissionController@admissionExams')->name('admission.exams');
//    Route::get('admission/examResult','Backend\AdmissionController@admissionExamResult')->name('admission.examResult');
//    Route::get('admission/browse-merit-list','Backend\AdmissionController@browseMeritList')->name('admission.browseMeritList');
//    Route::get('admission/upload-merit-list','Backend\AdmissionController@uploadMeritList')->name('admission.uploadMeritList');
//    Route::post('admission/upload','Backend\AdmissionController@upload')->name('admission.upload');

    /*
Route::post('admission/slip-view','Backend\AdmissionController@slipView')->name('admission.slipView');
    */
//End Admission Route
    /*
    Route::get('exam/result-details/{id}','Backend\ResultController@resultDetails')->name('exam.resultDetails');
    Route::get('exam/final-result-details/{id}','Backend\ResultController@finalResultDetails')->name('exam.finalResultDetails');
    Route::get('exam/result-details-all','Backend\ResultController@allDetails')->name('exam.allDetails');
    Route::get('exam/examresult','Backend\ResultController@index')->name('exam.examresult');
    Route::get('exam/tabulation/{examID}','Backend\ResultController@tabulation')->name('exam.tabulation');
    Route::get('exam/generate-exam-result/{examID}','Backend\ResultController@generateResult')->name('exam.generateResult');

    Route::get('exam/setfinalresultrule','Backend\ResultController@setfinalresultrule')->name('exam.setfinalresultrule');
    Route::get('exam/getfinalresultrule','Backend\ResultController@getfinalresultrule')->name('exam.getfinalresultrule');
    Route::post('exam/final-result','Backend\ResultController@finalResultNew')->name('exam.finalResultNew');
    */
    Route::get('competencies',[CompetencyController::class,'index'])->name('competency.index');
    Route::post('competency/store',[CompetencyController::class,'store'])->name('competency.store');
    Route::get('competency/edit',[CompetencyController::class,'edit'])->name('competency.edit');
    Route::patch('competency/{id}/update',[CompetencyController::class,'update'])->name('competency.update');
    Route::post('competency/destroy/{id}',[CompetencyController::class,'destroy'])->name('competency.destroy');

    Route::get('indicators',[IndicatorController::class,'index'])->name('indicator.index');
    Route::post('indicator/store',[IndicatorController::class,'store'])->name('indicator.store');
    Route::get('indicator/edit',[IndicatorController::class,'edit'])->name('indicator.edit');
    Route::patch('indicator/{id}/update',[IndicatorController::class,'update'])->name('indicator.update');
    Route::post('indicator/destroy/{id}',[IndicatorController::class,'destroy'])->name('indicator.destroy');

    Route::get('remarks',[RemarkController::class,'index'])->name('remark.index');
    Route::post('remark/store',[RemarkController::class,'store'])->name('remark.store');
    Route::get('remark/edit',[RemarkController::class,'edit'])->name('remark.edit');
    Route::patch('remark/{id}/update',[RemarkController::class,'update'])->name('remark.update');
    Route::post('remark/destroy/{id}',[RemarkController::class,'destroy'])->name('remark.destroy');

    Route::get('competency-remark',[CompetencyRemarkController::class,'index'])->name('competency-remark.index');
    Route::get('competency-remark/create',[CompetencyRemarkController::class,'create'])->name('competency-remark.create');
    Route::post('competency-remark/store',[CompetencyRemarkController::class,'store'])->name('competency-remark.store');
    Route::get('competency-remark/edit',[CompetencyRemarkController::class,'edit'])->name('competency-remark.edit');
    Route::patch('competency-remark/{id}/update',[CompetencyRemarkController::class,'update'])->name('competency-remark.update');
    Route::post('competency-remark/destroy/{id}',[CompetencyRemarkController::class,'destroy'])->name('competency-remark.destroy');

    Route::get('pdf', function(){
        return view('form-pdf');
    });


    /*
    Route::get('role',[RolePermissionController::class, 'roleIndex'])->name('role.index');
    Route::get('role-create',[RolePermissionController::class, 'roleCreate'])->name('role.create');
    Route::post('role-store',[RolePermissionController::class, 'roleStore'])->name('role.store');
    Route::get('role-edit/{role}',[RolePermissionController::class, 'roleEdit'])->name('role.edit');
    Route::post('role-update',[RolePermissionController::class, 'roleUpdate'])->name('role.update');
    //create module for development
    Route::get('module-create',[RolePermissionController::class, 'moduleCreate'])->name('module.create');
    Route::post('module-store',[RolePermissionController::class, 'moduleStore'])->name('module.store');
    */

//CMS route
    /*
    Route::get('chairmanMessage',[MessageController::class,'editChairmanMessage'])->name('chairmanMessage.index');
    Route::get('principalMessage',[MessageController::class,'editPrincipalMessage'])->name('principalMessage.index');
    Route::get('aboutInstitute',[MessageController::class,'editAboutInstitute'])->name('aboutInstitute.index');
//principal , chairman and institute message update route
    Route::patch('chairmanMessageUpdate',[MessageController::class,'instituteMessageUpdate'])->name('instituteMessageUpdate');
    */

    Route::get('alumni',[AlumniController::class,'index'])->name('alumni');

    //Database backup
    /*
    Route::get('db-backup',[DbBackupController::class,'index'])->name('backup.db');
    */
    //Route::get('backup-download/{file_name}',[DbBackupContoller::class,'download'])->name('backup.download');
    // Route::get('add-backup',[DbBackupContoller::class,'createDatabaseBackup'])->name('backup.create');

//subscriber
    /*
    Route::get('subscriber/list',[SubscriberController::class,'index'])->name('subscriber.list');
    */
//end subscriber
});

//temp register addmission
    /*
Route::get('regligion-wise/report',[StudentReportController::class,'regligionWiseReport'])->name('regligion-wise.report');
Route::get('group-wise/report',[StudentReportController::class,'groupWiseReport'])->name('group-wise.report');
Route::get('custom/table',[StudentReportController::class,'customTable'])->name('create-custom.table');
    */
//end temp register addmission


//Tc
/*
Route::get('student/tc','Backend\StudentController@transferCertificate')->name('student.tc');
*/
// Money Receipt
// manuel attendence
/*
Route::get('student/manuel-attendence','Backend\AttendanceController@StuManuelAttendence')->name('student.manuel-attendence');
Route::get('/student/manuel-attendence-change','Backend\AttendanceController@StuManuelAttendenceStatus')->name('student.manuel-attendence-status');
*/
//end manuel attendence
/*
Route::get('student/money','Backend\StudentController@moneyReceipt')->name('student.money');
*/