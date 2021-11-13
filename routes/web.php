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

Route::prefix('registration')->group(function () {

    Route::post('/save','\App\Http\Controllers\RegistrationController@save_registration');
    Route::get('/success','\App\Http\Controllers\RegistrationController@success');

});


Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

    Route::get('/registrations','\App\Http\Controllers\RegistrationController@index');
    Route::post('/registration/sub-counties','\App\Http\Controllers\RegistrationController@subCounties');
    Route::post('/registration/wards','\App\Http\Controllers\RegistrationController@wards');
    Route::get('/target-areas','\App\Http\Controllers\TargetAreaController@index');
    Route::get('/users','\App\Http\Controllers\Admin\UsersController@index');
    Route::get('/manage-user/{id}','\App\Http\Controllers\Admin\UsersController@showManageUser');

    Route::post('/users/{id}','\App\Http\Controllers\Admin\UsersController@update');
    Route::patch('/users/{id}','\App\Http\Controllers\Admin\UsersController@update');
    Route::delete('/users/{id}','\App\Http\Controllers\Admin\UsersController@destroy');

    Route::get('/users/{id}','\App\Http\Controllers\Admin\UsersController@show');
    Route::get('/roles','\App\Http\Controllers\Admin\RolesController@index');
    Route::get('/roles/create','\App\Http\Controllers\Admin\RolesController@create');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




