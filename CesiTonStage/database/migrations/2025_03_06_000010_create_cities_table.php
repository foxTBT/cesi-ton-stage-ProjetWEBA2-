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
        Schema::create('cities', function (Blueprint $table) {
            $table->id('Id_City'); // Clé primaire auto-incrémentée
            $table->string('Name_City', 255)->charset('ascii'); // Nom de la ville, ASCII, non null
            $table->string('Postal_code_City', 6)->charset('ascii'); // Code postal, ASCII, non null
            $table->unsignedBigInteger('Id_Region'); // Clé étrangère vers la table regions
            $table->foreign('Id_Region')->references('Id_Region')->on('regions')->onDelete('cascade'); // Liaison avec regions
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
