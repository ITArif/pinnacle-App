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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login','Auth\LoginController@login')->name('admin.login');
Route::post('/user/logout','Auth\LoginController@logout')->name('user.logout');

Route::get('/user/profile','Auth\LoginController@profile');
//User profile update route
Route::post('/update/profile','Auth\LoginController@updateProfile')
    ->name('update.profile');
//user password change route
Route::post('/update/user/password','Auth\LoginController@updatePassword')
    ->name('update.password');
