<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bid_payment', function (Blueprint $table) {   
            // $table->id();         
            // $table->string('auction_name');
            // $table->string('photo');
            // $table->string('desc');
            // $table->string('starting_price');
            // $table->string('end_price');
            // $table->string('deadline');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_payment');
    }
}
