<?php

namespace Database\Seeders;

use App\Enums\TransactionTypeEnum;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        for ($i = 0; $i < 20; $i++) {
            $category = Category::create([
                'transactionType' => fake()->randomElement([TransactionTypeEnum::INCOME->value, TransactionTypeEnum::EXPENSE->value]),
                'name' => fake()->words(),
                'description' => fake()->sentence(),
                'color' => fake()->safeHexColor()
            ]);

            for ($i = 0; $i < 5; $i++) {
                SubCategory::create([
                    'categoryID' => $category->id,
                    'name' => fake()->words(5),
                    'description' => fake()->sentence()
                ]);
            }
        }
    }
}
