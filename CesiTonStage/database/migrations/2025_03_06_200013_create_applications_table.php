<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('id_account')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('id_offer')->constrained('offers')->onDelete('cascade');
            $table->text('cv_link_apply')->nullable();
            $table->text('cover_letter_apply')->nullable();
            $table->date('date_apply');
            $table->primary(['id_account', 'id_offer']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
