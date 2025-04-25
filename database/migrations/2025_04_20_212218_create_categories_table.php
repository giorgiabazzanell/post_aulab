<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category; // Importa il modello Category

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Aggiunta della colonna 'name'
            $table->timestamps();
        });

        // Array di categorie predefinite
        $categories = ['politica', 'economia', 'food&drink', 'sport', 'intrattenimento', 'tech'];

        // Inserimento delle categorie nel database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
