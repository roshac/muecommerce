<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAucfgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auction_user', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('user_id')->change()->constrained('users')->onUpdate('cascade');
            // $table->foreignId('saler_id')->change()->constrained('users')->onUpdate('cascade');
            // $table->foreignId('auction_id')->change()->constrained('auction')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_user');
    }
}
