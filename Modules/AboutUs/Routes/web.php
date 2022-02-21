<?php

use Illuminate\Support\Facades\Route;

Route::resource('aboutus', 'AboutUsController');

Route::middleware('ajax')->group(function () {
    Route::prefix('aboutus/ajax')->name('aboutus.ajax.')->group(function () {
        Route::post('list', 'AboutUsController@list')->name('list');
        Route::delete('delete/{about}', 'AboutUsController@destroy')->name('destroy');
        Route::post('restore', 'AboutUsController@restore')->name('restore');
        Route::post('delete-file', 'AboutUsController@deleteFile')->name('delete-file');
    });
});
