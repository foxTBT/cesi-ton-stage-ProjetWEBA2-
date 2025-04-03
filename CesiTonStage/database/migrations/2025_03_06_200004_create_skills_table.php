<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id('Id_Skill');
            $table->string('Name_Skill', 255);
            $table->primary('Id_Skill');
            $table->timestamps();
            $table->softDeletes(); // Ajout de la colonne deleted_at pour la suppression douce

        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
