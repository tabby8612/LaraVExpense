<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $users = User::all('id')->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            Account::create([
                'userID' => fake()->randomElement($users),
                'slug' => fake()->slug(),
                'name' => fake()->word(),
                'accountNo' => fake()->regexify('[A-Z]{5}[0-9]{16}'),
                'openingBalance' => fake()->numberBetween(100, 200),
                'description' => fake()->paragraph()
            ]);
        }
    }
}
