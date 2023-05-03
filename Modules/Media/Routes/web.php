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
use Modules\Media\Http\Controllers\CommunicationController;
use Modules\Media\Http\Controllers\CommunicationSettingController;
use Modules\Media\Http\Controllers\DiaryController;
use Modules\Media\Http\Controllers\NoticeCategoryController;
use Modules\Media\Http\Controllers\NoticeController;
use Modules\Media\Http\Controllers\NoticeTypeController;
use Modules\Media\Http\Controllers\SubscriberController;
use Modules\Media\Http\Controllers\SyllabusController;
use Modules\Media\Http\Controllers\UpcomingEventController;

Route::prefix('media')->group(function() {
    Route::get('/', 'MediaController@index')->name('media');
});

Route::prefix('admin')->group(function() {
    // notice
    Route::get('notices',[NoticeController::class,'index'])->name('notice.index');
    Route::post('notice/store',[NoticeController::class,'store'])->name('notice.store');
    Route::get('notice/edit/{id}',[NoticeController::class,'edit'])->name('notice.edit');
    Route::patch('notice/{id}/update',[NoticeController::class,'update'])->name('notice.update');
    Route::delete('notice/destroy/{id}',[NoticeController::class,'destroy'])->name('notice.destroy');
    // notice/notice category
    Route::get('notice/category',[NoticeCategoryController::class,'index'])->name('notice-category.index');
    Route::post('notice/category/store',[NoticeCategoryController::class,'store'])->name('notice-category.store');
    Route::get('notice/category/edit/{id}',[NoticeCategoryController::class,'edit'])->name('notice-category.edit');
    // notice type
    Route::get('notice/type',[NoticeTypeController::class,'index'])->name('notice-type.index');
    Route::post('notice/type/store',[NoticeTypeController::class,'store'])->name('notice-type.store');
    Route::get('notice/type/edit/{id}',[NoticeTypeController::class,'edit'])->name('notice-type.edit');
    // notice/diary list
    Route::get('diary-list', [DiaryController::class, 'index'])->name('diary.index');
    Route::get('diary-create', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('diary-store', [DiaryController::class, 'store'])->name('diary.store');
    Route::get('diary-edit/{diary}', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::post('diary-update/{diary}', [DiaryController::class, 'update'])->name('diary.update');
    // notice/upcoming event
    Route::get('events',[UpcomingEventController::class,'index'])->name('event.index');
    Route::get('event/create',[UpcomingEventController::class,'create'])->name('event.create');
    Route::post('event/store',[UpcomingEventController::class,'store'])->name('event.store');
    Route::get('event/show/{id}',[UpcomingEventController::class,'show'])->name('event.show');
    Route::get('event/edit/{id}',[UpcomingEventController::class,'edit'])->name('event.edit');
    Route::patch('event/{id}/update',[UpcomingEventController::class,'update'])->name('event.update');
    Route::delete('event/destroy/{id}',[UpcomingEventController::class,'destroy'])->name('event.destroy');

    // syllabus
    Route::get('syllabuses',[SyllabusController::class,'index'])->name('syllabus.index');
    Route::post('syllabus/store',[SyllabusController::class,'store'])->name('syllabus.store');
    Route::delete('syllabus/delete/{id}',[SyllabusController::class,'destroy'])->name('syllabus.delete');

    // communication
    Route::get('communication/quick',[CommunicationController::class,'quick'])->name('communication.quick');
    Route::get('communication/student',[CommunicationController::class,'student'])->name('communication.student');
    Route::get('communication/staff',[CommunicationController::class,'staff'])->name('communication.staff');
    Route::get('communication/history',[CommunicationController::class,'history'])->name('communication.history');
    Route::post('communication/send',[CommunicationController::class,'send'])->name('communication.send');
    Route::post('communication/quick/send',[CommunicationController::class,'quickSend'])->name('communication.quickSend');
    // communication/Subscribers
    Route::get('subscriber/list',[SubscriberController::class,'index'])->name('subscriber.list');
    Route::get('subscriber/status/{id}',[SubscriberController::class,'subscriberStatusUpdate'])->name('subscriberStatusUpdate');
    // communication/ api setting
    Route::get('communication/apiSetting',[CommunicationSettingController::class,'index'])->name('communication.apiSetting');
    Route::patch('communication/apiSetting/update',[CommunicationSettingController::class,'update'])->name('apiSetting.update');


});
