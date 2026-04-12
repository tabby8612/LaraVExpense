<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'userID')->index()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('accountNo');
            $table->integer('openingBalance');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('accounts');
    }
};
