<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // create fk colunm
            $table->foreignId('dining_list_id'); // create fk colunm
            $table->string('reservation_name'); // varchar
            $table->string('reservation_email'); // varchar
            $table->integer('reservation_number'); // number
            $table->date('booking_date'); // date
            $table->text('note')->nullable(); // text
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('dining_list_id')->on('dining_lists')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
