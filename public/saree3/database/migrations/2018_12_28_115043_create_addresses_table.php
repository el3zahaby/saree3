<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('area_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1');
            $table->string('address2');
            $table->integer('postal_code');
            $table->integer('phone1');
            $table->integer('phone2');
            $table->text('comment')->nullable();
            $table->double('lng')->nullable();
            $table->double('lat')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('addresses');
	}
}