<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Auth\Login\MemberController as LoginMemberController;

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\DirectoryController;

use \App\Http\Controllers\Member\MembersController;
use \App\Http\Controllers\Member\DirectoryController as DirectoryMemberController;
use \App\Http\Controllers\Member\ProductsController as ProductMemberController;

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

Route::get('/', [DefaultController::class, 'index']);

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('member')->group(function(){
    Route::namespace('Auth\Login')->group(function () {
        Route::get('login',  [LoginMemberController::class, 'showLoginForm'])->name('loginMember');
        Route::post('login',  [LoginMemberController::class, 'login'])->name('loginMember');

        Route::get('logout',  [LoginMemberController::class, 'logout'])->name('logoutMember');
        Route::post('logout',  [LoginMemberController::class, 'logout'])->name('logoutMember');
    });

    Route::get('',  [MembersController::class, 'index']);

    Route::prefix('products')->group(function(){
        Route::get('', [ProductMemberController::class, 'index']);
        Route::get('/create', [ProductMemberController::class, 'create']);
        Route::get('/edit/{id}', [ProductMemberController::class, 'edit']);

        Route::post('/save', [ProductMemberController::class, 'save']);
    });

    Route::prefix('directory')->group(function(){
        Route::get('', [DirectoryMemberController::class, 'index']);
        Route::post('save', [DirectoryMemberController::class, 'save']);
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/member/{title}/{location_id}/{page?}', [DirectoryController::class, 'manage']);
