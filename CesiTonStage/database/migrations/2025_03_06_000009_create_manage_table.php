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
        Schema::create('manage', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts', 'Id_Account')->cascadeOnDelete();
            $table->foreignId('Id_Company')->constrained('companies', 'Id_Company')->cascadeOnDelete();
            $table->primary(['Id_Account', 'Id_Company']); // Clé primaire composite
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manage');
    }
};
