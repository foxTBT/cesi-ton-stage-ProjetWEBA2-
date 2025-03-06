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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('Id_Account'); // Clé primaire auto-incrémentée
            $table->string('Email_Account', 255)->charset('utf8')->unique(); // Email, UTF-8, unique
            $table->string('Password_Account', 60)->charset('ascii'); // Mot de passe, ASCII
            $table->string('First_name_Account', 128)->charset('ascii'); // Prénom, ASCII
            $table->string('Last_name_Account', 128)->charset('ascii'); // Nom de famille, ASCII
            $table->date('Birth_date_Account'); // Date de naissance, not null
            $table->unsignedBigInteger('Id_Role')->unique(); // Clé étrangère, unique, not null
            
            // Définition de la clé étrangère
            $table->foreign('Id_Role')->references('Id_Role')->on('roles')->onDelete('cascade');

            $table->timestamps(); // Ajout des timestamps (création et mise à jour)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
