<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluates', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts')->references('Id_Account');
            $table->foreignId('Id_Company')->constrained('companies')->references('Id_Company');
            // $table->decimal('Rating', 2, 1)->nullable();
            $table->unsignedTinyInteger('Rating')->nullable()->check('Rating >= 1 AND Rating <= 5');
            $table->primary(['Id_Account', 'Id_Company']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluates');
    }
}
