<?php

Route::group(['prefix'=>'admin'],function(){

    //Student Routes
    Route::get('student/tod','StudentController@tod');
    Route::get('student/esif','StudentController@esif');
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
});
