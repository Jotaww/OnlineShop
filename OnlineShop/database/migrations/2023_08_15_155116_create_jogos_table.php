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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string('producer');
            $table->string('name');
            $table->string('image');
            $table->json('platform');
            $table->string('launch');
            $table->string('price');
            $table->string('discount');
            $table->string('priceDiscount');
            $table->text('about');
            $table->json('category');
            $table->json('modoJogo');
            $table->json('reqMinimos');
            $table->json('reqRecomendados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
