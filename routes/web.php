<?php

use Illuminate\Support\Facades\Auth;
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
    return view('login-pages.landing-page');
});

Auth::routes();

Route::prefix('admin')->group(function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/', 'AdminController@index')->name('admin');

});

Route::prefix('student')->group(function(){

    Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/logout', 'Auth\StudentLoginController@logout')->name('student.logout');

    Route::get('/', 'StudentController@index')->name('student');

});

Route::prefix('employee')->group(function(){

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('employee.login');

    Route::get('/', 'HomeController@index')->name('home');

});



Route::middleware('auth')->group(function (){
    // Documents
    Route::prefix('/document')->group(function(){
        Route::get('/', 'DocumentsController@index')->name('document.index');
        Route::post('/store', 'DocumentsController@store')->name('document.store');
        Route::delete('/delete{id}', 'DocumentsController@delete')->name('document.delete');
        Route::get('/download/{id}', 'DocumentsController@download')->name('document.download');

    });

});