<?php

use Illuminate\Support\Facades\Route;

Route::resource('contactus', 'ContactUsController');

Route::middleware('ajax')->group(function () {
    Route::prefix('contactus/ajax')->name('contactus.ajax.')->group(function () {
        Route::post('list', 'ContactUsController@list')->name('list');
        Route::delete('delete/{contact}', 'ContactUsController@destroy')->name('destroy');
        Route::post('restore', 'ContactUsController@restore')->name('restore');
        Route::post('delete-file', 'ContactUsController@deleteFile')->name('delete-file');
    });
});

Route::resource('form-contact', 'FormContactUsController');

Route::middleware('ajax')->prefix('form-contact/ajax/')->name('form-contact.ajax.')->group(function () {
    Route::post('list', 'FormContactUsController@list')->name('list');
    Route::delete('delete/{form}', 'FormContactUsController@destroy')->name('destroy');
    Route::post('restore','FormContactUsController@restore')->name('restore');
});
