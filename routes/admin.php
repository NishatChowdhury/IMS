<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\FeeCartController;
use App\Http\Controllers\Backend\FeeSetupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FeeCollectionController;
use App\Http\Controllers\Backend\OnlineApplyController;

Route::group(['prefix'=>'admin'], function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin');
    Route::get('backup',[HomeController::class,'backup'])->name('admin.backup');

    Route::get('transactions','Backend\TransactionController@index');
    Route::get('transaction/create','Backend\TransactionController@create');
    Route::post('transaction/store','Backend\TransactionController@store');

    //Student Routes
    Route::get('student/tod','Backend\StudentController@tod');
    Route::get('student/esif','Backend\StudentController@esif');
    Route::get('student/images','Backend\StudentController@images');
    //Student Routes End

    //Accounts
    Route::get('coa','Backend\ChartOfAccountController@index');
    Route::get('coa/create','Backend\ChartOfAccountController@create');
    Route::post('coa/store','Backend\ChartOfAccountController@store');
    Route::get('coa/edit/{id}','Backend\ChartOfAccountController@edit');
    Route::patch('coa/{id}/update','Backend\ChartOfAccountController@update');
    Route::delete('coa/destroy/{id}','Backend\ChartOfAccountController@destroy');
    Route::post('coa/status','Backend\ChartOfAccountController@isEnabled');
    //Accounts End

    //Admission Routes
    Route::post('admission/store','Backend\AdmissionController@store');
    Route::post('admission/unapprove/{roll}','Backend\AdmissionController@unapprove');
    //Admission Routes Ends

//Upcoming Events
    Route::get('events','Backend\UpcomingEventController@index');
    Route::get('event/create','Backend\UpcomingEventController@create');
    Route::post('event/store','Backend\UpcomingEventController@store');
    Route::get('event/show/{id}','Backend\UpcomingEventController@show');
    Route::get('event/edit/{id}','Backend\UpcomingEventController@edit');
    Route::patch('event/{id}/update','Backend\UpcomingEventController@update');
    Route::delete('event/destroy/{id}','Backend\UpcomingEventController@destroy');
//Upcoming Events Ends

    //Playlists
    Route::get('playlists','Backend\PlaylistController@index');
    Route::post('playlist/store','Backend\PlaylistController@store');
    Route::get('playlist/show/{id}','Backend\PlaylistController@show');
    Route::delete('playlist/destroy/{id}','Backend\PlaylistController@destroy');
    //Playlists Ends

    //Videos
    Route::get('videos','Backend\VideoController@index');
    Route::post('video/store','Backend\VideoController@store');
    Route::get('video/edit','Backend\VideoController@edit')->name('video.edit');
    Route::patch('video/{id}/update','Backend\VideoController@update');
    Route::delete('video/destroy/{id}','Backend\VideoController@destroy');
    //Videos End

    //Applied Student
    Route::post('applied-student/view','Backend\AppliedStudentController@studentView');
    //Applied Student Ends

    //Holiday Setup
    Route::get('holidays','Backend\HolidayController@index')->name('attendance.holiday');
    Route::post('holiday/store','Backend\HolidayController@store');
    Route::get('holiday/edit/{id}','Backend\HolidayController@edit');
    Route::patch('holiday/{id}/update','Backend\HolidayController@update');
    Route::delete('holiday/delete/{id}','Backend\HolidayController@destroy');
    //Holiday Setup


        // Imam Hasan Journal Routes
    Route::resource('journals', "Backend\JournalController")->middleware('auth');
    Route::get('journal/classic','Backend\JournalController@classic');
    Route::get('cash-book','Backend\AccountingController@cashBook');
    Route::post('cash-book-settings','Backend\AccountingController@cashBookSetting');
    Route::get('ledger','Backend\AccountingController@ledger');
    Route::get('trial-balance','Backend\AccountingController@trialBalance');
    Route::get('profit-n-loss','Backend\AccountingController@profitNLoss');
    Route::get('balance-sheet','Backend\AccountingController@balanceSheet');
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
    Route::get('menus','Backend\MenuController@index');
    Route::post('menu/store','Backend\MenuController@store')->name('menu.store');
    Route::get('menu/edit','Backend\MenuController@edit')->name('menu.edit');
    Route::patch('menu/{id}/update','Backend\MenuController@update')->name('menu.update');
    Route::delete('menu/destroy/{id}','Backend\MenuController@destroy');
    /** Menu Routes Ends */

    Route::get('pages','Backend\PageController@index');
    Route::get('page/create','Backend\PageController@create');
    Route::post('page/store','Backend\PageController@store');
    Route::get('page/edit/{id}','Backend\PageController@edit');
    Route::patch('pages/{id}/update','Backend\PageController@update');
    Route::delete('pages/destroy/{id}','Backend\PageController@destroy');
    Route::delete('pages/remove/{id}','Backend\PageController@remove');

    Route::get('siteinfo','Backend\SiteInformationController@index')->name('siteinfo');
    Route::patch('site-info/update','Backend\SiteInformationController@update');
    Route::patch('site-info/google_map','Backend\SiteInformationController@update_google_map');
    Route::patch('site-info/logo','Backend\SiteInformationController@logo');

    Route::get('sliders','Backend\SliderController@index');
    Route::post('slider/store','Backend\SliderController@store');
    Route::delete('slider/destroy/{id}','Backend\SliderController@destroy');

    // Important Links
    Route::get('settings/links','Backend\LinkController@index');
    Route::post('settings/link/store','Backend\LinkController@store');
    Route::delete('settings/link/delete/{id}','Backend\LinkController@destroy');
// End Important Links


    //Settings Route by Rimon
    Route::get('settings/basicInfo','Backend\SettingsController@basicInfo')->name('settings.basicInfo');




    Route::get('students','Backend\StudentController@index')->name('student.list');
    Route::get('student/create','Backend\StudentController@create')->name('student.add');
    Route::get('student/edit/{id}','Backend\StudentController@edit');
    Route::patch('student/{id}/update','Backend\StudentController@update');
    Route::get('student/drop/{id}','Backend\StudentController@dropOut');
    Route::get('student/subjects/{id}','Backend\StudentController@subjects');
    Route::patch('student/{id}/assign','Backend\StudentController@assignSubject');
    Route::get('/load_student_id','Backend\StudentController@loadStudentId');

    Route::get('student/promotion','Backend\StudentController@promotion')->name('student.promotion');
    Route::post('student/promote','Backend\StudentController@promote')->name('student.promote');

    Route::get('features','Backend\FeatureController@index');
    Route::get('feature/create','Backend\FeatureController@create');
    Route::post('feature/store','Backend\FeatureController@store');
    Route::get('feature/edit/{id}','Backend\FeatureController@edit');
    Route::patch('feature/{id}/update','Backend\FeatureController@update');
    Route::delete('feature/destroy/{id}','Backend\FeatureController@destroy');

    Route::get('themes','Backend\ThemeController@index');
    Route::get('theme/edit/{id}','Backend\ThemeController@edit');
    Route::delete('theme/destroy/{id}','Backend\ThemeController@destroy');

    // smartrahat start


    Route::get('notices','Backend\NoticeController@index');
    Route::post('notice/store','Backend\NoticeController@store');
    Route::get('notice/edit/{id}','Backend\NoticeController@edit');
    Route::patch('notice/{id}/update','Backend\NoticeController@update');
    Route::delete('notice/destroy/{id}','Backend\NoticeController@destroy');

    Route::get('notice/category','Backend\NoticeCategoryController@index');
    Route::post('notice/category/store','Backend\NoticeCategoryController@store');
    Route::get('notice/category/edit/{id}','Backend\NoticeCategoryController@edit');

    Route::get('notice/type','Backend\NoticeTypeController@index');
    Route::post('notice/type/store','Backend\NoticeTypeController@store');
    Route::get('notice/type/edit/{id}','Backend\NoticeTypeController@edit');

// smartrahat end

    //Weekly Off Setting starts by Nishat
    Route::get('attendance/weeklyOff','Backend\WeeklyOffController@index');
    Route::post('attendance/weeklyOff/store','Backend\WeeklyOffController@store')->name('weeklyOff.store');
    Route::get('attendance/weeklyOff/edit/{id}','Backend\WeeklyOffController@edit')->name('weeklyOff.edit');
    Route::delete('attendance/weeklyOff/delete/{id}','Backend\WeeklyOffController@destroy');
//Weekly Off Setting ends by Nishat

    /** User Routes */
    Route::get('users','Backend\UserController@index');
    Route::get('user/create','Backend\UserController@create')->name('user.add');
    Route::post('user/store','Backend\UserController@store');
    Route::get('user/edit/{id}','Backend\UserController@edit');
    Route::delete('user/destroy/{id}','Backend\UserController@destroy');
    /** User Routes End */

    //Syllabus Section Start A R Babu
    Route::get('syllabuses','Backend\SyllabusController@index')->name('syllabus.index');
    Route::post('syllabus/store','Backend\SyllabusController@store')->name('syllabus.store');
    Route::get('syllabus/delete/{id}','Backend\SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End

    //leave purpose starts by Nishat
    Route::get('attendance/leavePurpose','Backend\LeavePurposeController@index');
    Route::get('attendance/leavePurpose/add','Backend\LeavePurposeController@add')->name('leavePurpose.add');
    Route::post('attendance/leavePurpose/store','Backend\LeavePurposeController@store')->name('leavePurpose.store');
    Route::get('attendance/leavePurpose/edit/{id}','Backend\LeavePurposeController@edit')->name('leavePurpose.edit');
    Route::patch('attendance/leavePurpose/{id}/update','Backend\LeavePurposeController@update')->name('leavePurpose.update');
    Route::post('attendance/leavePurpose/delete/{id}','Backend\LeavePurposeController@destroy')->name('leavePurpose.delete');
    //leave purpose ends by Nishat

    //leave management starts by Nishat
    Route::get('attendance/leaveManagement','Backend\LeaveManagementController@index');
    Route::get('attendance/leaveManagement/add','Backend\LeaveManagementController@add')->name('leaveManagement.add');
    Route::post('attendance/leaveManagement/store','Backend\LeaveManagementController@store')->name('leaveManagement.store');
    Route::get('attendance/leaveManagement/edit/{id}','Backend\LeaveManagementController@edit')->name('leaveManagement.edit');
    Route::delete('attendance/leaveManagement/delete/{id}','Backend\LeaveManagementController@destroy');
    //leave management ends by Nishat

    //Book Category starts by Nishat
    Route::get('library/bookCategory','Backend\BookCategoryController@index');
    Route::get('library/bookCategory/add','Backend\BookCategoryController@add')->name('bookCategory.add');
    Route::post('library/bookCategory/store','Backend\BookCategoryController@store')->name('bookCategory.store');
    Route::get('library/bookCategory/edit','Backend\BookCategoryController@edit')->name('book-category.edit');
//    Route::get('library/bookCategory/edit/{id}','Backend\BookCategoryController@edit')->name('bookCategory.edit');
    Route::patch('library/bookCategory/{id}/update','Backend\BookCategoryController@update')->name('bookCategory.update');
    Route::post('library/bookCategory/delete/{id}','Backend\BookCategoryController@destroy')->name('bookCategory.delete');

    //Book Category ends by Nishat
    //Admission Route by Rimon
    Route::get('admission/exams','Backend\AdmissionController@admissionExams')->name('admission.exams');
    Route::get('admission/examResult','Backend\AdmissionController@admissionExamResult')->name('admission.examResult');
    Route::get('admission/browse-merit-list','Backend\AdmissionController@browseMeritList');
    Route::get('admission/upload-merit-list','Backend\AdmissionController@uploadMeritList');
    Route::post('admission/upload','Backend\AdmissionController@upload');

    Route::post('admission/slip-view','Backend\AdmissionController@slipView');

    Route::get('attendance/setting','Backend\ShiftController@index');
    Route::post('attendance/shift/store','Backend\ShiftController@store');
    Route::delete('attendance/shift/delete/{id}','Backend\ShiftController@destroy');

    Route::get('exam/marks/{schedule}','Backend\MarkController@index');
    Route::get('exam/mark/download/{schedule}','Backend\MarkController@download');
    Route::get('exam/mark/upload/{schedule}','Backend\MarkController@upload');
    Route::post('exam/mark/up','Backend\MarkController@up');
    Route::post('exam/mark/store','Backend\MarkController@store');
    
    Route::get('exam/tabulationSheet','Backend\ExamController@tabulationSheet')->name('exam.tabulationSheet');
    //Exam management End
    

    //Students Route by Rimon
    Route::get('student/designStudentCard','Backend\IdCardController@index');
    Route::get('student/testimonial','Backend\StudentController@testimonial')->name('student.testimonial');

    Route::get('student/download-blank-csv/{academicClassId}','Backend\StudentController@downloadBlank');
    Route::get('student/upload-student/{academicClassId}','Backend\StudentController@uploadStudent');
    Route::post('student/up','Backend\StudentController@up');

    Route::get('staff/idCard','Backend\IdCardController@staff');
    Route::post('staff/idCard/pdf','Backend\IdCardController@staffPdf');

    //@MKH
    Route::post('student/store', 'Backend\StudentController@store');
    Route::get('student/optional','Backend\StudentController@optional');
    Route::post('student/optional/assign','Backend\StudentController@assignOptional');
    //End Students Route

    // ID Card Routes
    Route::post('student/card/pdf','IdCardController@pdf');
    // ID Card Routes


//Contact page start
Route::get('message-index','Backend\MessagesController@index')->name('message.index');
Route::delete('message-delete/{id}','Backend\MessagesController@destroy')->name('message.destroy');
Route::post('message-view','Backend\MessagesController@view')->name('message.view');
Route::post('message-store','Backend\MessagesController@store')->name('message.store');
//Contact Page end

    //library Management Starts By Nishat
    //Add New Book
    Route::get('library/books','Backend\BookController@index');
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
    Route::post('library/return-books/store','Backend\BookController@returnBookStore')->name('returnBook.store');


//    report
    Route::get('library/report','Backend\BookController@report')->name('report');

    //library management ends by Nishat

//    route for api setting starts here

    Route::get('communication/apiSetting','Backend\CommunicationSettingController@index')->name('communication.apiSetting');
    Route::patch('communication/apiSetting/update','Backend\CommunicationSettingController@update')->name('apiSetting.update');

//    route for api setting ends here

//    route for email setting starts here
    Route::get('setting/email','Backend\emailSettingController@index')->name('setting.email');
    Route::post('setting/email/store','Backend\emailSettingController@store')->name('email.store');
    Route::post('setting/email/edit','Backend\emailSettingController@edit')->name('email.edit');
    Route::post('setting/email/update','Backend\emailSettingController@update')->name('email.update');
    Route::delete('setting/email/delete/{id}','Backend\emailSettingController@destroy')->name('email.delete');
//    route for email setting ends here

    //    route for google map setting starts here
    Route::get('setting/map','Backend\MapSettingController@index')->name('setting.map');
    Route::get('setting/map/store','Backend\MapSettingController@store')->name('map.store');
//    route for google map setting ends here

    //Social Links start
    Route::get('socials','Backend\SocialController@index')->name('social.index');
    Route::post('socials/update/{id}','Backend\SocialController@update')->name('social.store');
//Social Links End

    Route::get('page-media/destroy/{id}','PageMediaController@destroy');



//Class Schedule
Route::get('institution/class/schedule/{class}','Backend\ScheduleController@index');
Route::post('institution/class/schedule/store','Backend\ScheduleController@store');


//Route for fee setup starts here
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

    Route::post('fee/fee-cart/store',[FeeCartController::class,'store']);
    Route::post('fee/fee-cart/destroy',[FeeCartController::class,'destroy']);
    Route::post('fee/fee-cart/flush',[FeeCartController::class,'flush']);

    Route::post('fee/edit-fee-cart/destroy',[FeeCartController::class,'EditFeeCartDestroy']);
//Route for fee setup ends here

    //Route for fee collection starts here
    Route::get('fee/fee-collection',[FeeCollectionController::class,'index']);
    Route::get('fee/fee-collection/view',[FeeCollectionController::class,'view']);
    Route::post('fee/fee-collection/store',[FeeCollectionController::class,'store']);
    Route::get('fee/all-collections',[FeeCollectionController::class,'allCollections']);
    Route::get('fee/all-collection/report/{id}',[FeeCollectionController::class,'report']);

    //Route for fee collection ends here

    // Gallery Routes start
    Route::get('gallery/image','Backend\GalleryController@index')->name('settings.image');
    Route::post('gallery/image/store','Backend\GalleryController@store');
    Route::delete('gallery/image/destroy/{id}','Backend\GalleryController@destroy');

    Route::get('gallery/category','Backend\GalleryCategoryController@index');
    Route::post('gallery/category/store','Backend\GalleryCategoryController@store');
    Route::delete('gallery/category/destroy/{id}','Backend\GalleryCategoryController@destroy');

    Route::get('gallery/albums','Backend\AlbumController@index');
    Route::post('gallery/album/store','Backend\AlbumController@store');
    Route::delete('gallery/album/delete/{id}','Backend\AlbumController@destroy');
// Gallery Routes ends

    Route::get('database-backup', [HomeController::class, 'database']);
    Route::get('download-database', [HomeController::class, 'downloadDatabase']);
    Route::get('download-database1', [HomeController::class, 'downloadDatabase1']);

    Route::get('admission/applicant', 'Backend\OnlineApplyController@index');
    Route::get('online-application-view/{id}', 'Backend\OnlineApplyController@applyStudentProfile');
    Route::get('get-apply-info', 'Backend\OnlineApplyController@getApplyInfo');
    Route::get('get-apply-info-session', 'Backend\OnlineApplyController@getApplyInfoSession');

    Route::get('admission/create', 'Backend\OnlineApplyController@onlineApplyIndex');
    Route::post('get-apply-set-store', 'Backend\OnlineApplyController@onlineApplySetStore')->name('online.typeSave');
    Route::get('load_online_adminsion_id/{id}', 'Backend\OnlineApplyController@load_online_adminsion_id')->name('onlineStepEdit');
    Route::post('onlineApplySetUpdate', 'Backend\OnlineApplyController@onlineApplySetUpdate')->name('online.typeUpdate');
    Route::post('/online-apply-move',[OnlineApplyController::class,'moveToStudent']);

    
    Route::get('academic-calender/index','Backend\AcademicCalenderController@index')->name('academic-calender.index');
    Route::post('academic-calender/store','Backend\AcademicCalenderController@store')->name('academic-calender.store');
    Route::post('academic-calender/edit','Backend\AcademicCalenderController@edit')->name('academic-calender.edit');
    Route::post('academic-calender/update','Backend\AcademicCalenderController@update')->name('academic-calender.update');
    Route::delete('academic-calender/{id}','Backend\AcademicCalenderController@destroy')->name('academic-calender.delete');
    Route::put('academic-calender/status/{id}','Backend\AcademicCalenderController@status')->name('academic-calender.status');


    // Student Transport management Start
    Route::get('fee-category/transport','Backend\TransportController@index')->name('transport.index');
    Route::post('fee-category/transport','Backend\TransportController@store')->name('transport.store');
    Route::post('fee-category/transport','Backend\TransportController@store')->name('transport.store');
    Route::get('transport/edit/{id}','Backend\TransportController@edit')->name('transport.edit');
    Route::patch('transport/update/{id}','Backend\TransportController@update')->name('transport.update');
    Route::get('transport/student-list','Backend\TransportController@student_list')->name('transport.student-list');
    Route::post('transport/assign','Backend\TransportController@transport_assign')->name('transport.assign');
// Student Transport management End
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
// Route::post('fee_setup/store/{classId}','Backend\FeeCategoryController@store_fee_setup')->name('fee-setup.store');
Route::get('fee_setup/list/{classId}','Backend\FeeCategoryController@list_fee_setup')->name('fee-setup.list');
Route::get('fee_setup/show/{id}', 'Backend\FeeCategoryController@show_fee_setup')->name('fee-setup.show');
Route::patch('fee_setup/{id}/update','Backend\FeeCategoryController@update_fee_setup')->name('fee-setup.update');
//  Fee Setup End


//Student profile start
Route::get('student-profile/{studentId}','Backend\StudentController@studentProfile')->name('admin.student.profile');
//Staff Route 
Route::get('staff-profile/{staffId}','Backend\StaffController@staffProfile')->name('staff.profile');
Route::get('staff/teacher','Backend\StaffController@teacher')->name('staff.teacher');
Route::get('staff/staffadd','Backend\StaffController@addstaff')->name('staff.addstaff');
Route::post('staff/store-staff','Backend\StaffController@store_staff');
Route::get('staff/edit-staff/{id}','Backend\StaffController@edit_staff');
Route::patch('staff/{id}/update-staff','Backend\StaffController@update_staff');
Route::get('staff/delete-staff/{id}','Backend\StaffController@delete_staff');
Route::get('staff/threshold','Backend\StaffController@threshold')->name('staff.threshold');
Route::get('staff/kpi','Backend\StaffController@kpi')->name('staff.kpi');
Route::get('staff/payslip','Backend\StaffController@payslip')->name('staff.payslip');

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




// Student Fee Collection start
Route::get('student/fee','Backend\FinanceController@index')->name('student.fee');
Route::post('student/fee-store','Backend\FinanceController@store_payment')->name('student.fee-store');
Route::get('student/fee-invoice/{id}','Backend\FinanceController@fee_invoice')->name('student.fee-invoice');
// Student Fee Collection End

// Student Fee Collection Report Start
Route::get('report/student-fee-report','Backend\ReportController@student_fee_report')->name('report.student-fee');
Route::get('report/student-monthly-fee-report','Backend\ReportController@student_monthly_fee_report')->name('report.student-monthly-fee');
// Student Fee Collection Report End




//Communication Route by Rimon
Route::get('communication/quick','Backend\CommunicationController@quick')->name('communication.quick');
Route::get('communication/student','Backend\CommunicationController@student')->name('communication.student');
Route::get('communication/staff','Backend\CommunicationController@staff')->name('communication.staff');
Route::get('communication/history','Backend\CommunicationController@history')->name('communication.history');

Route::post('communication/send','Backend\CommunicationController@send');
Route::post('communication/quick/send','Backend\CommunicationController@quickSend');
//End Communication Route




//Attendance Route by Rimon
Route::get('attendance','Backend\AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','Backend\AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/student','Backend\AttendanceController@student')->name('attendance.student');
Route::get('attendance/teacher','Backend\AttendanceController@teacher')->name('attendance.teacher');
Route::get('attendance/report','Backend\AttendanceController@report')->name('attendance.report');
Route::post('/get_attendance_monthly', 'Backend\AttendanceController@getAttendanceMonthly');
Route::post('/indStudentAttendance','Backend\AttendanceController@individulAttendance')->name('student.indAttendance');
Route::post('/classStudentAttendance','Backend\AttendanceController@classAttendance')->name('student.classAttendance');
Route::post('/indTeacherAttendance','Backend\AttendanceController@individualTeacherAttendance')->name('teacher.indAttendance');
//End Attendance Route


//Exam Route Start  by Rimon
Route::get('exam/gradesystem','Backend\ExamController@gradesystem')->name('exam.gradesystem');
//Grading System @MKH
Route::post('exam/store-grade', 'Backend\ExamController@store_grade');
Route::get('exam/delete-grade/{id}', 'Backend\ExamController@delete_grade');
Route::get('exam/examination','Backend\ExamController@examination')->name('exam.examination');
Route::post('exam/sotre-exam', 'Backend\ExamController@store_exam')->name('store.exam');
Route::delete('exam/destroy/{id}', 'Backend\ExamController@destroy');
Route::get('exam/examitems','Backend\ExamController@examitems')->name('exam.examitems');
Route::get('exam/schedule/create/{exam}','Backend\ExamScheduleController@create');
Route::post('exam/schedule/store','Backend\ExamScheduleController@store');
Route::get('exam/schedule/{examId}', 'Backend\ExamController@schedule');
Route::post('exam/store-schedule', 'Backend\ExamController@store_schedule');
Route::get('exam/admit-card','Backend\ExamController@admitCard');
Route::get('exam/seat-allocate','Backend\ExamController@seatAllocate');

// Exam Seat Plan Start
Route::get('exam/seat-plan/{examId}','Backend\ExamSeatPlanController@seatPlan');
Route::post('exam/check-roll','Backend\ExamSeatPlanController@CheckRoll');
Route::post('exam/store-seat-plan','Backend\ExamSeatPlanController@storeSeatPlan');
Route::get('exam/pdf-seat-plan/{id}','Backend\ExamSeatPlanController@pdfSeatPlan');
Route::delete('exam/destroy-seat-plan/{id}','Backend\ExamSeatPlanController@destroy');

// Exam Seat Plan End



Route::get('exam/result-details/{id}','Backend\ResultController@resultDetails');
Route::get('exam/final-result-details/{id}','Backend\ResultController@finalResultDetails');
Route::get('exam/result-details-all','Backend\ResultController@allDetails');
Route::get('exam/examresult','Backend\ResultController@index')->name('exam.examresult');
Route::get('exam/tabulation/{examID}','Backend\ResultController@tabulation');
Route::get('exam/generate-exam-result/{examID}','Backend\ResultController@generateResult');

Route::get('exam/setfinalresultrule','Backend\ResultController@setfinalresultrule')->name('exam.setfinalresultrule');
Route::get('exam/getfinalresultrule','Backend\ResultController@getfinalresultrule')->name('exam.getfinalresultrule');
Route::post('exam/final-result','Backend\ResultController@finalResultNew');

Route::get('pdf', function(){
return view('form-pdf');
});









});
