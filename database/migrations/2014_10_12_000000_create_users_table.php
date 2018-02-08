<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('title');
            $table->string('gender');
            $table->date('dob');
            $table->blob('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('cellphone')->unique()->nullable();
            $table->integer('userTypeId')->unsigned();
            $table->foreign('userTypeId')->references('id')->on('user_types');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('lastLogin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
