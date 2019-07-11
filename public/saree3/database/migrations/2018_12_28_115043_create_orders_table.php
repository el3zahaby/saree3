<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id');
            $table->enum('status',['pending','accepted','shipped'])->nullable();
            $table->integer('shipping_address_id');
            $table->integer('currency_id');
            $table->text('data');
            $table->text('comment');
            $table->date('invoice_date');
            $table->date('delivery_date');
            $table->float('total_amount', 10, 0);
            $table->float('total_discount', 10, 0);
            $table->float('total_shipping', 10, 0);
            $table->float('total', 10, 0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('orders');
	}
}