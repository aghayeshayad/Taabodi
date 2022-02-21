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
use Modules\Products\Http\Controllers\ProductsController;

Route::resource('products', 'ProductsController');


Route::middleware(['ajax'])->name('products.ajax.')->group(function() {
    Route::post('get-subcategories', 'ProductsController@getSubcategories')->name('get-subcategories');
    Route::post('get-sub-subcategories', 'ProductsController@getSubSubcategories')->name('get-sub-subcategories');

    Route::post('list', 'ProductsController@list')->name('list');
    Route::delete('destroy/{product}', 'ProductsController@destroy')->name('destroy');
    Route::post('restore/{product}', 'ProductsController@restore')->name('restore');
});

Route::get('file-import-export', [ProductsController::class, 'fileImportExport'])->name('export-import-file');
Route::post('file-import', [ProductsController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ProductsController::class, 'fileExport'])->name('file-export');
