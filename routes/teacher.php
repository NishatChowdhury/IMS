<?php

use App\Http\Controllers\Teacher\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('teacher-login', function(){
    return \App\Models\TeacherLogin::all();
});

Route::get('teacher/login', [LoginController::class, 'showLoginForm'])->name('login.teacher');
Route::middleware("teacher")->prefix('teacher')->group(function(){


    Route::post('login', [LoginController::class, 'login']);
    Route::get('dashboard', function(){
        if (auth()->guard('teacher')->user() == null){
            abort(401);
        }
            return view('teacher.dashboard');
    })->name('teacher.dashboard');

    // teacher Diary
    Route::get('diary', [\App\Http\Controllers\Teacher\MainController::class, 'index'])->name('teacher.diary.index');
    Route::get('diary-create', [\App\Http\Controllers\Teacher\MainController::class, 'create'])->name('teacher.diary.create');
    Route::post('diary-store', [\App\Http\Controllers\Teacher\MainController::class, 'store'])->name('teacher.diary.store');
    Route::get('diary-edit/{diary}', [\App\Http\Controllers\Teacher\MainController::class, 'edit'])->name('teacher.diary.edit');
    Route::post('diary-update/{diary}', [\App\Http\Controllers\Teacher\MainController::class, 'update'])->name('teacher.diary.update');

    // Attendance

    Route::get('attendance-view', [\App\Http\Controllers\Teacher\MainController::class, 'attendanceView'])->name('teacher.attendance.view');

    // Leave
    Route::get('get-student-leave', [\App\Http\Controllers\Teacher\MainController::class, 'leaveStudent'])->name('teacher.leave.student');
    Route::get('get-student-leave-add', [\App\Http\Controllers\Teacher\MainController::class, 'leaveAdd'])->name('teacher.leave.add');
    Route::post('get-student-leave-store', [\App\Http\Controllers\Teacher\MainController::class, 'leaveStore'])->name('teacher.leave.store');
    Route::get('get-student-leave-delete/{id}', [\App\Http\Controllers\Teacher\MainController::class, 'leaveDelete'])->name('teacher.leave.delete');

    // exam
    Route::get('examination-list', [\App\Http\Controllers\Teacher\ExamController::class, 'examList'])
        ->name('teacher.examination.list');

    Route::get('examination-schedule-list/{id}', [\App\Http\Controllers\Teacher\ExamController::class, 'examSchedule'])
        ->name('teacher.examination.schedule.list');
    Route::get('examination-schedule-mark/{id}', [\App\Http\Controllers\Teacher\ExamController::class, 'markIndex'])
        ->name('teacher.examination.mark');

    Route::post('examination-schedule-mark-store', [\App\Http\Controllers\Teacher\ExamController::class, 'markStore'])
        ->name('teacher.examination.mark.store');

    Route::get('examination-mark-upload/{id}', [\App\Http\Controllers\Teacher\ExamController::class, 'markUpload'])
        ->name('teacher.examination.mark.upload');

    Route::post('examination-mark-up', [\App\Http\Controllers\Teacher\ExamController::class, 'markUp'])
        ->name('teacher.examination.mark.up');

    Route::get('examination-mark-download/{id}', [\App\Http\Controllers\Teacher\ExamController::class, 'markDownload'])
        ->name('teacher.examination.mark.download');


});


