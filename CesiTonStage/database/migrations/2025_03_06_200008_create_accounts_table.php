<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('id_account');
            $table->string('email_account', 255)->unique();
            $table->string('password_account', 60);
            $table->string('first_name_account', 128);
            $table->string('last_name_account', 128);
            $table->date('birth_date_account');
            $table->foreignId('id_role')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
