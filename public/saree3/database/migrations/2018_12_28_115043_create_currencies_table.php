<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration {

	public function up()
	{
		Schema::create('currencies', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('iso');
            $table->string('value');
            $table->enum('dir',['left','right']);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('currencies');
	}
}