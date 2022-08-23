<?php

use App\Http\Controllers\Flutter\LoginController;
use App\Http\Controllers\Flutter\StudentController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('about',[StudentController::class,'about']);
    Route::get('chairman-message',[StudentController::class,'chairmanMessage']);
    Route::get('principal-message',[StudentController::class,'principalMessage']);
    Route::get('student-profile',[StudentController::class,'profile']);
    Route::get('syllabus',[StudentController::class,'syllabus']);
    Route::get('class-routines',[StudentController::class,'classRoutine']);
    Route::get('teachers',[StudentController::class,'teachers']);
    Route::get('teacher-details',[StudentController::class,'teacherDetails']);
    Route::get('notices',[StudentController::class,'noticeList']);
    Route::get('notice-details',[StudentController::class,'noticeDetails']);
    Route::get('news',[StudentController::class,'newsList']);
    Route::get('news-details',[StudentController::class,'newsDetails']);
    Route::get('events',[StudentController::class,'events']);
    Route::get('event-details',[StudentController::class,'eventDetails']);
    Route::get('diary',[StudentController::class,'diary']);
    Route::get('result',[StudentController::class,'result']);
    Route::get('home',[StudentController::class,'home']);
    Route::get('marksheet',[StudentController::class,'marksheet']);
    Route::get('attendance',[StudentController::class,'attendance']);
    Route::get('calendar',[StudentController::class,'calendar']);
    Route::get('payment-history',[StudentController::class,'paymentHistory']);
    Route::get('monthly-payment',[StudentController::class,'monthlyPayment']);
    Route::post('logout', [LoginController::class, 'logout']);


});

Route::post('token/create', [LoginController::class, 'token']);
Route::post('student-login', [LoginController::class, 'studentLogin']);
Route::post('otp', [LoginController::class, 'otp']);
Route::post('otp-match', [LoginController::class, 'matchOtp']);
