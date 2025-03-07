<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id('Id_City');
            $table->string('Name_City', 255);
            $table->string('Postal_code_City', 10);
            $table->foreignId('Id_Region')->constrained('regions')->references('Id_Region');
            $table->primary('Id_City');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
