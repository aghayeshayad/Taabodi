<?php

use Modules\Products\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::resource('orders', 'OrdersController');



Route::group(['middleware' => ['role']], function () {

    Route::resource('roles', 'RoleController');

    Route::prefix('roles')->name('roles.ajax.')->group(function () {

        Route::get('list', 'RoleController@list')->name('list');
        Route::delete('delete/{roles}', 'RoleController@destroy')->name('destroy');
        Route::post('restore', 'RoleController@restore')->name('restore');
    });

});


Route::resource('users', 'UserController');
Route::prefix('users')->name('users.ajax.')->group(function () {
    Route::Post('list', 'UserController@list')->name('list');
});


Route::get('file-import-export', [ProductsController::class, 'fileImportExport'])->name('export-import-file');
Route::post('file-import', [ProductsController::class, 'import'])->name('file-import');
Route::get('file-export', [ProductsController::class, 'fileExport'])->name('file-export');
