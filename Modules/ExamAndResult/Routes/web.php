<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\ExamAndResult\Http\Controllers\ExamController;
use Modules\ExamAndResult\Http\Controllers\ExamScheduleController;
use Modules\ExamAndResult\Http\Controllers\ExamSeatPlanController;
use Modules\ExamAndResult\Http\Controllers\MarkController;
use Modules\ExamAndResult\Http\Controllers\ResultController;
use Modules\ExamAndResult\Http\Controllers\CompetencyController;
use Modules\ExamAndResult\Http\Controllers\IndicatorController;
use Modules\ExamAndResult\Http\Controllers\RemarkController;
use Modules\ExamAndResult\Http\Controllers\CompetencyRemarkController;

Route::prefix('examandresult')->group(function() {
    Route::get('/', 'ExamAndResultController@index')->name('exam-n-result');
});


Route::prefix('admin')->group(function() {

    //Exam Route Start  by Rimon
    Route::get('exam/gradesystem',[ExamController::class,'gradesystem'])->name('exam.gradesystem');
    //Grading System @MKH
    Route::post('exam/store-grade', [ExamController::class,'store_grade'])->name('exam.store_grade');
    Route::get('exam/delete-grade/{id}', [ExamController::class,'delete_grade'])->name('exam.delete_grade');
    Route::get('exam/examination',[ExamController::class,'examination'])->name('exam.examination');
    Route::post('exam/sotre-exam', [ExamController::class,'store_exam'])->name('store.exam');
    Route::delete('exam/destroy/{id}', [ExamController::class,'destroy'])->name('exam.destroy');
    Route::get('exam/examitems',[ExamController::class,'examitems'])->name('exam.examitems');
    Route::get('exam/schedule/create/{exam}',[ExamScheduleController::class,'create'])->name('exam.schedule.create');
    Route::post('exam/schedule/store',[ExamScheduleController::class,'store'])->name('exam.schedule.store');
    Route::get('exam/schedule/{examId}', [ExamScheduleController::class,'index'])->name('exam.schedule.index');
    Route::post('exam/store-schedule', [ExamController::class,'store_schedule'])->name('exam.store_schedule');
    Route::get('exam/admit-card/{exam_id}',[ExamController::class,'admitCard'])->name('exam.admitCard');
    Route::get('exam/seat-allocate',[ExamController::class,'seatAllocate'])->name('exam.seatAllocate');

    // result
    Route::get('exam/result-details/{id}',[ResultController::class,'resultDetails'])->name('exam.resultDetails');
    Route::get('exam/final-result-details/{id}',[ResultController::class,'finalResultDetails'])->name('exam.finalResultDetails');
    Route::get('exam/result-details-all',[ResultController::class,'allDetails'])->name('exam.allDetails');
    Route::get('exam/examresult',[ResultController::class,'index'])->name('exam.examresult');
    Route::get('exam/tabulation/{examID}',[ResultController::class,'tabulation'])->name('exam.tabulation');
    Route::get('exam/generate-exam-result/{examID}',[ResultController::class,'generateResult'])->name('exam.generateResult');
    Route::get('exam/bulk-result',[ResultController::class,'bulkResult'])->name('exam.bulkResult');
    Route::post('exam/bulk-result/pdf',[ResultController::class,'bulkResultPdf'])->name('exam.bulkResultPdf');



    Route::get('exam/setfinalresultrule',[ResultController::class,'setfinalresultrule'])->name('exam.setfinalresultrule');
    Route::get('exam/getfinalresultrule',[ResultController::class,'getfinalresultrule'])->name('exam.getfinalresultrule');
    Route::post('exam/final-result',[ResultController::class,'finalResultNew'])->name('exam.finalResultNew');

    // Exam Seat Plan Start
    Route::get('exam/seat-plan/{examId}',[ExamSeatPlanController::class,'seatPlan'])->name('exam-seat-plan.seatPlan');
    Route::post('exam/check-roll',[ExamSeatPlanController::class,'CheckRoll'])->name('exam-seat-plan.CheckRoll');
    Route::post('exam/store-seat-plan',[ExamSeatPlanController::class,'storeSeatPlan'])->name('exam-seat-plan.storeSeatPlan');
    Route::get('exam/pdf-seat-plan/{id}',[ExamSeatPlanController::class,'pdfSeatPlan'])->name('exam-seat-plan.pdfSeatPlan');
    Route::delete('exam/destroy-seat-plan/{id}',[ExamSeatPlanController::class,'destroy'])->name('exam-seat-plan.destroy');
    // Exam Seat Plan End

    // mark
    Route::get('exam/marks/{schedule}',[MarkController::class,'index'])->name('exam-marks.index');
    Route::get('exam/mark/download/{schedule}',[MarkController::class,'download'])->name('exam-marks.download');
    Route::get('exam/mark/upload/{schedule}',[MarkController::class,'upload'])->name('exam-marks.upload');
    Route::post('exam/mark/up',[MarkController::class,'up'])->name('exam-marks.up');
    Route::post('exam/mark/store',[MarkController::class,'store'])->name('exam-marks.store');

    Route::get('exam/tabulationSheet',[ExamController::class,'tabulationSheet'])->name('exam.tabulationSheet');

    // Competency Management System Starts Here
    Route::get('competencies',[CompetencyController::class,'index'])->name('competency.index');
    Route::post('competency/store',[CompetencyController::class,'store'])->name('competency.store');
    Route::get('competency/edit',[CompetencyController::class,'edit'])->name('competency.edit');
    Route::patch('competency/{id}/update',[CompetencyController::class,'update'])->name('competency.update');
    Route::post('competency/destroy/{id}',[CompetencyController::class,'destroy'])->name('competency.destroy');

    Route::get('indicators',[IndicatorController::class,'index'])->name('indicator.index');
    Route::post('indicator/store',[IndicatorController::class,'store'])->name('indicator.store');
    Route::get('indicator/edit',[IndicatorController::class,'edit'])->name('indicator.edit');
    Route::patch('indicator/{id}/update',[IndicatorController::class,'update'])->name('indicator.update');
    Route::post('indicator/destroy/{id}',[IndicatorController::class,'destroy'])->name('indicator.destroy');

    Route::get('remarks',[RemarkController::class,'index'])->name('remark.index');
    Route::post('remark/store',[RemarkController::class,'store'])->name('remark.store');
    Route::get('remark/edit',[RemarkController::class,'edit'])->name('remark.edit');
    Route::patch('remark/{id}/update',[RemarkController::class,'update'])->name('remark.update');
    Route::post('remark/destroy/{id}',[RemarkController::class,'destroy'])->name('remark.destroy');

    Route::get('competency-remark',[CompetencyRemarkController::class,'index'])->name('competency-remark.index');
    Route::get('competency-remark/create',[CompetencyRemarkController::class,'create'])->name('competency-remark.create');
    Route::post('competency-remark/store',[CompetencyRemarkController::class,'store'])->name('competency-remark.store');
    Route::get('competency-remark/edit',[CompetencyRemarkController::class,'edit'])->name('competency-remark.edit');
    Route::patch('competency-remark/{id}/update',[CompetencyRemarkController::class,'update'])->name('competency-remark.update');
    Route::post('competency-remark/destroy/{id}',[CompetencyRemarkController::class,'destroy'])->name('competency-remark.destroy');




});

