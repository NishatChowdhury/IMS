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

    Route::get('themes','ThemeController@index');
});
