<?php

use App\Http\Controllers\Student\ProfileController;


Route::get('student/login','Student\ProfileController@showLoginForm')->name('student.login');
Route::get('student/profile','Student\ProfileController@profile')->name('student.profile');
Route::post('student/marks','Student\ProfileController@marks')->name('student.marks');
Route::post('student/diary',[ProfileController::class, 'diary'])->name('student.diary');
Route::post('student/stdAttendance',[ProfileController::class, 'stdAttendance']);
Route::post('student/class-schedule',[ProfileController::class, 'classSchedule'])->name('student.class-schedule');
Route::post('student/examRoutine',[ProfileController::class, 'examRoutine']);
Route::post('student/syllabus',[ProfileController::class, 'syllabus']);

Route::prefix('student')->name('student.')->namespace('Student')->group(function(){
    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
//        student diary
    });

});
