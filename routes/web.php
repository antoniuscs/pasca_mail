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
Route::get('/prodi','ProdiController@index')->name('prodi.index');

Route::patch('/prodi/{prodis}/status','ProdiController@updateStatus')->name('prodi.updateStatus');
Route::resource('prodi','ProdiController');

Route::patch('/studentStaff/{studentstaffs}/status','StudentStaffController@updateStatus')->name('studentStaff.updateStatus');
Route::resource('studentStaff','StudentStaffController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
