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

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('home');
})->name('index');


// Auth group
Route::group(['middleware' => ['auth']], function () {

    // laravel 8 
    // may be usefull for developers https://stackoverflow.com/questions/63882034/target-class-does-not-exist-problem-in-laravel-8
    Route::get('my-profile',[App\Http\Controllers\profile::class, 'index'])->name('my-profile');
    Route::post('update-profile-pic',[App\Http\Controllers\profile::class, 'updateUserProfilePic'])->name('update-profile-pic');
    Route::post('upadate-user-details',[App\Http\Controllers\profile::class, 'updateUserinfo'])->name('upadate-user-details');
    Route::post('update-user-password',[App\Http\Controllers\profile::class, 'updateUserPassword'])->name('update-user-password');

    // post
    Route::get('add-post',[App\Http\Controllers\posts::class, 'addPost'])->name('add-post');
    Route::post('new-post',[App\Http\Controllers\posts::class, 'newpost'])->name('new-post');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
