<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactHobbyTable extends Migration
{

    public function up()
    {
        Schema::create('contact_hobby', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('contact_id')->unsigned();
            $table->integer('hobby_id')->unsigned();

            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('hobby_id')->references('id')->on('hobbies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_hobby');
    }
}
