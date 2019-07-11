<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price', 8, 2);
            $table->string('description');
            $table->integer('serviceid')->unsigned();
            $table->foreign('serviceid')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('services_extras');
    }
}
