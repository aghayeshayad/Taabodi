<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Auth::routes();
Route::namespace("Auth")->name('auth.')->group(function () {
    Route::post('verify', 'RegisterController@verify')->name('verify');
    Route::post('logoutUser', '\App\Http\Controllers\Auth\LoginController@logout')->name('logoutUser');
});
