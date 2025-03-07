<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGotTable extends Migration
{
    public function up()
    {
        Schema::create('got', function (Blueprint $table) {
            $table->foreignId('id_offer')->constrained('offers')->onDelete('cascade');
            $table->foreignId('id_skill')->constrained('skills')->onDelete('cascade');
            $table->primary(['id_offer', 'id_skill']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('got');
    }
}
