<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use App\Http\Controllers\Transaction\TransactionController;
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
    Route::delete('/{account:slug}','destroy');
});

Route::prefix('categories')->controller(CategoryController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/','index');
    Route::get('/{category}','show');
    Route::post('/','store');
    Route::put('/{category}','update');
    Route::delete('/{category}','destroy');
});

Route::prefix('sub-categories')->controller(SubCategoryController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/','index');
    Route::get('/{subCategory}','show');
    Route::post('/','store');
    Route::put('/{subCategory}','update');
    Route::delete('/{subCategory}','destroy');
});

Route::prefix('transactions')->controller(TransactionController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/','index');
    Route::get('/{transaction:slug}','show');
    Route::post('/','store');
    // Route::put('/{subCategory}','update');
    // Route::delete('/{subCategory}','destroy');
});

