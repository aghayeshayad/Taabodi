<?php

use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\FrontEnd\Product\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', 'HomeController@index')->name('home.index');

Route::POST('search', 'HomeController@selectSearch')->name('home.search');

Route::namespace("Product")->group(function () {
    Route::get('product/', 'ProductController@index')->name('product.list');
    Route::get('product/{id}', 'ProductController@show')->name('product.show');
});

Route::get('categories/{category}/{type}', 'CategoryController@show')->name('categories.show');

Route::get('sort', 'SortController@sort')->name('sort');


Route::namespace("Pages")->name('pages.')->group(function () {
    Route::get('about-us', 'PagesController@about_us')->name('about-us');

    Route::get('contact-us', 'PagesController@contact_us')->name('contact-us');
    Route::post('form-contact', 'PagesController@form_contact')->name('form-contact');

    Route::get('faq', 'PagesController@faq')->name('faq');
    Route::post('email-notice', 'PagesController@emailNotice')->name('email-notice');

});

Route::get('/install', function () {
    Artisan::call('install:fresh');
});
