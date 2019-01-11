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

Route::get('/', 'StaticPagesController@home');

Route::get('/contact', 'StaticPagesController@contact');

Route::get('/about', 'StaticPagesController@about');

Route::resource('/project', 'ProjectController');

Route::resource('/task', 'TaskController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
