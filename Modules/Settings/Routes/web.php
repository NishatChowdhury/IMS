<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\LinkController;
use Modules\Settings\Http\Controllers\SettingsController;

Route::group(['prefix'=>'admin'],function(){

    Route::prefix('settings')->group(function() {
        Route::get('/', [SettingsController::class,'index'])->name('settings');

        Route::get('links',[LinkController::class,'index'])->name('settings.link.index');
    });

    Route::prefix('institution')->as('institution.')->group(function(){
//Institution Mgnt Route by Rimon
//Session @MKH
        Route::get('academicyear','InstitutionController@academicyear')->name('academicyear');
        Route::post('store-session', 'InstitutionController@store_session')->name('store_session');
        Route::post('edit-session', 'InstitutionController@edit_session')->name('edit_session');
        Route::post('update-session', 'InstitutionController@update_session')->name('update_session');
        Route::get('delete-session/{id}', 'InstitutionController@delete_session')->name('delete_session');
        Route::patch('status/{id}','InstitutionController@sessionStatus')->name('sessionStatus');
        Route::get('{id}/delete-session', 'InstitutionController@unAssignSubject')->name('unAssignSubject');

    });

});

// Important Links
Route::get('settings/links','Backend\LinkController@index')->name('setting.index');
Route::post('settings/link/store','Backend\LinkController@store')->name('setting.store');
Route::delete('settings/link/delete/{id}','Backend\LinkController@destroy')->name('setting.destroy');
// End Important Links


//Settings Route by Rimon
Route::get('settings/basicInfo','Backend\SettingsController@basicInfo')->name('settings.basicInfo');