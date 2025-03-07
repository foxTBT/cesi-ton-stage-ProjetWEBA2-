<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluates', function (Blueprint $table) {
            $table->foreignId('id_account')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('companies')->onDelete('cascade');
            $table->decimal('rating', 2, 1)->nullable();
            $table->primary(['id_account', 'id_company']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluates');
    }
}
