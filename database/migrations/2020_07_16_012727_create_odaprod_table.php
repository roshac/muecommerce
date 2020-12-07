<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdaprodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreignId('user_id')->change()->constrained('users')->onUpdate('cascade');
            $table->foreignId('status_id')->change()->constrained('status')->onUpdate('cascade');
            $table->foreignId('order_id')->change()->constrained('order')->onUpdate('cascade');
            $table->foreignId('products_id')->change()->constrained('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odaprod');
    }
}
