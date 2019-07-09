<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartsTable extends Migration {

	public function up()
	{
		Schema::create('carts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('product_id');
			$table->string('quantity');
			$table->string('status');
		});
	}

	public function down()
	{
		Schema::drop('carts');
	}
}