<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('model_id');
            $table->integer('model_type');
            $table->string('title');
            $table->text('description');
            $table->string('path');
            $table->integer('size');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('photos');
	}
}