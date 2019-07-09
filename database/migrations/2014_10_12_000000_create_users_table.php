<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * This Table for Users 
     * @version 1.0
     * 
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->default('null');
            $table->string('email');
            $table->string('password');
            $table->string('slug')->nullable();
            $table->string('dirthyear')->nullable();
            $table->string('dirthmonth')->nullable();
            $table->string('dirthday')->nullable();
            $table->integer('gender')->nullable();
            $table->string('country');
            $table->string('city');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('experienceyears')->nullable();
            $table->string('certificates')->nullable();
            $table->string('skills')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->default('user.png');
            $table->string('cover')->default('cover.png');
            $table->string('mobile')->nullable();
            $table->string('job')->nullable();
            $table->string('last_ip')->nullable();
            $table->string('account_type')->nullable();
            $table->string('status')->nullable();
            $table->string('verfiy_code')->nullable();
            $table->string('verfied')->nullable();
            $table->tinyInteger('sell')->default('0');
            $table->tinyInteger('upload_products')->default('0');            
            $table->string('paypal_mail')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('db')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
