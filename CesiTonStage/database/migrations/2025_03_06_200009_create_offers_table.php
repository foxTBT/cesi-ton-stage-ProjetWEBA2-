<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id('id_offer');
            $table->string('title_offer', 255);
            $table->text('description_offer');
            $table->decimal('salary_offer', 11, 2)->nullable();
            $table->date('begin_date_offer');
            $table->date('duration_offer');
            $table->foreignId('id_type')->constrained('types')->onDelete('cascade');
            $table->foreignId('id_status')->constrained('statuses')->onDelete('cascade');
            $table->foreignId('id_account')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
