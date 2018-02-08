<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->blob('placePhoto');
            $table->integer('advertisementId')->unsigned();
             $table->foreign('advertisementId')->references('id')->on('advertisements');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('advertisement_photos');
    }
}
