<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serviceid')->unsigned();
            $table->foreign('serviceid')->references('id')->on('services')->onDelete('cascade');
            $table->string('path');
            $table->string('filetype');
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
        Schema::dropIfExists('service_attachments');
    }
}
