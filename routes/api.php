<?php

use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\VerificationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('posts', PostController::class)->only([
//    'destroy', 'show', 'store', 'update'
// ]);

Route::get('/index', [AuthController::class, 'index'])->name('users.index');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/re_register', [AuthController::class, 're_register']);
// Route::get('email/verify',[VerificationController::class,'index'])->name('verification.verify.index');
Route::get('email/verify/{id}',[VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/verify_OTP',[VerificationController::class,'verify_OTP'])->name('verification.verify_OTP');
Route::post('email/logout_OTP',[VerificationController::class,'logout_OTP']);