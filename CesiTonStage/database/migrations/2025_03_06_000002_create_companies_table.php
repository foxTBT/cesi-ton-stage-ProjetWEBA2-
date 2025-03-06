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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('Id_Company'); // Clé primaire auto-incrémentée
            $table->string('Name_Company', 128)->charset('utf8'); // Nom, UTF-8, non null
            $table->string('Email_Company', 255)->charset('utf8')->unique(); // Email, UTF-8, unique, non null
            $table->string('Phone_number_Company', 13)->charset('ascii')->unique(); // Numéro de téléphone, ASCII, unique, non null
            $table->text('Description_Company')->charset('utf8')->nullable(); // Description, UTF-8, nullable
            $table->string('Siret_number_Company', 14)->charset('ascii'); // SIRET, ASCII, non null
            $table->text('Logo_link_Company')->charset('utf8')->nullable(); // Lien du logo, UTF-8, nullable
            $table->unsignedBigInteger('Id_Region'); // Déclaration explicite de la clé étrangère Id_Region
            $table->foreign('Id_Region')->references('Id_Region')->on('regions')->onDelete('cascade'); // La clé étrangère fait référence à Id_Region de la table regions
            $table->timestamps(); // Ajout des timestamps (création et mise à jour)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
