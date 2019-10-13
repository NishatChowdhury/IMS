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
Route::get('/', 'FrontController@index');

Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','AttendanceController@dashBoard')->name('attendance.dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Students Route by babu
Route::get('/stu_list','StudentController@index')->name('student.list');
Route::get('/stu_add','StudentController@create')->name('student.add');

//End Students Route


Route::get('attendance/dashboard','AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/setting','AttendanceController@setting')->name('attendance.setting');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
