<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            # Default fields
            $table->increments('id');
            $table->timestamps();
            # The rest of the fields
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('email_type');
            $table->string('email');
            $table->string('phone_type');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
