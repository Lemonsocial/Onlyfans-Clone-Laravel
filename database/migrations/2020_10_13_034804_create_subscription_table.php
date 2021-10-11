<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->unsignedBigInteger('subscription_type_id');
            $table->dateTime('startDateTime');
            $table->dateTime('endDateTime');
            $table->boolean('isActive');
            $table->timestamps();
        });
        // Schema::table('subscription', function (Blueprint $table) {
        //     // $table->foreign('producer_id')->references('id')->on('users')->onDelete('cascade');
        //     // $table->foreign('subscriber_id')->references('id')->on('users')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
}
