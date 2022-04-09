<?php

use App\Http\Controllers\AndroidController;
use App\Http\Controllers\apiControllers\LoginController;
use App\Http\Controllers\apiControllers\StudentController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')
    ->get('/students',[StudentController::class,'index']);


Route::get('info-bar','FrontController@infoBar');
Route::get('title-bar','FrontController@titleBar');

//Route for login
Route::post('login','AndroidController@login');

//Route for frontend
Route::post('system-info','AndroidController@systemInfo');
Route::post('attendance','AndroidController@attendance');
Route::post('about','AndroidController@about');
Route::post('president','AndroidController@president');
Route::post('principal','AndroidController@principalMessage');
Route::post('profile','AndroidController@profile');
Route::post('teachers','AndroidController@teachers');
Route::post('teacher-profile/{id}','AndroidController@teacherProfile');
Route::post('syllabus','AndroidController@syllabus');
Route::post('notices','AndroidController@notices');
Route::post('notice/{id}','AndroidController@notice');
Route::post('class-routines','AndroidController@classRoutine');

Route::post('student-login', [LoginController::class, 'studentLogin']);
Route::post('otp', [LoginController::class, 'otp']);
Route::post('otp-match', [LoginController::class, 'matchOtp']);

Route::middleware('auth:sanctum')->get('/v-1/students',[StudentController::class,'index']);

Route::post('token/create', [LoginController::class, 'token']);




