<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_participant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stream_id');
            $table->boolean('is_host');
            $table->dateTime('time_to_appear');
            $table->string('timezone');
            $table->string('stream_url');
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
        Schema::dropIfExists('stream');
    }
}
