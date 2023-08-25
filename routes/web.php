<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Server Routes
Route::get('/add-server', [App\Http\Controllers\ServerController::class, 'addserver'])->middleware('auth')->name('get_addserver');
Route::post('add-server', [App\Http\Controllers\ServerController::class, 'createserver'])->middleware('auth')->name('post_addserver');
Route::post('/server-connect', [App\Http\Controllers\ServerController::class, 'connectserver'])->middleware('auth')->name('connectserver');
Route::get('/server-edit/{id}',  [App\Http\Controllers\ServerController::class, 'editserver'])->middleware('auth')->name('get_editserver');
Route::post('/server-edit/{id}',  [App\Http\Controllers\ServerController::class, 'updateserver'])->middleware('auth')->name('post_editserver');
Route::post('/server-delete', [App\Http\Controllers\ServerController::class, 'deleteserver'])->middleware('auth')->name('deleteserver');
