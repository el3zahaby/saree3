<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
            $table->tinyInteger('parent_id')->nullable();
            $table->text('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('fixed_price')->default(0);
            $table->integer('order');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('sections');
	}
}