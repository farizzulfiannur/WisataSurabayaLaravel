<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventbarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventbarus', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_location');
            $table->string('tanggal_mulai');
            $table->string('tanggal_akhir');
            $table->string('event_cover');
            $table->string('event_desc');
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
        Schema::dropIfExists('eventbarus');
    }
}
