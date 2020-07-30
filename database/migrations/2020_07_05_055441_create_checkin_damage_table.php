<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinDamageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_damage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('checkin_id');
            $table->unsignedBigInteger('damage_id');
            $table->timestamps();

            $table->foreign('checkin_id')
                  ->references('id')->on('checkins')
                  ->onDelete('cascade');

            $table->foreign('damage_id')
                  ->references('id')->on('damages')
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
        Schema::dropIfExists('checkin_damage');
    }
}
