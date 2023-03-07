<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\LinkController;

Route::prefix('settings')->group(function() {
    Route::get('/', 'SettingsController@index')->name('settings');

        Route::get('links',[LinkController::class,'index'])->name('settings.link.index');
});

// Important Links
Route::get('settings/links','Backend\LinkController@index')->name('setting.index');
Route::post('settings/link/store','Backend\LinkController@store')->name('setting.store');
Route::delete('settings/link/delete/{id}','Backend\LinkController@destroy')->name('setting.destroy');
// End Important Links


//Settings Route by Rimon
Route::get('settings/basicInfo','Backend\SettingsController@basicInfo')->name('settings.basicInfo');