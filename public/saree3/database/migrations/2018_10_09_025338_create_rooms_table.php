<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->unsigned();
            $table->foreign('parent')->references('id')->on('users')->onDelete('cascade');
            $table->integer('child')->unsigned();
            $table->foreign('child')->references('id')->on('users')->onDelete('cascade');
            $table->integer('service')->unsigned();
            $table->foreign('service')->references('id')->on('services')->onDelete('cascade');
            $table->integer('parentblock');
            $table->integer('childblock');
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
        Schema::dropIfExists('rooms');
    }
}
