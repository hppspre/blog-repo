<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile;
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

Route::get('index', function () {
    return view('home');
})->name('index');

Route::get('/', function () {
    return view('home');
})->name('index');


// Auth group
Route::group(['middleware' => ['auth']], function () {

    // laravel 8 
    // may be usefull for developers https://stackoverflow.com/questions/63882034/target-class-does-not-exist-problem-in-laravel-8
    Route::get('my-profile',[App\Http\Controllers\profile::class, 'index'])->name('my-profile');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
