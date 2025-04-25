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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titolo dell'articolo
            $table->string('subtitle'); // Sottotitolo dell'articolo
            $table->longText('body'); // Corpo dell'articolo
            $table->string('image'); // Immagine associata all'articolo
            $table->unsignedBigInteger('user_id')->nullable(); // Relazione con l'utente
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('category_id')->nullable(); // Relazione con la categoria
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
