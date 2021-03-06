<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('room_id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('no_of_days');
            $table->integer('no_of_adults');
            $table->integer('no_of_children');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->integer('advance_payment');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('guest_id')
                  ->references('id')->on('guests')
                  ->onDelete('cascade');

            $table->foreign('room_id')
                  ->references('id')->on('rooms')
                  ->onDelete('cascade');

            $table->foreign('discount_id')
                  ->references('id')->on('discounts')
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
        Schema::dropIfExists('reservations');
    }
}
