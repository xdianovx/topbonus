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
        Schema::create('bonus_cards', function (Blueprint $table) {
            $table->id();
            $table->string('free_spins')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->string('bonus_code')->nullable();
            $table->string('wagering')->nullable();
            $table->string('refferal_link')->nullable();
            $table->date('expired_date')->nullable();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->integer('used_link')->default(0);

            $table->foreignId('country_id');
            $table->foreignId('casino_id');
            $table->foreignId('bonus_type_id');
            $table->foreignId('game_id');
            
            $table->timestamps();
        });
    }
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_cards');
    }
};
