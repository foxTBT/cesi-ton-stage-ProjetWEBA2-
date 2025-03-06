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
        Schema::create('offers', function (Blueprint $table) {
            $table->id('Id_Offer'); // Clé primaire auto-incrémentée
            $table->string('Title_Offer', 255)->charset('utf8'); // Titre, UTF-8, non null
            $table->text('Description_Offer')->charset('utf8'); // Description, UTF-8, non-null
            $table->decimal('Salary_Offer', 11, 2)->nullable(); // Salaire, nullable
            $table->date('Begin_date_Offer'); // Date de début, non nullable
            $table->date('Duration_Offer'); // Durée, non nullable
            $table->string('Type_Offer', 128)->charset('utf8'); // Type d'offre, non nullable
            $table->foreignId('Id_Account')->constrained('accounts', 'Id_Account'); // Clé étrangère vers Account
            $table->foreignId('Id_Company')->constrained('companies', 'Id_Company'); // Clé étrangère vers Company
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
