<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlansTable extends Migration {

	public function up()
	{
		Schema::create('plans', function(Blueprint $table) {
			$table->increments('id');
            $table->float('price', 10, 0);
            $table->text('data');
            $table->string('name');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('plans');
	}
}