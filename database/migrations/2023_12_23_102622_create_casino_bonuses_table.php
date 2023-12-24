<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('casino_bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link')->default('none');
            $table->string('meta_description')->nullable();
            $table->boolean('is_exclusive')->default(false);
            $table->string('slug')->nullable();
            $table->date('expires_date')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('code_used')->default(0);
            $table->string('bonus_code')->nullable();
            $table->string('wagering')->nullable();
            $table->string('max_cash_out')->nullable();
            $table->string('min_cash_out')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casino_bonuses');
    }
};
