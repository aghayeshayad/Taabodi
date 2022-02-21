<?php

use Illuminate\Support\Facades\Route;

Route::resource('notices', 'NoticesController');

Route::middleware('ajax')->group(function () {
    Route::prefix('notices/ajax')->name('notices.ajax.')->group(function () {
        Route::post('list', 'NoticesController@list')->name('list');
        Route::delete('delete/{banner}', 'NoticesController@destroy')->name('destroy');
        Route::post('restore', 'NoticesController@restore')->name('restore');
        Route::post('enable', 'NoticesController@enable')->name('enable');
        Route::post('disable', 'NoticesController@disable')->name('disable');
    });
});
