<?php

use App\Http\Controllers\Backend\AlumniController;
use App\Http\Controllers\Backend\CompetencyController;
use App\Http\Controllers\Backend\CompetencyRemarkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\IndicatorController;
use App\Http\Controllers\Backend\RemarkController;

Route::group(['prefix' => 'admin', 'middleware' => 'checkPermission'], function () {

    //Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    //Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    //Applied Student
    Route::post('applied-student/view','Backend\AppliedStudentController@studentView')->name('student.applied-student.view');
    //Applied Student Ends

    // Route for test
    Route::view('bl', 'admin.reports.balance_sheet');
    // Route for test


    // route for Google map setting starts here
    Route::get('setting/map','Backend\MapSettingController@index')->name('setting.map');
    Route::get('setting/map/store','Backend\MapSettingController@store')->name('map.store');
    // route for google map setting ends here


    Route::get('academic-calender/index','Backend\AcademicCalenderController@index')->name('academic-calender.index');
    Route::post('academic-calender/store','Backend\AcademicCalenderController@store')->name('academic-calender.store');
    Route::post('academic-calender/edit','Backend\AcademicCalenderController@edit')->name('academic-calender.edit');
    Route::post('academic-calender/update','Backend\AcademicCalenderController@update')->name('academic-calender.update');
    Route::delete('academic-calender/{id}','Backend\AcademicCalenderController@destroy')->name('academic-calender.delete');
    Route::put('academic-calender/status/{id}','Backend\AcademicCalenderController@status')->name('academic-calender.status');




// Student Fee Collection Report Start
    Route::get('report/student-fee-report','Backend\ReportController@student_fee_report')->name('report.student-fee');
    Route::get('report/student-monthly-fee-report','Backend\ReportController@student_monthly_fee_report')->name('report.student-monthly-fee');
// Student Fee Collection Report End



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

    Route::get('pdf', function(){
        return view('form-pdf');
    });

    Route::get('alumni',[AlumniController::class,'index'])->name('alumni');


});

