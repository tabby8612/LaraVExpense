<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subCategoriesSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < fake()->numberBetween(2, 6); $i++) {
                SubCategory::create([
                    'categoryID' => $category->id,
                    'name' => fake()->word(),
                    'description' => fake()->sentence(),
                    'created_at' => now()->addDays($i)
                ]);
            }
        }
    }
}
