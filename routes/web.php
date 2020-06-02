<?php

use Illuminate\Support\Facades\Route;

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

App::setLocale('ru');

Auth::routes([
    'register' => false,
]);

Route::get('/', function () {
    return view('index');
});

Route::get('/trainers', 'TrainerController@index')->name('trainers.index');
Route::get('/trainers/{trainer}', 'TrainerController@show')->name('trainers.show');

Route::get('/schools', 'SchoolController@index')->name('schools.index');
Route::get('/schools/{school}', 'SchoolController@show')->name('schools.show');

Route::get('/branches', 'BranchController@index')->name('branches.index');
Route::get('/branches/{branch}', 'BranchController@show')->name('branches.show');

Route::get('/exams', 'ExamController@index')->name('exams.index');
Route::get('/exams/{exam}', 'ExamController@show')->name('exams.show');

Route::get('/seminars', 'SeminarController@index')->name('seminars.index');
Route::get('/seminars/{seminar}', 'SeminarController@show')->name('seminars.show');

Route::get('/trainees', 'TraineeController@index')->name('trainees.index');
Route::get('/trainees/{trainee}', 'TraineeController@show')->name('trainees.show');


Route::group([
    'middleware' => [
        'auth',
        'setLocale',
    ],
], function () {

    Route::get('/seminars/create', 'SeminarController@create')->name('seminars.create');
    Route::post('/seminars', 'SeminarController@store')->name('seminars.store');
    Route::get('/seminars/{seminar}/edit', 'SeminarController@edit')->name('seminars.edit');
    Route::put('/seminars/{seminar}', 'SeminarController@update')->name('seminars.update');
    Route::delete('/seminars/{seminar}', 'SeminarController@destroy')->name('seminars.destroy');

    Route::get('/exams/create', 'ExamController@create')->name('exams.create');
    Route::post('/exams', 'ExamController@store')->name('exams.store');
    Route::get('/exams/{exam}/edit', 'ExamController@edit')->name('exams.edit');
    Route::put('/exams/{exam}', 'ExamController@update')->name('exams.update');
    Route::delete('/exams/{exam}', 'ExamController@destroy')->name('exams.destroy');

    Route::get('/branches/create', 'BranchController@create')->name('branches.create');
    Route::post('/branches', 'BranchController@store')->name('branches.store');
    Route::get('/branches/{branch}/edit', 'BranchController@edit')->name('branches.edit');
    Route::put('/branches/{branch}', 'BranchController@update')->name('branches.update');
    Route::delete('/branches/{branch}', 'BranchController@destroy')->name('branches.destroy');

    Route::get('/schools/create', 'SchoolController@create')->name('schools.create');
    Route::post('/schools', 'SchoolController@store')->name('schools.store');
    Route::get('/schools/{school}/edit', 'SchoolController@edit')->name('schools.edit');
    Route::put('/schools/{school}', 'SchoolController@update')->name('schools.update');
    Route::delete('/schools/{school}', 'SchoolController@destroy')->name('schools.destroy');

    Route::get('/trainees/create', 'TraineeController@create')->name('trainees.create');
    Route::post('/trainees', 'TraineeController@store')->name('trainees.store');
    Route::get('/trainees/{trainee}/edit', 'TraineeController@edit')->name('trainees.edit');
    Route::put('/trainees/{trainee}', 'TraineeController@update')->name('trainees.update');
    Route::delete('/trainees/{trainee}', 'TraineeController@destroy')->name('trainees.destroy');

    Route::put('/seminars/{seminar}/file', 'SeminarController@setDoc')->name('seminars.file.store');
    Route::delete('/seminars/{seminar}/file', 'SeminarController@removeDoc')->name('seminars.file.destroy');

    Route::get('/seminars/{seminar}/visit', 'SeminarController@createVisit')->name('seminars.visit.create');
    Route::post('/seminars/{seminar}/visit', 'SeminarController@storeVisit')->name('seminars.visit.store');
    Route::delete('/seminarvisits/{seminarvisit}', 'SeminarController@destroyVisit')->name('seminars.visit.destroy');

    Route::get('/exams/{exam}/exampasses/create', 'ExamPassController@create')->name('exampasses.create');

    Route::post('/exampasses', 'ExamPassController@store')->name('exampasses.store');
    Route::get('/exampasses/{exampass}', 'ExamPassController@show')->name('exampasses.show');
    Route::get('/exampasses/{exampass}/edit', 'ExamPassController@edit')->name('exampasses.edit');
    Route::put('/exampasses/{exampass}', 'ExamPassController@update')->name('exampasses.update');
    Route::delete('/exampasses/{exampass}', 'ExamPassController@destroy')->name('exampasses.destroy');

    Route::get('/profile', 'TrainerController@edit')->name('profile.edit');
    Route::put('/profile', 'TrainerController@update')->name('profile.update');
    Route::put('/profile/photo', 'TrainerController@setPhoto')->name('profile.update.photo');
    Route::put('/profile/password', 'TrainerController@setPassword')->name('profile.update.password');
});
