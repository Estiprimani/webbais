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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'UniversityController@AdminUniversity');

Route::get('admin/university/form', 'UniversityController@AdminUniversityForm');

// store university
Route::post('/university/store', 'UniversityController@AdminAddUniv');

// store Admin university 
Route::post('/univAdmin/store', 'UniversityController@AdminAddAdmin');

// add university admin
Route::get('admin/university/adminform', function () {
    return view('AdminSystem/university/adminform');
});


// admin --> qualification
// list of qualification
Route::get('admin/qualification', 'QualificationController@AdminQualification');

// create new qualification
Route::get('admin/qualification/form', function () {
    return view('AdminSystem/qualification/qualificationForm');
});
Route::post('/QuaAdmin/store','QualificationController@QualificationStore');


//admin univ
Route::get('university/home', 'ProgrammeController@UnivProgramme');

//applicant
Route::get('applicant/home', function () {
    return view('ApplicantSystem/home');
});


Route::get('/logout', 'Auth\LoginController@logout');

