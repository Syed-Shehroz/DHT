<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return Redirect::to('dashboard');
// });
// Route::get('dashboard', function () {
//     return view('template.layout');
// });
// Route::get('/login', [CustomAuthController::class,'login']);
// Route::get('/registration', [CustomAuthController::class,'registration']);
// Route::post('/register-user', [CustomAuthController::class,'registerUser'])->name('register-user');
// Route::post('login-user', [CustomAuthController::class,'loginUser'])->name('login-user');


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['prefix' => 'client'], function () {
        Route::get('/', 'ClientController@index');
        Route::get('create', 'ClientController@create');
        Route::post('/', 'ClientController@store');
        Route::get('{id}/edit', 'ClientController@edit');
        Route::post('{id}/update', 'ClientController@update');
        Route::post('{id}', 'ClientController@destroy');
    });

    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'ProjectController@index');
        Route::get('create', 'ProjectController@create');
        Route::post('/', 'ProjectController@store');
        Route::get('{id}/edit', 'ProjectController@edit');
        Route::post('{id}/update', 'ProjectController@update');
        Route::post('{id}', 'ProjectController@destroy');
    });
});
