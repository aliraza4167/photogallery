<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PhotoController::class, 'index'])->middleware('auth');

Route::get('/home', function () {
    return view('home');
});

Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('photos', PhotoController::class)->middleware('auth');

// Messages routes
Route::resource('messages', MessagesController::class)->middleware('auth');
// Route::group(['prefix' => 'messages'], function () {
//     Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
//     Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
//     Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
//     Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
//     Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/', [PhotoController::class, 'index'])->middleware('auth');