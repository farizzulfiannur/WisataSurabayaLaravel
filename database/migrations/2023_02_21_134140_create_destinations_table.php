<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('dest_name');
            // $table->unsignedBigInteger('dest_id');
            // $table->foreign('dest_id')->references('id')->on('dest_photos');
<<<<<<< HEAD
            $table->string('dest_id'); //Ini kenapa ada dest_id?
=======
            $table->string('dest_id');
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
            $table->string('dest_category');
            $table->string('dest_location');
            $table->text('dest_desc');
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
        Schema::dropIfExists('destinations');
    }
}
