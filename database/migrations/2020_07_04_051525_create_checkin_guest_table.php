<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checkin_id');
            $table->unsignedBigInteger('guest_id');
            $table->timestamps();

            $table->foreign('checkin_id')
                  ->references('id')->on('checkins')
                  ->onDelete('cascade');

            $table->foreign('guest_id')
                  ->references('id')->on('guests')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkin_guest');
    }
}
