<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration
{
    public function up()
    {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->foreignId('id_account')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('id_offer')->constrained('offers')->onDelete('cascade');
            $table->primary(['id_account', 'id_offer']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('wish_lists');
    }
}
