<?php

use App\Http\Controllers\Student\NagadPaymentController;
use App\Http\Controllers\Student\SslCommerzPaymentController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('student/login','Student\ProfileController@showLoginForm')->name('student.login');
Route::get('student/profile','Student\ProfileController@profile')->name('student.profile');
Route::post('student/marks','Student\ProfileController@marks')->name('student.marks');
Route::post('student/diary',[ProfileController::class, 'diary'])->name('student.diary');
Route::post('student/stdAttendance',[ProfileController::class, 'stdAttendance'])->name('student.attendance');
Route::post('student/class-schedule',[ProfileController::class, 'classSchedule'])->name('student.class-schedule');
Route::post('student/exam-routine',[ProfileController::class, 'examRoutine'])->name('student.exam-routine');
Route::post('student/syllabus',[ProfileController::class, 'syllabus'])->name('student.syllabus');

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('student/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('student.pay-via-ajax');

Route::post('student/success', [SslCommerzPaymentController::class, 'success'])->name('student.payment.success');
Route::post('student/fail', [SslCommerzPaymentController::class, 'fail'])->name('student.payment.fail');
Route::post('student/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('student.payment.cancel');

Route::post('student/ipn', [SslCommerzPaymentController::class, 'ipn'])->name('student.payment.ipn');
//SSLCOMMERZ END



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

/** Nagad Payment Gateway Start */
    Route::post('nagad/create',[NagadPaymentController::class,'create'])->name('student.nagad.create');
/** Nagad Payment Gateway End */

});
