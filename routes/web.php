<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\AuthCheck;

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

Route::get('/', [AdminController::class, 'start'])->middleware('alreadylogin');

//Admin Router Start
Route::get('adminlogin', [AdminController::class, 'login'])->middleware('alreadylogin');
Route::post('adminlogindb', [AdminController::class, 'adminlogin']);
Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('adminlogout', [AdminController::class, 'logout']);
Route::get('addteacher', [AdminController::class, 'teacheraddform'])->middleware('isLoggedIn');
Route::post('addteacherdb', [AdminController::class, 'addteacher'])->middleware('isLoggedIn');
Route::get('teacherlist', [AdminController::class, 'teacherlist'])->middleware('isLoggedIn');
Route::get('deleteteacher/{id}', [AdminController::class, 'deleteteacher'])->middleware('isLoggedIn');
Route::get('editteacher/{id}', [AdminController::class, 'editteacher'])->middleware('isLoggedIn');
Route::post('editteacherdb', [AdminController::class, 'editteacherdb'])->middleware('isLoggedIn');
Route::get('addstudent', [AdminController::class, 'studentaddform'])->middleware('isLoggedIn');
Route::get('studentlist', [AdminController::class, 'studentlist'])->middleware('isLoggedIn');
Route::post('addstudentdb', [AdminController::class, 'addstudent'])->middleware('isLoggedIn');
Route::get('deletestudent/{id}', [AdminController::class, 'deletestudent'])->middleware('isLoggedIn');
Route::get('editstudent/{id}', [AdminController::class, 'editstudent'])->middleware('isLoggedIn');
Route::post('editstudentdb', [AdminController::class, 'editstudentdb'])->middleware('isLoggedIn');
Route::get('timetable', [AdminController::class, 'timetablelist'])->middleware('isLoggedIn');
Route::get('addlecture', [AdminController::class, 'lectureaddform'])->middleware('isLoggedIn');
Route::post('addtimetabledb', [AdminController::class, 'lectureadd'])->middleware('isLoggedIn');
Route::get('deletetimetable/{id}', [AdminController::class, 'deletelecture'])->middleware('isLoggedIn');
Route::get('edittimetable/{id}', [AdminController::class, 'editlecture'])->middleware('isLoggedIn');
Route::post('edittimetabledb', [AdminController::class, 'editlecturedb'])->middleware('isLoggedIn');
Route::get('announcement', [AdminController::class, 'announcelist'])->middleware('isLoggedIn');
Route::get('addannouncement', [AdminController::class, 'announceaddform'])->middleware('isLoggedIn');
Route::post('addannouncementdb', [AdminController::class, 'announceadd'])->middleware('isLoggedIn');
Route::get('deleteannounce/{id}', [AdminController::class, 'deleteannouncement'])->middleware('isLoggedIn');
Route::get('editannounce/{id}', [AdminController::class, 'editannouncement'])->middleware('isLoggedIn');
Route::post('editannouncementdb', [AdminController::class, 'updateannouncedb'])->middleware('isLoggedIn');
Route::get('fee', [AdminController::class, 'feeslist'])->middleware('isLoggedIn');
Route::get('addfees', [AdminController::class, 'feesaddform'])->middleware('isLoggedIn');
Route::post('addfeesdb', [AdminController::class, 'addfeesdb'])->middleware('isLoggedIn');
Route::get('deletefees/{id}', [AdminController::class, 'deletefees'])->middleware('isLoggedIn');
Route::get('editfees/{id}', [AdminController::class, 'editfees'])->middleware('isLoggedIn');
Route::post('editfeesdb', [AdminController::class, 'updatefeeesdb'])->middleware('isLoggedIn');
Route::get('deletefees/{id}', [AdminController::class, 'deletefees'])->middleware('isLoggedIn');
Route::get('editfeesdb/{id}', [AdminController::class, 'editannouncement'])->middleware('isLoggedIn');
Route::get('classassign', [AdminController::class, 'classassign'])->middleware('isLoggedIn');
Route::post('classassigndb', [AdminController::class, 'classassigndb'])->middleware('isLoggedIn');
Route::get('classlist', [AdminController::class, 'classlist'])->middleware('isLoggedIn');
//Admin Routes End


//teacher Routes Start
Route::get('teacherlogin', [TeacherController::class, 'login'])->middleware('teacheralreadylogin');
Route::post('teacherlogindb', [TeacherController::class, 'teacherlogin']);
Route::get('teacherlogout', [TeacherController::class, 'logout']);
Route::get('teacherdashboard', [TeacherController::class, 'teacherdashboard'])->middleware('teacherisLoggedIn');
Route::get('attendance', [TeacherController::class, 'attendance'])->middleware('teacherisLoggedIn');
Route::post('attendancedata', [TeacherController::class, 'attendancedata'])->middleware('teacherisLoggedIn');
Route::post('attendancemark', [TeacherController::class, 'attendancemark'])->middleware('teacherisLoggedIn');
Route::get('teacherannouncement', [TeacherController::class, 'teacherannouncement'])->middleware('teacherisLoggedIn');
Route::get('teachertimetable', [TeacherController::class, 'timetable'])->middleware('teacherisLoggedIn');
Route::get('marksheet', [TeacherController::class, 'marksheet'])->middleware('teacherisLoggedIn');


//Teacher Routes End


//Student Routes Start
Route::get('studentlogin', [StudentController::class, 'login'])->middleware('studentalreadylogin');
Route::post('studentlogindb', [StudentController::class, 'studentlogin']);
Route::get('studentdashboard', [StudentController::class, 'studentdashboard'])->middleware('studentisLoggedIn');
Route::get('studentattendance', [StudentController::class, 'studentattendance'])->middleware('studentisLoggedIn');
Route::get('studentannouncement', [StudentController::class, 'studentannouncement'])->middleware('studentisLoggedIn');
Route::get('studentfee', [StudentController::class, 'studentfee'])->middleware('studentisLoggedIn');
Route::get('studenttimetable', [StudentController::class, 'timetable'])->middleware('studentisLoggedIn');
Route::get('studentlogout', [StudentController::class, 'logout'])->middleware('studentisLoggedIn');

//Student Routes End

//return back
Route::get('returnback', [TeacherController::class, 'backfun']);
Route::get('salarydetails', [TeacherController::class, 'backfun']);
//return back





