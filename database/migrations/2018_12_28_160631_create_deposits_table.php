<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('service_id');
            $table->unsignedInteger('payment_method_id');
            $table->enum('status',['pending','Paid','Refund'])->nullable();
            $table->text('products');
            $table->date('invoice_date');
            $table->date('delivery_date');
            $table->float('total_amount', 10, 0);
            $table->float('total_discount', 10, 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
