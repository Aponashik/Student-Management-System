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

Route::group(['middleware'=>'auth'],function(){
	//departments
Route::get('departments','DepartmentController@index');
Route::get('departments/create','DepartmentController@create');
Route::post('departments/save','DepartmentController@save');
Route::get('departments/edit/{id}','DepartmentController@edit');
Route::post('departments/update/{id}','DepartmentController@update');
Route::delete('departments/delete/{id}','DepartmentController@delete');


//class

Route::get('classes','ClassesController@index');
Route::get('class/create','ClassesController@create');
Route::post('class/save','ClassesController@save');
Route::get('class/edit/{id}','ClassesController@edit');
Route::post('class/update/{id}','ClassesController@update');
Route::delete('class/delete/{id}','ClassesController@delete');

//student

Route::get('students','StudentController@index');
Route::get('student/create','StudentController@create');
Route::post('student/save','StudentController@save');
Route::get('student/edit/{id}','StudentController@edit');
Route::post('student/update/{id}','StudentController@update');
Route::delete('student/delete/{id}','StudentController@delete');


});

