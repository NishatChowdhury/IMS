<?php
use Illuminate\Support\Facades\Route;
use Modules\Result\Http\Controllers\ResultController;
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

Route::prefix('result')->group(function() {
    Route::get('/index', [ResultController::class,'index']);
});
