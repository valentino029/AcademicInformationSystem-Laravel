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

Route::get('/Grades', 'GradesController@index');

Route::get('/Majors', 'MajorsController@index');

Route::get('/InputValue', 'StudyResultController@InputValue');

});


