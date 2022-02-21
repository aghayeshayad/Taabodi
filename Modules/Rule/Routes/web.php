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

Route::resource('rule', 'RuleController');

Route::middleware('ajax')->prefix('rule/ajax')->name('rule.ajax.')->group(function () {
    Route::post('list', 'RuleController@list')->name('list');
    Route::delete('delete/{test}', 'RuleController@destroy')->name('destroy');
    Route::post('restore', 'RuleController@restore')->name('restore');
});