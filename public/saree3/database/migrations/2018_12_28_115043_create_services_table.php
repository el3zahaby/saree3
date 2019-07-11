<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {


    /**
     *  Table For Services
     *  @version 1.0
     * 
     *  */ 
	public function up() {
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('section_id');
            $table->integer('sub_section');
            $table->integer('sub_sub_section')->nullable();
            $table->integer('category')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->integer('to');
            $table->string('name');
            $table->string('slug');
            $table->text('body');
            $table->string('attachment')->nullable();
            $table->integer('price')->nullable();
            $table->longText('experiences')->nullable();
            $table->longText('skills')->nullable();
            $table->double('lng')->nullable();
            $table->double('lat')->nullable();
            $table->enum('per',['Hour', 'Service']);
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->timestamps();
        });
	}

	public function down() {
		Schema::drop('services');
	}
}