<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('auction_id')->constrained('auction');
            $table->string('payment_id');
            $table->string('saler_id');
            $table->string('contact_id');
            $table->string('status_id');
            $table->string('fee_paid');
            $table->string('feedback');
            $table->string('postal_code');
            $table->string('auction_name');
            $table->string('photo');
            $table->string('desc');
            $table->string('stariting_price');
            $table->string('end_price');
            $table->string('deadline');
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
        Schema::dropIfExists('bid_payment');
    }
}
