<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::group(['middleware' => 'acl'], function () {
//    Route::resource('kids', KidController::class);
//});

Route::resource('users', \App\Http\Controllers\UserController::class);


//Route::prefix('/users')->name('user.')->middleware(['acl'])->group(function () {
//    Route::get('/index', [UserController::class] );
//});

//Route::group(['middleware' => 'auth', 'namespace' => 'Manager', 'prefix' => 'manager'], function () {
//    Route::get('/', function(){
//        return redirect()->route('users.index');
//    });
//
//    Route::resource('roles', RoleController::class);
//    Route::get('roles/{role}/resources', [RoleController::class, 'syncResources'])->name('roles.resources');
//    Route::put('roles/{role}/resources', [RoleController::class, 'updateSyncResources'])->name('roles.resources.update');
//
//    Route::resource('users', UserController::class);
//    Route::resource('resources', ResourceController::class);
//});
