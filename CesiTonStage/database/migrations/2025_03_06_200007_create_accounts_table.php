<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('Id_Account');
            $table->string('Email_Account', 255);
            $table->string('Password_Account', 60);
            $table->string('First_name_Account', 128);
            $table->string('Last_name_Account', 128);
            $table->date('Birth_date_Account');
            $table->foreignId('Id_Role')->constrained('roles')->references('Id_Role');
            $table->primary('Id_Account');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
