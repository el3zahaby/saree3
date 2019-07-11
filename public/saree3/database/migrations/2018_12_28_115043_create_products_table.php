<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up() {

		/* *
		 * * This Table For Products
		 * * @version 1.0
		 * * Auther : Ayoub tamous
		 * *
		 * */ 
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_and_type');
			$table->longText('body');
			$table->integer('section_id')->nullable();
			$table->integer('sub_section')->nullable();
			$table->integer('category')->nullable();
			$table->string('Quantity');
			$table->float('price', 10, 0);
            $table->integer('user_id');
            $table->integer('branch_id')->nullable();
			$table->string('slug');
			$table->string('sku');
            $table->string('branch_name');			
			$table->longText('attachments')->nullable();
			$table->enum('trans', ['1', '2']);
			$table->enum('in_stock', ['Yes', 'No'])->default('Yes');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->timestamps();
        });
	}

	public function down() {
		Schema::drop('products');
	}
}