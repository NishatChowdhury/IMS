<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Flutter\LoginController;
use App\Http\Controllers\Flutter\StudentController;
use App\Http\Controllers\Flutter\TeacherController;
use App\Http\Controllers\Flutter\NotificationController;

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

// Route for students starts here by Nishat Chowdhury
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('about', [StudentController::class, 'about']);
    Route::get('chairman-message', [StudentController::class, 'chairmanMessage']);
    Route::get('principal-message', [StudentController::class, 'principalMessage']);
    Route::get('student-profile', [StudentController::class, 'profile']);
    Route::get('syllabus', [StudentController::class, 'syllabus']);
    Route::get('class-routines', [StudentController::class, 'classRoutine']);
    Route::get('teachers', [StudentController::class, 'teachers']);
    Route::get('teacher-details', [StudentController::class, 'teacherDetails']);
    Route::get('notices', [StudentController::class, 'noticeList']);
    Route::get('notice-details', [StudentController::class, 'noticeDetails']);
    Route::get('news', [StudentController::class, 'newsList']);
    Route::get('news-details', [StudentController::class, 'newsDetails']);
    Route::get('events', [StudentController::class, 'events']);
    Route::get('event-details', [StudentController::class, 'eventDetails']);
    Route::get('diary', [StudentController::class, 'diary']);
    Route::get('result', [StudentController::class, 'result']);
    Route::get('home', [StudentController::class, 'home']);
    Route::get('marksheet', [StudentController::class, 'marksheet']);
    Route::get('attendance', [StudentController::class, 'attendance']);
    Route::get('calendar', [StudentController::class, 'calendar']);
    Route::get('payment-history', [StudentController::class, 'paymentHistory']);
    Route::get('monthly-payment', [StudentController::class, 'monthlyPayment']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('storeEvent', [StudentController::class, 'storeEvent']);
});

Route::get('logo', [LoginController::class, 'logo']);
Route::post('token/create', [LoginController::class, 'token']);
Route::post('student-login', [LoginController::class, 'studentLogin']);
Route::post('otp', [LoginController::class, 'otp']);
Route::post('otp-match', [LoginController::class, 'matchOtp']);

Route::post('push-attn-data',[LoginController::class,'pushAttnData']);

// Route for notifications starts here by Nishat Chowdhury
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('attendance-notification', [NotificationController::class, 'attendanceNotification']);
    Route::get('upcoming-events-notification', [NotificationController::class, 'upcomingEventsNotification']);
    Route::get('notice-notification', [NotificationController::class, 'noticeNotification']);
    Route::get('news-notification', [NotificationController::class, 'newsNotification']);
    Route::get('diary-notification', [NotificationController::class, 'diaryNotification']);
    Route::get('holiday-notification', [NotificationController::class, 'holidayNotification']);
    Route::get('payment-notification', [NotificationController::class, 'paymentNotification']);
});

// Route for teacher panel starts here by Nishat Chowdhury
Route::post('teacher-login', [LoginController::class, 'teacherLogin']);
Route::post('teacher-otp', [LoginController::class, 'teacherOtp']);
Route::post('teacher-otp-match', [LoginController::class, 'teacherMatchOtp']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('teacher-diaries', [TeacherController::class, 'diaries']);
    Route::get('teacher-diary', [TeacherController::class, 'diary']);
    Route::post('teacher-add-diary', [TeacherController::class, 'addDiary']);
    Route::post('teacher-add-leave', [TeacherController::class, 'addLeave']);
    Route::get('student-wise-attendance', [TeacherController::class, 'studentWiseAttendance']);
    Route::get('daily-attendance', [TeacherController::class, 'dailyAttendance']);
    Route::get('exam-routine', [TeacherController::class, 'examRoutine']);
    Route::get('mobile-attendance', [TeacherController::class, 'mobileAttendance']);
    Route::post('mobile-attendance-store', [TeacherController::class, 'mobileAttendanceStore']);
    Route::get('classes', [TeacherController::class, 'classes']);
    Route::get('sections', [TeacherController::class, 'sections']);
    Route::get('groups', [TeacherController::class, 'groups']);
    Route::get('subjects', [TeacherController::class, 'subjects']);
    Route::get('examinations', [TeacherController::class, 'examinations']);
    Route::post('teacher-logout', [LoginController::class, 'teacherLogout']);
    Route::get('all-leaves', [TeacherController::class, 'allLeaves']);
});
