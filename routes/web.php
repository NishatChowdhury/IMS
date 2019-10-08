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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index');

Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance-dashboard','AttendanceController@dashBoard')->name('attendance.dashboard');