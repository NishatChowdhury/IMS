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
use Modules\Admission\Http\Controllers\AdmissionController;
use Modules\Admission\Http\Controllers\AppliedStudentController;
use Modules\Admission\Http\Controllers\OnlineApplyController;

Route::prefix('admission')->group(function() {
    //Route::get('/', 'AdmissionController@index')->name('admission');
});


Route::prefix('admin')->group(function() {

    # -------------------------------------- Admission ---------------------------------------------------
    Route::get('admission/applicant', [OnlineApplyController::class,'index'])->name('online-admission.index');
    Route::get('online-application-view/{id}', [OnlineApplyController::class,'applyStudentProfile'])->name('online-admission.applyStudentProfile');
    Route::get('get-apply-info', [OnlineApplyController::class,'getApplyInfo'])->name('online-admission.getApplyInfo');
    Route::get('get-apply-info-session', [OnlineApplyController::class,'getApplyInfoSession'])->name('online-admission.getApplyInfoSession');

    Route::get('admission/create', [OnlineApplyController::class,'onlineApplyIndex'])->name('online.onlineApplyIndex');
    Route::post('get-apply-set-store', [OnlineApplyController::class,'onlineApplySetStore'])->name('online.typeSave');
    Route::get('load_online_adminsion_id/{id}', [OnlineApplyController::class,'load_online_adminsion_id'])->name('onlineStepEdit');
    Route::post('onlineApplySetUpdate', [OnlineApplyController::class,'onlineApplySetUpdate'])->name('online.typeUpdate');
    Route::post('/online-apply-move',[OnlineApplyController::class,'moveToStudent'])->name('online.moveToStudent');

    //
    Route::get('admission', [AdmissionController::class,'index'])->name('admission');
    Route::post('admission/store',[AdmissionController::class,'store'])->name('admission.store');
    Route::post('admission/unapprove/{roll}',[AdmissionController::class,'unapprove'])->name('admission.unapprove');

    Route::get('admission/browse-merit-list',[AdmissionController::class,'browseMeritList'])->name('admission.browseMeritList');
    Route::get('admission/upload-merit-list',[AdmissionController::class,'uploadMeritList'])->name('admission.uploadMeritList');

    Route::post('admission/upload',[AdmissionController::class,'upload'])->name('admission.upload');

    Route::post('admission/slip-view',[AdmissionController::class,'slipView'])->name('admission.slipView');
    Route::post('applied-student/view',[AppliedStudentController::class,'studentView'])->name('student.applied-student.view');


});

