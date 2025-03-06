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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('Id_Role'); // Clé primaire auto-incrémentée
            $table->string('Type_Role', 128)->charset('utf8'); // Type de rôle, UTF-8, non null
            $table->text('Description_Role')->nullable()->charset('utf8'); // Description, UTF-8, nullable
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
