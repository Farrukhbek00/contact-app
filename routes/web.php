<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/contacts');
});

Route::group([
    'name' => 'contacts',
], function () {
    Route::group([
        'prefix' => 'contacts',
    ], function (){
        Route::delete('emails/{id}', 'App\Http\Controllers\ContactController@destroyEmail')->name('emails.destroy');
        Route::delete('phones/{id}', 'App\Http\Controllers\ContactController@destroyPhone')->name('phones.destroy');
    });
    Route::resource('contacts', 'App\Http\Controllers\ContactController');
});

Route::get('emails', 'App\Http\Controllers\ContactController@emails')->name('emails.index');
Route::get('phones', 'App\Http\Controllers\ContactController@phones')->name('phones.index');



