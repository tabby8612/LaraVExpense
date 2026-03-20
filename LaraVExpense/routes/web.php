<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/transactions', 'Transaction')->name('transactions');

Route::post('/transactions', function (Request $request) {
    dd($request->all());
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
