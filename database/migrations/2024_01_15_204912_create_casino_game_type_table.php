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
        Schema::create('casino_game_type', function (Blueprint $table) {
            $table->id();
            $table->integer('casino_id')->unsigned();
            $table->foreign('casino_id')->references('id')->on('casinos')->onDelete('cascade');
            $table->integer('game_type_id')->unsigned();
            $table->foreign('game_type_id')->references('id')->on('game_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casino_game_type');
    }
};
