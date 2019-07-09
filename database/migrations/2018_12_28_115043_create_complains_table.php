<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComplainsTable extends Migration {

	public function up()
	{
		Schema::create('complains', function(Blueprint $table) {
			$table->timestamps();
            $table->integer('about_id');
            $table->integer('about_type');
            $table->integer('user_id');
            $table->integer('complain_type_id');
            $table->text('date');
            $table->longText('details');
            $table->enum('status',['pending','solved','rejected'])->nullable();
		});
	}

	public function down()
	{
		Schema::drop('complains');
	}
}