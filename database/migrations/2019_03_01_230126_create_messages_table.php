<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            //usuario
            $table->unsignedInteger('from_id'); //primary key 
            $table->foreign('from_id')->references('id')->on('users'); //de donde vinie
            //contacto
            $table->unsignedInteger('to_id'); //primary key 
            $table->foreign('to_id')->references('id')->on('users');

            $table->text('content');

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
        Schema::dropIfExists('messages');
    }
}
