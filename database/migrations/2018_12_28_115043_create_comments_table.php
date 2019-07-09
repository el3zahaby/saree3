<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
            $table->string('commentable_type');
            $table->string('commentable_id');
            $table->string('body');
            $table->string('user_id');
            $table->string('status');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('comments');
	}
}