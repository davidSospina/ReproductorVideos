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

Route::get('/video', 'StorageController@video')->name('video');

Route::get('videos/crear', 'StorageController@crear')->name('crear.video');

Route::post('videos/crear', 'StorageController@store')->name('guardar.video');

Auth::routes();

Route::get('/home', 'StorageController@home')->name('home');
