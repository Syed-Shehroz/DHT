<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSubscriptionController;
use App\Http\Controllers\ProductSubscriptionHistoryController;
use App\Http\Controllers\ProductSubscriptionPaymentController;

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
    return view('welcome');
});
Route::get('/login', [CustomAuthController::class,'login']);
Route::get('/registration', [CustomAuthController::class,'registration']);
Route::post('/register-user', [CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
// Route::get('/dashboard',[CustomAuthController::class,'dashboard']);

Route::resource('/client', ClientController::class);

Route::resource('/project', ProjectController::class);

Route::resource('/product', ProductController::class);

Route::resource('/product-subs', ProductSubscriptionController::class);

Route::resource('/product-payment', ProductSubscriptionPaymentController::class);





// Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'client'], function () {
//     Route::get('/', 'ClientController@index');

//     Route::get('create', 'ClientController@create');
//     Route::post('/', 'ClientController@store');

//     Route::get('{id}/edit', 'ClientController@edit');
//     Route::post('{id}/update', 'ClientController@update');

//     Route::post('{id}', 'ClientController@destroy');


//     Route::group(['prefix' => '{clientID}/project'], function () {
//         Route::get('/', 'ProjectController@index');

//         Route::get('create', 'ProjectController@create');
//         Route::post('/', 'ProjectController@store');

//         Route::get('{id}/edit', 'ProjectController@edit');
//         Route::post('{id}/update', 'ProjectController@update');

//         Route::get('{id}', 'ProjectController@destroy');


//         Route::group(array('prefix' => '{projectID}/product-subs'), function () {
//             Route::get('/', 'ProductSubscriptionController@index');

//             Route::get('create', 'ProductSubscriptionController@create');
//             Route::post('/', 'ProductSubscriptionController@store');

//             Route::get('{id}/edit', 'ProductSubscriptionController@edit');
//             Route::post('{id}/update', 'ProductSubscriptionController@update');

//             Route::get('{id}', 'ProductSubscriptionController@destroy');
//         });
//     });
// });
