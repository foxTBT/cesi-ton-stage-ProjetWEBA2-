<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('Id_Company');
            $table->string('Name_Company', 128);
            $table->string('Email_Company', 255);
            $table->string('Phone_number_Company', 13);
            $table->text('Description_Company')->nullable();
            $table->string('Siret_number_Company', 14);
            $table->text('Logo_link_Company')->nullable();
            $table->foreignId('Id_City')->constrained('cities')->references('Id_City');
            $table->primary('Id_Company');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
