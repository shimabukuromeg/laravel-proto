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

Route::get('pdf','PDFController@index')->name('pdf');
Route::get('phpwkhtmltopdf','PhpWkHtmlToPdfController@index')->name('phpwkhtmltopdf');
Route::get('phpwkhtmltopdf','PhpWkHtmlToPdfController@index')->name('phpwkhtmltopdf');

// PDF表示
Route::get('/download-pdf', 'PhpWkHtmlToPdfController@download')->name('phpwkhtmltopdf.download');

// Hello,world
Route::get('/hello', 'HelloController@index')->name('hello');
