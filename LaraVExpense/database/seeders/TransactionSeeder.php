<?php

namespace Database\Seeders;

use App\Enums\TransactionTypeEnum;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $usersIDs = User::all('id')->pluck('id');
        $accountIDs = Account::all('id')->pluck('id');
        $incomeCategories = Category::query()->where('transactionType', TransactionTypeEnum::INCOME->value)->with('subCategories')->get()->toArray();
        $expenseCategories = Category::query()->where('transactionType', TransactionTypeEnum::EXPENSE->value)->with('subCategories')->get()->toArray();

        $incomes = [];
        $expenses = [];
        for ($i = 0; $i < 25; $i++) {
            $randomIncomeCategory = fake()->randomElement($incomeCategories);
            $randomExpenseCategory = fake()->randomElement($expenseCategories);
            $randomIncomeSubCategory = fake()->randomElement($randomIncomeCategory['sub_categories']);
            $randomExpenseSubCategory = fake()->randomElement($randomExpenseCategory['sub_categories']);

            $incomes[] = [
                'type' => TransactionTypeEnum::INCOME->value,
                'userID' => fake()->randomElement($usersIDs),
                'name' => fake()->word(),
                'slug' => fake()->unique()->slug(),
                'referenceNo' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
                'amount' => fake()->numberBetween(2000, 4000),
                'accountID' => fake()->randomElement($accountIDs),
                'categoryID' => $randomIncomeCategory['id'],
                'subCategoryID' => isset($randomIncomeSubCategory) ? $randomIncomeSubCategory['id'] : null,
                'note' => fake()->sentence(),
                'date' => now()->addDays(($i * 2) + 1),
            ];

            $expenses[] = [
                'type' => TransactionTypeEnum::EXPENSE->value,
                'userID' => fake()->randomElement($usersIDs),
                'name' => fake()->word(6),
                'slug' => fake()->unique()->slug(),
                'referenceNo' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
                'amount' => fake()->numberBetween(2000, 4000),
                'accountID' => fake()->randomElement($accountIDs),
                'categoryID' => $randomExpenseCategory['id'],
                'subCategoryID' => isset($randomExpenseSubCategory) ? $randomExpenseSubCategory['id'] : null,
                'note' => fake()->sentence(),
                'date' => now()->addDays(($i * 2) + 1),
            ];

        }

        Transaction::insert($incomes);
        Transaction::insert($expenses);

    }
}
