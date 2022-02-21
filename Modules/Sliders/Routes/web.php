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

use Illuminate\Support\Facades\Route;

Route::resource('slider', 'SlidersController');

Route::middleware('ajax')->prefix('slider/ajax')->name('slider.ajax.')->group(function () {
    Route::post('list', 'SlidersController@list')->name('list');
    Route::delete('delete/{slider}', 'SlidersController@destroy')->name('destroy');
    Route::post('restore', 'SlidersController@restore')->name('restore');
});