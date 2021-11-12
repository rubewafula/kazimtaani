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

Route::get('/','\App\Http\Controllers\HomeController@welcome');

Route::get('/admin','\App\Http\Controllers\HomeController@index');


Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/registrations','\App\Http\Controllers\RegistrationController@index');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




