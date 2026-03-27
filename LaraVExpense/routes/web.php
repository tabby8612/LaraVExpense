<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome')->name('home');

Route::inertia('/transactions', 'Transaction')->name('transactions');

Route::post('/transactions', function (Request $request) {
    dd($request->all());
});

Route::inertia('/incomes', 'Income')->name('incomes');
Route::inertia('/upcoming-income', 'UpcomingIncome')->name('upcomingIncome');
Route::inertia('/expenses', 'Expense')->name('expenses');
Route::inertia('/upcoming-expense', 'UpcomingExpense')->name('upcomingExpense');
Route::inertia('/recurring-transactions', 'RecurringTransaction')->name('recurringTransaction');
Route::inertia('/accounts', 'Account')->name('accounts');
Route::inertia('/account/detail/{id}', 'AccountDetail')->name('accountDetail');
Route::inertia('/budget', 'Budget')->name('budget');
Route::inertia('/set-goals', 'SetGoals')->name('goal');
Route::inertia('/calendar', 'Calendar')->name('calendar');

Route::prefix('reports')->group(function () {
    Route::inertia('/allreports', 'AllReports')->name('allReports');
    Route::inertia('income', 'reports/IncomeReport')->name('incomeReport');
    Route::inertia('expense', 'reports/ExpenseReport')->name('expenseReport');
    Route::inertia('incomevsexpense', 'reports/IncomeExpenseReport')->name('incomeExpenseReport');
    Route::inertia('upcomingincome', 'reports/UpcomingIncome')->name('upcomingIncome');
});


Route::post('/recurring-transactions', function (Request $request) {
    dd($request->all());
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
