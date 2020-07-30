<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_number');
            // $table->text('photo');
            $table->unsignedBigInteger('type_id');
            $table->integer('mrates');
            $table->integer('urate');
            $table->integer('no_of_occupancy');
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('type_id')
                  ->references('id')->on('types')
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
        Schema::dropIfExists('rooms');
    }
}
