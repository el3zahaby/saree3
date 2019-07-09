<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->increments('id');
            $table->string('user_id');
            $table->string('reviewable_id');
            $table->string('reviewable_type');
            $table->text('description');
            $table->string('stars');
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('reviews');
	}
}