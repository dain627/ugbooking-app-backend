<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // with IP,
        // session,??
        // username, ??
        // usertype, ??
        // timestamp
        // action // get ?S post?
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('request_ip_address');
            $table->string('session_id')->nullable()->default(null);
            $table->string('user_id')->nullable()->default(null);
            $table->string('action')->default('GET');
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
        Schema::dropIfExists('user_logs');
    }
}
