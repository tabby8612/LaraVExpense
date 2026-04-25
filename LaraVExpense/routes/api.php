<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('users')->controller(AuthController::class)->group(function () {
    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});

Route::prefix('accounts')->controller(AccountController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/','index');
    Route::get('/{account:slug}','show');
    Route::post('/','store');
    Route::put('/{account:slug}','update');
});