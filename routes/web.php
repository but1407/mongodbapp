<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TuanbutController;
use App\Models\Tuanbut;
use App\Http\Controllers\Users\LoginmongodbController;
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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/info', function () {
    phpinfo();
});

Route::prefix('admin/users')->group(function(){
    Route::controller(LoginmongodbController::class)->group(function(){
        Route::get('login','index')->name('login');
        Route::post('login','store')->name('users.store');
        #forgot password
        Route::get('forgot-password','forgotPass')->name('users.forgetPass');
        Route::post('forgot-password','postForgotPass');
        Route::get('get-password/{customer}/{token}','getPass')->name('users.getPass');
        Route::post('get-password/{customer}/{token}','postGetPass');

    });
});


Route::middleware(['auth'])->group(function () {
    #admin
    Route::prefix('admin')->group(function () {
        #MainController
        Route::controller(AccountController::class)->group(function () {
            Route::get('/', 'index')->name('admin');
            Route::get('main', 'index');
        });
    });
    Route::prefix('account')->group(function(){
            #MenuController
            Route::controller(AccountController::class) ->group(function(){
                Route::get('add','create') ->name('admin.add');
                Route::post('add','store')->name('store');
                Route::get('list','index')->name('list');
                Route::get('destroy/{id}','destroy')->name('deleteItem');
                Route::get('/editItem/{id}','show')->name('editItem');
                Route::post('update','update')->name('update');
            });
        });
});


Route::resource('/product', ProductController::class);