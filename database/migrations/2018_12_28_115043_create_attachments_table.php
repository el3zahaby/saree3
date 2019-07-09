<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentsTable extends Migration {

	public function up()
	{
		Schema::create('attachments', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('size');
            $table->string('mime');
            $table->string('path');
            $table->integer('attachable_id');
            $table->integer('attachable_type');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('attachments');
	}
}