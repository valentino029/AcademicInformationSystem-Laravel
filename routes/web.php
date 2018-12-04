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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard', 'DashboardController@index');

Route::group(['middleware' => ['auth']],function(){

Route::get('/AcademicYears', 'AcademicYearsController@index');
Route::get('/AcademicYears/add', 'AcademicYearsController@add');
Route::post('/AcademicYears/store', 'AcademicYearsController@store');
Route::get('/AcademicYears/{id}', 'AcademicYearsController@show');
Route::get('/AcademicYears/edit/{id}', 'AcademicYearsController@edit');
Route::put('/AcademicYears/update', 'AcademicYearsController@update');
Route::get('/AcademicYears/delete/{id}', 'AcademicYearsController@delete');

Route::get('/Semesters', 'SemestersController@index');
Route::get('/Semesters/add', 'SemestersController@add');
Route::post('/Semesters/store', 'SemestersController@store');

Route::get('/Grades', 'GradesController@index');
Route::get('/Grades/add', 'GradesController@add');
Route::post('/Grades/store', 'GradesController@store');

Route::get('/Majors', 'MajorsController@index');
Route::get('/Majors/add', 'MajorsController@add');
Route::post('/Majors/store', 'MajorsController@store');

Route::get('/AcademicSubjects', 'AcademicSubjectsController@index');
Route::get('/AcademicSubjects/add', 'AcademicSubjectsController@add');
Route::post('/AcademicSubjects/store', 'AcademicSubjectsController@store');

Route::get('/Classrooms', 'ClassroomsController@index');
Route::get('/Classrooms/add', 'ClassroomsController@add');
Route::post('/Classrooms/store', 'ClassroomsController@store');

Route::get('/ClassroomDetails', 'ClassroomDetailsController@index');
Route::get('/ClassroomDetails/add', 'ClassroomDetailsController@add');
Route::post('/ClassroomDetails/store', 'ClassroomDetailsController@store');

Route::get('/ClassroomDetails/InputStudent/{id}', 'ClassroomDetailStudentsController@add');

Route::post('/ClassroomDetailStudents/store', 'ClassroomDetailStudentsController@store');
Route::get('/ClassroomDetailStudents/show/{id}', 'ClassroomDetailStudentsController@show');

Route::get('/TeacherData', 'TeachersController@index');
Route::get('/TeacherData/add', 'TeachersController@add');
Route::post('/TeacherData/store', 'TeachersController@store');

Route::get('/StudentData', 'StudentsController@index');
Route::get('/StudentData/add', 'StudentsController@add');
Route::post('/StudentData/store', 'StudentsController@store');

Route::get('/InputValue', 'InputValueController@myform');

Route::get('/ShowValue', 'IsinilaiController@showValue');


Route::get('/TeacherAccount', 'TeacherAccountController@index');
Route::get('/TeacherAccount/add', 'TeacherAccountController@add');
Route::post('/TeacherAccount/store', 'TeacherAccountController@store');

Route::get('/StudentAccount', 'StudentAccountController@index');
Route::get('/StudentAccount/add', 'StudentAccountController@add');
Route::post('/StudentAccount/store', 'StudentAccountController@store');

Route::get('Value','IsinilaiController@index');
Route::get('ValueByAdmin','IsinilaiController@indexAdmin');
Route::get('value/input/{id}','IsinilaiController@inputvalue');
Route::get('value/show/{id}','IsinilaiController@showvalue');
Route::get('tugas/{id}','IsinilaiController@tugasIndex');
Route::get('/tugas/add/{id}', 'IsinilaiController@addTugas');
Route::post('/tugas/store', 'IsinilaiController@tugasStore');

Route::put('/nilaiUTS/update', 'IsinilaiController@updateUTS');
Route::put('/nilaiUAS/update', 'IsinilaiController@updateUAS');

Route::get('nilaiAkhir/{id}','IsinilaiController@nilaiAkhir');

});


