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
use Modules\HRM\Http\Controllers\AttendanceController;
use Modules\HRM\Http\Controllers\HolidayController;
use Modules\HRM\Http\Controllers\IdCardController;
use Modules\HRM\Http\Controllers\LeaveManagementController;
use Modules\HRM\Http\Controllers\LeavePurposeController;
use Modules\HRM\Http\Controllers\ShiftController;
use Modules\HRM\Http\Controllers\StaffController;
use Modules\HRM\Http\Controllers\StudentController;
use Modules\HRM\Http\Controllers\WeeklyOffController;

Route::prefix('hrm')->group(function() {
    Route::get('/', 'HRMController@index')->name('hrm');
});

Route::prefix('admin')->group(function() {
    # ----------------------------------- Staff -----------------------------------------------------
    Route::get('staff-profile/{staffId}',[StaffController::class,'staffProfile'])->name('staff.profile');
    Route::get('staff/teacher',[StaffController::class,'teacher'])->name('staff.teacher');
    Route::get('staff/staffadd',[StaffController::class,'addstaff'])->name('staff.addstaff');
    Route::post('staff/store-staff',[StaffController::class,'store_staff'])->name('staff.store_staff');
    Route::get('staff/edit-staff/{id}',[StaffController::class,'edit_staff'])->name('staff.edit_staff');
    Route::patch('staff/{id}/update-staff',[StaffController::class,'update_staff'])->name('staff.update_staff');
    Route::get('staff/delete-staff/{id}',[StaffController::class,'delete_staff'])->name('staff.delete_staff');
    Route::get('staff/threshold',[StaffController::class,'threshold'])->name('staff.threshold');
    Route::get('staff/kpi',[StaffController::class,'kpi'])->name('staff.kpi');
    Route::get('staff/payslip',[StaffController::class,'payslip'])->name('staff.payslip');

    Route::get('staff/staff_training/{id}',[StaffController::class,'staff_training'])->name('staff.staff_training');
    Route::get('staff/staff_course/{id}',[StaffController::class,'staff_course'])->name('staff.staff_course');
    Route::get('staff/staff_experience/{id}',[StaffController::class,'staff_experience'])->name('staff.staff_experience');
    Route::get('staff/staff_academic/{id}',[StaffController::class,'staff_academic'])->name('staff.staff_academic');

    Route::post('staff/store-academic',[StaffController::class,'store_academic'])->name('staff.store_academic');
    Route::post('staff/update-academic',[StaffController::class,'update_academic'])->name('staff.update_academic');
    Route::post('staff/store-experience',[StaffController::class,'store_experience'])->name('staff.store_experience');
    Route::post('staff/update-experience',[StaffController::class,'update_experience'])->name('staff.update_experience');
    Route::post('staff/store-training',[StaffController::class,'store_training'])->name('staff.store_training');
    Route::post('staff/update-training',[StaffController::class,'update_training'])->name('staff.update_training');
    Route::post('staff/store-course',[StaffController::class,'store_course'])->name('staff.store_course');
    Route::post('staff/update-course',[StaffController::class,'update_course'])->name('staff.update_course');

    // staff Mgmt/Design ID Card
    Route::get('staff/idCard',[IdCardController::class,'staff'])->name('staff.staff');
    Route::post('staff/idCard/pdf',[IdCardController::class,'staffPdf'])->name('staff.staffPdf');


    # ------------------------------------- student --------------------------------------------------
    Route::get('students',[StudentController::class,'index'])->name('student.list');
    Route::get('student/create',[StudentController::class,'create'])->name('student.add');
    Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::patch('student/{id}/update',[StudentController::class,'update'])->name('student.update');
    Route::get('student/drop/{id}',[StudentController::class,'dropOut'])->name('student.dropOut');
    Route::get('student/subjects/{id}',[StudentController::class,'subjects'])->name('student.subjects');
    Route::patch('student/{id}/assign',[StudentController::class,'assignSubject'])->name('student.assignSubject');
    Route::get('/load_student_id/{id}',[StudentController::class,'loadStudentId'])->name('student.load_student_id');

    Route::get('student/promotion',[StudentController::class,'promotion'])->name('student.promotion');
    Route::post('student/promote',[StudentController::class,'promote'])->name('student.promote');

    Route::get('student/designStudentCard',[IdCardController::class,'index'])->name('student.designStudentCard');
    Route::get('student/generateStudentCard_v1',[IdCardController::class,'generateStudentCard_v1'])->name('student.generateStudentCard_v1');
    Route::get('student/generateStudentCard_v2',[IdCardController::class,'generateStudentCard_v2'])->name('student.generateStudentCard_v2');
    Route::get('student/generateStudentCard_v3',[IdCardController::class,'generateStudentCard_v3'])->name('student.generateStudentCard_v3');
    Route::get('student/generateStudentCard_v4',[IdCardController::class,'generateStudentCard_v4'])->name('student.generateStudentCard_v4');
    Route::get('student/generateStudentCard_v5',[IdCardController::class,'generateStudentCard_v5'])->name('student.generateStudentCard_v5');
    Route::get('student/generateStudentCard_v6',[IdCardController::class,'generateStudentCard_v6'])->name('student.generateStudentCard_v6');

    Route::get('student/testimonial',[StudentController::class,'testimonial'])->name('student.testimonial');
    // Route::get('student/tc','Backend\StudentController@tc')->name('student.tc');
    Route::get('student/assign-transport',[StudentController::class,'assignTransport'])->name('student.transport');
    Route::post('student/assign-transport-ending',[StudentController::class,'assignTransportEnd'])->name('assign.transport.end');
    Route::post('student/storeAssignTransport',[StudentController::class,'storeAssignTransport'])->name('storeAssignTransport');

    Route::get('student/download-blank-csv/{academicClassId}',[StudentController::class,'downloadBlank'])->name('student.downloadBlank');
    Route::get('student/upload-student/{academicClassId}',[StudentController::class,'uploadStudent'])->name('student.uploadStudent');
    Route::post('student/up',[StudentController::class,'up'])->name('student.up');

    Route::post('student/store', [StudentController::class,'store'])->name('student.store');
    Route::get('student/optional',[StudentController::class,'optional'])->name('student.optional');
    Route::get('student/optional/assign',[StudentController::class,'assignOptional'])->name('student.assignOptional');
    Route::post('student/optional/subjectStudent',[StudentController::class,'subjectStudent'])->name('subject.student');

    Route::post('student/card/pdf',[IdCardController::class,'pdf'])->name('student.pdf');
    Route::post('student/card/pdf-v2',[IdCardController::class,'pdf_V2'])->name('student.pdf_V2');
    Route::post('student/card/pdf-v3',[IdCardController::class,'pdf_V3'])->name('student.pdf_V3');
    Route::post('student/card/pdf-v4',[IdCardController::class,'pdf_V4'])->name('student.pdf_V4');
    Route::post('student/card/pdf-v5',[IdCardController::class,'pdf_V5'])->name('student.pdf_V5');
    Route::post('student/card/pdf-v6',[IdCardController::class,'pdf_V6'])->name('student.pdf_V6');

    //Student profile start
    Route::get('student-profile/{studentId}',[StudentController::class,'studentProfile'])->name('admin.student.profile');
    Route::post('student-password-reset',[StudentController::class,'studentPasswordReset'])->name('student.resetPassword');
    Route::get('csv',[StudentController::class,'csvDownload'])->name('csv');

    //Tc
    Route::get('student/tc',[StudentController::class,'transferCertificate'])->name('student.tc');

    // manuel attendence
    Route::get('student/manuel-attendence',[AttendanceController::class,'StuManuelAttendence'])->name('student.manuel-attendence');
    Route::get('/student/manuel-attendence-change',[AttendanceController::class,'StuManuelAttendenceStatus'])->name('student.manuel-attendence-status');

    Route::get('student/money',[StudentController::class,'moneyReceipt'])->name('student.money');
    // tod, esif, image
    Route::get('student/tod',[StudentController::class,'tod'])->name('student.tod');
    Route::get('student/esif',[StudentController::class,'esif'])->name('student.esif');
    Route::get('student/images',[StudentController::class,'images'])->name('student.images');

    # ------------------------------------- Attendance --------------------------------------------------
    Route::get('attendance',[AttendanceController::class,'index'])->name('custom.view');
    Route::get('attendance/dashboard',[AttendanceController::class,'dashboard'])->name('attendance.dashboard');
    Route::get('attendance/student',[AttendanceController::class,'student'])->name('attendance.student');
    Route::get('attendance/teacher',[AttendanceController::class,'teacher'])->name('attendance.teacher');
    Route::get('attendance/report',[AttendanceController::class,'report'])->name('attendance.report');
    Route::post('/get_attendance_monthly', [AttendanceController::class,'getAttendanceMonthly'])->name('attendance.getAttendanceMonthly');
    Route::post('/indStudentAttendance',[AttendanceController::class,'individulAttendance'])->name('student.indAttendance');
    Route::post('/classStudentAttendance',[AttendanceController::class,'classAttendance'])->name('student.classAttendance');
    Route::post('/indTeacherAttendance',[AttendanceController::class,'individualTeacherAttendance'])->name('teacher.indAttendance');
    // leave management
    Route::get('attendance/leaveManagement',[LeaveManagementController::class,'index'])->name('leaveManagement.index');
    Route::get('attendance/leaveManagement/add',[LeaveManagementController::class,'add'])->name('leaveManagement.add');
    Route::post('attendance/leaveManagement/store',[LeaveManagementController::class,'store'])->name('leaveManagement.store');
    Route::get('attendance/leaveManagement/edit/{id}',[LeaveManagementController::class,'edit'])->name('leaveManagement.edit');
    Route::delete('attendance/leaveManagement/delete/{id}',[LeaveManagementController::class,'destroy'])->name('leaveManagement.destroy');
    // leave purpose
    Route::get('attendance/leavePurpose',[LeavePurposeController::class,'index'])->name('leavePurpose.index');
    Route::get('attendance/leavePurpose/add',[LeavePurposeController::class,'add'])->name('leavePurpose.add');
    Route::post('attendance/leavePurpose/store',[LeavePurposeController::class,'store'])->name('leavePurpose.store');
    Route::get('attendance/leavePurpose/edit/{id}',[LeavePurposeController::class,'edit'])->name('leavePurpose.edit');
    Route::patch('attendance/leavePurpose/{id}/update',[LeavePurposeController::class,'update'])->name('leavePurpose.update');
    Route::post('attendance/leavePurpose/delete/{id}',[LeavePurposeController::class,'destroy'])->name('leavePurpose.delete');
    //Holiday Setup
    Route::get('holidays',[HolidayController::class,'index'])->name('attendance.holiday');
    Route::post('holiday/store',[HolidayController::class,'store'])->name('holiday.store');
    Route::get('holiday/edit/{id}',[HolidayController::class,'edit'])->name('holiday.edit');
    Route::patch('holiday/{id}/update',[HolidayController::class,'update'])->name('holiday.update');
    Route::delete('holiday/delete/{id}',[HolidayController::class,'destroy'])->name('holiday.destroy');
    // shift
    Route::get('attendance/setting',[ShiftController::class,'index'])->name('shift.index');
    Route::post('attendance/shift/store',[ShiftController::class,'store'])->name('shift.store');
    Route::get('attendance/shift/edit/{id}',[ShiftController::class,'edit'])->name('shift.edit');
    Route::post('attendance/shift/update',[ShiftController::class,'update'])->name('shift.update');
    Route::delete('attendance/shift/delete/{id}',[ShiftController::class,'destroy'])->name('shift.destroy');
    //Weekly Off Setting
    Route::get('attendance/weeklyOff',[WeeklyOffController::class,'index'])->name('weeklyOff.index');
    Route::post('attendance/weeklyOff/store',[WeeklyOffController::class,'store'])->name('weeklyOff.store');
    Route::get('attendance/weeklyOff/edit/{id}',[WeeklyOffController::class,'edit'])->name('weeklyOff.edit');
    Route::get('attendance/weeklyOff/delete/{id}',[WeeklyOffController::class,'destroy'])->name('weeklyOff.destroy');

});


