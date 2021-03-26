<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiningListsTable extends Migration
{
    /**
     * Run the migrations.
     * Create Database Table('dining_lists')
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dining_lists', function (Blueprint $table) {
            $table->id(); // pk
            $table->foreignId('chef_profile_id'); // create fk colunm
            $table->string('dining_category'); // varchar
            $table->text('menu_image'); // text
            $table->string('menu_title'); // varchar
            $table->text('menu_description'); // text
            $table->integer('price'); // number
            $table->string('location'); // varchar
            $table->text('availability'); // text
            $table->timestamps();
            $table->foreign('chef_profile_id')->on('chef_profiles')->references('id')->cascadeOnDelete()->cascadeOnUpdate(); //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dining_lists');
    }
}
