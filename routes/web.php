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
    return view('login-pages.employee');
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


});

Route::prefix('employee')->group(function(){

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('employee.login');
    Route::get('/', 'HomeController@index')->name('home');

});

Route::middleware('auth')->group(function (){


    //TODO: Schedule
    Route::prefix('/schedule')->group(function(){

        Route::get('/', 'Employee\ScheduleController@index')->name('schedule.index');

    });

    // Documents
    Route::prefix('/document')->group(function(){

        Route::get('/', 'DocumentsController@index')->name('document.index');
        Route::post('/store', 'DocumentsController@store')->name('document.store');
        Route::delete('/delete{id}', 'DocumentsController@delete')->name('document.delete');
        Route::get('/download/{id}', 'DocumentsController@download')->name('document.download');
        
    });

});