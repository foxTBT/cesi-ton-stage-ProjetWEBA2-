<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagesTable extends Migration
{
    public function up()
    {
        Schema::create('manages', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts')->references('Id_Account');
            $table->foreignId('Id_Company')->constrained('companies')->references('Id_Company');
            $table->primary(['Id_Account', 'Id_Company']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manages');
    }
}
