<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id('Id_Offer');
            $table->string('Title_Offer', 255);
            $table->text('Description_Offer');
            $table->decimal('Salary_Offer', 11, 2)->nullable();
            $table->date('Begin_date_Offer');
            $table->date('Duration_Offer');
            $table->foreignId('Id_Category')->nullable()->constrained('categories')->references('Id_Category');
            $table->foreignId('Id_Status')->nullable()->constrained('statuses')->references('Id_Status');
            $table->foreignId('Id_Account')->constrained('accounts')->references('Id_Account');
            $table->foreignId('Id_Company')->constrained('companies')->references('Id_Company');
            $table->primary('Id_Offer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
