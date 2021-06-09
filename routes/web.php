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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@index')
    ->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')
    ->name('user.login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')
    ->name('user.logout');

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')
    ->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@store')
    ->name('user.register');

Route::get('/welcome', 'App\Http\Controllers\WelcomeController@index')
    ->name('welcome');

Route::post('/add/category', 'App\Http\Controllers\CategoryController@store')
    ->name('add.category');
Route::Post('/select', 'App\Http\Controllers\CategoryController@getCategory')
    ->name('select.category');

Route::get('/home/dashboard', 'App\Http\Controllers\HomeController@index')
    ->name('home');

Route::get('/home/dashboard/add', 'App\Http\Controllers\AttendeeController@index')
    ->name('add.attendee');
Route::Post('/home/{category}/add-attendee', 'App\Http\Controllers\AttendeeController@store')
    ->name('attendee.add');

Route::delete('/home/{Id}/delete-attendee', 'App\Http\Controllers\AttendeeController@destroy')
    ->name('attendee.delete');

Route::get('/home/dashboard/list', 'App\Http\Controllers\ListController@index')
    ->name('list.attendee');

Route::get('/home/dashboard/mark', 'App\Http\Controllers\MarkAttendanceController@index')
    ->name('mark.attendee');

Route::Post('/home/dashboard/{id}/mark', 'App\Http\Controllers\MarkAttendanceController@done')
    ->name('attendee.mark');

Route::get('/home/dashboard/report', 'App\Http\Controllers\ReportController@index')
    ->name('report.attendee');

Route::post('/home/dashboard/report/get', 'App\Http\Controllers\ReportController@getReport')
    ->name('get.report');