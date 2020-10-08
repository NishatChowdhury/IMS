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
});
