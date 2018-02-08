<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->integer('roomsAvailable');
            $table->string('gender');
            $table->string('prices'); 
            $table->integer('tenantsPerRoom');
            $table->string('placeDetails');
            $table->string('nearbyCampus');
            $table->integer('userId')->unsigned();
            $table->integer('placeId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('placeId')->references('id')->on('places');
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
        Schema::dropIfExists('advertisements');
    }
}
