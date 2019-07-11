<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionTable extends Migration {

	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
			$table->increments('id');
            $table->enum('status', ['Active', 'Inactive']);
            $table->integer('user_id');
            $table->integer('plan_id');
            $table->date('renew_at');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('subscriptions');
	}
}