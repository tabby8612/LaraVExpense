<?php

use App\Enums\TransactionTypeEnum;
use App\Models\Account;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(TransactionTypeEnum::INCOME->value);
            $table->foreignIdFor(User::class, 'userID')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->string('referenceNo')->nullable();
            $table->integer('amount')->default(0);
            $table->foreignIdFor(Account::class, 'accountID')->index();
            $table->foreignIdFor(Category::class, 'categoryID')->index()->nullable();
            $table->foreignIdFor(SubCategory::class, 'subCategoryID')->index()->nullable();
            $table->text('note');
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
