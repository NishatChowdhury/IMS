<?php

Route::group(['prefix'=>'admin'],function(){

    Route::get('transactions','TransactionController@index');
    Route::get('transaction/create','TransactionController@create');
    Route::post('transaction/store','TransactionController@store');

    //Student Routes
    Route::get('student/tod','StudentController@tod');
    Route::get('student/esif','StudentController@esif');
    Route::get('student/images','StudentController@images');
    //Student Routes End

    //Accounts
    Route::get('coa','ChartOfAccountController@index');
    Route::get('coa/create','ChartOfAccountController@create');
    Route::post('coa/store','ChartOfAccountController@store');
    Route::get('coa/edit/{id}','ChartOfAccountController@edit');
    Route::patch('coa/{id}/update','ChartOfAccountController@update');
    Route::delete('coa/destroy/{id}','ChartOfAccountController@destroy');
    //Accounts End

    //Admission Routes
    Route::post('admission/store','AdmissionController@store');
    Route::post('admission/unapprove/{roll}','AdmissionController@unapprove');
    //Admission Routes Ends

//Upcoming Events
    Route::get('events','UpcomingEventController@index');
    Route::get('event/create','UpcomingEventController@create');
    Route::post('event/store','UpcomingEventController@store');
    Route::get('event/show/{id}','UpcomingEventController@show');
    Route::get('event/edit/{id}','UpcomingEventController@edit');
    Route::patch('event/{id}/update','UpcomingEventController@update');
    Route::delete('event/destroy/{id}','UpcomingEventController@destroy');
//Upcoming Events Ends

    //Playlists
    Route::get('playlists','PlaylistController@index');
    Route::post('playlist/store','PlaylistController@store');
    Route::get('playlist/show/{id}','PlaylistController@show');
    Route::delete('playlist/destroy/{id}','PlaylistController@destroy');
    //Playlists Ends

    //Videos
    Route::get('videos','VideoController@index');
    Route::post('video/store','VideoController@store');
    Route::delete('video/destroy/{id}','VideoController@destroy');
    //Videos End

    //Applied Student
    Route::post('applied-student/view','AppliedStudentController@studentView');
    //Applied Student Ends

    //Holiday Setup
    Route::get('holidays','HolidayController@index')->name('attendance.holiday');
    Route::post('holiday/store','HolidayController@store');
    Route::get('holiday/edit/{id}','HolidayController@edit');
    Route::patch('holiday/{id}/update','HolidayController@update');
    Route::delete('holiday/delete/{id}','HolidayController@destroy');
    //Holiday Setup


        // Imam Hasan Journal Routes
    Route::resource('journals', "JournalController")->middleware('auth');
    // Imam Hasan Journal Routes
    // Imam Hasan Journal Routes
    Route::resource('journals', "JournalController")->middleware('auth');
// Imam Hasan Journal Routes

    // accounting Reports by Imam Hasan\
    Route::get('balance-sheet', "AccountingController@balance_sheet")->name('balance_sheet');
    // accounting Reports by Imam Hasan

    // Route for test
    Route::view('bl', 'admin.reports.balance_sheet');
    // Route for test
    /** Menu Routes Starts */
    Route::get('menus','MenuController@index');
    Route::post('menu/store','MenuController@store')->name('menu.store');
    Route::get('menu/edit','MenuController@edit')->name('menu.edit');
    Route::patch('menu/{id}/update','MenuController@update')->name('menu.update');
    Route::delete('menu/destroy/{id}','MenuController@destroy');
    /** Menu Routes Ends */

    Route::get('pages','PageController@index');
    Route::get('page/create','PageController@create');
    Route::post('page/store','PageController@store');
    Route::get('page/edit/{id}','PageController@edit');
    Route::patch('pages/{id}/update','PageController@update');

    Route::get('siteinfo','SiteInformationController@index')->name('siteinfo');
    Route::patch('site-info/update','SiteInformationController@update');
    Route::patch('site-info/logo','SiteInformationController@logo');

    Route::get('sliders','SliderController@index');
    Route::post('slider/store','SliderController@store');
    Route::delete('slider/destroy/{id}','SliderController@destroy');

    Route::get('students','StudentController@index')->name('student.list');
    Route::get('student/create','StudentController@create')->name('student.add');
    Route::get('student/edit/{id}','StudentController@edit');
    Route::patch('student/{id}/update','StudentController@update');
    Route::get('student/drop/{id}','StudentController@dropOut');
    Route::get('/load_student_id','StudentController@loadStudentId');
    Route::get('/load_online_student_info','FrontController@loadStudentInfo');

    Route::get('features','FeatureController@index');
    Route::get('feature/create','FeatureController@create');
    Route::post('feature/store','FeatureController@store');
    Route::get('feature/edit/{id}','FeatureController@edit');
    Route::patch('feature/{id}/update','FeatureController@update');
    Route::delete('feature/destroy/{id}','FeatureController@destroy');

    Route::get('themes','ThemeController@index');

    // smartrahat start


    Route::get('notices','NoticeController@index');
    Route::post('notice/store','NoticeController@store');
    Route::get('notice/edit/{id}','NoticeController@edit');
    Route::patch('notice/{id}/update','NoticeController@update');
    Route::delete('notice/destroy/{id}','NoticeController@destroy');

    Route::get('notice/category','NoticeCategoryController@index');
    Route::post('notice/category/store','NoticeCategoryController@store');
    Route::get('notice/category/edit/{id}','NoticeCategoryController@edit');

    Route::get('notice/type','NoticeTypeController@index');
    Route::post('notice/type/store','NoticeTypeController@store');
    Route::get('notice/type/edit/{id}','NoticeTypeController@edit');

// smartrahat end

    //Weekly Off Setting starts by Nishat
    Route::get('attendance/weeklyOff','WeeklyOffController@index');
    Route::post('attendance/weeklyOff/store','WeeklyOffController@store')->name('weeklyOff.store');
    Route::get('attendance/weeklyOff/edit/{id}','WeeklyOffController@edit')->name('weeklyOff.edit');
    Route::delete('attendance/weeklyOff/delete/{id}','WeeklyOffController@destroy');
//Weekly Off Setting ends by Nishat

    /** User Routes */
    Route::get('users','UserController@index');
    Route::get('user/create','UserController@create')->name('user.add');
    Route::get('user/edit/{id}','UserController@edit');
    Route::delete('user/destroy/{id}','UserController@destroy');
    /** User Routes End */


    //Syllabus Section Start A R Babu
    Route::get('syllabuses','SyllabusController@index')->name('syllabus.index');
    Route::post('syllabus/store','SyllabusController@store')->name('syllabus.store');
    Route::get('syllabus/delete/{id}','SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End

    //leave purpose starts by Nishat
    Route::get('attendance/leavePurpose','LeavePurposeController@index');
    Route::get('attendance/leavePurpose/add','LeavePurposeController@add')->name('leavePurpose.add');
    Route::post('attendance/leavePurpose/store','LeavePurposeController@store')->name('leavePurpose.store');
    Route::get('attendance/leavePurpose/edit/{id}','LeavePurposeController@edit')->name('leavePurpose.edit');
    Route::post('attendance/leavePurpose/delete/{id}','LeavePurposeController@destroy')->name('leavePurpose.delete');
    //leave purpose ends by Nishat

    //leave management starts by Nishat
    Route::get('attendance/leaveManagement','LeaveManagementController@index');
    Route::get('attendance/leaveManagement/add','LeaveManagementController@add')->name('leaveManagement.add');
    Route::post('attendance/leaveManagement/store','LeaveManagementController@store')->name('leaveManagement.store');
    Route::get('attendance/leaveManagement/edit/{id}','LeaveManagementController@edit')->name('leaveManagement.edit');
    Route::delete('attendance/leaveManagement/delete/{id}','LeaveManagementController@destroy');
    //leave management ends by Nishat

    //Book Category starts by Nishat
    Route::get('library/bookCategory','BookCategoryController@index');
    Route::get('library/bookCategory/add','BookCategoryController@add')->name('bookCategory.add');
    Route::post('library/bookCategory/store','BookCategoryController@store')->name('bookCategory.store');
    Route::get('library/bookCategory/edit/{id}','BookCategoryController@edit')->name('bookCategory.edit');
    Route::patch('library/bookCategory/{id}/update','BookCategoryController@update')->name('bookCategory.update');
    Route::post('library/bookCategory/delete/{id}','BookCategoryController@destroy')->name('bookCategory.delete');

    //Book Category ends by Nishat



    //library Management Starts By Nishat
    //Add New Book
    Route::get('library/books','NewBookController@index');
    Route::get('library/allBooks','NewBookController@show')->name('allBooks.show');
    Route::get('library/SearchBook','NewBookController@search')->name('allBooks.search');
    Route::get('library/books/add','NewBookController@add')->name('newBook.add');
    Route::post('library/books/store','NewBookController@store')->name('newBook.store');
    Route::get('library/books/edit/{id}','NewBookController@edit')->name('newBook.edit');
    Route::patch('library/books/{id}/update','NewBookController@update')->name('newBook.update');
    Route::post('library/books/delete/{id}','NewBookController@destroy')->name('newBook.delete');

    //issue/return books
    Route::get('library/issue_books','NewBookController@issueBook')->name('issueBook.index');
    Route::post('library/issue-books/store','NewBookController@issueBookStore')->name('issueBook.store');
    Route::get('library/return_books','NewBookController@returnBook')->name('returnBook.index');
    Route::post('library/return-books/store','NewBookController@returnBookStore')->name('returnBook.store');

    //library management ends by Nishat

});
