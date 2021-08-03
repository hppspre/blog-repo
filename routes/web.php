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





Route::get('index',[App\Http\Controllers\profile::class, 'allPost'])->name('index');
Route::get('home',[App\Http\Controllers\profile::class, 'allPost'])->name('home');
Route::get('/',[App\Http\Controllers\profile::class, 'allPost'])->name('index');


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
    Route::get('update-post/{id}',[App\Http\Controllers\posts::class, 'updatepost'])->name('update-post');
    Route::get('drop-post/{id}',[App\Http\Controllers\posts::class, 'dropPost'])->name('drop-post');
    Route::post('update-user-post',[App\Http\Controllers\posts::class, 'updateuserpost'])->name('update-user-post');
    Route::post('update-user-post-image',[App\Http\Controllers\posts::class, 'updateuserpostimage'])->name('update-user-post-image');

    // latest and oldest

    Route::get('latest',[App\Http\Controllers\profile::class, 'latest'])->name('latest');
    Route::get('oldest',[App\Http\Controllers\profile::class, 'oldest'])->name('oldest');


    // comments
    Route::post('add-comments',[App\Http\Controllers\comment::class, 'addComment'])->name('add-comments');

});

// ADMIN ROUTES
Route::get('admin-log',[App\Http\Controllers\administrator::class, 'index'])->name('admin-log');
Route::post('admin-login',[App\Http\Controllers\administrator::class, 'checkAdmin'])->name('admin-login');
Route::post('logout-admin',[App\Http\Controllers\administrator::class, 'logout'])->name('logout-admin');
Route::get('admin-home',[App\Http\Controllers\administrator::class, 'adminHome'])->name('admin-home');
Route::get('admin-users_update/{id}',[App\Http\Controllers\administrator::class, 'adminUsersUPdate'])->name('admin-users_update');
Route::post('update-user-details-admin',[App\Http\Controllers\administrator::class, 'adminUpdateUser'])->name('update-user-details-admin');
Route::get('admin-user-delete/{id}',[App\Http\Controllers\administrator::class, 'userDelete'])->name('admin-user-delete');


Route::get('admin-posts',[App\Http\Controllers\administrator::class, 'adminAllpost'])->name('admin-posts');
Route::get('drop-admin-post/{id}',[App\Http\Controllers\administrator::class, 'dropAdminPost'])->name('drop-admin-post');
Route::get('admin-checked-post/{id}',[App\Http\Controllers\administrator::class, 'Makechked'])->name('admin-checked-post');


Route::get('admin-get-post-details/{id}',[App\Http\Controllers\administrator::class, 'adminGetPostDetails'])->name('admin-get-post-details');
Route::get('admin-update-post/{id}',[App\Http\Controllers\administrator::class, 'viewpostupdateAdmin'])->name('admin-update-post');
Route::post('admin-update-post-details',[App\Http\Controllers\administrator::class, 'updateuserpost'])->name('admin-update-post-details');
Route::post('admin-update-post-image',[App\Http\Controllers\administrator::class, 'updateuserpostimage'])->name('admin-update-post-image');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
