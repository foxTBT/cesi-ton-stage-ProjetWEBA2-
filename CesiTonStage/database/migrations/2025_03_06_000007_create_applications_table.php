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
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts', 'Id_Account')->cascadeOnDelete();
            $table->foreignId('Id_Offer')->constrained('offers', 'Id_Offer')->cascadeOnDelete();
            $table->text('Cv_link_Apply')->nullable()->charset('utf8');//Lien absolue fichier
            $table->text('Cover_letter_Apply')->nullable()->charset('utf8');//Text box
            $table->date('Date_Apply');
            $table->primary(['Id_Account', 'Id_Offer']); // Clé primaire composite
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
