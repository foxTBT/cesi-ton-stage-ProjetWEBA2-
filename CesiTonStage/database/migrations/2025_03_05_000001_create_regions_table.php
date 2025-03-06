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
        Schema::create('regions', function (Blueprint $table) {
            $table->id('Id_Region'); // Clé primaire auto-incrémentée
            $table->string('City_region', 255)->charset('ascii'); // Ville (ASCII, non null)
            $table->string('Postal_code_Region', 6)->charset('ascii'); // Code postal (ASCII, non null)
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
