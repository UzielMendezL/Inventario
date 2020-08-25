<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockTaking', function (Blueprint $table) {
            $table->increments('id');
            $table->smalldatetime('startDate');
            $table->smalldatetime('updateDate');
            $table->string('productCode');
            $table->int('quantity');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockTaking');
    }
}
