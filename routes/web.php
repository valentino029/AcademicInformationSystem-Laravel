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
    Route::get('/users/show/{id}', 'UserController@show');
    Route::get('/DataTeacher', 'TeachersController@indexNotAdmin');
    Route::get('/DataStudent', 'StudentsController@indexNotAdmin');
    Route::resource('/EditProfile', 'EditProfileController')->except([
        'show'
    ]);

    Route::group(['middleware' => ['role:Administrator']], function() {

        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        
        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');        
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');

Route::get('/AcademicYears', 'AcademicYearsController@index');
Route::get('/AcademicYears/add', 'AcademicYearsController@add');
Route::post('/AcademicYears/store', 'AcademicYearsController@store');
Route::get('/AcademicYears/edit/{id}', 'AcademicYearsController@edit');
Route::put('/AcademicYears/update', 'AcademicYearsController@update');

Route::get('/Semesters', 'SemestersController@index');
Route::get('/Semesters/add', 'SemestersController@add');
Route::post('/Semesters/store', 'SemestersController@store');
Route::get('/Semesters/edit/{id}', 'SemestersController@edit');
Route::put('/Semesters/update', 'SemestersController@update');

Route::get('/Grades', 'GradesController@index');
Route::get('/Grades/add', 'GradesController@add');
Route::post('/Grades/store', 'GradesController@store');
Route::get('/Grades/edit/{id}', 'GradesController@edit');
Route::put('/Grades/update', 'GradesController@update');

Route::get('/Majors', 'MajorsController@index');
Route::get('/Majors/add', 'MajorsController@add');
Route::post('/Majors/store', 'MajorsController@store');
Route::get('/Majors/edit/{id}', 'MajorsController@edit');
Route::put('/Majors/update', 'MajorsController@update');

Route::get('/AcademicSubjects', 'AcademicSubjectsController@index');
Route::get('/AcademicSubjects/add', 'AcademicSubjectsController@add');
Route::post('/AcademicSubjects/store', 'AcademicSubjectsController@store');
Route::get('/AcademicSubjects/edit/{id}', 'AcademicSubjectsController@edit');
Route::put('/AcademicSubjects/update', 'AcademicSubjectsController@update');

Route::get('/Classrooms', 'ClassroomsController@index');
Route::get('/Classrooms/add', 'ClassroomsController@add');
Route::post('/Classrooms/store', 'ClassroomsController@store');
Route::get('/Classrooms/edit/{id}', 'ClassroomsController@edit');
Route::put('/Classrooms/update', 'ClassroomsController@update');

Route::get('/ClassroomDetails', 'ClassroomDetailsController@index');
Route::get('/ClassroomDetails/add', 'ClassroomDetailsController@add');
Route::post('/ClassroomDetails/store', 'ClassroomDetailsController@store');

Route::get('/ClassroomDetails/InputStudent/{id}', 'ClassroomDetailStudentsController@add');

Route::post('/ClassroomDetailStudents/store', 'ClassroomDetailStudentsController@store');
Route::get('/ClassroomDetailStudents/show/{id}', 'ClassroomDetailStudentsController@show');
Route::delete('/ClassroomDetailStudents/delete', 'ClassroomDetailStudentsController@destroy');

Route::get('/TeacherData', 'TeachersController@index');
Route::get('/TeacherData/add', 'TeachersController@add');
Route::post('/TeacherData/store', 'TeachersController@store');
Route::get('/TeacherData/edit/{id}', 'TeachersController@edit');
Route::put('/TeacherData/update', 'TeachersController@update');

Route::get('/StudentData', 'StudentsController@index');
Route::get('/StudentData/add', 'StudentsController@add');
Route::post('/StudentData/store', 'StudentsController@store');
Route::get('/StudentData/edit/{id}', 'StudentsController@edit');
Route::put('/StudentData/update', 'StudentsController@update');

Route::get('/InputValue', 'InputValueController@myform');

Route::get('/ShowValue', 'IsinilaiController@showValue');

Route::get('Value','IsinilaiController@index');
Route::get('ValueByAdmin','IsinilaiController@indexAdmin');
Route::get('value/show/{id}','IsinilaiController@showvalue');
Route::get('pdfPrint/{id}','IsinilaiController@reportPdf');
Route::get('tugas/{id}','IsinilaiController@tugasIndex');
Route::get('/tugas/add/{id}', 'IsinilaiController@addTugas');
Route::get('/tugas/edit/{id}', 'IsinilaiController@editTugas');
Route::post('/tugas/store', 'IsinilaiController@tugasStore');
Route::put('/tugas/update', 'IsinilaiController@updateTugas');
Route::delete('/tugas/delete', 'IsinilaiController@deleteTugas');

Route::put('/nilaiUTS/update', 'IsinilaiController@updateUTS');
Route::put('/nilaiUAS/update', 'IsinilaiController@updateUAS');


Route::get('nilaiAkhir/{id}','IsinilaiController@nilaiAkhir');

});

Route::group(['middleware' => ['role:Teacher|Administrator']], function() {
Route::get('Value','IsinilaiController@index');
Route::get('value/input/{id}','IsinilaiController@inputvalue');
Route::get('value/show/{id}','IsinilaiController@showvalue');
Route::get('tugas/{id}','IsinilaiController@tugasIndex');
Route::get('/tugas/add/{id}', 'IsinilaiController@addTugas');
Route::get('/tugas/edit/{id}', 'IsinilaiController@editTugas');
Route::post('/tugas/store', 'IsinilaiController@tugasStore');
Route::put('/tugas/update', 'IsinilaiController@updateTugas');
Route::delete('/tugas/delete', 'IsinilaiController@deleteTugas');

Route::put('/nilaiUTS/update', 'IsinilaiController@updateUTS');
Route::put('/nilaiUAS/update', 'IsinilaiController@updateUAS');

Route::get('nilaiAkhir/{id}','IsinilaiController@nilaiAkhir');
});

Route::group(['middleware' => ['role:Student|Administrator']], function() {

    Route::get('ValueByStudent','IsinilaiController@indexStudent');
    Route::get('valueStudent/show/{id}','IsinilaiController@showvalueStudent');
    Route::get('pdfPrintStudent/{id}','IsinilaiController@reportPdfStudent');
});




});


