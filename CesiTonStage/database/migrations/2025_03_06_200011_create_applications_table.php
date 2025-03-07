<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('Id_Account')->constrained('accounts')->references('Id_Account');
            $table->foreignId('Id_Offer')->constrained('offers')->references('Id_Offer');
            $table->text('Cv_link_Application');
            $table->text('Cover_letter_Application')->nullable();
            $table->date('Date_Application');
            $table->primary(['Id_Account', 'Id_Offer']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
