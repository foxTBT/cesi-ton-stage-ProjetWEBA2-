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
            $table->string('Name_Region', 255)->charset('ascii')->notNull(); // Nom de la région, ASCII, not null
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
