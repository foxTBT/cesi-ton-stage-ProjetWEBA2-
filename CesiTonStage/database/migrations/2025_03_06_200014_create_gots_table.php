<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGotsTable extends Migration
{
    public function up()
    {
        Schema::create('gots', function (Blueprint $table) {
            $table->foreignId('Id_Offer')->constrained('offers')->references('Id_Offer');
            $table->foreignId('Id_Skill')->constrained('skills')->references('Id_Skill');
            $table->primary(['Id_Offer', 'Id_Skill']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gots');
    }
}
