<?php

use Illuminate\Support\Facades\Route;

Route::resource('faq', 'FaqController');

Route::middleware('ajax')->group(function () {
    Route::prefix('faq/ajax')->name('faq.ajax.')->group(function () {
        Route::post('list', 'FaqController@list')->name('list');
        Route::delete('delete/{user}', 'FaqController@destroy')->name('destroy');
        Route::post('restore', 'FaqController@restore')->name('restore');
        Route::post('enable', 'FaqController@enable')->name('enable');
        Route::post('disable', 'FaqController@disable')->name('disable');
    });
});