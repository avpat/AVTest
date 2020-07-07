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

Route::get('/file-upload', 'FileUploadController@upload')->name('file.upload');

Route::post('/file-upload', 'FileUploadController@uploadStore')->name('file.upload.store');

