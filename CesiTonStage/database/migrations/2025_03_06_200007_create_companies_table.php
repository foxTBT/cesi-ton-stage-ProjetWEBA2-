<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('id_company');
            $table->string('name_company', 128);
            $table->string('email_company', 255)->unique();
            $table->string('phone_number_company', 13)->unique();
            $table->text('description_company')->nullable();
            $table->string('siret_number_company', 14);
            $table->text('logo_link_company')->nullable();
            $table->foreignId('id_city')->constrained('cities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
