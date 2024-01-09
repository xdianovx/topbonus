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
        Schema::create('casino_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->integer('casino_fairness');
            $table->integer('withdrawal_credibility');
            $table->integer('promotions_and_bonuses');
            $table->integer('games_variety_and_graphics');
            $table->integer('support_professionality');
            $table->string('review_title');
            $table->text('review_text')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('casino_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casino_ratings');
    }
};
