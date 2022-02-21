<?php

use Illuminate\Support\Facades\Route;

Route::resource('banner', 'BannerController');

Route::middleware('ajax')->group(function () {
    Route::prefix('banner/ajax')->name('banner.ajax.')->group(function () {
        Route::post('list', 'BannerController@list')->name('list');
        Route::delete('delete/{banner}', 'BannerController@destroy')->name('destroy');
        Route::post('restore', 'BannerController@restore')->name('restore');
        Route::post('enable', 'BannerController@enable')->name('enable');
        Route::post('disable', 'BannerController@disable')->name('disable');
    });
});
