<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotodestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photodests', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('destination_id')->constrained('destinations');
            $table->foreignId("destination_id")->constraint("destinations")->onDelete("cascade");
            $table->string('destphoto');
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
        Schema::dropIfExists('photodests');
    }
}
