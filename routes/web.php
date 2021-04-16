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

Auth::routes();


Route::middleware('auth')->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('admin');

    // Documents
    Route::prefix('/document')->group(function(){
        Route::get('/', 'DocumentsController@index')->name('document.index');
        Route::post('/store', 'DocumentsController@store')->name('document.store');
        Route::delete('/delete{id}', 'DocumentsController@delete')->name('document.delete');
        Route::get('/download/{id}', 'DocumentsController@download')->name('document.download');

    });

});