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

    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password-confirm', 'Admin\ConfirmPasswordController@confirm')->name('admin.password.confirm.submit');
    Route::get('/password-confirm', 'Admin\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');

    Route::post('/password-email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email'); //? Forgot Password Enter Email Submit
    Route::get('/password-reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request'); //? Forgot Password Enter Email Show
    Route::post('password-reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password-reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/', 'AdminController@index')->name('admin');

    //Manage Accounts
    Route::prefix('/manage-accounts')->group(function(){

        Route::get('/', 'Admin\RegisterController@index')->name('register.index');
        Route::post('/register', 'Admin\RegisterController@post')->name('register.post');
        
    });

    //Course Routes
    Route::prefix('/courses')->group(function(){

        Route::get('/', 'Admin\CourseController@index')->name('course.index');
        Route::get('/course/{id}', 'Admin\CourseController@show')->name('course.show');

        //Course Interacting to Subjects
        Route::get('{id}/add-subject', 'Admin\CourseController@create')->name('course.create');
        Route::post('/store-subject/{id}', 'Admin\CourseController@store')->name('course.store');
        
    });

});

Route::prefix('student')->group(function(){

    Route::get('/login', 'Student\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Student\StudentLoginController@login')->name('student.login.submit');
    Route::get('/logout', 'Student\StudentLoginController@logout')->name('student.logout');

    Route::post('/password-confirm', 'Student\ConfirmPasswordController@confirm')->name('student.password.confirm.submit');
    Route::get('/password-confirm', 'Student\ConfirmPasswordController@showConfirmForm')->name('student.password.confirm');

    Route::post('/password-email', 'Student\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password-reset', 'Student\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('password-reset', 'Student\ResetPasswordController@reset')->name('student.password.update');
    Route::get('/password-reset/{token}', 'Student\ResetPasswordController@showResetForm')->name('student.password.reset');

    Route::get('/', 'StudentController@index')->name('student');
    Route::get('/grade', 'StudentTour\GradeController@index')->name('grade');
    Route::get('/schedule', 'StudentTour\ScheduleController@index')->name('schedule');


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