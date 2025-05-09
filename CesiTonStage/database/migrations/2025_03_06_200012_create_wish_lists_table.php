<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration
{
    public function up()
    {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts')->references('Id_Account');
            $table->foreignId('Id_Offer')->constrained('offers')->references('Id_Offer');
            $table->primary(['Id_Account', 'Id_Offer']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wish_lists');
    }
}
